<template>
    <div>
        <div>
            <ul>
                <li v-for="(picture,i) in pictures" @click="currentImage(i)">
                    <img :src="picture"/>
                </li>
            </ul>
        </div>

        <div class="w-100 xl:hidden lg:hidden">
            <img :src="pictures[index]"  class="transition-500ms w-100">
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