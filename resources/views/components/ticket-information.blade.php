<div
    class="flex flex-col gap-4 p-6 rounded-lg bg-white"
>
    <div
        class="flex gap-[11px] items-center"
    >
        <img
            src="{{url($ticket->event->image_path)}}"
            class="w-[133px] h-[86px] rounded-lg object-cover"
        />
        <div class="flex flex-col flex-grow gap-[11px]">
            <p
                class="text-lg font-semibold text-slate-700"
            >
                {{$ticket->event->title}}
            </p>
            <p
                class="text-base text-slate-700"
            >
                {{$ticket->event->location}}
            </p>
        </div>
    </div>
    <span class="bg-[#32798E]/[0.22] w-full block h-px"></span>
    <p class="text-base font-semibold text-slate-700">
        {{$ticket->title}}
    </p>
    <p class="text-base text-slate-700">
                        <span class="text-base font-semibold text-slate-700"
                        >1 Tiket • </span
                        ><span class="text-base text-slate-700">1 Pax</span>
    </p>
    <span class="bg-[#32798E]/[0.22] w-full block h-px"></span>
    <p class="text-base text-slate-700/80">
        Tanggal Dipilih
    </p>
    <p
        class="text-base font-semibold text-slate-700"
    >
        {{\Carbon\Carbon::now()->format('j F Y')}}
    </p>
    <span class="bg-[#32798E]/[0.22] w-full block h-px"></span>
    @foreach(json_decode($ticket->description) as $index)
        @component('components.ticket-description', ['index' => $index])
        @endcomponent
    @endforeach
    <span class="bg-[#32798E]/[0.22] w-full block h-px"></span>
    <div
        class="flex items-center justify-between"
    >
        <p class="flex-grow text-base font-semibold text-slate-700">
            Total Pembayaran
        </p>
        <p class="text-base font-semibold text-[#32798e]">
            IDR {{number_format($ticket->price, 0, ',', '.')}}
        </p>
    </div>

</div>
