<template>
  <div class="container" v-if="carts.length">
    <b-card title="My card">
        <b-card-text v-for="(cart, index) in carts" :key="index">
            <b-container class="bv-example-row">
                <b-row>
                    <b-col cols="1">
                        <font-awesome-icon
                          icon="trash-alt"
                          @click="removeCart(cart)"
                          class="delspan"
                        />
                    </b-col>
                    <b-col cols="4">
                        {{ cart.make }}
                        <br/>
                        {{ cart.owner }}
                    </b-col>
                    <b-col cols="7">
                        <span v-for="(product, index) in cart.products" :key="index">
                            {{ product.name }} - {{ product.price }}
                            <br/>
                        </span>
                    </b-col>
                </b-row>
            </b-container>
            <hr/>
        </b-card-text>
        <p>Total: N{{ total }}</p>
        <b-button to="/checkout" variant="primary">Checkout</b-button>
    </b-card>
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

.container{
 margin-top: 20px;
}

.btn a{
    color: #ffffff;
    text-decoration: none;
    background-color: transparent;
}

</style>
