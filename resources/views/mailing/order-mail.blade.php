@if($order->status === \App\Models\Order::STATUS_UNPAID)
    <div>
        <p>
            Pemesanan tiket anda dengan nomor pesanan {{$order->booking_code}} telah berhasil!
            Silahkan melakukan pembayaran melalui link berikut:
        </p>
        <br/>
        <a href="{{url('/orders/' . $order->booking_code)}}">
            Order
        </a>
    </div>
@elseif($order->status === \App\Models\Order::STATUS_PAID)
    <p>
        Pembayaran untuk tiket anda dengan nomor pesanan {{$order->booking_code}} telah berhasil!
    </p>
@elseif($order->status === \App\Models\Order::STATUS_CANCELED)
    <p>
        Pemesanan tiket anda dengan nomor {{$order->booking_code}} telah dibatalkan.
    </p>
@else
    <div>
        <p>
            Pemesanan tiket anda gagal dibayarkan pada masa pembayaran yang telah ditentukan
        </p>
        <br/>
        <p>
            Silahkan membeli tiket baru pada <a href="{{url('/tickets/' . $order->ticket->id . '/order')}}">layanan kami</a>
        </p>
    </div>
@endif
