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
                styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"weight":"2.00"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"color":"#9c9c9c"}]},{"featureType":"all","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#7b7b7b"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#c8d7d4"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#070707"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]}],
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
                <span class="block">Find the best events around</span><span class="text-sm"> and have some fun 🎉</span>
            </div>

            <div class="mt-2 mx-2 mt-6 pt-2">
                <span class="text-black text-sm">
                    <font-awesome name="map-marker-alt"></font-awesome>
                    <span> Where </span>
                    <input class="mt-2 appearance-none border-b-2 border-gray-400 w-full py-2 px-3 text-black placeholder-gray-500 focus:border-black leading-tight focus:outline-none" id="where" placeholder="Write Location" />
                </span>
            </div>
            <div class="mx-2 mt-6">
                <span class="text-black mt-4 text-sm">
                    <font-awesome name="calendar-alt"></font-awesome>
                    <span> When </span> <br>
                    <date-picker
                        v-model="time1"
                        format="DD.MM.YYYY"
                        placeholder="Select date"
                        range
                        class="mt-2 border-0 border-b-2 border-gray-400 w-full appearance-none rounded-0 placeholder-gray-300 focus:border-black leading-tight focus:outline-none"
                    ></date-picker>
                </span>
            </div>

            <div class="ml-2 mt-6 flex flex-wrap">
                <div class="w-1/2">
                    <span class="text-black mt-4 text-sm flex-wrap mr-5">
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
                    <span class="text-black mt-4 text-sm ml-5">
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
            <a class="rounded bg-black block text-white p-1 text-center mb-4 shadow hover:bg-gray-900 font-thin cursor-pointer">Find It</a>

        </div>
    </div>
@stop
