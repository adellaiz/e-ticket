<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | E-Ticket</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: Inter, sans-serif;
            line-height: 1.4;
        }
    </style>
    @stack('styles')
</head>
<body class="relative antialiased">
{{-- Navigation Bar --}}
@include('includes.navbar')

{{-- Before Content --}}
@stack('before-content')

@isset($type)
    <img class="fixed top-0 left-0 w-screen h-screen object-cover" src="{{url('/images/home-background.png')}}" alt="Concert Background">
@endisset
<div class="pt-20">

    {{-- Content --}}
    @yield('content')

</div>

{{-- After Content --}}
@stack('after-content')

@stack('scripts')

</body>
</html>
