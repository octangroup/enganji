<template>
    <div class="w-40 xs:w-100 p-3  bg-primary xs:rounded-lg border-1 border-solid border-grey-light mx-auto  rounded-l-xlg">
        <form>
            <div class="text-white mx-3">
                <h1 class="text-xl">Chat</h1>
            </div>
            <div class="w-90 mx-2 mt-4">
                <input name="search" type="text" placeholder=" Search.." v-model="search"
                       class="outline-none rounded-xlg bg-white px-2 border-none p-1 m-0  w-100">
            </div>
            <!--<search-form></search-form>-->
        </form>

        <div class="py-3 mt-3">
            <conversation v-for="conversation in  filterConversations"
                          v-on:select_conversation="selectConversation(conversation)" :conversation="conversation"
                          :key="conversation.id"/>
            <div class="flex my-3">
                <div class="w-20">

                    <div class="  "><img src="/img/arsy.jpg" class="w-rem-12 h-12 rounded-full"></div>
                </div>

                <div class="w-80  text-white xs:px-2 sm:px-2 md:px-2 text-primary">
                    <h6 class="inline-block  text-lg  my-0">Karema Arsene</h6>
                    <p class="my-1 text-xs text-grey ">hello, how are you doing arsy?
                        how is your day!</p>
                </div>
            </div>

            <div class="flex mt-5">
                <div class="w-20">
                    <div class="  "><img src="/img/lewis.jpg" class="w-rem-12 h-12 rounded-full"></div>
                </div>

                <div class="w-80 text-white xs:px-2 sm:px-2 md:px-2 text-primary">
                    <h6 class="inline-block  text-lg  my-0">Nkuranga Lewis</h6>
                    <p class="my-1 text-xs text-grey ">hello, how are you doing arsy?
                        how is your day!</p>
                </div>
            </div>

            <div class="flex mt-5">
                <div class="w-20">
                    <div class="  "><img src="/img/yannick.jpg" class="w-rem-12 h-12 rounded-full"></div>
                </div>

                <div class="w-80 text-white xs:px-2 md:px-2 sm:px-2  text-primary">
                    <h6 class="inline-block  text-lg  my-0">Musafiri Yannick</h6>
                    <p class="my-1 text-xs text-grey ">hello, how are you doing arsy?
                        how is your day!</p>
                </div>
            </div>




        </div>
    </div>
</template>

<script>
    import MessagePanel from "../message-panel/index";
    import Conversation from "./conversation";
    import SearchForm from "../../searchForm";

    export default {
        name: "conversation-panel",
        components: {SearchForm, Conversation, MessagePanel},
        props: {
            is_affiliate: Boolean,
            fetch_conversation_url: {
                type: String,
                default: "/conversation/fetch"
            }
        },
        data() {
            return {
                conversations: [],
                messages: [],
                body: "",
                search:'',
                selected_conversation: null,
            }
        }, methods: {
            fetchConversations() {
                axios.get(this.fetch_conversation_url)
                    .then((response) => {
                        console.log(response.data.conversations);
                        this.conversations = response.data.conversations;
                    }).catch((error) => {
                    console.log(error.response);
                })
            }, selectConversation(conversation) {
                this.$parent.$emit("selected_conversation", conversation);
            }
        }, mounted() {
            this.fetchConversations();

        },computed:{
          filterConversations:function(){
              return this.conversations.filter((conversation)=>{
                  return conversation.user.name.match(this.search);
              });
          }
        },

    }
</script>

<style scoped>

</style>