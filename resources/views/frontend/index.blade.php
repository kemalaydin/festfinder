@extends('app')

@section('title')
    Welcome
@stop

@section('content')
    <div class="container w-full z-0 relative" style="height: 500px">

        <div class="absolute w-full" style="z-index: -1">
            <mapbox
                access-token="pk.eyJ1IjoiYXJjaHlzZW5vcyIsImEiOiJjajhxY2h6MzIwcGdlMzNwZjVkYjhjMW0wIn0.gewXg2N662e1QbaDuPyXBw"
                :map-options="{ style: 'mapbox://styles/archysenos/cjluqhj3y1rjg2srtx3xgsv4s', center: [-96, 37.8], zoom: 3}"
                :scroll-zoom="false"
            />
        </div>

        <div class="sm:w-1/4 md:w-1/4 lg:w-1/4 w-full bg-white h-full p-2 z-10 ml-6 shadow-2xl">
            <div class="text-lg ml-2 mt-6">
                <span class="block">Find the best events around</span><span class="text-sm"> and have some fun 🎉</span>
            </div>

            <div class="mt-2 ml-2 mt-6 pt-2">
                <span class="text-secondary text-sm">
                    <font-awesome name="map-marker-alt"></font-awesome>
                    <span> Where </span>
                    <input class="mt-2 appearance-none border-b-2 border-secondary-400 w-full py-2 px-3 text-gray-700 placeholder-secondary-200 leading-tight focus:outline-none" id="where" placeholder="Write Location" />
                </span>
            </div>
            <div class="ml-2 mt-6">
                <span class="text-secondary mt-4 text-sm">
                    <font-awesome name="calendar-alt"></font-awesome>
                    <span> When </span>
                    <input class="mt-2 appearance-none border-b-2 border-secondary-400 w-full py-2 px-3 text-gray-700 placeholder-secondary-200 leading-tight focus:outline-none" id="when" placeholder="Select Date" />
                </span>
            </div>

            <div class="ml-2 mt-6 flex flex-wrap">
                <div class="w-1/2">
                    <span class="text-secondary mt-4 text-sm flex-wrap mr-5">
                        <font-awesome name="wallet"></font-awesome>
                        <span> Budget </span>
                        <div class="block">
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">for student</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">cheap</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">normal</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">expensive</p>
                        </div>
                    </span>
                </div>

                <div class="w-1/2">
                    <span class="text-secondary mt-4 text-sm ml-5">
                        <font-awesome name="tag"></font-awesome>
                        <span> Tags </span>
                        <div class="block ml-2">
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Camping</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Festival</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Workshop</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Other</p>
                        </div>
                    </span>
                </div>
            </div>
            <a class="rounded bg-secondary block text-white p-1 text-center mb-4 shadow hover:bg-secondary-400 font-bold cursor-pointer">Find It</a>

        </div>
    </div>
@stop