<template>
    <div class="flex max-w-65 xs:max-w-90  pb-3"
         v-bind:class="{ 'ml-auto': message.from_affiliate}">
        <div v-if="!message.from_affiliate"
             class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
        </div>
        <div class="w-80 rounded p-2  xs:p-1 shadow"
             v-bind:class="{ 'bg-primary text-white': !message.from_affiliate,'bg-white text-black': message.from_affiliate}">
            <p class=" m-0 p-0 xs:text-sm">{{message.body}}</p>
        </div>
        <div v-if="message.from_affiliate"
             class="w-rem-10 h-10 w-rem-l-12 h-l-12 rounded-full mx-auto relative overflow-hidden">
            <!--<img :src="conversation.affiliate.avatar" class="clip-full">-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "message",
        props:{message:Object},
    }
</script>

<style scoped>

</style>