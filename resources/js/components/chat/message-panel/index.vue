<template>
    <div class="w-60 xs:w-100 mx-auto  rounded-r-lg border-1 border-solid border-grey-light  bg-grey-lightest">
        <div v-if="conversation" class="h-100 overflow-hidden px-2">
            <div class="shadow p-3 bg-white z-99 -mx-2">
                <h1 class="text-xl font-roboto">{{conversation.affiliate.name}}</h1>
            </div>
            <div id="messages-container" class="pt-4 overflow-y-scroll z-10" style="height: 70.5%">
<!--                <message v-for="(message, index) in messages" :key="index" :message="message"></message>-->
                <div v-for="message in messages">
                    <div class=" max-w-65 xs:max-w-90  pb-3"
                         v-bind:class="{ 'ml-auto': message.from_affiliate}">
                        <div v-if="!message.from_affiliate"
                             class="w-rem-10 h-10 w-rem-l-12 h-l-12 mx-3 rounded-full  relative overflow-hidden">
                        </div>
                        <div class="w-80 py-3 xs:p-1 mx-3 mx-auto rounded-br-xxl rounded-tr-xxl rounded-bl-xxl shadow "
                             v-bind:class="{ 'bg-primary text-white': !message.from_affiliate,'bg-white text-black': message.from_affiliate}">
                            <p class=" m-0 p-0 xs:text-sm mx-3">{{message.body}}</p>
                        </div>
                        <div v-if="message.from_affiliate"
                             class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
                            <!--<img :src="conversation.affiliate.avatar" class="clip-full">-->
                            
                        </div>
                    </div>
                </div>
            </div>
            <chat-form :conversation="conversation"  v-on:message_append="appendMessage($event)"></chat-form>
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
                        affiliate_id: this.conversation.affiliate.id
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
