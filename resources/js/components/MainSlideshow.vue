<template>
    <div class=" w-100 relative">
        <div class=" w-90 mx-auto rounded-xlg overflow-hidden relative z-40">
            <div class="w-100 relative h-px-500">
                <transition
                    mode="in-out"
                    name="custom-classes-transition"
                    :enter-active-class="enter_animation"
                    :leave-active-class="leave_animation"
                    :duration="{ enter: enter, leave: leave }">
                    <img v-bind:key="index" :src="ads[index].picture"
                         class="w-100 absolute h-100">
                </transition>
            </div>
            <div class="absolute w-100 b-5 z-60 text-center">
                <button v-for="(ad, i) in ads"
                        @click="setIndex(i)"
                        class="h-3 w-3 border-1 border-solid outline-none border-white rounded-full  p-0 mr-3 cursor-pointer"
                        v-bind:class="{'bg-white ' : i == index,'bg-transparent': i!= index}"

                ></button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "main-slideshow",
        props: ['ads'],
        data() {
            return {
                index: 0,
                show_main: false,
                enter_animation: 'animated slideInLeft',
                leave_animation: 'animated slideOutRight',
                interval: '',
                enter: 500,
                leave: 500
            }
        },
        methods: {
            next() {
                this.enter_animation = 'animated slideInRight';
                this.leave_animation = 'animated slideOutLeft';
                this.slide(1);
            },
            slide(i) {
                this.resetInterval();
                let index = this.index + i;
                if (index >= this.ads.length) {
                    index = 0;
                }
                this.index = index;
                this.setSliderInterval();
            },
            previous() {
                this.enter_animation = 'animated slideInLeft';
                this.leave_animation = 'animated slideOutRight';
                this.slide(1);
            }, setSliderInterval: function () {
                this.interval = setInterval(() => {
                    this.next();
                }, 7500);
            }, resetInterval: function () {
                clearInterval(this.interval);
            }, setIndex(i) {
                this.resetInterval();
                if (i < this.index) {
                    this.enter_animation = 'animated slideInLeft';
                    this.leave_animation = 'animated slideOutRight';
                } else {
                    this.enter_animation = 'animated slideInRight';
                    this.leave_animation = 'animated slideOutLeft';
                }

                if (i < this.ads.length) {
                    this.index = i;
                }
                this.setSliderInterval();
            }

        }, mounted() {
            this.setSliderInterval();
        }
    }
</script>

<style scoped>

</style>
