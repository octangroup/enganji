<template>
    <div class="w-80 md:w-100 sm:w-100 xs:w-100 mx-auto">
        <div class="flex xl:h-px-500 xs:h-px-0 xs:block">
            <conversation-panel></conversation-panel>
            <message-panel></message-panel>



        </div>
    </div>
</template>

<script>
    import ConversationPanel from "./conversation-panel/index";
    import MessagePanel from "./message-panel/index";
    export default {
        name: "chat-window",
        components: {MessagePanel, ConversationPanel}
    }
</script>

<style scoped>

</style>
