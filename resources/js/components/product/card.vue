<template>
    <div class="w-20  mr-3 p-3 border-1 border-grey-light border-solid rounded-xlg inline-block">
        <div class="py-1 pt-0 z-50 relative bg-white  px-2  w-100 mx-auto">
            <h4 class="text-lg font-primary font-semibold sm:text-base md:text-base lg:text-xl xs:text-base m-0 p-0 whitespace-no-wrap overflow-hidden">
                {{product.name}}</h4>
            <div class="w-100 flex my-1 text-sm">
                <div class="w-50 pt-1 text-accent">
                    <i class="fi flaticon-star-4"></i>
                    <i class="fi flaticon-star-4"></i>
                    <i class="fi flaticon-star-4"></i>
                    <i class="fi flaticon-star"></i>
                    <i class="fi flaticon-star"></i>
                </div>
                <div class="text-right w-50">
                    <p class="text-lg font-primary font-medium text-accent md:text-sm lg:text-base my-0">
                        {{product.currency.name}} {{product.price}}</p>
                </div>
            </div>


        </div>
        <div class=" w-100 py-1 relative z-50 bg-white text-left">
            <a :href="'/itm/view/'+product.id+'/'+product.stripped_name">
                <img class="w-100" :src="product.thumbnail">
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "product-card",
        props: ['product']
    }
</script>

<style scoped>

</style>
