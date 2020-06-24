<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function filter()
    {
        $this->middleware('auth:api', ['except' => ['refresh','login','register','current','auth0Callback','authPlainCallback']]);
    }

    public function register(Request $request)
    {
        $user = User::create([
            'login'    => $request->login,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'valid' => 1,
            'active' => 1,
            'status' => 0
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = [
            'login' => request('login'),
            'passMD5' => request('password')
        ];
        mdump($credentials);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function current()
    {
        logger('in current');
        logger(auth()->payload()->toArray());
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function auth0Callback()
    {
        $userInfo = request('user');
        logger($userInfo);
        $token = '';
        try {
            $user = User::where([
                ['email', '=', $userInfo['email']],
                ['auth0IdUser', '=', $userInfo['sub']]
            ])->firstOrFail();
            if ($user->status == 1) {
                $user->lastLogin = now();
                $user->save();
                $token = auth()->tokenById($user->idUser);
                $status = 'logged';
            } else {
                $status = 'pending';
            }
        } catch(\Exception $e) {
            $user = User::create([
                'login'    => $userInfo['email'],
                'email'    => $userInfo['email'],
                'password' => Hash::make($userInfo['sub']),
                'valid' => 1,
                'active' => 1,
                'status' => 0,
                'auth0IdUser' => $userInfo['sub'],
            ]);
            $status = 'new';
        }
        return response()->json(['status' => $status, 'token' => $token]);
    }

    public function authPlainCallback()
    {
        $idUsuario = request('idUser');
        mdump('idUsuario = ' . $idUsuario);
        try {
            $token = auth()->tokenById($idUsuario);
        } catch(\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(['token' => $token]);
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $payload = auth()->payload();
        return response()->json([
            'access_token' => $token,
            'id_token' => $payload->get('jti'),
            'id_user' => $payload->get('sub'),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL()
        ]);
    }
}
