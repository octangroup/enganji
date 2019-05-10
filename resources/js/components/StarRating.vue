<template>
    <span>
        <vue-stars
            name="demo"
            active-color="#f6993f"
            inactive-color="#999999"
            shadow-color="#ffff00"
            hover-color="#dddd00"
            :max="5"
            :value="0"
            :readonly="false"
            char="★"
            inactive-char=""
            class=""
            v-on:input="setRate($event)"
        />
    <input type="hidden" name="rating" v-model="rate" required />
    </span>
</template>

<script>
    import {VueStars} from "vue-stars"

    export default {
        components: {
            VueStars
        },
        name: "StarRating",
        data: function () {
            return {
                rate: '',
            };
        }, methods: {
            // setting the new value from the vue-stars component to the rate variable
            setRate(i){
               this.rate = i;
            }
        }
    }
</script>

<style scoped>

</style>
