<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

resource('frames', 'FrameController');



Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', 'Auth\AuthController@register');
    Route::post('logout', 'Auth\AuthController@logout');
    //Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::get('current', 'Auth\AuthController@current');
    Route::post('auth0Callback', 'Auth\AuthController@auth0Callback');
    Route::post('authPlainCallback', 'Auth\AuthController@authPlainCallback');
});

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('refresh', 'Auth\AuthController@refresh');
});

Route::put('grupo/saveTransacoes/{id}', 'GrupoController@saveTransacoes');
Route::put('usuario/saveGrupos/{id}', 'UsuarioController@saveGrupos');

Route::group([
    'prefix' => 'app'
], function ($router) {
    Route::get('statusServer', 'AppController@statusServer');
    Route::post('horusComando', 'AppController@horusComando');
    Route::post('atualizarFirmware', 'AppController@atualizarFirmware');
    Route::post('updateSQM', 'AppController@updateSQM');
    Route::post('reset', 'AppController@reset');
    Route::post('associarSimcard', 'AppController@associarSimcard');
    Route::post('desassociarSimcard', 'AppController@desassociarSimcard');
    Route::post('associarEquipamento', 'AppController@associarEquipamento');
    Route::post('desassociarEquipamento', 'AppController@desassociarEquipamento');
    Route::post('cadastrarPortas', 'AppController@cadastrarPortas');
    Route::post('removerPortas', 'AppController@removerPortas');
    Route::post('carregarSQM', 'AppController@carregarSQM');
});


Route::group([
    'prefix' => 'data'
], function ($router) {
    // grids
    Route::post('frameGrid', 'Data\FrameController@grid');
    // combobox
    // graph
    // upload
});

/*
|--------------------------------------------------------------------------
| Resouce Routes
|--------------------------------------------------------------------------
*/
function resource($uri, $controller)
{
    Route::get($uri, $controller.'@index');
    Route::post($uri, $controller.'@store');
    Route::get($uri.'/{id}', $controller.'@show');
    Route::put($uri.'/{id}', $controller.'@update');
    Route::patch($uri.'/{id}', $controller.'@update');
    Route::delete($uri.'/{id}', $controller.'@destroy');
}
