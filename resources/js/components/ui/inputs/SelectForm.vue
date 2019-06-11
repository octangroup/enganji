<template>
    <div class="w-100 mt-2" v-bind:class="cssClass">
        <label class="text-sm font-secondary font-medium text-purple-darkest">{{title}}</label>
        <select ref="selectInput" class="form-input transition-500ms focus:shadow"
                v-bind:class="{'border-red':(errors && errors.has(name)),'focus:border-accent':!(errors && errors.has(name))}"
                v-model="inputVal"
                :name="name" :required="required">
            <option value="" disabled selected>Select</option>
            <option v-if="usingRange" v-for="i in range" :value="i">{{i}}</option>
            <option v-if="usingObject" v-for="element in elements" :value="element.id">{{element.name}}</option>
        </select>
        <span v-if="errors && errors.has(name)" class="text-danger my-1 text-xs" v-text="errors.get(name)"></span>
    </div>
</template>

<script>
    export default {
        name: "select-form",
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
            }, usingObject: {
                type: Boolean,
                default: false
            }, usingRange: {
                type: Boolean,
                default: false
            }, range: {
                type: Number,
                default: 2
            }, elements: {
                type: Array,
                default: function () {
                    return []
                }
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
