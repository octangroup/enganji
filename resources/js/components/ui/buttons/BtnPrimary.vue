<template>
    <base-button :submit="submit" btn-class="btn-primary">
        <slot></slot>
    </base-button>
</template>

<script>
    import BaseButton from "./Base";
    export default {
        name: "btn-primary",
        components: {BaseButton},
        props:{
            submit:{
                type: Boolean,
                default: false,
            },
        }
    }
</script>

<style scoped>

</style>
