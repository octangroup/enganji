<template>
    <div class="w-100">
        <div class="flex xs:block w-100">
            <div class="w-25 rounded-xlg mt-1 hidden xl:block lg:block md:block  ">
                <div v-for="(picture,i) in pictures" @click="currentImage(i)" v-bind:class="{'mt-4':i>0}"
                     class="w-80 md:w-70 mx-auto p-3 border border-solid border-grey-light cursor-pointer  rounded-xl overflow-hidden">
                    <img :src="picture" class="transition-500ms">
                </div>
            </div>
            <div class="w-75 xs:w-100 ml-4 xs:ml-0 md:ml-0 md:mb-0 mb-5 ">
                <div class=" md:w-80 md:mx-auto border border-solid border-grey-light rounded-xlg overflow-hidden ">
                    <img :src="pictures[index]" class="transition-500ms w-100">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "gallery",
        data() {
            return {
                index: 0,
            }
        },
        props: ['pictures'],
        methods: {
            nextImage() {
                let i = this.index;
                if (i >= this.pictures.length) {
                    i = 0;
                }
                this.currentImage(i);

            },
            previousImage() {
                let i = this.index;
                if (i < 0) {
                    i = this.pictures.length - 1;
                }
                this.currentImage(i);
            },
            currentImage(imageIndex) {
                this.index = imageIndex;
            }

        },

    }
</script>

<style scoped>

</style>
