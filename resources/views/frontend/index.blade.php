@extends('app')

@section('title')
    Hoş Geldiniz
@stop

@section('script')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBo_a4kC36Uu2a7gOF9n00djf0zahAA53A&callback=initMap"  type="text/javascript"></script>
    <script>
        var map;
        var markers = [];
        function initMap() {
            var haightAshbury = {lat: 38.43070624776098, lng: 27.134732054021182};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                styles: [ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#6195a0" } ] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [ { "visibility": "off" } ] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [ { "lightness": "0" }, { "saturation": "0" }, { "color": "#f5f5f2" }, { "gamma": "1" } ] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [ { "lightness": "-3" }, { "gamma": "1.00" } ] }, { "featureType": "landscape.natural.terrain", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#bae5ce" }, { "visibility": "on" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -100 }, { "lightness": 45 }, { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#fac9a9" }, { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [ { "color": "#4e4e4e" } ] }, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [ { "color": "#787878" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "transit.station.airport", "elementType": "labels.icon", "stylers": [ { "hue": "#0a00ff" }, { "saturation": "-77" }, { "gamma": "0.57" }, { "lightness": "0" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.text.fill", "stylers": [ { "color": "#43321e" } ] }, { "featureType": "transit.station.rail", "elementType": "labels.icon", "stylers": [ { "hue": "#ff6c00" }, { "lightness": "4" }, { "gamma": "0.75" }, { "saturation": "-68" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#eaf6f8" }, { "visibility": "on" } ] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "color": "#c7eced" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "lightness": "-49" }, { "saturation": "-53" }, { "gamma": "0.79" } ] } ],
                center: haightAshbury,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                disableDefaultUi: false
            });

            /*var marker = new google.maps.Marker({
                position: haightAshbury,
                map: map
            });*/
            var marker = new google.maps.Marker({
                position: haightAshbury,
                map: map,
                icon: "{{ asset('images/map_marker.svg') }}",
                animation: google.maps.Animation.DROP,
            });

            var marker = new google.maps.Marker({
                position: {lat: 38.41985295574025, lng: 27.150187871782457},
                map: map,
                icon: "{{ asset('images/map_marker.svg') }}",
                animation: google.maps.Animation.DROP,
            });

            var marker = new google.maps.Marker({
                position: {lat: 38.42926684830324, lng: 27.150016210405504},
                map: map,
                icon: "{{ asset('images/map_marker.svg') }}",
                animation: google.maps.Animation.DROP,
            });

            var marker = new google.maps.Marker({
                position: {lat: 38.41850801378336, lng: 27.20374622139183},
                map: map,
                icon: "{{ asset('images/map_marker.svg') }}",
                animation: google.maps.Animation.DROP,
            });

            var marker = new google.maps.Marker({
                position: {lat: 38.385286808551776, lng: 27.173190496294175},
                map: map,
                icon: "{{ asset('images/map_marker.svg') }}",
                animation: google.maps.Animation.DROP,
            });
        }
    </script>
@stop

@section('content')
    <div class="container w-full z-0 relative" style="height: 500px">

        <div class="invisible md:visible sm:visible lg:visible xl:visible absolute w-full" style="z-index: -1;">
            <div class="full-w" id="map" style="height: 500px;"></div>
        </div>

        <div class="sm:w-1/4 md:w-1/4 lg:w-1/4 w-full bg-white h-full p-2 z-10 md:ml-6 shadow-2xl">
            <div class="text-lg ml-2 mt-6">
                <span class="block">Çevrenizdeki en iyi etkinlikleri bulun</span><span class="text-sm"> ve biraz eğlenin 🎉</span>
            </div>

            <div class="mt-2 mx-2 mt-6 pt-2">
                <span class="text-black text-sm">
                    <font-awesome name="map-marker-alt"></font-awesome>
                    <span> Nerede ? </span>
                    <input class="mt-2 appearance-none border-b-2 border-gray-400 w-full py-2 px-3 text-black placeholder-gray-500 focus:border-black leading-tight focus:outline-none" id="where" placeholder="Write Location" />
                </span>
            </div>
            <div class="mx-2 mt-6">
                <span class="text-black mt-4 text-sm">
                    <font-awesome name="calendar-alt"></font-awesome>
                    <span> Ne Zaman ? </span> <br>
                    <date-picker
                        v-model="time1"
                        format="DD.MM.YYYY"
                        placeholder="Select date"
                        class="mt-2 border-0 border-b-2 border-gray-400 w-full appearance-none rounded-0 placeholder-gray-300 focus:border-black leading-tight focus:outline-none"
                    ></date-picker>
                </span>
            </div>

            <div class="ml-2 mt-6 flex flex-wrap">
                <div class="w-1/2">
                    <span class="text-black mt-4 text-sm flex-wrap mr-5">
                        <font-awesome name="wallet"></font-awesome>
                        <span> Bütçe </span>
                        <div class="block">
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">öğrenci</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">ucuz</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">normal</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">pahalı</p>
                        </div>
                    </span>
                </div>

                <div class="w-1/2">
                    <span class="text-black mt-4 text-sm ml-5">
                        <font-awesome name="tag"></font-awesome>
                        <span> Etiket </span>
                        <div class="block ml-2">
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Kamp</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Festical</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Workshop</p>
                            <p class="inline-flex cursor-pointer hover:opacity-75 py-1 px-2 my-1 rounded-full bg-gray-300 text-xs text-gray-800 mr-2">Konser</p>
                        </div>
                    </span>
                </div>
            </div>
            <a class="rounded bg-black block text-white p-1 text-center mb-4 shadow hover:bg-gray-900 font-thin cursor-pointer transition-bg">Etkinlik Bul</a>

        </div>
    </div>
@stop
