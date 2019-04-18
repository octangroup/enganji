<template>
    <div
            v-bind:class="{ 'w-30  xs:w-100 md:w-50 lg:w-50 xs:r-0 shadow-lg ' : show ,'w-rem-13 h-13 rounded-full shadow-md' : !show }"
            class="rounded-xl fixed z-99 py-0 px-0  min-h-auto b-5 r-2  mr-3 z-9999 xs:mr-0 text-sm overflow-hidden text-white bg-primary ">
        <div v-show="!show" @click="show = true" class="w-100 h-100">
            <div class="flex align-items-center justify-content-center w-100 h-100">
                <div class="text-center">
                    <i class="fi flaticon-chat text-xl"></i>
                </div>
            </div>
        </div>
        <div v-show="show">
            <div class="flex z-50 py-1">
                <div class="flex-90 xs:flex-80 text-left px-3" style="">
                    <div class="w-100 flex">
                        <div class="w-80">
                            <p class="py-0 ">Chat with Us</p>
                        </div>
                    </div>
                </div>
                <div id="chat" class="flex-10 text-center" style="display: none;">
                    <p class="py-0 px-3"><img src="/img/chat-package-icon.svg" class="w-70"></p>
                </div>
                <div id="close" class="flex-10 text-center text-right w-100" style="">
                    <p @click="show = false" class="py-0 px-3  w-100 cursor-pointer">
                        <i class="fas fa-times cursor-pointer"></i>
                    </p>
                </div>
            </div>
            <div v-if="!is_guest"
                 class="pt-3 p-0 bg-grey-lighter px-2 m-0 text-black-dark overflow-hidden h-auto w-100 m-0 "
            >
                <div id="messages-view" class="overflow-y-scroll relative w-100 xl:h-px-300">
                    <div class="overflow-auto">

                        <div v-for="message in messages" class="flex w-65 pb-3"
                             v-bind:class="{ 'ml-auto': !message.from_affiliate}">
                            <div v-if="message.from_affiliate"
                                 class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
                                <img src="/img/bobo.jpg" class="clip-full">
                            </div>
                            <div class="w-80 rounded p-2 shadow"
                                 v-bind:class="{ 'bg-primary text-white': message.from_affiliate,'bg-white text-black': !message.from_affiliate}">
                                <p class=" m-0 p-0">{{message.body}}</p>
                                <!--<p class="mr-2 mr-m-1 mt-0 mb-0 py-0 pt-2 text-xs text-right">{{message.time}}</p>-->
                            </div>
                            <div v-if="!message.from_affiliate"
                                 class="w-rem-10 h-10 rounded-full mx-auto relative overflow-hidden">
                                <img src="/img/ring.webp" class="clip-full">
                            </div>
                        </div>
                        <div v-if="!messages.length" class="flex w-65 pb-3">
                            <div class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
                                <img src="/img/bobo.jpg" class="clip-full">
                            </div>
                            <div class="w-80 rounded p-2 shadow bg-primary text-white">
                                <p class=" m-0 p-0">Hello</p>
                                <p class=" m-0 p-0">How can we help you!</p>
                                <!--<p class="mr-2 mr-m-1 mt-0 mb-0 py-0 pt-2 text-xs text-right">{{now}}</p>-->
                            </div>
                        </div>
                    </div>
                </div>

                <form method="post" class="bg-grey-lighter" @submit.prevent="send">
                    <div class="w-100 flex p-2 pt-0 md:mt-20 xs:pt-70 lg:mt-20 xs:mt-5">
                     <textarea name="message" placeholder="Enter message.." v-model="message"
                               class="border-0 rounded-l-full align-top py-2 px-3  h-10  pb-0 text-sm resize-none outline-none w-85  xs:w-80 shadow"></textarea>
                        <button id="proceed" type="submit"
                                class="btn bg-primary rounded-r-full text-white cursor-pointer text-xs align-top pr-3 mt-0 border-0 w-15 xs:w-30 shadow">
                            Send

                        </button>

                    </div>
                </form>


            </div>
            <div v-if="is_guest" v-show="show"
                 v-bind:class="{'xs:flex sm:flex':show}"
                 class="panel bg-grey-lighter m-0 text-black-dark overflow-hidden h-auto min-h-auto sm:h-100 xs:h-100  align-items-center justify-content-center">
                <div class="mt-5 pt-5 pb-5 mb-5 text-center">
                    <a class="inherit-color" href="/login"><h4 class="text-4xl my-3"><i
                            class="fas fa-sign-in-alt"></i>
                    </h4>
                        <p class="text-base">Login First To be able to chat</p></a>
                </div>
            </div>
        </div>
    </div>


    </div>
</template>

<script>
    export default {

        name: "Chat",
        props: ['is_guest', 'product'],
        data: function () {
            return {
                show: false,
                message: '',
                messages: [],

            }
        }, methods: {

            send() {
                let body = this.message;
                if (body) {
                    axios.post('/inganji/public/chat/send', {
                        affiliate_id: this.product.affiliate_id,
                        body: body
                    }).then(response => {
                        console.log(response.data)
                    }).catch(error => {
                        console.log(error.response.data);
                    });
                    this.messages.push({
                        'affiliate_id':this.product.affiliate_id,
                        'body':this.message,
                        'from_affiliate':false,
                    });
                    this.message = '';
                }
            },

            fetch() {
                axios.get('/inganji/public/chat/fetch/messages?affiliate_id=' + this.product.affiliate_id).then(response => {
                    console.log(response.data.messages);
                    this.messages = response.data.messages;
                }).catch(error => {
                    console.log(error.response.data)
                })
            }


        },
        watch: {
            show: function (value) {
                if (value) {
                    console.log('called');
                    this.fetch();
                }
            },
        }


    }
</script>

<style scoped>

</style>