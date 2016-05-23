<?php

namespace Externalapis\Zoho;

class Invoice extends AbstractApi {
  /**
   * @const strig
   */
  const API_ENTITIES_URL = 'https://invoice.zoho.com/api/v3/';
  const API_GET_TOKEN_URL = 'https://accounts.zoho.com/apiauthtoken/nb/create';
  const API_ID_ORGANIZATION = '628410349'; //  content in .env file *****
  const API_SCOPE = 'ZohoInvoice/invoiceapi';
  const API_EMAIL_ID = 'stivenson.rpm@gmail.com'; // content in .env file *****
  const API_PASSWORD = 'stivenson.rpm@gmail.com'; // content in .env file *****

  /**
   * @var string $token
   */
  private static $token = null;


  /**
   * @return array
   */
  public function getListEntity(string $entity_name){

    return $this->guzzle->request('GET', self::API_ENTITIES_URL.$entity_name, [
        'authtoken' => self::$token,
        'organization_id'= self::API_ID_ORGANIZATION
    ]);

  }

  /**
   * @param string $data
   */
  public function getTokenAutentication(string $data){

    self::$token = $this->guzzle->request('POST', self::API_GET_TOKEN_URL, [
        'SCOPE' => self::API_SCOPE,
        'EMAIL_ID'= self::API_EMAIL_ID,
        'PASSWORD' = self::API_PASSWORD
    ]);

  }

}
