<?php

namespace aawebclient\Http\Controllers;

use Illuminate\Http\Request;

use aawebclient\Http\Requests;
use Externalapis\Api as ApiZohoInvoice;

class InvoiceController extends Controller
{

  private $azi;

  public function __construct(){
    $this->azi = new ApiZohoInvoice('Zoho','Invoice');
  }


  public function index(){
    $list = $this->azi->getListEntity('invoices');
    return response()->json(['msg' => 'Success','list' => $list], 200);
  }
}
