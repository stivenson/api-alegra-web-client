<?php

namespace Externalapis;

abstract class AbstractApi {


    /**
     * @var string $guzzle
     */
    protected $guzzle;


    /**
     * @return string
     */
    public function getClass() {
        $class = explode('\\', get_class($this));
        return end($class);
    }

    /**
     * @return array
     * @param $entity_name
     */
    abstract public function getListEntity($entity_name);

    /**
     * @param string $data
     */
    abstract public function getTokenAutentication();


}
