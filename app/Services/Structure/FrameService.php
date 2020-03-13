<?php


namespace App\Services\Structure;

use App\Repositories\FrameRepository;

class FrameService extends \MService
{
    public function listFrames($data)
    {
        $filter = (object)['idDomain' => $data->idDomain, 'lu' => $data->lu, 'fe' => $data->fe, 'frame' => $data->frame];
        $frames = FrameRepository::listByFilter($filter)->asQuery()->getResult(\FETCH_ASSOC);
        $result = array();
        foreach ($frames as $row) {
            $node = array();
            $node['id'] = 'f' . $row['idFrame'];
            $node['text'] = $row['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa fa-square fa16px entity_frame';
            $node['entry'] = $row['entry'];
            $result[] = $node;
        }
        return $result;
    }
}