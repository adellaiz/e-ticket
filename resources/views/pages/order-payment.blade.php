@extends('layouts.page')



@push('styles')
    <style type="text/tailwindcss">
        @layer utilities {
            body {
                background-color: #F9F9F9;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto py-12">
        <div class="flex w-full relative mb-4 gap-5 px-4 py-4 text-xl text-center text-slate-700">
            <p>1. Pesan</p>
            &gt;
            <p class="font-bold">2. Bayar</p>
            &gt;
            <p>3. Selesai</p>
        </div>
        @if ($order->status === \App\Models\Order::STATUS_UNPAID)
            <button class="rounded px-4 bg-slate-700 text-white font-semibold text-lg py-3 mx-auto " id="pay-button">Bayar Sekarang</button>
            <div id="framer" class="hidden w-screen flex items-center justify-center h-screen fixed z-50 top-0 left-0 bg-[#000000]/[0.4]">
                <div class="relative container flex items-center justify-center">
                    <iframe id="et_frame" width="500" height="600" src="{{'https://ti-pay.vercel.app/' . $order->snap_token}}">
                    </iframe>
                </div>
            </div>
        @else
            Pembayaran berhasil
        @endif
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js" integrity="sha512-zJYu9ICC+mWF3+dJ4QC34N9RA0OVS1XtPbnf6oXlvGrLGNB8egsEzu/5wgG90I61hOOKvcywoLzwNmPqGAdATA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const payButton = document.querySelector('#pay-button');

        if(payButton){
            payButton.addEventListener('click', function(e) {
                document.getElementById('framer').classList.toggle('hidden');
                let i = setInterval(()=>{
                    axios.get('/api/orders/check/{{$order->booking_code}}').then(r => {
                        if(r.data.success){
                            if(r.data.data?.paid === true){
                                clearInterval(i);
                                window.location.reload();
                            }
                        }
                    });
                }, 5000);
            });
        }

    </script>
@endpush

