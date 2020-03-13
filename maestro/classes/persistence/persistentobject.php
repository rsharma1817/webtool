<?php

class PersistentObject
{

    protected $isPersistent;
    // protected $manager;
    protected $_className;
    protected $_mapClassName;
    protected $_namespace;
    protected $_map;

    public function __construct()
    {
        //$this->setManager(PersistentManager::getInstance($configLoader));
        $this->_className = get_class($this);
        $p = strrpos($this->_className, '\\');
        $this->_namespace = substr($this->_className, 0, $p);
        $this->_mapClassName = str_replace($this->_namespace, $this->_namespace . "\\Map", $this->_className) . "Map";
        $this->_map = self::getMap();
    }

    public function setManager(\IPersistentManager $manager)
    {
        //$this->manager = $manager;
    }

    public function getManager()
    {
        //return $this->manager;
    }

    public function getMap()
    {
        $mapClassName = $this->_mapClassName;
        return $mapClassName::$ORMMap;
    }

    /**
     * Nome da classe do Model.
     * @return string
     */
    public function getClassName()
    {
        return $this->_className;
    }

    /**
     * Namespace do Model.
     * @return string
     */
    public function getNamespace()
    {
        return $this->_namespace;
    }

    /**
     * @return ClassMap
     */
    public function getClassMap()
    {
        return PersistentManager::getClassMap($this->_className);
    }

    public function setPersistent($value)
    {
        $this->isPersistent = $value;
    }

    public function isPersistent()
    {
        return $this->isPersistent;
    }

    public function setAttributeValue(AttributeMap $attributeMap, $value)
    {
        $attributeMap->setValue($this, $value);
    }

    public function getAttributeValue(AttributeMap $attributeMap)
    {
        return $attributeMap->getValue($this);
    }

    public function retrieve()
    {
        PersistentManager::retrieveObject($this);
    }

    public function retrieveFromQuery($query)
    {
        $this->manager->retrieveObjectFromQuery($this, $query);
    }

    public function retrieveFromCriteria($criteria, $parameters = NULL)
    {
        PersistentManager::retrieveObjectFromCriteria($this, $criteria, $parameters);
    }

    public function retrieveAssociation($association, $orderAttributes = '')
    {
        return PersistentManager::retrieveAssociation($this, $association);
    }

    public function retrieveAssociationAsCursor($association, $orderAttribues = '')
    {
        return PersistentManager::retrieveAssociationAsCursor($this, $association);
    }

    public static function find($select = '*', $where = '', $orderBy = '')
    {
        $className = get_called_class();
        $classMap = PersistentManager::getInstance()->getClassMap($className);
        $criteria = new RetrieveCriteria($classMap);
        $criteria->select($select)->where($where)->orderBy($orderBy);
        return $criteria;
    }

    /**
     * @param string $command
     * @return RetrieveCriteria
     */
    public static function getCriteria($command = '')
    {
        //return $this->manager->getRetrieveCriteria($this, $command);
        return PersistentManager::getRetrieveCriteria(get_called_class(), $command);
    }

    public function getDeleteCriteria()
    {
        return $this->manager->getDeleteCriteria($this);
    }

    public function getUpdateCriteria()
    {
        return $this->manager->getUpdateCriteria($this);
    }

    public function update()
    {
        $this->manager->saveObjectRaw($this);
    }

    public function save()
    {
        $this->manager->saveObject($this);
    }

    public function saveAssociation($association)
    {
        $this->manager->saveAssociation($this, $association);
    }

    public function saveAssociationById($association, $id)
    {
        $this->manager->saveAssociationById($this, $association, $id);
    }

    public function delete()
    {
        $this->manager->deleteObject($this);
    }

    public function deleteAssociation($association)
    {
        $this->manager->deleteAssociation($this, $association);
    }

    public function deleteAssociationObject($association, $object)
    {
        $this->manager->deleteAssociationObject($this, $association, $object);
    }

    public function deleteAssociationById($association, $id)
    {
        $this->manager->deleteAssociationById($this, $association, $id);
    }

    public function handleLOBAttribute($attribute, $value, $operation)
    {
        $this->manager->handleLOBAttribute($this, $attribute, $value, $operation);
    }

    public function getOIDName()
    {
        return $this->getPKName();
    }

    public function getOIDValue()
    {
        return $this->getPKValue();
    }

    public function getId()
    {
        return $this->getPKValue();
    }

    public function getPKValue($index = 0)
    {

        $pk = $this->getPKName($index);
        return $this->get($pk);
    }

    public function getPKName($index = 0)
    {
        $index = $index ?: 0;

        return $this->getClassMap()->getKeyAttributeName($index);
    }

    public function getDatabaseName()
    {
        return $this->getClassMap()->getDatabaseName();
    }

    public function getColumnName($attributeName)
    {
        return $this->getClassMap()->getAttributeMap($attributeName)->getColumnName();
    }

    /**
     * @return \database\MDatabase
     */
    public function getDb()
    {
        return $this->getClassMap()->getDb();
    }

    public static function getAllAttributes()
    {
        $allAttributes = self::getMap()['attributes'];
        return array_keys($allAttributes);
    }


    /**
     * @param $uid
     * @return static
     * @throws Exception Não existe campo uid definido nos maps
     */
    public static function getByUid($uid)
    {
        $object = new static;
        $uidField = self::getUidField($object);

        if (!$uidField) {
            throw new \Exception('No uid field defined for ' . get_class($object));
        }

        $criteria = $object->getCriteria('select *')->where("$uidField = :uuid")->addParameter('uuid', $uid);
        $object->retrieveFromCriteria($criteria);

        return $object;
    }

    private static function getUidField($object)
    {
        $classMap = $object->getClassMap();
        $uidField = $classMap->getUidField();

        while ($uidField === null) {
            $classMap = $classMap->getSuperClassMap();
            if (!$classMap) {
                break;
            }

            $uidField = $classMap->getUidField();
        }

        return $uidField;
    }

    /**
     * Essa função foi criada para se adequar ao código em PersistentManager::logger
     * @return string
     */
    public function getLogDescription()
    {
        return '';
    }

    /**
     * Essa função evita a injeção de tags indesejáveis. Objetos do model podem sobrescrevê-la para adotar uma regra mais
     * permissiva ou restritiva.
     * @param $value
     * @return string
     */
    public function sanitize($property, $value)
    {
        return strip_tags($value);
    }

}
