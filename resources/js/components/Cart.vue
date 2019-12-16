<template>
    <div>
        <div class="top-campaign" v-if="carts.length">
            <h3 class="title-3 m-b-30">Add to cart</h3>
            <div class="table-responsive">
                <table class="table table-top-campaign">
                    <tbody>
                        <tr v-for="(cart, index) in carts" :key="index">
                            <td>{{ cart.product_id }}</td>
                            <td>{{ cart.id_number}}</td>
                            <td>{{ cart.type }}</td>
                            <td>N {{ cart.price }}</td>
                            <td><span @click="removeCart(cart)" class="delspan">X</span></td>
                        <!-- </tr>
                        <tr>
                            <td></td>
                            <td>Delivery</td>
                            <td>N 1000</td>
                        </tr> -->
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
