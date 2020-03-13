<?php


namespace App\Services\Data;

use App\Models\Domain;

class DomainService extends \MService
{
    public function lookupData($rowsOnly)
    {
        $this->renderJSON(\MRepository::gridDataAsJSON(Domain::listAll(), $rowsOnly ?: true));
    }
}