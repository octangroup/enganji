<template>

</template>

<script>
    export default {

        name: "user-chat-room",
        data() {
            return {
                conversations: [],
                messages: [],
                body: '',
                selected_conversation:null,
            }
        },
        methods: {
            fetchConversations() {
                axios.get("/conversation/fetch")
                    .then((response) => {
                        console.log(response.data.conversations);
                        this.conversations = response.data.conversations;

                    }).catch(function (error) {
                    console.log(error.response.data);
                })
            }, fetchMessages() {
                if (this.selected_conversation) {
                    // fetching conversation messages from the server
                    axios.get("/chat/fetch/messages", {
                        params: {
                            conversation_id: this.selected_conversation.id
                        }

                    }).then((response) => {
                        // passing the messages from the request to the local variable
                        console.log(response.data);
                        this.messages = response.data.data.reverse();
                        // this.chat_view_visible = true;
                        // scrolling down to the bottom of the conversation
                        // this.scrollDown();
                    }).catch((error) => {
                        console.log(error.response);
                    });
                }
            },send() {
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
                });
                // scroll down below the message added to the list
                // this.scrollDown();

                // initiate the axios request to the server
                axios.post("/chat/send", {
                    conversation_id: this.selected_conversation.id,
                    body: body
                }).then((response) => {
                    console.log(response);
                    //refresh conversation list and update glimpse messages
                    this.fetchConversations();
                }).catch((error) => {
                    console.log(error.response.data);
                });
            },
        }, mounted() {
            this.fetchConversations();
        },watch: {
            selected_conversation: function (val, old) {
                if (val != old) {
                    this.fetchMessages();
                }
            }
        }
    }
</script>