<template>
    <div class="w-90">
        <input name="keyword" type="text" placeholder="Search.." v-model="search"
               class="outline-none bg-grey-lighter border-none p-3 m-0  w-100">
    </div>
</template>

<script>
    export default {
        name: "searchForm",
        data() {
            return {
                 search:'',
            }
        },methods:{
            searchConversations(){
                this.emit('conversation',{
                    'keyword': keyword,
                });
                axios.get('/conversation/search')
                    .then((response)=>{
                        console.log(response.data.conversation);

                    }).catch((error)=>{
                    console.log(error.response)
                })
            },
        }, computed(){

        },
    }
</script>

<style scoped>

</style>