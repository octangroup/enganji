<template>
    <div class=" p-0 h-auto min-h-auto w-100 flex bg-white border-1 border-solid border-grey-light rounded-full overflow-hidden px-2 py-1 xs:py-0 xs:px-0">
                        <textarea name="message" placeholder="Enter a message.."
                                  v-on:keyup.enter="send"
                                  class="border-0  pl-4 pr-3 pt-2  pb-0 text-sm resize-none  w-90 xs:w-75 focus:outline-none "
                                  v-model="body"
                        >
                        </textarea>
        <button type="submit"
                @click="send"
                class="btn text-white cursor-pointer rounded-full bg-primary text-xs align-top pr-3 mt-0 border-0  focus:outline-none w-10 xs:w-25"
        >
            Send <i class="fi flaticon-paper-plane text-xl"></i>
        </button>
    </div>
</template>

<script>
    export default {
        name: "chat-form",
        data(){
            return {
                body: "",

            }
        },
        methods:{
            send() {
                //checking if the message is not empty
                if (_.isEmpty(_.trim(this.body))) {
                    //if empty stop the send process
                    return;
                }
                let body = this.body;
                // clean the message box
                this.body = '';

                // adding thr message to be sent to the list of messages to be shown in the message list
                this.messages.push({
                    'body': body,
                    'from_affiliate': 1,
                    // 'sent_date': moment().format('YYYY-MM-DD'),
                    // 'day': 'Today',
                    // 'time': moment().format('LT'),
                });
                // scroll down below the message added to the list
                // this.scrollDown();

                // initiate the axios request to the server
                axios.post("/affiliate/send/message", {
                    conversation_id: this.conversation.id,
                    body: body
                }).then((response) => {
                    console.log(response);
                    //refresh conversation list and update glimpse messages
                    this.fetchConversations();
                }).catch((error) => {
                    console.log(error.response.data);
                });
            }
        }
    }
</script>

<style scoped>

</style>