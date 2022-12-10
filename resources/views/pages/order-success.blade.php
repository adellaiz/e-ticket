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
        <div class="flex w-full relative mb-4 gap-3 lg:justify-start justify-center lg:gap-5 px-4 py-4 text-xl text-center text-slate-700">
            <p>1. Pesan</p>
            &gt;
            <p>2. Bayar</p>
            &gt;
            <p class="font-bold">3. Selesai</p>
        </div>
        <div class="flex flex-col justify-start items-center relative">
            <svg
                width="301"
                height="300"
                viewBox="0 0 301 300"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-[300px] h-[300px] relative"
                preserveAspectRatio="xMidYMid meet"
            >
                <path
                    d="M238 187.5C210.375 187.5 188 209.875 188 237.5C188 246.875 190.625 255.75 195.25 263.25C203.875 277.75 219.75 287.5 238 287.5C256.25 287.5 272.125 277.75 280.75 263.25C285.375 255.75 288 246.875 288 237.5C288 209.875 265.625 187.5 238 187.5ZM263.875 232.125L237.25 256.75C235.5 258.375 233.125 259.25 230.875 259.25C228.5 259.25 226.125 258.375 224.25 256.5L211.875 244.125C208.25 240.5 208.25 234.5 211.875 230.875C215.5 227.25 221.5 227.25 225.125 230.875L231.125 236.875L251.125 218.375C254.875 214.875 260.875 215.125 264.375 218.875C267.875 222.625 267.625 228.5 263.875 232.125Z"
                    fill="#007697"
                ></path>
                <path
                    d="M275.5 94.375V100C275.5 106.875 269.875 112.5 263 112.5H38C31.125 112.5 25.5 106.875 25.5 100V94.25C25.5 65.625 48.625 42.5 77.25 42.5H223.625C252.25 42.5 275.5 65.75 275.5 94.375Z"
                    fill="#007697"
                ></path>
                <path
                    d="M25.5 143.75V205.75C25.5 234.375 48.625 257.5 77.25 257.5H155.5C162.75 257.5 169 251.375 168.375 244.125C166.625 225 172.75 204.25 189.75 187.75C196.75 180.875 205.375 175.625 214.75 172.625C230.375 167.625 245.5 168.25 258.875 172.75C267 175.5 275.5 169.625 275.5 161V143.625C275.5 136.75 269.875 131.125 263 131.125H38C31.125 131.25 25.5 136.875 25.5 143.75ZM100.5 215.625H75.5C70.375 215.625 66.125 211.375 66.125 206.25C66.125 201.125 70.375 196.875 75.5 196.875H100.5C105.625 196.875 109.875 201.125 109.875 206.25C109.875 211.375 105.625 215.625 100.5 215.625Z"
                    fill="#007697"
                ></path>
            </svg>
            <div class="flex flex-col justify-start items-center gap-4 text-center">
                <div
                    class="flex flex-col justify-start items-center relative gap-[11px]"
                >
                    <p class="text-2xl lg:text-[32px] font-semibold text-slate-700">
                        Selamat! Pembayaran Anda Berhasil
                    </p>
                    <p
                        class="text-lg font-semibold text-slate-700"
                    >
                        {{$ticket->event->title}}
                    </p>
                    <p class="text-base text-slate-700">
                        {{$ticket->event->location}}
                    </p>
                    <p class="text-base text-slate-700">
                        Silahkan buka Email Anda untuk mengunduh E-Ticket
                    </p>
                </div>
                <div class="flex flex-col gap-2 text-center">
                    <a
                        href="https://{{explode('@', $order->customer->email)[1]}}"
                        class="text-xl font-semibold text-white w-[260px] px-4 py-3 rounded bg-[#007697]"
                    >
                        Buka Email
                    </a>
                    <a
                        href="{{url('/')}}"
                        class="text-xl font-semibold text-[#007697] px-4 py-3 rounded"
                    >
                        Kembali ke Home
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection


