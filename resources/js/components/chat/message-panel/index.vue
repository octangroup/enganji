<template>
    <div class="w-70 xs:w-100 h-px-500  bg-grey-lightest">
        <div v-if="conversation" class="h-100 overflow-hidden px-2">
            <div class="shadow p-3 bg-white z-99 -mx-2">
                <h1 class="text-xl font-roboto">{{conversation.user.name}}</h1>
            </div>
            <div id="messages-container" class="pt-4 overflow-y-scroll z-10" style="height: 70.5%">
                <message  v-for="message in messages" :message="message"></message>
            </div>
            <chat-form :conversation="conversation" v-on:message_append="appendMessage($event)"></chat-form>
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
                messages:[],
                conversation: '',
            }
        },
        methods:{
            fetchMessages(){
                axios.get("/chat/fetch/messages", {
                    params: {
                        conversation_id: this.conversation.id
                    }

                })
                    .then((response)=>{
                    console.log(response.data.messages);
                    this.messages=response.data.messages;
                }).catch((error)=>{
                    console.log(error.response);
                })
            },appendMessage(message){
                this.messages.push(message);
            }
        },watch: {
            conversation: function (val, old) {
                if (val != old) {
                    this.fetchMessages();
                }
            }
        },mounted(){
            this.$parent.$on('selected_conversation',(conversation)=>{
                this.conversation=conversation;
            });
        }


    }
</script>

<style scoped>

</style>