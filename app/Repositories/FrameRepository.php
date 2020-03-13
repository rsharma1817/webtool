<?php


namespace App\Repositories;

use App\Models\Frame as FrameModel;
use App\Models\Entry;
use App\Models\FrameElement;

class FrameRepository extends \MRepository
{
    public static function listByFilter(object $filter)
    {
        $criteria = FrameModel::getCriteria()
            ->select('idFrame, entry.entry, active, idEntity, entry.name')
            ->inner(Entry::class, 'idEntity = entry.idEntity')
            ->whereParam('entry.idLanguage = :idLanguage', ['idLanguage' => \Manager::$idLanguage])
            ->orderBy('entry.name');
        if ($filter->idFrame) {
            $criteria->whereParam("idFrame = :idFrame", ['idFrame' => $filter->idFrame]);
        }
        if ($filter->lu) {
            $criteria
                ->distinct(true)
                ->whereParam('lu.name LIKE :luName', ['luName' => $filter->lu . '%']);
        }
        if ($filter->fe) {
            $criteria
                ->associationAlias('frameElement', 'fe')
                ->inner(Entry::class . ' e1', 'fe.idEntity = e1.idEntity')
                ->whereParam('e1.name LIKE :feName', ['feName' => $filter->fe . '%'])
                ->where('e1.idLanguage = :idLanguage');
        }
        if ($filter->frame) {
            $criteria->whereParam('entry.name LIKE :frameName', ['frameName' => $filter->frame . '%']);
        }
        if ($filter->idDomain) {
            $criteria
                ->whereParam('entity.domain.idDomain = :idDomain', ['idDomain' => $filter->idDomain]);
        }
        if ($filter->idLU) {
            Base::relation($criteria, 'LU lu', 'Frame', 'rel_evokes');
            if (is_array($filter->idLU)) {
                $criteria->where("lu.idLU", "IN", $filter->idLU);
            } else {
                $criteria->where("lu.idLU = {$filter->idLU}");
            }
        }
        return $criteria;
    }

}