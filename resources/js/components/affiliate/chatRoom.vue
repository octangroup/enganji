<template>
    <div class="panel panel-default p-0 w-100 mx-auto shadow-lg">
        <div class="xl:flex lg:flex">
            <div class="w-30 xs:w-100 p-3 border-2 border-solid border-primary bg-white">
                <h1 class="text-base">Chat</h1>
                <form name="search_form" method="get">
                    <div class="flex">
                        <div class="w-10 py-3 text-center">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="w-90">
                            <input name="keyword" type="text" placeholder="Search.."
                                   class="outline-none bg-grey-lighter border-none p-3 m-0  w-100">
                        </div>
                    </div>
                </form>
                <div class="py-3 mt-3">
                    <div v-for="conversation in conversations" @click="selected_conversation=conversation" class="px-2  flex py-1 border-0 border-b-1 border-solid border-grey-lighter cursor-pointer
                        hover:bg-grey-lightest">
                        <div class="w-20">
                            <div class="w-rem-12 h-12 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
                                <img src="/img/ring.webp" class="clip-full">
                            </div>
                        </div>
                        <div class="w-60 px-3 my-auto">
                            <h2 class="text-base xs:text-sm">{{conversation.user.name}}</h2>
                            <p class="text-xs" v-if="conversation.last_message">
                                {{conversation.last_message.glimpse_affiliate}}
                            </p>
                        </div>
                        <div class="w-20 text-muted">
                            <!--<span><i class="far fa-clock"></i></span>-->
                            <span class="text-xs" v-if="conversation.last_message"> {{conversation.last_message.date}}

                                 </span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="w-70 xs:w-100 h-px-500  bg-grey-lightest">
                <div v-if="chat_view_visible && selected_conversation" class="h-100 overflow-hidden px-2">
                    <div class="shadow p-3 bg-white z-99 -mx-2">
                        <h1 class="text-xl font-roboto">{{selected_conversation.user.name}}</h1>
                    </div>
                    <div id="messages-container" class="pt-4 overflow-y-scroll z-10" style="height: 70.5%">
                        <div v-for="message in messages" class="flex max-w-65 xs:max-w-90  pb-3"
                             v-bind:class="{ 'ml-auto': message.from_affiliate}">
                            <div v-if="!message.from_affiliate"
                                 class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
                                <img src="/img/bobo.jpg" class="clip-full">
                            </div>
                            <div class="w-80 rounded p-2  xs:p-1 shadow"
                                 v-bind:class="{ 'bg-primary text-white': !message.from_affiliate,'bg-white text-black': message.from_affiliate}">
                                <p class=" m-0 p-0 xs:text-sm">{{message.body}}</p>
                                <!--<p class="mr-2 mr-m-1 mt-0 mb-0 py-0 pt-2 text-xs text-right">{{message.time}}</p>-->
                            </div>
                            <div v-if="message.from_affiliate"
                                 class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
                                <!--<img :src="selected_conversation.affiliate.avatar" class="clip-full">-->
                            </div>
                        </div>
                    </div>
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
                </div>
                <div>

                </div>

            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "chatRoom",
        data(){
         return{
             conversations:[],
             chat_view_visible: false,
             selected_conversation: null,
             messages: [],
             body: '',
         }
        }, methods:{

            fetchConversations(){
            axios.get("/inganji/public/affiliate/fetch/conversations")
                .then((response) => {
                    // passing the conversation to the local variable
                    console.log(response.data.conversations);
                    this.conversations = response.data.conversations;
                    this.chat_view_visible = true;


                }).catch(function (error) {
                console.log(error.response.data);
            });
            }, fetchMessages() {
                if (this.selected_conversation) {
                    // fetching conversation messages from the server
                    axios.get("/inganji/public/affiliate/fetch/messages", {
                        params: {
                            conversation_id: this.selected_conversation.id
                        }

                    }).then((response) => {
                        // passing the messages from the request to the local variable
                        console.log(response.data);
                        this.messages = response.data.data.reverse();
                        this.chat_view_visible = true;
                        // scrolling down to the bottom of the conversation
                        // this.scrollDown();
                    }).catch((error) => {
                        console.log(error.response);
                    });
                }
            }, send() {
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
                axios.post("/inganji/public/affiliate/send/message", {
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
        }  ,mounted() {
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

<style scoped>

</style>