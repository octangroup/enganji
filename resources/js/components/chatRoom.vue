<template>
<div class="panel panel-default p-0 w-100 mx-auto shadow-lg">
    <form>
    <div class="flex">
        <div class="w-30 xs:w-100 p-3 border-2 border-solid border-primary bg-white">
            <h1 class="text-base">Chatter</h1>
        </div>

        <div class="w-90">
            <input name="keyword" type="text" placeholder="Search.."
                   class="outline-none bg-grey-lighter border-none p-3 m-0  w-100">
        </div>
    </div>
    </form>

    <div class="py-3 mt-3">
        <div v-for="conversation in conversations" class="px-2  flex py-1 border-0 border-b-1 border-solid border-grey-lighter cursor-pointer
                        hover:bg-grey-lightest">
            <div class="w-60 px-3 my-auto">
                <h2 class="text-base xs:text-sm">{{conversation.user.name}}</h2>
                <!--<p class="text-xs" v-if="conversation.last_message">-->
                    <!--{{conversation.last_message.glimpse_affiliate}}-->
                <!--</p>-->
            </div>
        </div>
    </div>


</div>
</template>

<script>
    export default {

        name:"user-chat-room",
        data(){
            return{
                conversations:[],
                messages:[],
            }
        },
        methods:{
            fetchConversations(){
                axios.get("/inganji/public/conversation/fetch")
                    .then((response)=>{
                        console.log(response.data.conversations);
                        this.conversations = response.data.conversations;
                }).catch(function (error){

                })
            }
        }
    }
</script>