<?php

class Association extends ArrayObject
{

    private $classMap;
    private $baseObject;
    private $index;

    public function offsetGet($name)
    {
        return parent::offsetGet($name);
    }

    public function offsetSet($name, $value)
    {
        return parent::offsetSet($name, $value);
    }

    public function offsetExists($name)
    {
        return parent::offsetExists($name);
    }

    public function offsetUnset($name)
    {
        return parent::offsetUnset($name);
    }

    public function __construct(Classmap $classMap, $index = NULL)
    {
        $this->classMap = $classMap;
        $this->baseObject = $this->classMap->getObject();
        $this->index = $index;
    }

    public function init($query, $index = NULL)
    {
        $index = $index ?: $this->index;
        $query->moveFirst();
        while (!$query->eof()) {
            $object = $this->classMap->getObject();//clone $this->baseObject;
            $data = $query->getRowObject();
            $this->classMap->setObject($object, $data);
            $object->setPersistent(true);
            $object->setOriginalData();

            if (is_null($index)) {
                $this->append($object);
            } else {
                $this->offsetSet($object->get($index), $object);
            }
            $query->moveNext();
        }
    }

    public function getModels()
    {
        $models = [];
        if ($this->count()) {
            foreach ($this as $model) {
                $models[$model->getId()] = $model;
            }
        }
        return $models;
    }

    public function getObjects()
    {
        $index = $index ?: $this->index;
        $objects = [];
        if ($this->count()) {
            foreach ($this as $model) {
                if (is_null($index)) {
                    $objects[] = $model->getData();
                } else {
                    $objects[$model->get($index)] = $model->getData();
                }
            }
        }
        return $objects;
    }

    public function getId()
    {
        $id = [];
        if ($this->count()) {
            foreach ($this as $model) {
                $id[] = $model->getId();
            }
        }
        return $id;
    }

    public function walk(callable $operation)
    {
        if ($this->count()) {
            foreach ($this as $model) {
                call_user_func($operation, $model->getId(), $model);
            }
        }
    }

}
