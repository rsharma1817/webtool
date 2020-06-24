<?php

namespace App\Http\Controllers;
use App\Manager\Manager;

class FrameController extends Controller
{
    public function filter()
    {
        //$this->middleware('auth:api');
    }

    public function index() {
        try {
            $frame = new \fnbr\models\ViewFrame();
            $filter = Manager::getParams(['idFrame','idEntity','idLU','idDomain','lu','fe','frame','name','idLanguage']);
            return $frame->listByFilter($filter)->asQuery()->getResult(\FETCH_ASSOC);
        } catch (\Exception $e) {
            return response()->error('Error at frames::index [' . $e->getMessage() .']');
        }
    }

    public function show($id) {
        try {
            return new \fnbr\models\Frame($id);
        } catch (\Exception $e) {
            debug($e->getTraceAsString());
            return response()->error('Error at frames::show [' . $e->getMessage() .']');
        }
    }

}
