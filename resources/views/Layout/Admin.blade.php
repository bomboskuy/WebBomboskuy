<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="flex min-h-screen bg-black">

    <!-- Sidebar -->
    @include('Components.sidebar')

    <!-- Main Content -->
    <div class="flex-1 p-6 text-white">

        {{-- header --}}
        <div class="header mb-5">
            <h1 class="text-xl font-bold">@yield('content-title')</h1>
        </div>

        @yield('content')
    </div>

</body>

</html>
