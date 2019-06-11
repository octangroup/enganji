<template>
    <div class="w-100" v-bind:class="cssClass">
        <label class="text-sm font-secondary font-medium text-purple-darkest">{{title}}</label>
        <vue-editor v-model="content"></vue-editor>
        <input type="hidden" :name="name" v-model="content">
        <span v-if="errors && errors.has(name)" class="text-danger my-1 text-xs" v-text="errors.get(name)"></span>
    </div>
</template>

<script>
    import {VueEditor} from 'vue2-editor'

    export default {
        name: 'TextEditor',
        components: {
            VueEditor
        },
        props: {
            title: {
                type: String,
                default: 'Title'
            },
            name: {
                type: String,
                default: 'field'
            },
            required: {
                type: Boolean,
                default: false
            },
            cssClass: {
                type: String,
                default: ''
            }, placeholder: {
                type: String,
                default: null
            }, value: [String, Number],
            errors: Object
        }
        , data() {
            return {content: this.value}
        }, watch: {
            content(val) {
                this.$emit('input', val);
            }, value(val) {
                this.content = val
            }
        }
    }
</script>
