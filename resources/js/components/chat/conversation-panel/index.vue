<template>
    <div class="w-30 xs:w-100 p-3 border-2 border-solid border-primary bg-white">
        <form>


            <div class="w-30 xs:w-100 p-3 border-2 border-solid border-primary bg-white">
                <h1 class="text-base">Chat</h1>
            </div>

            <div class="w-90">
                <input name="keyword" type="text" placeholder="Search.."
                       class="outline-none bg-grey-lighter border-none p-3 m-0  w-100">
            </div>

        </form>

        <div class="py-3 mt-3">
            <conversation v-for="conversation in conversations"  v-on:select_conversation="selectConversation(conversation)" :conversation="conversation" :key="conversation.id"/>
        </div>
    </div>
</template>

<script>
    import MessagePanel from "../message-panel/index";
    import Conversation from "./conversation";

    export default {
        name: "conversation-panel",
        components: {Conversation, MessagePanel},
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
            },selectConversation(conversation){
                this.$parent.$emit("selected_conversation",conversation);
            }
        }, mounted() {
            this.fetchConversations();

        }

    }
</script>

<style scoped>

</style>