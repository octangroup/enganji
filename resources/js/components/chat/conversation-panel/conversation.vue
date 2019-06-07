<template>
    <div @click="$emit('select_conversation')" class="px-2  flex py-1 border-0 border-b-1 border-solid border-grey-lighter cursor-pointer
                        hover:bg-grey-lightest">
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