<template>
    <div class="w-100 flex px-4">
        <picture-card :product="product" v-for="(picture,index) in pictures" :picture="picture" :key="index"/>
    </div>
</template>

<script>
    import PictureCard from "./card";

    export default {
        name: "picture-list",
        components: {PictureCard},
        props: ['pictures','product']
    }
</script>

<style scoped>

</style>
