<?php

/**
 * Classe base de todos os Business Models.
 * Business Models são modelos que contém regras de negócio e são, geralmente, persistentes.
 */

class MBusinessModel extends PersistentObject implements JsonSerializable, Serializable
{

    /**
     * Dados do Model originais do registro. setData nao influencia o originalData
     * @param mixed $originalData
     */
    private $_originalData;

    /**
     * Instancia Model e opcionalmente inicializa atributos com $data.
     * @param mixed $data
     * @throws ESecurityException
     */
    public function __construct($data = NULL)
    {
        parent::__construct();
        $this->onCreate($data);
    }

    public function __get($name) {
        if (method_exists($this, $name)) {
            return $this->$name();
        }
    }

    /**
     * Inicializa atributos com $data.
     * @param mixed $data
     * @return void
     * @throws ESecurityException
     */
    public function onCreate($data = NULL)
    {
        if (is_null($data)) {
            return;
        } elseif (is_object($data)) {
            $oid = $this->getOIDName();
            $id = $data->$oid ?: $data->id;
            $this->getById($id);
            $this->setOriginalData();
            $this->setData($data);
        } else { // int
            $this->getById($data);
            $this->setOriginalData();
        }
    }

    /**
     * Array com o mapa de atributos do Model.
     * @return array
     */
    public function getAttributesMap()
    {
        $attributes = array();
        $map = $this->_map;
        do {
            $attributes = array_merge($attributes, $map['attributes']);
            if (!empty($map['extends'])) {
                $class = $map['extends'];
                $map = $class::$ORMMap;
            } else {
                $map = null;
            }
        } while ($map);
        return $attributes;
    }

    /**
     * Array com o mapa de associações do Model.
     * @return array
     */
    public function getAssociationsMap()
    {
        return $this->_map['associations'];
    }

    /**
     * Valor do atributo de descrição do Model.
     * @return string
     */
    public function getDescription()
    {
        return $this->_className;
    }

    public static function logIsEnabled()
    {
        $config = self::config();
        return count($config['log']) > 0;
    }

    /**
     * Descrição usada para Log.
     * @return string
     */
    public function getLogDescription()
    {
        if (!self::logIsEnabled()) {
            return '';
        }
        $config = self::config();
        if ($config['log'][0] === true) {
            $data = $this->getDiffData();
        } else {
            $data = new stdClass();
            foreach ($config['log'] as $attr) {
                $data->$attr = (string)$this->get($attr);
            }
        }
        return json_encode($data, 10);
    }

    /**
     * Inicaliza atributos com base no OID.
     * @param type $id
     * @return \MBusinessModel
     */
    public function getById($id)
    {
        if (($id === '') || ($id === NULL)) {
            return;
        }
        $this->set($this->getPKName(), $id);
        $this->retrieve();
        return $this;
    }

    public function save($force = false)
    {
        if (!$this->isPersistent() || $this->wasChanged() || $force) {
            parent::save();
            $this->setOriginalData();
            return true;
        }
        return false;
    }

    public function delete()
    {
        parent::delete();
    }

    public static function getByIds(array $ids)
    {
        return self::getCriteria()
            ->where(self::getPKName(), 'in', $ids)
            ->asCursor()
            ->getObjects();
    }

    /**
     * Criteria genérico do Model. $filter indica filtros a serem usados na
     * consulta, $attribute indica os atributos a serem retornados e $order
     * o atributo usado para ordenar o resultado da consulta.
     * @param object $filter
     * @param string $attribute
     * @param string $order
     * @return criteria
     */
    public static function listAll($filter = '', $attribute = '', $order = ''): RetrieveCriteria
    {
        $criteria = self::getCriteria();
        if ($attribute != '') {
            $criteria->addCriteria($attribute, 'LIKE', "'{$filter}%'");
        }
        if ($order != '') {
            $criteria->addOrderAttribute($order);
        }
        return $criteria;
    }

    /**
     * Novo OID, usado em operações de inserção.
     * @param string $idGenerator
     * @return integer
     * @throws EDBException
     */
    public function getNewId($idGenerator)
    {
        return Manager::getDatabase()->getNewId($idGenerator);
    }

    /**
     * Retorna handler para a conexão corrente no Database.
     * @return \Doctrine\DBAL\Connection
     * @throws Exception
     */
    public function getTransaction()
    {
        return Manager::getDatabase()->getTransaction();
    }

    /**
     * Coloca a conexão em estado de transação e retorna um handler para a
     * conexão.
     * @return \Doctrine\DBAL\Connection
     * @throws Exception
     */
    public function beginTransaction()
    {
        return Manager::getDatabase()->beginTransaction();
    }

    /**
     * Atribui $value para o atributo $attribute.
     * @param string $attribute
     * @param mixed $value
     */
    public function set($attribute, $value)
    {
        //$method = 'set' . $attribute;
        //$this->$method($value);
        $this->$attribute = $value;
    }

    /**
     * Valor corrente do atributo $attribute.
     * @param string $attribute
     * @return mixed
     */
    public function get($attribute)
    {
        //$method = 'get' . $attribute;
        //return $this->$method();
        return $this->$attribute;
    }

    /**
     * O objeto referenciado em associações oneToOne é definido com base em seu OID.
     * @param string $associationName
     * @param integer $id
     * @throws EPersistentManagerException
     */
    public function setAssociationId($associationName, $id)
    {
        $classMap = $this->getClassMap();
        $associationMap = $classMap->getAssociationMap($associationName);
        if (is_null($associationMap)) {
            throw new EPersistentManagerException("Association name [{$associationName}] not found.");
        }
        $fromAttribute = $associationMap->getFromAttributeMap()->getName();
        $toClass = $associationMap->getToClassName();
        if ($associationMap->getCardinality() == 'oneToOne') {
            $refObject = new $toClass($id);
            $this->set($associationName, $refObject);
            $this->set($fromAttribute, $id);
        } else {
            $array = [];
            if (!is_array($id)) {
                $id = [$id];
            }
            foreach ($id as $oid) {
                $array[] = new $toClass($oid);
            }
            $this->set($associationName, $array);
        }
    }

    /**
     * Retorna um ValueObject com atributos com valores planos (tipo simples).
     * @return \stdClass
     */
    public function getData()
    {
        $data = new stdClass();
        $attributes = $this->getAttributesMap();
        foreach ($attributes as $attribute => $definition) {
            //$method = 'get' . $attribute;
            //if (method_exists($this, $method)) {
            //    $rawValue = $this->$method();
            //} else if (method_exists($this->_proxyModel, $method)) {
            //    $rawValue = $this->_proxyModel->$method();
            //}
            $rawValue = $this->$attribute;
            $type = $definition['type'];
            if (isset($rawValue)) {
                $conversion = 'getPlain' . $type;
                $value = MTypes::$conversion($rawValue);
                $data->$attribute = $value;
                if (isset($definition['key']) && ($definition['key'] == 'primary')) {
                    $data->id = $value;
                    $data->idName = $attribute;
                }
            }
        }
        $data->description = $this->getDescription();
        return $data;
    }

    public function wasChanged()
    {
        return count($this->getDiffData()) > 0;
    }

    /**
     * Retorna a diferenca entre data e originalData
     */
    public function getDiffData()
    {
        $actual = get_object_vars($this->getData());
        $original = get_object_vars($this->getOriginalData());

        $diff = [];
        foreach ($this->getDiffKeys($original, $actual) as $key) {
            // alterado de null pra string vazia devido a problemas de comparacao
            $originalValue = isset($original[$key]) ? $original[$key] : "";
            $actualValue = isset($actual[$key]) ? $actual[$key] : "";

            // comparando novamente para cobrir os casos acima
            if ($originalValue !== $actualValue) {
                $diff[$key] = [
                    'original' => $originalValue,
                    'change' => $actualValue,
                    'key' => $key
                ];
            }
        }

        return $diff;
    }

    private function getDiffKeys(array $original, array $actual)
    {
        $diff = array_merge(
            array_diff_assoc($actual, $original),
            array_diff_assoc($original, $actual)
        );

        return array_keys($diff);
    }

    /**
     * Retorna os dados originais do model, independente
     * se como o setData influenciou esses campos.
     */
    public function getOriginalData()
    {
        return $this->_originalData ?: new \stdClass();
    }

    protected function getOriginalAttributeValue($attribute)
    {
        foreach ($this->getDiffData() as $attributeDiff) {
            if ($attributeDiff['key'] == $attribute) {
                return $attributeDiff['original'];
            }
        }

        throw new EModelException("The attribute {$attribute} was not changed!");
    }

    public function attributeWasChanged($attribute)
    {
        try {
            $originalAttributeValue = $this->getOriginalAttributeValue($attribute);
            return isset($originalAttributeValue);
        } catch (EModelException $e) {
            return false;
        }
    }

    /**
     * Recebe um ValueObject com valores planos e inicializa os atributos do Model.
     * @param object $data
     * @throws ESecurityException
     */
    public function setData($data, $role = 'default')
    {
        if (is_null($data)) {
            return;
        }

        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (is_null($role)) {
            $role = 'default';
        }

        $attributes = $this->getAttributesMap();
        foreach ($attributes as $attribute => $definition) {
            if (isset($data[$attribute])) {
                $this->checkAttrMutability($attribute, $role);
                $value = $data[$attribute];
                $type = $definition['type'];
                $conversion = 'get' . $type;
                $typedValue = MTypes::$conversion($value);
                //$method = 'set' . $attribute;
                //if (method_exists($this, $method)) {
                //    $this->set($attribute, $typedValue);
                //} else if (method_exists($this->_proxyModel, $method)) {
                //    $this->_proxyModel->$method($typedValue);
                //}
                $this->$attribute = $typedValue;
            }
        }
    }

    private function checkAttrMutability($attribute, $role = 'default')
    {
        $this->validateRole($role);
        if ($this->isImmutable($attribute, $role)) {
            $message = "O atributo {$attribute} não pode ser alterado pelo role {$role}";
            throw new \ESecurityException($message);
        }
    }

    private function isImmutable($attribute, $role)
    {
        return !$this->isWhiteListed($attribute, $role) || $this->isBlackListed($attribute, $role);
    }

    /**
     * Se o desenvolvedor cometer algum erro ao definir o role
     * não quero que isso implique em um relaxamento nas restrições.
     * @param $role
     * @throws Exception
     */
    private function validateRole($role)
    {
        if ($role === 'default') {
            return;
        }

        $blacklist = $this->_getConfig('blacklist');
        $whitelist = $this->_getConfig('whitelist');

        if (!array_key_exists($role, $blacklist) &&
            !array_key_exists($role, $whitelist)
        ) {
            throw new \ESecurityException(
                "O role {$role} não foi definido nas configurações da classe " . get_class($this)
            );
        }
    }

    private function isWhiteListed($attribute, $role)
    {
        $whitelist = $this->_getConfig('whitelist');

        if (empty($whitelist[$role])) {
            return true;
        } else {
            return in_array($attribute, $whitelist[$role]);
        }

    }

    private function isBlackListed($attribute, $role)
    {
        $blacklist = $this->_getConfig('blacklist');
        if (empty($blacklist[$role])) {
            return false;
        } else {
            return in_array($attribute, $blacklist[$role]);
        }
    }

    /**
     * Para evitar a complexidade de ficar testando se a configuração existe ou não.
     * @param $configName
     * @return array
     */
    private function _getConfig($configName)
    {
        if (!isset($this->config()[$configName])) {
            return [];
        }
        return $this->config()[$configName];
    }


    /**
     * Validação dos valores de atributos com base em $config[validators].
     * $exception indica se deve ser disparada uma exceção em caso de falha.
     * @param boolean $exception
     * @return bool|void
     * @throws EDataValidationException
     */
    public function validate($exception = true)
    {
        $validator = new MDataValidator();
        return $validator->validateModel($this, $exception);
    }

    public function setOriginalData()
    {
        $this->_originalData = $this->getData();
    }

    function jsonSerialize()
    {
        return $this->getData();
    }

    public function serialize()
    {
        return serialize($this->getData());
    }

    public function unserialize($serialized)
    {
        $this->setData(unserialize($serialized));
    }

}
