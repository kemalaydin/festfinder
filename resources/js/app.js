require('./bootstrap');
window.Vue = require('vue');

// Imported
import FontAwesome from 'vue-awesome';
import Mapbox from 'mapbox-gl-vue';
import UserMenu from './components/UserMenu.vue';
import DatePicker from 'vue2-datepicker';
import Currency from "./components/Currency";
import PopupContent from './components/MapPopup.vue';
import NumberInput from 'vue-phone-number-input';
import Alert from './components/Alert.vue';
import MyButton from './components/MyButton.vue';
import MyInput from './components/MyInput.vue';


// Styles
import 'vue-phone-number-input/dist/vue-phone-number-input.css';


const app = new Vue({
    el: '#app',
    data: {
        time1: null,
        birthday: null,
        phone: null,
    },
    components:{
        FontAwesome,
        Mapbox,
        UserMenu,
        DatePicker,
        Currency,
        NumberInput,
        Alert,
        MyButton,
        MyInput
    },
    methods: {
        loadedMap(map){
            map.addLayer({
                id: 'points',
                type: 'symbol',
                source: {
                    type: 'geojson',
                    data: {
                        type: 'FeatureCollection',
                        features: [
                            {
                                type: 'Feature',
                                geometry: {
                                    type: 'Point',
                                    coordinates: [-77.03238901390978, 38.913188059745586],
                                },
                                properties: {
                                    title: 'Demo Etkinlik',
                                    description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam aliquid at et, eum ex molestiae natus nostrum qui sint sit unde veniam voluptates! Aspernatur dolorem illo ipsa minus sapiente!',
                                    icon: 'monument',
                                },
                            },
                            {
                                type: 'Feature',
                                geometry: {
                                    type: 'Point',
                                    coordinates: [-122.414, 37.776],
                                },
                                properties: {
                                    title: 'Festivalll',
                                    description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam aliquid at et, eum ex molestiae natus nostrum qui sint sit unde veniam voluptates! Aspernatur dolorem illo ipsa minus sapiente!',
                                    icon: 'point',
                                },
                            },
                        ],
                    },
                },
                layout: {
                    'icon-image': '{icon}-15',
                    'text-field': '{title}',
                    'text-offset': [0, 0.6],
                    'text-anchor': 'top',
                },
            })
        },

        clickedMap(map, e) {
            if (e.features) {
                const coordinates = e.features[0].geometry.coordinates.slice()

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360
                }

                new mapboxgl.Popup()
                    .setLngLat({ lng: coordinates[0], lat: coordinates[1] })
                    .setHTML('' +
                        '<div id="vue-popup-content"></div>')
            .addTo(map)

                new PopupContent({
                    propsData: { feature: e.features[0] },
                }).$mount('#vue-popup-content')
            }
        },
    }
});
