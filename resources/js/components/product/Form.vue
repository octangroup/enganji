<template>
    <div class="border-1 border-solid border-grey-light rounded-xlg p-4 py-5">
        <div class="row flex flex-wrap ">
            <div class="w-50 px-3 mt-3">
                <input-form title="Name:" name="name"
                            :errors="form.errors"
                            placeholder="Product Name" v-model="form.name"></input-form>
            </div>
            <div class="w-50 px-3 mt-3">
                <select-form title="Type:" name="type" :using-object="true" :elements="types"
                             :errors="form.errors"
                             :required="true"
                             v-model="form.type"></select-form>
            </div>
            <div v-if="form.service == 1" class="w-50 px-3 mt-3">
                <input-form title="Quantity:" name="quantity"
                            type="number"
                            :errors="form.errors"
                            placeholder="Product Quantity" v-model="form.quantity"></input-form>
            </div>
            <div class="w-50 px-3 mt-3">
                <select-form title="Category:" name="category" :using-object="true" :elements="categories"
                             :errors="form.errors"
                             :required="true"
                             v-model="form.category"></select-form>
            </div>
            <div v-if="subcategories.length > 0" class="w-50 px-3 mt-3">
                <select-form title="Subcategory:" name="subcategory" :using-object="true" :elements="subcategories"
                             :errors="form.errors"
                             v-model="form.subcategory"></select-form>
            </div>
            <div v-if="form.type == 1" class="w-50 px-3 mt-3">
                <select-form title="Brand:" name="brand" :using-object="true" :elements="brands"
                             :errors="form.errors"
                             v-model="form.brand"></select-form>
            </div>
            <div v-if="form.type == 1" class="w-50 px-3 mt-3">
                <select-form title="Condition:" name="condition" :using-object="true" :elements="conditions"
                             :errors="form.errors"
                             v-model="form.condition"></select-form>
            </div>
            <div v-if="form.type == 1" class="w-50 px-3 mt-3">
                <select-form title="Currencies:" name="currency" :using-object="true" :elements="currencies"
                             :errors="form.errors"
                             v-model="form.currency"></select-form>
            </div>
            <div v-if="form.type == 1" class="w-50 px-3 mt-3">
                <input-form title="Price:" name="price"
                            type="number"
                            :errors="form.errors"
                            placeholder="Product Price" v-model="form.price"></input-form>
            </div>
            <div v-if="form.type == 1" class="w-50 px-3 mt-3">
                <input-form title="Color:" name="color"
                            :errors="form.errors"
                            placeholder="Color" v-model="form.color"></input-form>
            </div>
            <div v-if="form.type == 1" class="w-50 px-3 mt-3">
                <input-form title="Size:" name="size"
                            :errors="form.errors"
                            placeholder="Product Size" v-model="form.size"></input-form>
            </div>
        </div>
        <div class="w-100 px-3 my-3">
            <text-editor title="Description:" name="description"
                         :errors="form.errors" v-model="form.description"></text-editor>
        </div>
        <button class="btn btn-success mt-3 mx-3 rounded-lg">Save</button>
    </div>
</template>

<script>
    import InputForm from "../ui/inputs/InputForm";
    import Form from "../../utilities/Form";
    import SelectForm from "../ui/inputs/SelectForm";

    export default {
        name: "ProductForm",
        components: {SelectForm, InputForm},
        props: ['categories', 'brands', 'conditions', 'currencies'],
        data() {
            return {
                form: new Form({
                    name: '',
                    quantity: 1,
                    category: '',
                    subcategory: '',
                    brand: '',
                    currency: '',
                    color: '',
                    price: '',
                    size: '',
                    description: '',
                    type: 1,
                }),
                types: [{
                    id: 1,
                    name: 'Product'
                }, {
                    id: 2,
                    name: 'Service'
                }]
            }
        }, methods: {
            findCategory(id) {
                let categories = this.categories.filter(function (category) {
                    if (category.id == id) return category;
                });
                if (categories.length > 0) {
                    return categories[0]
                }
                return {}
            }
        }, computed: {
            subcategories: function () {
                if (this.form.category && this.findCategory(this.form.category)) {
                    return this.findCategory(this.form.category).subcategories
                }
                return []
            }
        }
    }
</script>

<style scoped>

</style>
