@php
    $randomId = \Illuminate\Support\Str::random(32);
@endphp
<div class="relative h-fit my-input-selection w-32" data-select-id="{{$randomId}}">
    <label class="empty">
        <input id="{{$randomId}}" disabled class="my-input min-w-[24px] cursor-pointer" data-toggle-select="{{$randomId}}">
        <input name="{{$name}}" id="hidden_{{$randomId}}" type="hidden" value="">
        <span class="my-input-label">
            Titel
        </span>
    </label>
    <div class="my-input-options" data-target-select="{{$randomId}}">
        @foreach($options as $option)
            <div class="my-input-option" data-value="{{$option['value']}}">{{$option['label']}}</div>
        @endforeach
    </div>
    <svg
        width="20"
        height="20"
        viewBox="0 0 20 20"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        class="absolute right-4 top-5 cursor-pointer w-5 h-5 "
        preserveAspectRatio="xMidYMid meet"
    >
        <path
            d="M16.6004 7.45825L11.1671 12.8916C10.5254 13.5333 9.47539 13.5333 8.83372 12.8916L3.40039 7.45825"
            stroke="#334155"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
        ></path>
    </svg>
</div>
