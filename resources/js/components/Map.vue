<template>
        <gmap-map
            :center="center"
            :zoom="12"
            :options="{
               zoomControl: true,
               mapTypeControl: false,
               scaleControl: false,
               streetViewControl: false,
               rotateControl: false,
               fullscreenControl: false,
               disableDefaultUi: false
             }"
        >
        </gmap-map>
</template>

<script>
    export default {
        name: "GoogleMap",
        data() {
            return {
                center: { lat: 45.508, lng: -73.587 },
                markers: [],
                places: [],
                currentPlace: null
            };
        },

        mounted() {

        },

        methods: {


        }
    };
</script>
