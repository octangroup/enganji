<template>
    <div class="w-100" v-bind:class="cssClass">
        <label class="text-sm font-secondary font-medium text-purple-darkest">{{title}}</label>
        <input ref="input" v-model="inputVal" :type="type" :placeholder="placeholder ? placeholder : title"
               v-bind:class="{'border-red':(errors && errors.has(name)),'focus:border-accent':!(errors && errors.has(name))}"
               class="form-input transition-500ms focus:shadow" :name="name" :required="required">
        <span v-if="errors && errors.has(name)" class="text-danger my-1 text-xs" v-text="errors.get(name)"></span>
    </div>
</template>

<script>
    export default {
        name: "InputForm",
        props: {
            title: {
                type: String,
                default: 'Title'
            },
            type: {
                type: String,
                default: 'text'
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
        }, data() {
            return {inputVal: this.value}
        }, watch: {
            inputVal(val) {
                this.$emit('input', val);
            }, value(val) {
                this.inputVal = val
            }
        }
    }
</script>

<style scoped>
    .form-input {
        display: block;
        width: 100%;
        height: calc(1.5em + 1.25rem + 2px);
        padding: .625rem .75rem;
        font-weight: 400;
        line-height: 1.5;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        -webkit-box-shadow: 0 3px 2px rgba(233, 236, 239, .05);
        box-shadow: 0 3px 2px rgba(233, 236, 239, .05);
        font-size: .875rem;
        -webkit-transition: all .15s ease-in-out;
        transition: all .15s ease-in-out;
    }

    .form-input::placeholder {
        color: #8898aa;
    }
</style>
