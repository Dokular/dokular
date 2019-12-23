<template>
    <div>
        <div class="top-campaign" v-if="carts.length">
            <h3 class="title-3 m-b-30">Add to cart</h3>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <tbody>
                        <tr v-for="(cart, index) in carts" :key="index">
                            <td>{{ cart.owner }}</td>
                            <td>{{ cart.make}}</td>
                            <td>
                                <p v-for="(product, index) in cart.products" :key="index">
                                {{ product.name }} - {{ product.price }}
                                </p>
                            </td>
                            <td>total: {{ cart.total }} </td>
                            <td><span @click="removeCart(cart)" class="delspan">X</span></td>
                        </tr>
                        <tr>
                           <td colspan="5">
                               Total: N{{ total }}
                           </td>
                       </tr>
                       <tr>
                           <td colspan="5">
                               <b-button size="sm" variant="success">
                                    Checkout
                                </b-button>
                           </td>
                       </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    computed: {
        ...mapGetters(["carts", "total"]),
    },

    methods: {
        ...mapActions(["removeFromCarts"]),

        removeCart(cart){
            this.removeFromCarts(cart)
        }
    },
}
</script>
<style scoped>
.delspan{
    cursor: pointer;
}
</style>
