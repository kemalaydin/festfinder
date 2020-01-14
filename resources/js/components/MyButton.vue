<template>
    <button class="py-2 px-4 bg-primary text-white rounded hover:bg-primary-600 focus:outline-none shadow-lg"">
        {{ value }}
    </button>
</template>

<script>
    export default {
        name: "MyButton",
        props: [
            'value'
        ]
    }
</script>

<style scoped>

</style>
