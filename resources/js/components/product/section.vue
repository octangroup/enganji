<template>
    <div class="w-100  pt-3 pb-3 px-2">
        <div class="w-90 xs:w-85 mx-auto" v-if="title">
            <h3 class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-medium text-black">
                {{title}}</h3>
        </div>
        <div class="w-90 pb-3 mx-auto pt-2  relative whitespace-no-wrap overflow-hidden px-3">
            <div class="absolute l-0 t-40 xs:t-25 z-60">
                <button v-show="hasLeftSlide" @click="slideLeft"
                        class="btn btn-default hover:bg-grey-lightest transition-250ms  h-13 w-rem-13 border-1 border-solid border-grey rounded-full">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>
            <div :id="'slide-view-'+el_id" class="relative whitespace-no-wrap overflow-hidden w-100 mx-auto z-50"
                 v-touch:swipe.right="slideLeft" v-touch:swipe.left="slideRight">
                <product-card v-for="(product,index) in products" v-bind:key="index" v-if="products"
                              v-bind:product="product"
                ></product-card>
            </div>
            <div class="absolute r-0 t-40 xs:t-25 z-60">
                <button v-show="hasRightSlide" @click="slideRight"
                        class="btn btn-default hover:bg-grey-lightest  transition-250ms h-13 w-rem-13 border-1 border-solid border-grey rounded-full">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductCard from "./card";

    export default {
        name: "product-section",
        components: {ProductCard},
        props: ['products', 'title', 'is_deal', 'is_new', 'deals', 'bg_class', 'title_class', 'link'],
        data: function () {
            return {
                hasLeftSlide: false,
                slider: '',
                hasRightSlide: false,
                left: ''
            }
        },
        methods: {
            slideLeft() {
                this.slider.animate({
                    scrollLeft: "-=250px"
                }, "normal");
                _.delay(this.checkHasLeftSlide, 300);
                _.delay(this.checkHasRightSlide, 300);
            },
            slideRight() {
                this.slider.animate({
                    scrollLeft: "+=250px"
                }, "normal");
                _.delay(this.checkHasLeftSlide, 300);
                _.delay(this.checkHasRightSlide, 300);
            }, checkHasLeftSlide() {

                let newScrollLeft = this.slider.scrollLeft();
                this.left = newScrollLeft;
                if (newScrollLeft > 10) {
                    return this.hasLeftSlide = true;
                }
                return this.hasLeftSlide = false;
            }, checkHasRightSlide() {
                let scrollWidth = Math.ceil(this.slider.get(0).scrollWidth);
                let innerWidth = Math.ceil(this.slider.innerWidth());
                if (scrollWidth > innerWidth) {
                    return this.hasRightSlide = true;
                }
                return this.hasRightSlide = false;
            }
        }, computed: {
            el_id() {
                return Math.floor(Math.random() * 1023210) + 121;
            },
        }, mounted() {
            this.slider = $('#slide-view-' + this.el_id);
            _.delay(this.checkHasLeftSlide, 100);
            _.delay(this.checkHasRightSlide, 100);
        }
    }
</script>

<style scoped>

</style>
