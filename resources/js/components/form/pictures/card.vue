<template>
    <div class="w-20 relative p-3" v-if="show">
        <img :src="picture.url" class="w-100 relative">
        <button @click="deletePicture"
                class="btn absolute t-0 mt-1 mr-1 shadow r-0 btn-danger p-0 h-12 w-rem-12 rounded-full">
            <i class="fi flaticon-trash"></i>
        </button>
    </div>
</template>

<script>
    export default {
        name: "picture-card",
        props: ['picture', 'product'],
        data:function(){
            return {
                show: true,
            }
        },
        methods: {
            deletePicture: function () {
                this.show = false;
                axios.post("/affiliate/products/pictures/delete", {
                    product_id: this.product.id,
                    picture_id: this.picture.id,
                }).then((response) => {
                    console.log(response);
                }).catch((error) => {
                    console.log(error.response.data);
                });
            }
        }
    }
</script>

<style scoped>

</style>
