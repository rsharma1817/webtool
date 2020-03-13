<?php

class AssociationCriteria
{

    private $name;
    private $associationMap;
    private $joinType;
    private $alias;
    private $persistentCriteria;

    public function __construct($name, $criteria, $joinType = 'INNER')
    {
        $this->name = $name;
        $this->joinType = $joinType;
        $this->persistentCriteria = $criteria;
    }

    public function setCriteria($criteria)
    {
        $this->persistentCriteria = $criteria;
    }

    public function getCriteria()
    {
        return $this->persistentCriteria;
    }

    public function setAssociationMap($associationMap)
    {
        $this->associationMap = $associationMap;
    }

    public function getAssociationMap()
    {
        return $this->associationMap;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getJoinType()
    {
        return $this->joinType;
    }

    public function setJoinType($joinType)
    {
        $this->joinType = $joinType;
    }

    public function getJoin()
    {
        $this->associationMap->setKeysAttributes();
        $cardinality = $this->associationMap->getCardinality();
        if ($cardinality == 'manyToMany') {
            $associativeTable = $this->associationMap->getAssociativeTable();
            $names = $this->associationMap->getNames();
            $condition = $names->fromColumnName . "=" . $associativeTable . '.' . $names->fromColumn;
            $join[] = array($names->fromTable, $associativeTable, $condition, $this->joinType);
            $condition = $associativeTable . '.' . $names->toColumn . "=" . $names->toColumnName;
            $join[] = array($associativeTable, $names->toTable, $condition, $this->joinType);
        } else {
            $fromAlias = $this->persistentCriteria->getAlias($this->associationMap->getFromClassName());
            $toAlias = $this->alias;
            $names = $this->associationMap->getNames($fromAlias, $toAlias);
            $condition = $names->fromColumnName . "=" . $names->toColumnName;
            $join[] = array($names->fromTable, $names->toTable, $condition, $this->joinType);
        }
        return $join;
    }

}
