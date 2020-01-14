<template>
    <div>
        <h3 class="font-bold">{{ feature.properties.title }}</h3>
        <p>
            {{ feature.properties.description }}
        </p>
        <button @click="popupClicked" class="bg-primary p-1 rounded text-xs text-white block focus:outline-none float-right mx-2 mt-3">Detaylar</button>
    </div>
</template>

<script>
    import Vue from 'vue'
    export default Vue.extend({
        props: {
            feature: {
                required: true,
                type: Object,
            },
        },
        methods: {
            popupClicked() {
                alert('detaylara yönlendir')
            },
        },
    })
</script>
