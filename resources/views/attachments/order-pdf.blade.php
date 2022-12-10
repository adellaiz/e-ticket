<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            src: url(/fonts/Inter-Regular.ttf) format('truetype');
        }
        @font-face {
            font-style: normal;
            font-family: "Inter-Medium";
            src: url(/fonts/Inter-Medium.ttf) format('truetype');
        }
        @font-face {
            font-style: normal;
            font-family: "Inter-Semibold";
            src: url(/fonts/Inter-Semibold.ttf) format('truetype');
        }
        @font-face {
            font-style: normal;
            font-family: "Inter-Bold";
            src: url(/fonts/Inter-Bold.ttf) format('truetype');
        }

    </style>
    @php
        $h2 = 'font-weight: 400; color: #9B9B9B; font-size: 12px;';
        $h1 = 'font-family: "Inter-Semibold", sans-serif; color: #334155; font-size: 12px; text-align: left;';
        $price = 'font-family: "Inter-Semibold", sans-serif; color: #32798E; font-size: 16px; text-align: center;';
        $p = 'font-family: "Inter-Medium", sans-serif; color: #334155; font-size: 10px;';
        $italic = 'font-weight: 400; color: #9B9B9B; font-size: 9px; text-align:center;';
        $bookingCode = 'font-family: "Inter-Semibold", sans-serif; color: #334155; font-size: 9px; text-align:center;';
    @endphp
</head>
<body style="font-family: Inter, Helvetica, sans-serif;line-height: 1.4;">
    <p style="font-size: 16px; text-align: right; width: 100%; margin-bottom: -8px">
        Order Id Anda
    </p>
    <p style="font-size: 24px; text-align: right; width: 100%;">
        {{\Illuminate\Support\Str::padLeft($order->id, 8, '0')}}
    </p>
    <table style="border-collapse: collapse;margin: 0;width: 100%;">
        <tr>
            <th style="padding: 10px; background-color: #007697; color: white; font-family: 'Inter-Semibold', sans-serif; text-align: left">
                {{$order->ticket->event->title}}
            </th>
        </tr>
        <tr>
            <td style="padding: 10px; background-color: white;">
                <table style="border-collapse: collapse;margin: 0;width: 100%">
                    <tr>
                        <td width="60%" style="vertical-align: top; border-right: 1px solid #C5C5C5;">
                            <table style="width: 100%">
                                <tr>
                                    <th style="{{$h1}} padding-bottom: 4px">
                                        {{\Carbon\Carbon::createFromDate($order->ticket->event->event_date)->format('D, j F Y')}}
                                        -
                                        {{\Carbon\Carbon::createFromFormat('H:s:i', $order->ticket->event->event_time)->format('H:s')}}
                                    </th>
                                </tr>
                                <tr>
                                    <td style="{{$h2}} padding-top: 4px; padding-bottom: 4px">
                                        Alamat
                                    </td>
                                </tr>
                                <tr>
                                    <td style="{{$p}} padding-top: 4px; padding-bottom: 4px">
                                        {{$order->ticket->event->location}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="{{$h2}} padding-top: 4px; padding-bottom: 4px">
                                        Nama Pemesan
                                    </td>
                                </tr>
                                <tr>
                                    <td style="{{$p}} padding-top: 4px; padding-bottom: 4px">
                                        {{$order->customer->name}}
                                    </td>
                                </tr>
                                @foreach($order->visitors as $visitor)
                                    <tr>
                                        <td>
                                            <table style="border-collapse: collapse;margin: 0;width: 100%;">
                                                <tr>
                                                    <td style="{{$h2}} padding-top: 4px; padding-bottom: 4px">
                                                        Nomor KTP
                                                    </td>
                                                    <td style="{{$h2}} padding-top: 4px; padding-bottom: 4px">
                                                        Nama Lengkap
                                                    </td>
                                                    <td style="{{$h2}} padding-top: 4px; padding-bottom: 4px">
                                                        ID Antrian
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="{{$p}} padding-top: 4px; padding-bottom: 4px">
                                                        {{$visitor->ktp_number}}
                                                    </td>
                                                    <td style="{{$p}} padding-top: 4px; padding-bottom: 4px">
                                                        {{$visitor->name}}
                                                    </td>
                                                    <td style="{{$p}} padding-top: 4px; padding-bottom: 4px">
                                                        -
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>

                        <td width="40%" style="vertical-align: top; padding-left: 6px;">
                            <table style="width: 100%">
                                <tr>
                                    <th style="{{$h1}}; text-align: center; padding-bottom: 4px">
                                        {{$order->ticket->title}}
                                    </th>
                                </tr>
                                <tr>
                                    <td style="{{$price}} padding-top: 4px; padding-bottom: 4px">
                                        IDR {{number_format($order->ticket->price, 0, ',', '.')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="{{$italic}} padding-top: 4px; padding-bottom: 4px">
                                        <i>*komisi penjualan termasuk PPN 10%</i>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 4px; padding-bottom: 4px">
                                        @isset($email)
                                            @php
                                                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                                            @endphp
                                            <img style="margin: 0 auto;" src="data:image/png;base64,{{base64_encode($generator->getBarcode($order->booking_code, $generator::TYPE_CODE_128))}}">
                                        @else
                                        @php
                                        $generator = new Picqer\Barcode\BarcodeGeneratorDynamicHTML();
                                        @endphp
                                            <div style="height: 50px; margin: 0 auto; width: 80%;">
                                                {!!($generator)->getBarcode($order->booking_code, $generator::TYPE_CODE_128)!!}
                                            </div>
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <td style="{{$italic}} padding-top: 4px; padding-bottom: 4px">
                                        Dibuat pada {{\Carbon\Carbon::createFromDate($order->created_at)->format('j M Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="{{$bookingCode}} padding-top: 4px;">
                                        Kode Booking: {{$order->booking_code}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px; border-top: 1px solid #C5C5C5">
                <p style="{{$p}}">
                    Syarat dan Ketentuan
                </p>
                <p style="{{$h2}}">
                    {{$order->ticket->terms_and_condition}}
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
