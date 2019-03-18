<template>
    <div>
        <vue-editor v-model="content"></vue-editor>
        <input type="hidden" :name="field_name" v-model="content">
    </div>
</template>

<script>
    import {VueEditor} from 'vue2-editor'

    export default {

        components: {
            VueEditor
        },
        props: {
            field_name: {
                default: 'editor',
                type: String
            },
            value: {
                default: '',
                type: String
            }
        },
        data() {
            return {
                content: ''
            }
        }, mounted() {
            this.content = this.value ? this.value : '';
        }
    }
</script>
