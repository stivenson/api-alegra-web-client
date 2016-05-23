<?php

namespace Externalapis\Zoho;
use Externalapis\AbstractApi;
use GuzzleHttp\Client as Gclient;
use Session;

class Invoice extends AbstractApi {
  /**
   * @const strig
   */
  const API_ENTITIES_URL = 'https://invoice.zoho.com/api/v3/';
  const API_GET_TOKEN_URL = 'https://accounts.zoho.com/apiauthtoken/nb/create';
  const API_ID_ORGANIZATION = '628410349'; //  content in .env file *****
  const API_SCOPE = 'ZohoInvoice/invoiceapi';
  const API_EMAIL_ID = 'stivenson.rpm@gmail.com'; // content in .env file *****
  const API_PASSWORD = 'mrsmrs5814302'; // content in .env file *****
  const API_TOKEN = '5daa6936795c3e6bb5ae247537938e8d'; // content in .env file *****

  /**
   * @var string $token
   */
  private static $token = null;


  public function __construct(){
    $this->guzzle = new Gclient();
    $this->guzzle->setDefaultOption('verify', false);
  }


  /**
   * @return array
   * @param string $entity_name
   */
  public function getListEntity($entity_name){

    if(self::API_TOKEN != null){

      $parameters = '?authtoken='.self::API_TOKEN.'&organization_id='.self::API_ID_ORGANIZATION;

      $res = $this->guzzle->get(self::API_ENTITIES_URL.$entity_name.$parameters);

      return json_decode($res->getBody());

    }else{
      return false;
    }

  }

  /**
   * Description
   * optional use
   */
  public function getTokenAutentication(){

    if(self::$token == null){

      $res = $this->guzzle->post(self::API_GET_TOKEN_URL, 
            ['body' => [
              'SCOPE' => self::API_SCOPE,
              'EMAIL_ID'=> self::API_EMAIL_ID,
              'PASSWORD' => self::API_PASSWORD
            ]]);

      $lines = explode(PHP_EOL, $res->getBody());

      $pureStringToken = substr($lines[2], strpos($lines[2], "=") + 1);

      self::$token  = $pureStringToken;

    }

  }

}
