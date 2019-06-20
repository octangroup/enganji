<template>
    <div class="w-80 xs:w-100 mx-auto">
        <div class="flex xs:block">
            <conversation-panel></conversation-panel>
            <message-panel ></message-panel>



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