<template>
    <button :type="submit ? 'submit':'button'" class="btn rounded" :class="[btnClass]">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        name: "base-button",
        props:{
            submit:{
                type: Boolean,
                default: false,
            },
            btnClass:{
                type: String,
                default: '',
            }
        }
    }
</script>

<style scoped>

</style>
