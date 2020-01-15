<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('meta')
        <title>@yield('title','Welcome') :: Festreet </title>
        <link rel="stylesheet" href="{{ mix('css/app.css')}}">
        @yield('style')
    </head>
    <body>
        <div id="app">
            <div class="container flex shadow-lg z-20 relative">
                <div class="w-screen bg-topaz-dark px-2 p-3">
                    <div class="text-center w-1/4 float-left">
                        <a href="{{ url('/') }}">
                            @include('core.logo',['color' => 'white'])
                        </a>
                    </div>

                    <div class="hidden md:block lg:block lg:w-3/4 xl:w-3/4 md:w-3/4 float-left ">
                        <div class="flex">
                            <div class="bg-white p-1 rounded m-2 w-1/2 shadow-xl">
                                <font-awesome name="search" class="text-primary mb-1 ml-1 mr-2"></font-awesome>
                                <input placeholder="Zeytinli Rock Fest" class="w-5/6 text-sm text-primary focus:outline-none placeholder-primary-300" />
                            </div>

                            <ul class="float-right text-right mr-6 w-1/2 ml-6 mt-1">
                                <currency></currency>
                                <li class="p-2 mr-6 inline-flex text-white font-light text-sm font-bold border-r border-primary-400">&nbsp</li>
                                @guest
                                    <li class="p-2 mr-1 inline-flex text-white text-sm font-bold rounded"><a href="{{ route('login') }}"><font-awesome name="sign-in-alt" class="mr-1"></font-awesome> Giriş</a></li>
                                    <li class="py-2 px-4 mr-1 inline-flex text-white text-sm font-thin rounded bg-primary-800 hover:bg-primary-700 shadow"><a href="{{ route('register') }}"><font-awesome name="user-plus" class="mr-1"></font-awesome> Yeni Hesap</a></li>
                                @else
                                    <user-menu
                                        class="cursor-pointer"
                                        user="{{Auth::User()->username}}"
                                        route="{{ url('/') }}"
                                        csrf="{{ csrf_token() }}"
                                    ></user-menu>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container invisible md:visible xl:visible lg:visible relative flex bg-primary-100 z-10 shadow">
                <ul class="flex m-auto">
                    @foreach($MainCategories as $Category)
                        <li><a href="{{ route('event.category',$Category->slug) }}" class="inline-flex py-2 px-4 text-primary-700 border-b border-primary-100 hover:border-primary-700 text-sm">{{ $Category->category_name }}</a></li>
                    @endforeach
                </ul>
            </div>

                @yield('content')

            <div class="clearfix"></div>
            <div class="container w-full flex border-t-2 border-primary pt-6 z-10 px-6 shadow-inner">
                <div class="w-1/4 mr-2 mb-4">
                    @include('core.logo',['color' => 'primary'])
                </div>

                <div class="invisible md:visible lg:visible xl:visible w-2/4 mr-2 mt-1 mb-2 text-center">
                    <ul class="mb-2">
                        <li class="inline-flex border-r border-primary pr-2 mr-2 hover:text-primary text-sm"><a href="{{url('/')}}">Ana Sayfa</a></li>
                        <li class="inline-flex border-r border-primary pr-2 mr-2 hover:text-primary text-sm"><a href="#">Organizatör Kayıt</a></li>
                        <li class="inline-flex hover:text-primary text-sm"><a href="#">Gizlilik Sözleşmesi</a></li>
                    </ul>
                    <span class="pt-6 text-sm">&copy Tüm Hakkı Saklıdır. {{ Carbon::now()->format('Y') }} festreet</span>
                </div>

                <div class="w-1/4 mr-2 mb-4 text-right">
                    <span class="text-sm font-thin mt-2 block">Made with <font-awesome name="heart" class="text-primary" spin style="margin-top: -4px"></font-awesome> in Izmir</span>
                </div>
                @if(session()->has('alert'))
                    <alert
                        message="{{ session()->get('alert')["message"] }}"
                        type="{{ session()->get('alert')["type"] }}"
                        time="{{ session()->get('alert')["time"] }}"
                        position="{{ session()->get('alert')["position"] }}"
                    ></alert>
                @endif
            </div>
        </div>
        <script src="{{ mix('js/app.js')}}"></script>
        @yield('script')
    </body>
</html>
