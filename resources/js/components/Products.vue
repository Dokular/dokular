<template>
    <div>
        <Cart />
        <!-- <ProductItem></ProductItem> -->
        <Items />
    </div>
</template>
<script>
import ProductItem from './ProductItem'
import Items from './Items'
import Cart from './Cart'

export default {
    components:{
        ProductItem,
        Cart,
        Items
    },
    data() {
        return {
        }
    },
}
</script>
