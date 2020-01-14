<template>
    <li @mouseover="menuOpen = true" @mouseleave="menuOpen = false" class="relative p-2 mr-1 inline-flex text-white font-light text-sm ">
        Merhaba &nbsp <b> {{ user }}</b>
        <font-awesome v-bind:name="icon" class="ml-2"></font-awesome>
        <ul v-if="menuOpen" class="absolute mt-6 bg-white py-3 px-4 text-black text-left font-normal rounded shadow-lg cursor-pointer">
            <li class="mb-1"><a v-bind:href="route+'/my/account'">Hesabım</a></li>
            <li class="mb-1"><a v-bind:href="route+'/my/event'">Etkinliklerim</a></li>
            <li class="mb-1"><a v-bind:href="route+'/my/favorite'">Favorilerim</a></li>
            <li class="mb-1"><a v-bind:href="route+'/my/ticket'">Biletlerim</a></li>
            <li>
                <form v-bind:action="route+'/logout'" method="post">
                    <input type="hidden" v-bind:value="csrf" name="_token" />
                    <button class="text-red-600 focus:outline-none">Çıkış Yap</button>
                </form>
            </li>
        </ul>
    </li>
</template>

<script>
    import FontAwesome from 'vue-awesome';

    export default {
        name: "UserMenu",
        props: [
            'isMenu',
            'user',
            'route',
            'csrf'
        ],
        data() {
            return{
                menuOpen: false,
                icon: 'sort-down',
            }
        },
        components: {
            FontAwesome
        },
        methods: {
            iconChange:() => {
                if(this.menuOpen == true){
                    this.icon = 'sort-up';
                }else{
                    this.icon = 'sort-down';
                }
            }
        }
    }
</script>

<style scoped>

</style>
