<?php


namespace App\Repositories;

use App\Models\AuthUser as AuthUserModel;
use App\Models\Base;

class AuthUserRepository extends \MRepository
{
    public function listByFilter($filter)
    {
        $criteria = AuthUserModel::getCriteria()->select('*')->orderBy('login');
        if ($filter->idUser) {
            $criteria->where("idUser = {$filter->idUser}");
        }
        //if ($filter->idPerson) {
        //    $criteria->where("idPerson = {$filter->idPerson}");
        //}
        if ($filter->login) {
            $criteria->where("login LIKE '{$filter->login}%'");
        }
        if ($filter->name) {
            $criteria->where("name LIKE '{$filter->name}%'");
        }
        if ($filter->email != '') {
            $criteria->where("email = '{$filter->email}'");
        }
        if ($filter->status != '') {
            $criteria->where("status = '{$filter->status}'");
        }
        return $criteria;
    }

    public function listForGrid($filter)
    {
        $levels = array_keys(Base::userLevel());
        $constraintsLU = _M("Constraints_LU");
        $preferences = _M("Preferences");
        $criteria = AuthUserModel::getCriteria()->select("*, idUser as resetPassword, name, email, groups.name as level, " .
            "IF((groups.name = 'BEGINNER') or (groups.name = 'JUNIOR') or (groups.name = 'SENIOR'), '{$constraintsLU}','') as constraints, '{$preferences}' as preferences")->orderBy('login');
        if ($filter->idUser) {
            $criteria->where("idUser = {$filter->idUser}");
        }
        if ($filter->login) {
            $criteria->where("login LIKE '{$filter->login}%'");
        }
        if ($filter->name) {
            $criteria->where("name LIKE '{$filter->name}%'");
        }
        if ($filter->level) {
            $criteria->where("upper(groups.name) LIKE upper('{$filter->level}%')");
        }
        $criteria->where('upper(groups.name)', 'IN', $levels);
        return $criteria;
    }

    public function listGroups()
    {
        $criteria = AuthUserModel::getCriteria()->select("groups.idGroup,groups.name")->orderBy("groups.name");
        if ($this->idUser) {
            $criteria->where("idUser = {$this->idUser}");
        }
        return $criteria;
    }

    public function getUsersOfLevel($level)
    {
        $criteria = $this->getCriteria()->select("idUser, login")
            ->where("groups.name = '{$level}'")
            ->orderBy("login");
        return $criteria->asQuery()->chunkResult('idUser', 'login');
    }

    public function getUserSupervisedByIdLU($idLU)
    {
        $criteria = $this->getCriteria()->select('idUser,config');
        $rows = $criteria->asQuery()->getResult();
        foreach ($rows as $row) {
            $config = unserialize($row['config']);
            $lus = $config->fnbrConstraintsLU;
            if ($lus) {
                foreach ($lus as $id) {
                    if ($idLU == $id) {
                        $userSupervised = new User($row['idUser']);
                        return $userSupervised;
                    }
                }
            }
        }
        return NULL;
    }


}