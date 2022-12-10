@extends('layouts.page')

@push('styles')
    <style type="text/tailwindcss">
        @layer utilities {
            .markdown h2 {
                @apply text-lg font-semibold text-slate-700/50;
            }
            .markdown ol {
                @apply pl-4 list-decimal space-y-2 text-slate-700;
            }
        }
    </style>
@endpush

@section('title')
    {{$event->title}}
@endsection

@section('content')
    <div class="grid lg:grid-cols-2 gap-10 container mx-auto py-12">
        <div class="flex flex-col justify-start items-start relative">
            <img
                src="{{url($event->image_path)}}"
                class="rounded-tl-lg rounded-tr-lg w-full"
            />
            <div
                class="flex flex-col w-full relative gap-3 p-6 rounded-bl-lg rounded-br-lg bg-white"
            >
                <h1
                    class="text-xl font-semibold text-slate-700"
                >
                    {{$event->title}}
                </h1>
                <p class="text-base text-slate-700">
                    {{\Carbon\Carbon::createFromDate($event->event_date)->format('j F Y')}}
                    , {{\Carbon\Carbon::createFromFormat('H:i:s', $event->event_time)->format('H:i')}} WIB,
                    {{$event->location}}
                </p>
                <div class="w-16 h-1 rounded-2xl bg-black/5 mx-auto"></div>
                <h1 class="text-xl font-semibold text-slate-700">
                    Must Know
                </h1>
                <div class="flex flex-col w-full relative gap-3 markdown">
                    {!!$event->description!!}
                </div>
            </div>
        </div>
        <div
            class="flex flex-col lg:sticky h-fit top-32 gap-6 p-6 rounded-lg bg-white"
        >
            <p
                class="text-xl font-semibold text-slate-700"
            >
                Katalog Paket
            </p>
            <div class="flex flex-col gap-6">

                @foreach($event->tickets as $ticket)
                    <div
                        class="flex justify-between items-end gap-3 p-4 rounded-lg bg-[#edf7ff]"
                    >
                        <div
                            class="flex flex-col relative gap-3"
                        >
                            <p
                                class="text-base text-slate-700"
                            >
                                {{$ticket->title}}
                            </p>
                            <p class="text-base font-semibold text-slate-700">
                                IDR {{number_format($ticket->price, '0', ',', '.')}}
                            </p>
                        </div>
                        <a
                            href="{{url('/tickets/' . $ticket->id . '/order')}}"
                            class="px-4 py-2 rounded bg-[#007697] font-semibold text-white"
                        >
                            Beli
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
