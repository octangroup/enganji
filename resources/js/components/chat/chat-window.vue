<template>
    <div class="panel panel-default p-0 w-100 mx-auto shadow-lg">
        <div class="flex">
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