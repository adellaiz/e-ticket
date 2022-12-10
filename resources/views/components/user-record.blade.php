@php
    $genders = [
        ["label" => 'Titel', "value" => ''],
        ["label" => 'Tn.', "value" => 'M'],
        ["label" => 'Ny.', "value" => 'F'],
    ];
if(!function_exists('____')){
    function ____($prefix, $attr){
    return str_contains($prefix, '[')? $prefix . '[' . $attr . ']': $prefix . $attr;
    }
}
@endphp
<div
    class="flex flex-col justify-start items-start gap-[30px] p-6 rounded-lg bg-white"
>
    <div class="flex justify-start items-center relative gap-4">
    <div
        class="flex justify-start items-start relative gap-2.5 p-2.5 rounded-lg bg-[#e7f6fd]"
    >
        <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6 relative"
            preserveAspectRatio="xMidYMid meet"
        >
            <path
                d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                stroke="#007697"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                d="M20.5901 22C20.5901 18.13 16.7402 15 12.0002 15C7.26015 15 3.41016 18.13 3.41016 22"
                stroke="#007697"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
        </svg>
    </div>
    <p class="w-[524px] text-xl font-semibold text-left text-slate-700">
        {{$label}}
    </p>
</div>
<div class="flex flex-col w-full flex-shrink-0 gap-4">
    <div class="flex w-full gap-4">
        @component('components.select', ['name' => ____($prefix, 'gender'), 'options' => $genders])
        @endcomponent
        <div class="flex-grow">
            <x-input name="{{____($prefix, 'name')}}" type="text" label="Nama Lengkap"></x-input>
        </div>
    </div>
    <div
        class="flex flex-col gap-1"
    >
        <x-input name="{{____($prefix, 'email')}}" type="email" label="Email"></x-input>
        <p class="text-lg text-left px-4 text-slate-700/50">
            E-Ticket akan dikirim ke email ini.
        </p>
    </div>
    <x-input name="{{____($prefix, 'phone_number')}}" type="tel" label="Nomor Whatsapp"></x-input>
    @if(str_starts_with($prefix, 'visitor'))
        <x-input name="{{____($prefix, 'ktp_number')}}" type="text" label="Nomor KTP" min="16" max="16"></x-input>
    @endif
</div>
</div>
