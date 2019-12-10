<template>
    <div>
        <Cart />
        <ProductItem></ProductItem>
    </div>
</template>
<script>
import ProductItem from './ProductItem'
import Cart from './Cart'

export default {
    components:{
        ProductItem,
        Cart
    },
    data() {
        return {
        }
    },
}
</script>
