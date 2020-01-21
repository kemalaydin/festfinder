@extends('app')

@section('title',$Event->title)


@section('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBo_a4kC36Uu2a7gOF9n00djf0zahAA53A&callback=initMap"  type="text/javascript"></script>
    <script>
        var map;
        var markers = [];
        function initMap() {
            var haightAshbury = {lat: {{json_decode($Event->place->coordinates)[0]}}, lng: {{json_decode($Event->place->coordinates)[1]}}};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: haightAshbury,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                disableDefaultUi: true,
                styles: [ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#6195a0" } ] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [ { "visibility": "off" } ] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [ { "lightness": "0" }, { "saturation": "0" }, { "color": "#f5f5f2" }, { "gamma": "1" } ] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [ { "lightness": "-3" }, { "gamma": "1.00" } ] }, { "featureType": "landscape.natural.terrain", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#bae5ce" }, { "visibility": "on" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -100 }, { "lightness": 45 }, { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#fac9a9" }, { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [ { "color": "#4e4e4e" } ] }, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [ { "color": "#787878" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit.station.airport", "elementType": "labels.icon", "stylers": [ { "hue": "#0a00ff" }, { "saturation": "-77" }, { "gamma": "0.57" }, { "lightness": "0" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.text.fill", "stylers": [ { "color": "#43321e" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.icon", "stylers": [ { "hue": "#ff6c00" }, { "lightness": "4" }, { "gamma": "0.75" }, { "saturation": "-68" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#eaf6f8" }, { "visibility": "on" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#c7eced" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "lightness": "-49" }, { "saturation": "-53" }, { "gamma": "0.79" } ] } ],
            });

            var marker = new google.maps.Marker({
                position: haightAshbury,
                map: map,
                icon: "{{ asset('images/map_marker.svg') }}",
                title: "{{ $Event->place->name }}",
                animation: google.maps.Animation.DROP,
            });

        }
    </script>
@stop

@section('content')
    <div class="container relative">
        @if( $diff_date < 0 )
            <span class="absolute right-0 top-0 float-right inline text-xs bg-blue-200 py-2 px-4 rounded-l text-blue-700 mt-6">
                Etkinliğin başlamasına <span class="mx-2 font-bold">{{ str_replace('-','',Carbon::create(json_decode($Event->date)[0])->diffInDays(Carbon::now(),false)) }}</span> gün kaldı.
            </span>
        @else
            <span class="absolute right-0 top-0 float-right inline text-xs bg-red-200 py-2 px-4 rounded-l text-red-700 mt-6">
                Bu Etkinlik <span class="font-bold mx-2">{{ json_decode($Event->date)[1] }}</span> Tarihinde Sonlanmıştır.
            </span>
        @endif
        <div class="flex flex-col m-6 p-6">
            <div class="text-4xl font-thin w-full relative">
                <span>{{ $Event->title }}</span>
                <p class="text-sm">{{ $Event->Organizer->name }}</p>
            </div>
            <div class="flex">
                <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/3 ">
                    <div class="bg-white mr-6 shadow-xl mt-4 rounded">
                        <div class="mb-3 ml-3 pt-3">
                            <img src="data:image/jpg;base64,{{$Event->poster}}" alt="{{ $Event->title }}" class="w-1/3 mr-3 float-left rounded-lg shadow-lg @if( $diff_date > 0 ) filter-grayscale @endif"/>
                            <p class="inline text-justify">{!! $Event->description !!}</p>
                        </div>
                        <div class="clearfix mb-3 pb-4"></div>
                        <div class="border-t flex border-gray-200">
                            <div class="w-1/2 p-2 flex">
                                <span class="w-1/2">
                                    <span class="font-bold">Başlama</span>
                                    <p class="font-thin">{{ json_decode($Event->date)[0]}}</p>
                                </span>
                                <span class="w-1/2">
                                    <span class="font-bold">Bitiş</span>
                                    <p class="font-thin">{{ json_decode($Event->date)[1]}}</p>
                                </span>
                            </div>
                            <div class="w-1/2 p-2">
                                <span class="font-bold">{{ $Event->place->name }}</span>
                                <p class="font-thin">{{ $Event->place->address }}</p>
                            </div>
                        </div>
                        <div>
                            <div id="map" class="w-full border-t border-gray-200" style="height: 200px"></div>
                        </div>

                        <div class="mt-4 p-3">
                            <h3 class="text-2xl border-b border-gray-200 pb-2 mb-2">Etkinlik Kuralları</h3>
                            <div class="text-sm p-3">{!! $Event->rules !!}</div>
                        </div>
                    </div>
                </div>


                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3">
                    <div class="bg-white p-4 ml-6 shadow-xl mt-4 rounded">
                        <h3 class="text-2xl border-b border-gray-200 mb-2 pb-2">Bilet Fiyatları</h3>
                        <ul>
                            @foreach($Event->prices as $Price)
                                <li class="hover:bg-gray-100 p-1 rounded @if($diff_date > 0) text-gray-500 @endif">
                                    <a class="w-full" href="#">
                                        <label for="price_{{ $Price->id }}">{{ $Price->category }}</label>
                                        @if($diff_date > 0)
                                            <span class="text-red-500 text-xs"><small> Satışa Kapalı </small></span>
                                        @else
                                            @if($Price->favorite)
                                                <span title="Favori Seçenek">🤩</span>
                                            @endif
                                        @endif

                                    </a>
                                    <p class="inline float-right bg-gray-200 px-2 rounded-full text-sm">@if($Price->price == "0") Ücretsiz @else {{ $Price->currency->icon }} {{ number_format($Price->price,2) }} @endif</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="bg-white p-4 ml-6 shadow-xl mt-6 rounded">
                        <h3 class="text-2xl border-b border-gray-200 mb-2 pb-2">@if($diff_date > 0) Giden @else Gidecek @endif Kullanıcılar</h3>
                        <ul class="text-center">
                            <li class="inline-flex mr-3 mb-2">
                                <img class="rounded-full w-12 shadow-lg border-2 border-green-500 " src="https://randomuser.me/api/portraits/men/14.jpg"/>
                            </li>

                            <li class="inline-flex mr-3 mb-2">
                                <img class="rounded-full w-12 shadow-lg border-2 border-primary-500 " src="https://randomuser.me/api/portraits/men/53.jpg"/>
                            </li>

                            <li class="inline-flex mr-3 mb-2">
                                <img class="rounded-full w-12 shadow-lg border-2 border-gray-500 " src="https://randomuser.me/api/portraits/men/51.jpg"/>
                            </li>

                            <li class="inline-flex mr-3 mb-2">
                                <img class="rounded-full w-12 shadow-lg border-2 border-blue-500 " src="https://randomuser.me/api/portraits/men/20.jpg"/>
                            </li>

                            <li class="inline-flex mr-3 mb-2">
                                <img class="rounded-full w-12 shadow-lg border-2 border-gray-500 " src="https://randomuser.me/api/portraits/men/10.jpg"/>
                            </li>

                        </ul>
                    </div>


                    <div class="bg-white p-4 ml-6 shadow-xl mt-6 rounded">
                        <h3 class="text-2xl border-b border-gray-200 mb-2 pb-2">İhtiyacın Olacak</h3>
                        <div class="text-sm text-justify">
                            {!! $Event->trick !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
