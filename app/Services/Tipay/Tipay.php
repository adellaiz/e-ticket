<?php

namespace App\Services\Tipay;

use App\Models\Order;

class Tipay
{
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function initiateTransaction(){
        $customer = $this->order->customer;
        $vendorName = "E Ticket";
        $total = $this->order->ticket->price;
        $transaction = TipayTransaction::createTransaction($customer->name, $vendorName, $total);
        if($transaction === null){
            return null;
        }

        $this->order->snap_token = $transaction->transactionId;
        $this->order->save();

        return $this->order;
    }

    public function updateOrder(){

        if($this->order->status === Order::STATUS_PAID){
            return $this->order;
        }

        $transaction = new TipayTransaction($this->order->snap_token);

        $isPaid = $transaction->checkForPayment();
        if($isPaid){
            $this->order->status = 'PAID';
            $this->order->save();
        }

        return $this->order;
    }
}
