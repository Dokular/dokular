<template>
    <div>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{ carts.length }}</span>
        </h4>
        <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed"
            v-for="(cart, index) in carts" :key="index">
            <div v-for="(product, index) in cart.products" :key="index">
                <h6 class="my-0">{{ product.name }}</h6>
            </div>
            <br/>
            <small class="text-muted">Brief description</small>
            <span class="text-muted">N{{ cart.total }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (NGN)</span>
            <strong>N{{ total }}</strong>
        </li>
        </ul>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'

export default {

    computed: {
        ...mapGetters(["carts", "total"]),
    },
}
</script>
