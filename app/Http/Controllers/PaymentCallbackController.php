<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Mail\OrderTicketMail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Midtrans\CallbackService;
use Illuminate\Support\Facades\Mail;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if($order->status !== Order::STATUS_UNPAID){
                return redirect(url('/orders/' . $order->booking_code));
            }

            if ($callback->isSuccess()) {
                Order::where('id', $order->id)->update([
                    'status' => Order::STATUS_PAID
                ]);
                Mail::to($order->users)->send(new OrderTicketMail([
                    'order' => $order,
                ]));
            }

            if ($callback->isExpire()) {
                Order::where('id', $order->id)->update([
                    'status' => Order::STATUS_EXPIRED
                ]);
            }

            if ($callback->isCancelled()) {
                Order::where('id', $order->id)->update([
                    'status' => Order::STATUS_CANCELED
                ]);
            }

            if(($o = Order::whereNotIn('status', [Order::STATUS_UNPAID, Order::STATUS_PAID])->find($order->id))){
                $users = $o->users;

                Mail::bcc($users)->send(new BookingMail([
                    'order' => $o,
                ]));
            }

            return redirect(url('/orders/' . $order->booking_code));
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}
