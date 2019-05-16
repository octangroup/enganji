<!--
  - Copyright (c) 2018. TripperSteer. All Rights Reserved.
  - This code is proprietary and the property of TripperSteer.
  -->

<template>
    <transition duration="350" name="custom-classes-transition"
                enter-active-class="animated slideInRight"
                leave-active-class="animated slideOutRight"
    >
        <div v-if="!is_invisible" v-show="show"
             class="panel panel-default my-1 px-3 mt-xl-3 w-100 min-h-auto rounded shadow ml-auto mr-xl-4 mt-l-3  border-1 border-solid"
             v-bind:class="{'bg-yellow-lightest border-yellow-light':is_danger,'bg-blue-lighter border-blue-light':is_info,'bg-green-lightest border-green-light':is_success}"
        >
            <div class="flex "
                 v-bind:class="{'text-yellow-dark':is_danger,'text-blue-dark':is_info,'text-green-dark':is_success}"
            >
                <!--<div class="w-20">-->
                    <!--<div class="h-13 w-rem-13 my-2 text-white rounded-full flex align-content-center justify-content-center"-->
                         <!--v-bind:class="{'bg-yellow-light':is_danger,'bg-blue-light':is_info,'bg-green-light':is_success}">-->
                        <!--<div class="h-12 w-rem-12 p-1 my-1 text-3xl text-center rounded-full">-->
                            <!--<button class="btn w-rem-10 h-10 text-3xl py-1 leading-none rounded-full text-white flex align-content-center justify-content-center"-->
                                    <!--v-bind:class="{'bg-yellow-dark':is_danger,'bg-blue-dark':is_info,'bg-green-dark':is_success}">-->
                                <!--<i v-if="is_danger" class="fas fa-exclamation-circle"></i>-->
                                <!--<i v-if="is_info" class="fas fa-info-circle"></i>-->
                                <!--<i v-if="is_success" class="fas fa-check-circle "></i>-->
                            <!--</button>-->
                        <!--</div>-->
                    <!--</div>-->

                <!--</div>-->
                <div class="w-95 mx-auto">
                    <h6 class="my-1 mt-2 text-base font-primary font-bold"
                        v-bind:class="{'text-yellow-darker':is_danger,'text-blue-darker':is_info,'text-green-darker':is_success}"
                    >{{title}}</h6>
                    <p class="my-1 mb-2 text-sm">{{message}}</p>
                </div>
                <div class="w-10 pt-2 text-right">
                    <span @click="closeAlert" class="text-base"><i class="far fa-times-circle"></i></span>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "notification",
        props: ['is_info', 'is_danger', 'is_success', 'title', 'message', 'auto_hide'],
        data: function () {
            return {
                show: false,
                is_invisible: false,
            };
        }, methods: {
            closeAlert() {
                this.show = false;
                _.delay(this.hideAlert, 400);
            },
            hideAlert() {
                this.is_invisible = true;
            }
        }, mounted() {
            this.show = true;
            if (this.auto_hide) {
                _.delay(this.closeAlert, 5000);
            }
        }
    }
</script>
