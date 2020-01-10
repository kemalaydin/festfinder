require('./bootstrap');
window.Vue = require('vue');

import FontAwesome from 'vue-awesome';
import Mapbox from 'mapbox-gl-vue';


const app = new Vue({
    el: '#app',
    data: {

    },
    components:{
        FontAwesome,
        Mapbox
    }
});
