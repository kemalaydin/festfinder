<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        <title>@yield('title','Welcome') | Festreet </title>
        <link
            href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="{{ mix('css/app.css')}}">
        @yield('style')
    </head>
    <body>
        <div id="app">
            <div class="container flex shadow-lg z-20 relative">
                <div class="w-screen bg-primary px-2 p-3">
                    <div class="text-center w-1/4 float-left">
                        <a href="{{ url('/') }}">
                            @include('core.logo',['color' => 'white'])
                        </a>
                    </div>

                    <div class="w-3/4 float-left flex">
                        <div class="bg-white p-1 rounded m-2 w-1/2 shadow-xl">
                            <font-awesome name="search" class="text-primary mb-1 ml-1 mr-2"></font-awesome>
                            <input placeholder="Zeytinli Rock Fest" class="w-5/6 text-sm text-primary focus:outline-none placeholder-primary-300" />
                        </div>

                        <ul class="float-right text-right mr-6 w-1/2 ml-6 mt-1">
                            <li class="p-2 mr-3 inline-flex text-white font-light text-sm font-bold rounded">Currency ( ₺ ) <font-awesome class="ml-1" name="sort-down"></font-awesome></li>
                            <li class="p-2 mr-6 inline-flex text-white font-light text-sm font-bold border-r border-primary-400">&nbsp</li>
                            <li class="p-2 mr-1 inline-flex text-white font-light text-sm font-bold rounded"><a href="{{ route('login') }}"><font-awesome name="sign-in-alt" class="mr-1"></font-awesome> Login</a></li>
                            <li class="p-2 mr-1 inline-flex text-white font-light  text-sm font-bold rounded bg-secondary shadow"><a href="{{ route('register') }}"><font-awesome name="user-plus" class="mr-1"></font-awesome> New Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container flex bg-primary-100 z-10 relative shadow">
                <ul class="flex m-auto">
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Konser</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Festival</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Kamp</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Workshop</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Gezi / Tur</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Seminer</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Konferans</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Fuar</a></li>
                    <li><a href="#" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">Zirve</a></li>
                </ul>
            </div>

                @yield('content')

            <div class="clearfix"></div>
            <div class="container w-full flex bg-primary-100 pt-6 z-10 px-6">
                <div class="w-1/4 mr-2">
                    @include('core.logo',['color' => 'primary'])

                    <span class="text-sm text-primary font-thin block">
                        entertainment for your !
                    </span>
                    <span class="text-sm font-thin mt-4 block">Made with <font-awesome name="heart" class="text-primary" spin style="margin-top: -4px"></font-awesome> in Izmir</span>
                </div>

                <div class="w-2/4 mr-2 mt-6 pt-6 mb-2 text-center">
                    <span class="pt-6 text-sm">&copy Tüm Hakkı Saklıdır. {{ Carbon::now()->format('Y') }} festreet</span>
                </div>

                <div class="w-1/4 mr-2 mb-3 text-right">
                    <ul>
                        <li class="text-sm pb-2"><a class="hover:text-primary" href="#">Organizatör Girişi</a></li>
                        <li class="text-sm pb-2"><a class="hover:text-primary" href="#">Etkinlik Ekle</a></li>
                        <li class="text-sm pb-2"><a class="hover:text-primary" href="#">Kullanım Sözleşmesi</a></li>
                        <li class="text-sm pb-2"><a class="hover:text-primary" href="#">Gizlilik Sözleşmesi</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <script src="{{ mix('js/app.js')}}"></script>
        @yield('script')
    </body>
</html>
