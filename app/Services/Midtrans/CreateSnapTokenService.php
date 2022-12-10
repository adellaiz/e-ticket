<?php

namespace App\Services\Midtrans;

use App\Models\Order;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct(Order $order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->booking_code,
                'gross_amount' => $this->order->ticket->price,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => $this->order->ticket->price,
                    'quantity' => 1,
                    'name' => $this->order->ticket->title,
                ],
            ],
            'customer_details' => [
                'first_name' => $this->order->customer->name,
                'email' => $this->order->customer->email,
                'phone' => $this->order->customer->phone_number,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
