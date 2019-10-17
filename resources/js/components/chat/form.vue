<template>
    <div class="w-100 flex p-2 pt-0 ">

              <textarea name="message" placeholder="Enter a message.."
                        v-on:keyup.enter="send"
                        class="border-0  pl-4 pr-3 pt-2  pb-0 text-sm resize-none  w-90 xs:w-75 focus:outline-none "
                        v-model="body"
              >
                        </textarea>

        <button type="submit"
                @click="send()"
                class="btn bg-primary rounded-r-full text-white cursor-pointer text-xs align-top pr-3 mt-0 border-0 w-15 xs:w-30 shadow">
            Send
        </button>
    </div>

</template>

<script>
    export default {
        name: "chat-form",
        props: {
            isAffiliate: {
                default: false,
                type: Boolean
            }, send_message_url: {
                type: String,
                default: "/chat/send"
            }, conversation: Object,
        },
        data() {
            return {
                body: "",

            }
        },
        methods: {
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
                this.$emit('message_append', {

                    'body': body,
                    'from_affiliate': this.isAffiliate ? 0 : 1,
                    // 'sent_date': moment().format('YYYY-MM-DD'),
                    // 'day': 'Today',
                    // 'time': moment().format('LT'),
                });


                // initiate the axios request to the server
                axios.post(this.send_message_url, {
                    affiliate_id: this.conversation.affiliate_id,
                    body: body
                }).then((response) => {
                    console.log(response);
                    // //refresh conversation list and update glimpse messages
                    // this.fetchConversations();
                }).catch((error) => {
                    console.log(error.response.data);
                });
            }
        }
    }
</script>

<style scoped>

</style>
