<?php

use database\MSQL;

class AssociationMap
{
    private $name;
    private $fromClassMap;
    private $fromClassName;
    private $toClassMap;
    private $toClassName;
    private $associativeTable;
    private $cardinality;
    private $deleteAutomatic = FALSE;
    private $retrieveAutomatic = FALSE;
    private $saveAutomatic = FALSE;
    private $inverse = FALSE;
    private $fromKey;
    private $toKey;
    private $fromAttributeMap = NULL;
    private $toAttributeMap = NULL;
    private $order = array();
    private $orderAttributes = NULL;
    private $indexAttribute;
    private $autoAssociation = FALSE;

    public function __construct(ClassMap $fromClassMap, $name)
    {
        $this->fromClassMap = $fromClassMap;
        $this->fromClassName = $fromClassMap->getName();
        $this->name = $name;
        $this->inverse = FALSE;
    }

    public function getFromClassMap()
    {
        return $this->fromClassMap;
    }

    public function getFromClassName()
    {
        return $this->fromClassName;
    }

    public function setToClassName($name)
    {
        $this->toClassName = $name;
    }

    public function getToClassName()
    {
        return $this->toClassName;
    }

    public function setToClassMap($classMap)
    {
        $this->toClassMap = $classMap;
    }

    public function getToClassMap()
    {
        $toClassMap = $this->toClassMap;
        if ($toClassMap == NULL) {
            $toClassMap = $this->toClassMap = PersistentManager::getClassMap($this->toClassName);
        }
        return $toClassMap;
    }

    public function setAssociativeTable($tableName)
    {
        $this->associativeTable = $tableName;
    }

    public function getAssociativeTable()
    {
        return $this->associativeTable;
    }

    public function addKeys($fromKey, $toKey)
    {
        $this->fromKey = $fromKey;
        $this->toKey = $toKey;
        $this->inverse = ($fromKey == $this->fromClassMap->getKeyAttributeName());
    }

    public function setKeysAttributes()
    {
        if ($this->toClassMap == NULL) {
            $this->getToClassMap();
        }
        if ($this->cardinality == 'manyToMany') {
            $this->fromAttributeMap = $this->fromClassMap->getKeyAttributeMap(0);
            $this->toAttributeMap = $this->toClassMap->getKeyAttributeMap(0);
        } else {
            $this->fromAttributeMap = $this->fromClassMap->getAttributeMap($this->fromKey);
            $this->toAttributeMap = $this->toClassMap->getAttributeMap($this->toKey);
        }
        if (count($this->order)) {
            $orderEntry = array();
            foreach ($this->order as $orderAttr) {
                $orderEntry[] = $orderAttr[0] . ' ' . $orderAttr[1];
            }
            if (count($orderEntry)) {
                $this->setOrderAttributes($orderEntry);
            }
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setOrder($order)
    {
        $this->order = $order;
    }

    public function setOrderAttributes($orderAttributes)
    {
        $this->orderAttributes = $orderAttributes;
    }

    public function getOrderAttributes()
    {
        return $this->orderAttributes;
    }

    public function setIndexAttribute($indexAttribute)
    {
        $this->indexAttribute = $indexAttribute;
    }

    public function getIndexAttribute()
    {
        return $this->indexAttribute;
    }

    public function setDeleteAutomatic($value = false)
    {
        $this->deleteAutomatic = $value;
    }

    public function setRetrieveAutomatic($value = false)
    {
        $this->retrieveAutomatic = $value;
    }

    public function setSaveAutomatic($value = false)
    {
        $this->saveAutomatic = $value;
    }

    public function setInverse($value = false)
    {
        $this->inverse = $value;
    }

    public function setAutoAssociation($value = false)
    {
        $this->autoAssociation = $value;
    }

    public function isDeleteAutomatic()
    {
        return $this->deleteAutomatic;
    }

    public function isRetrieveAutomatic()
    {
        return $this->retrieveAutomatic;
    }

    public function isSaveAutomatic()
    {
        return $this->saveAutomatic;
    }

    public function isInverse()
    {
        return $this->inverse;
    }

    public function isAutoAssociation()
    {
        return $this->autoAssociation;
    }

    public function setCardinality($value = 'oneToOne')
    {
        $this->cardinality = $value;
    }

    public function getCardinality()
    {
        return $this->cardinality;
    }

    public function getFromAttributeMap()
    {
        return $this->fromAttributeMap;
    }

    public function getToAttributeMap()
    {
        return $this->toAttributeMap;
    }

    public function getNames($fromAlias = '', $toAlias = '')
    {
        $names = new \stdClass();
        $names->fromTable = $this->fromAttributeMap->getClassMap()->getTableName($fromAlias);
        $names->toTable = $this->toAttributeMap->getClassMap()->getTableName($toAlias);
        $names->fromColumnName = $this->fromAttributeMap->getFullyQualifiedName($fromAlias);
        $names->toColumnName = $this->toAttributeMap->getFullyQualifiedName($toAlias);
        $names->fromColumn = $this->fromAttributeMap->getName();
        $names->toColumn = $this->toAttributeMap->getName();
        return $names;
    }

    public function getCriteria($orderAttrs)
    {
        $criteria = new RetrieveCriteria($this->toClassMap);
        if ($this->cardinality == 'manyToMany') {
            $criteria->addAssociationCriteria($this->fromClassName . $this->name, $this);
            $criteria->addCriteria($this->fromAttributeMap, '=', '?');
        } else {
            $criteria->addCriteria($this->toAttributeMap, '=', '?');
        }
        if (is_array($this->orderAttributes)) {
            if (count($this->orderAttributes)) {
                foreach ($this->orderAttributes as $order) {
                    $criteria->orderBy($order);
                }
            }
        }
        return $criteria;
    }

    public function getCriteriaParameters($object)
    {
        $attributeMap = $this->fromAttributeMap;
        $criteriaParameters = array($object->getAttributeValue($attributeMap));
        return $criteriaParameters;
    }

    public function getDeleteStatement($object, $refObject = NULL)
    {
        $statement = new MSQL();
        $statement->setDb($this->fromClassMap->getDb());
        $statement->setTables($this->getAssociativeTable());
        $this->setKeysAttributes();
        $whereCondition = ($this->fromAttributeMap->getName() . ' = ' . $object->getAttributeValue($this->fromAttributeMap));
        // se recebe $refObject, remove a associaçao apenas com esse objeto
        if ($refObject) {
            $whereCondition .= " AND ( " . $this->toAttributeMap->getName() . " = " . $refObject->getAttributeValue($this->toAttributeMap) . ")";
        }
        $statement->setWhere($whereCondition);
        return $statement->delete();
    }

    public function getDeleteStatementId($object, $id)
    {
        $statement = new MSQL();
        $statement->setDb($this->fromClassMap->getDb());
        $statement->setTables($this->getAssociativeTable());
        $this->setKeysAttributes();
        $whereCondition = $this->toAttributeMap->getName() . ' IN (' . implode(',', $id) . ') ';
        $whereCondition .= " AND ( " . $this->fromAttributeMap->getName() . " = " . $object->getAttributeValue($this->fromAttributeMap) . ")";
        $statement->setWhere($whereCondition);
        return $statement->delete();
    }

    public function getInsertStatement($object, $refObject)
    {
        $statement = new MSQL();
        $statement->setDb($this->fromClassMap->getDb());
        $statement->setTables($this->getAssociativeTable());
        $columns = $this->fromAttributeMap->getName();
        $parameters[] = $object->getAttributeValue($this->fromAttributeMap);
        $columns .= ',' . $this->toAttributeMap->getName();
        $parameters[] = $refObject->getAttributeValue($this->toAttributeMap);
        $statement->setColumns($columns);
        $statement->setParameters($parameters);
        return $statement->insert();
    }

    public function getInsertStatementId($object, $id)
    {
        $statement = new MSQL();
        $statement->setDb($this->fromClassMap->getDb());
        $statement->setTables($this->getAssociativeTable());
        $columns = $this->fromAttributeMap->getName();
        $parameters[] = $object->getAttributeValue($this->fromAttributeMap);
        $columns .= ',' . $this->toAttributeMap->getName();
        $parameters[] = $id;
        $statement->setColumns($columns);
        $statement->setParameters($parameters);
        return $statement->insert();
    }

    public function getUpdateStatementId($object, $id, $value = NULL)
    {
        // $id = array com PK dos objetos associados
        $statement = new MSQL();
        $statement->setDb($this->fromClassMap->getDb());
        $statement->setTables($this->toClassMap->getTableName());
        $a = new OperandArray($id);
        $statement->setColumns($this->toAttributeMap->getName());
        $whereCondition = ($this->toClassMap->getKeyAttributeName() . ' IN ' . $a->getSql());
        $statement->setWhere($whereCondition);
        //$statement->setParameters($object->getOIDValue());
        $statement->setParameters($value);
        return $statement->update();
    }


}
