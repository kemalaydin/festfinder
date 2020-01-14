@extends('app')

@section('title',$Place->name)

@section('content')
    <mapbox
        access-token="pk.eyJ1IjoiYXJjaHlzZW5vcyIsImEiOiJjajhxY2h6MzIwcGdlMzNwZjVkYjhjMW0wIn0.gewXg2N662e1QbaDuPyXBw"
        :map-options="{ style: 'mapbox://styles/archysenos/cjluqhj3y1rjg2srtx3xgsv4s', center: [-96, 37.8], zoom: 3}"
        :scroll-zoom="false"
        @map-load="loadedMap"
        @map-click:points="clickedMap"
        style="height: 200px !important"
    ></mapbox>
    <div class="container p-6">
        <div class="flex p-6">
            <div class="w-full ml-6 mr-6">
                <h3 class="text-3xl font-normal text-black px-2 rounded-t uppercase border-b border-gray-200">
                    {{ $Place->name }}
                </h3>

                <div class="container flex flex-wrap">
                    @foreach($Place->Events as $Event)
                        <div class="w-full md:w-1/3 p-2">
                            <div class="w-full shadow-md rounded">
                                <a class="bg-primary-500 text-white p-2 text-center font-normal text-lg rounded-t block" href="{{ route('event.show',$Event->slug) }}">
                                    {{ $Event->title }}
                                </a>

                                <div class="w-full">
                                    <img src="{{ asset('images/1.png') }}" />
                                </div>

                                <div class="p-2 text-sm text-justify">
                                    {{ Str::limit($Event->description,250) }}
                                </div>

                                <hr>

                                <div class="bg-gray-100 shadow-inner p-2 rounded-b flex text-center items-stretch">
                                    <div class="w-1/3 text-xs border-r">
                                        {{ json_decode($Event->date)[0].' '.json_decode($Event->date)[1] }}
                                    </div>
                                    <div class="w-1/3 text-xs border-r align-middle self-stretch">
                                        <a href="{{ url('place/'.$Event->place->slug)  }}">{{ $Event->place->name}}</a>
                                    </div>
                                    <div class="w-1/3 text-xs align-middle self-stretch">
                                        <a href="{{ url('organizer/'.$Event->Organizer->slug) }}">{{ $Event->Organizer->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
