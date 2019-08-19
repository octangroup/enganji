<template>
    <div class="w-60 xs:w-100 mx-auto  rounded-r-lg border-1 border-solid border-grey-light  bg-grey-lightest">
        <div v-if="conversation" class="h-100 overflow-hidden px-2">
            <div class="shadow p-3 bg-white z-99 -mx-2">
                <h1 class="text-xl font-roboto">{{conversation.user.name}}</h1>
            </div>
            <div id="messages-container" class="pt-4 overflow-y-scroll z-10" style="height: 70.5%">
                <message v-for="(message, index) in messages" :key="index" :message="message"></message>
            </div>
            <chat-form :conversation="conversation" v-on:message_append="appendMessage($event)"></chat-form>
        </div>
        <div class="mb-5">
            <div class="mt-5 px-4 ">
                <div class=" text-left "><img src="/img/lewis.jpg" class="w-rem-12 h-12 rounded-full"></div>
                <div class=" -mt-2 ml-5 xs:w-85 w-60 sm:w-80">
                    <div
                        class="bg-primary my-0 text-white border-1 border-solid border-grey rounded-r-xlg rounded-bl-xlg">
                        <p class="text-xs w-90 mx-3 xs:mx-2">Please be polite. We appreciat.
                            Your email address will not be d
                            and required fields are marked</p>
                    </div>
                </div>
            </div>
            <div class="mr-0 px-4 xs:mt-3 sm:mt-2">
                <div class="text-right"><img src="/img/arsy.jpg" class="w-rem-12 h-12 rounded-full"></div>
                <div class="ml-32 xs:mr-4 md:ml-2 sm:ml-0 -mt-2 mx-5 md:mx-5 xs:mx-2 xs:mt-1 ">
                    <div
                        class="bg-white text-black  border-1 border-solid border-grey text-right rounded-l-xlg rounded-br-xlg ">

                        <p class="text-xs text-left w-90 mx-3 xs:mx-2">Please be polite. We appreciat.

                            Your email address will not be d
                            and required fields are marked</p>
                    </div>

                </div>
            </div>

            <div class="mt-5 px-4 ">
                <div class=" text-left "><img src="/img/lewis.jpg" class="w-rem-12 h-12 rounded-full"></div>
                <div class=" -mt-2 ml-5 xs:w-85 w-60 sm:w-80">
                    <div
                        class="bg-primary my-0 text-white border-1 border-solid border-grey rounded-r-xlg rounded-bl-xlg">
                        <p class="text-xs w-90 mx-3 xs:mx-2">Please be polite. We appreciat.
                            Your email address will not be d
                            and required fields are marked</p>
                    </div>
                </div>
            </div>
            <div class="mr-0 px-4 xs:mt-3 sm:mt-2">
                <div class="text-right"><img src="/img/arsy.jpg" class="w-rem-12 h-12 rounded-full"></div>
                <div class="ml-32 xs:mr-4 md:ml-2 sm:ml-0 -mt-2 mx-5 md:mx-5 xs:mx-2 xs:mt-1 ">
                    <div
                        class="bg-white text-black  border-1 border-solid border-grey text-right rounded-l-xlg rounded-br-xlg ">

                        <p class="text-xs text-left w-90 mx-3 xs:mx-2">Please be polite. We appreciat.

                            Your email address will not be d
                            and required fields are marked</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="w-100 flex p-2 pt-0 ">

            <textarea name="message" placeholder="Enter message.."
                      class="border-0 rounded-l-full align-top py-2 px-3  h-10  pb-0 text-sm resize-none outline-none w-85  xs:w-80 shadow"></textarea>

            <button type="submit"
                    class="btn bg-primary rounded-r-full text-white cursor-pointer text-xs align-top pr-3 mt-0 border-0 w-15 xs:w-30 shadow">
                Send
            </button>
        </div>


    </div>
</template>

<script>
    import Message from "./message";
    import ChatForm from "../form";

    export default {
        name: "message-panel",
        components: {ChatForm, Message},
        data() {
            return {
                messages: [],
                conversation: '',
            }
        },
        methods: {
            fetchMessages() {
                axios.get("/chat/fetch/messages", {
                    params: {
                        conversation_id: this.conversation.id
                    }

                })
                    .then((response) => {
                        console.log(response.data.messages);
                        this.messages = response.data.messages;
                    }).catch((error) => {
                    console.log(error.response);
                })
            }, appendMessage(message) {
                this.messages.push(message);
            }
        }, watch: {
            conversation: function (val, old) {
                if (val != old) {
                    this.fetchMessages();
                }
            }
        }, mounted() {
            this.$parent.$on('selected_conversation', (conversation) => {
                this.conversation = conversation;
            });
        }


    }
</script>

<style scoped>

</style>
