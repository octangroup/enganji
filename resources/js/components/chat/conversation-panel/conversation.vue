<template>
    <div @click="$emit('select_conversation')" class="px-2  flex py-1 cursor-pointer text-white">
        <div class="w-20">
            <div class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden border-solid border-1">

            </div>
        </div>

        <div class="w-60 px-3 my-auto">
            <h2 class="text-base xs:text-sm">{{conversation.user.name}}</h2>
        </div>
    </div>
</template>

<script>
    export default {
        name: "conversation",
        props:{conversation:Object},
    }
</script>

<style scoped>

</style>
