@php
$type = $type ?? 'normal'
@endphp
<nav class="text-xl {{$type === 'normal'? 'bg-[#007697]': 'bg-black'}} z-10 w-full py-2 text-white fixed top-0 left-0">
    <div class="container mx-auto flex justify-end w-full gap-16 items-center justify-between">
        <p></p>
        <a href="{{url('/')}}">Home</a>
        <p>Venue</p>
        <p>Merchandise</p>
        <svg
            width="32"
            height="32"
            viewBox="0 0 32 32"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="w-8 h-8 relative"
            preserveAspectRatio="xMidYMid meet"
        >
            <path
                d="M15.3332 28C22.3288 28 27.9998 22.3289 27.9998 15.3333C27.9998 8.33769 22.3288 2.66663 15.3332 2.66663C8.33756 2.66663 2.6665 8.33769 2.6665 15.3333C2.6665 22.3289 8.33756 28 15.3332 28Z"
                stroke="white"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path>
            <path
                d="M29.3332 29.3333L26.6665 26.6666"
                stroke="white"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            ></path></svg
        ><svg
            width="1"
            height="70"
            viewBox="0 0 1 70"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            class="flex-grow-0 flex-shrink-0"
            preserveAspectRatio="none"
        >
            <line x1="0.5" x2="0.5" y2="70" stroke="white"></line>
        </svg>
        <p>Sign In</p>
        <p>Sign Up</p>
    </div>
</nav>
