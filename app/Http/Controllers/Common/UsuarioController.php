<?php

namespace App\Http\Controllers\Common;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use common\models\usuario as Usuario;

class UsuarioController  extends BaseController
{
    public function listTeste(Request $request, $id) {
        $filter = (object)[
            'flexible' => false,
            'login' => $id
        ];
        $usuario = new Usuario();
        $result = $usuario->listByFilter($filter)->asQuery()->asObjectArray();
        return $result;
    }

}
