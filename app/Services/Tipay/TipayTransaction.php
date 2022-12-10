<?php

namespace App\Services\Tipay;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Http;

class TipayTransaction
{
    public $transactionId;
    public function __construct($transactionId)
    {
        $this->transactionId = $transactionId;
    }


    public static function createTransaction($customerName, $vendorName, $totalPrice){

        $result = Http::withoutVerifying()->post('https://mpti-production.up.railway.app/transaction/create', [
            'vendorName' => $vendorName,
            'customerName' => $customerName,
            'total' => $totalPrice
        ])->object();

        try {
            return new TipayTransaction($result->results->transactionId);
        } catch (\Exception $e){
            return null;
        }
    }

    public function checkForPayment(){

        $result = Http::withoutVerifying()->get('https://mpti-production.up.railway.app/transaction/' . $this->transactionId)->object();

        try {
            return $result->results->status;
        } catch (\Exception $e){
            return false;
        }

    }
}
