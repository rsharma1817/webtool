<?php

namespace App\Repositories;

use App\Models\Base;
use App\Models\Domain as DomainModel;

class DomainRepository extends \MRepository
{
    public static function listByFilter($filter)
    {
        $criteria = DomainModel::getCriteria()->select('*')->orderBy('entry');
        if ($filter->idDomain) {
            $criteria->where("idDomain = {$filter->idDomain}");
        }
        if ($filter->entry) {
            $criteria->where("entry LIKE '%{$filter->entry}%'");
        }
        return $criteria;
    }

    public static function listAll()
    {
        $criteria = DomainModel::getCriteria()->select('idDomain, entries.name as name, idEntity')->orderBy('entries.name');
        Base::entryLanguage($criteria);
        return $criteria;
    }

    public static function listForSelection()
    {
        return DomainModel::getCriteria()->select('idDomain, name')->orderBy('name');
    }


}