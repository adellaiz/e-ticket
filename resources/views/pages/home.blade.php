@extends('layouts.page')

@section('title')
    Home
@endsection

@push('styles')
    <style>
        .home-background {
            background: linear-gradient(180deg, #00000000 0%, rgba(0, 0, 0, 0.89) 100%);
        }
    </style>
@endpush

@push('before-content')
    <img class="fixed top-0 left-0 w-screen h-screen object-cover" src="{{url('/images/home-background.png')}}" alt="Concert Background">
@endpush

@section('content')
    <div class="flex flex-row flex-wrap justify-between gap-24 container mx-auto py-24">

        @foreach($events as $event)
            @php
                $loc = explode(', ', $event->location);
                $loc = $loc[count($loc) - 1];

                $lowestTicketPrice = $event->tickets()->orderBy('price')->first();
                $lowestTicketPrice = $lowestTicketPrice? $lowestTicketPrice->price: 0;
            @endphp
            <div
                class="flex flex-col relative overflow-hidden rounded-lg bg-white w-[334px]"
            >
                <img
                    src="{{url($event->image_path)}}"
                    class="w-full rounded-tl-lg rounded-tr-lg object-none"
                />
                <div class="flex flex-col justify-end items-center relative gap-6 p-6">
                    <div
                        class="flex flex-col justify-start items-center relative gap-3"
                    >
                        <p
                            class="text-2xl font-semibold text-center text-slate-700 px-6"
                        >
                            {{$event->title}}
                        </p>
                        <p class="text-xl text-left text-slate-700/60">
                            {{$loc}}
                        </p>
                        <p class="text-xl font-medium text-left text-slate-700/80">
                            {{\Carbon\Carbon::createFromDate($event->event_date)->locale('id')->format('j F Y')}}
                        </p>
                    </div>
                    <p class="text-xl font-semibold text-left text-slate-700">
                        IDR {{number_format($lowestTicketPrice, 0, ',', '.')}}
                    </p>
                    <a
                        href="{{url('/events/' . $event->id)}}"
                        class="flex justify-center self-stretch text-xl font-semibold px-4 py-3 text-white rounded bg-[#007697]"
                    >
                        Beli Tiket
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('after-content')
    <div class="home-background fixed z-10 block bottom-0 left-0 w-screen h-32"></div>
@endpush
