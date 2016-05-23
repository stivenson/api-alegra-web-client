<?php

namespace Externalapis;

class Api extends AbstractApi
{
  /**
   * @AbstractApi $api
   */
  protected $api;

  /**
   * @param string $api
   */
  public function __construct($company_name,$api_name){
    $className = 'Externalapis\\'.$company_name.'\\' . ucfirst($api_name);

    if (!class_exists($className)) {
      throw new \Exception(sprintf('The %s method doesn\'t exists', $api_name));
    }

    $this->api = new $className();
  }


  /**
   * @return array
   */
  public function getListEntity($entity_name){
    return $this->api->getListEntity($entity_name);
  }

  /**
   * @param string $data
   */
  public function getTokenAutentication(){
    $this->api->getTokenAutentication();
  }


  /**
   * @return string
   */
  public function getApi(){
    return $this->api->getClass();
  }

}
