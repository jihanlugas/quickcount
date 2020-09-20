<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Wow') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>
<body>
<div id="app">
    <div>
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('beranda') }}" class="flex-shrink-0 -ml-2 p-2">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-on-dark.svg"
                                 alt="Workflow logo">
                        </a>
                        <div class="hidden md:block">
                            <div class="flex items-baseline">
                                <a href="{{ route('beranda') }}"
                                   class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Beranda</a>
                                @guest()
                                @else
                                    @if(Auth::user()->role_id == 1)
                                        <a href="{{ route('pemilu.index') }}"
                                           class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Pemilu</a>
                                        <a href="{{ route('tps.index') }}"
                                           class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">TPS</a>
                                        <a href="{{ route('user.index') }}"
                                           class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Anggota</a>
                                    @else
                                        <a href="{{ route('vote.index') }}"
                                           class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Input Suara</a>
                                    @endif
                                @endguest
                                <a href="{{ route('perhitungan.index') }}"
                                   class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Perhitungan Cepat</a>

                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @guest
                                <div class="ml-10 flex items-baseline">
                                    <a href="{{ route('login') }}"
                                       class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Login</a>
                                    <a href="{{ route('register') }}"
                                       class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Register</a>
                                </div>
                            @else
                                {{--                                @if(Auth::user()->is_complete)--}}
                                {{--                                    <div class="ml-10 flex items-baseline">--}}
                                {{--                                        <a href="{{ route('request') }}"--}}
                                {{--                                           class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Permintaan</a>--}}
                                {{--                                    </div>--}}
                                {{--                                @else--}}
                                {{--                                    <div class="ml-10 flex items-baseline">--}}
                                {{--                                        <a href="{{ route('invitation') }}"--}}
                                {{--                                           class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Kode--}}
                                {{--                                            Undangan</a>--}}
                                {{--                                        <a href="{{ route('upload') }}"--}}
                                {{--                                           class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Upload</a>--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}
                                <div class="ml-3 relative">
                                    <div>
                                        <button
                                            class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid"
                                            id="user-menu-toggle" aria-label="User menu" aria-haspopup="true">
                                            <img class="h-8 w-8 rounded-full"
                                                 src="{{ asset('img/default-user.png') }}"
                                                 alt="">
                                        </button>
                                    </div>
                                    <div
                                        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg hidden c-tw-js"
                                        id="user-menu-context">
                                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu"
                                             aria-orientation="vertical" aria-labelledby="user-menu">
                                            {{--                                            @if(Auth::user()->is_complete)--}}
                                            {{--                                                <a href="{{ route('profile') }}"--}}
                                            {{--                                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"--}}
                                            {{--                                                   role="menuitem">Profile</a>--}}
                                            {{--                                            @endif--}}
                                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                               role="menuitem">Sign out</a>
                                        </div>
                                    </div>
                                </div>
                            @endguest

                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button id="nav-toggle"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="hidden md:hidden c-tw-js" id="nav-context">
                <div class="px-2 pt-2 pb-3 sm:px-3">
                    <a href="{{ route('beranda') }}"
                       class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Beranda</a>
                    @guest()

                    @else
                        @if(Auth::user()->role_id == 1)
                            <a href="{{ route('pemilu.index') }}"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Pemilu</a>
                            <a href="{{ route('tps.index') }}"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">TPS</a>
                            <a href="{{ route('user.index') }}"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Anggota</a>
                        @else
                            <a href="{{ route('vote.index') }}"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Input Suara</a>
                        @endif
                    @endguest
                    <a href="{{ route('perhitungan.index') }}"
                       class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Perhitungan Cepat</a>
                </div>

                <div class="pt-3 pb-3 border-t border-gray-700">
                    @guest
                        <div class="px-2">
                            <a href="{{ route('login') }}"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Login</a>
                        </div>
                        <div class="px-2">
                            <a href="{{ route('register') }}"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Register</a>
                        </div>
                    @else
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                     src="{{ asset('img/default-user.png') }}"
                                     alt="">
                            </div>
                            <div class="ml-3">
                                <div
                                    class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                                <div
                                    class="mt-1 text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <div class="mt-3 px-2">
                            {{--                            @if(Auth::user()->is_complete)--}}
                            {{--                                <a href="{{ route('profile') }}"--}}
                            {{--                                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">--}}
                            {{--                                    Profile</a>--}}
                            {{--                                <a href="{{ route('request') }}"--}}
                            {{--                                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">--}}
                            {{--                                    Permintaan</a>--}}
                            {{--                            @else--}}
                            {{--                                <a href="{{ route('invitation') }}"--}}
                            {{--                                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">--}}
                            {{--                                    Kode Undangan</a>--}}
                            {{--                                <a href="{{ route('upload') }}"--}}
                            {{--                                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">--}}
                            {{--                                    Upload</a>--}}
                            {{--                            @endif--}}
                            <a href="#"
                               class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="p-4 max-w-3xl mx-auto">
                <h1 class="text-2xl font-bold leading-tight text-gray-900">
                    @yield('header')
                </h1>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js"
            integrity="sha512-3WGIRFCuTpZhqYujwLp5RtARPkOy3uRtc3RXB31bJ9/i6VH2C66Z0WBV6gHhdhbUIDKFx8yTkLfEjdQM5Wl+ZQ=="
            crossorigin="anonymous"></script>
    @stack('script')
    <script>

    </script>
</div>
</body>
</html>
