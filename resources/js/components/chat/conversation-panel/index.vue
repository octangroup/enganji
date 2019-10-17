<template>
    <div
        class="w-40 xs:w-100 p-3  bg-primary xs:rounded-lg border-1 border-solid border-grey-light mx-auto  rounded-l-xlg">
        <form>
            <div class="text-white mx-3">
                <h1 class="text-xl font-primary text-primary">Chat</h1>
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
                search: '',
                selected_conversation: null,
            }
        }, methods: {
            fetchConversations() {
                axios.get('/conversation/fetch').then(response => {
                    console.log(response.data);
                    this.conversations = response.data.conversations;
                }).catch(function (error) {
                    console.log(error.response.data);
                })
            },
            fetcheConversations() {
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

        }, computed: {
            filterConversations: function () {
                return this.conversations.filter((conversation) => {
                    return conversation.user.name.match(this.search);
                });
            }
        },

    }
</script>

<style scoped>

</style>
