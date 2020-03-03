<template>
<b-modal
  size="xl"
  ref="cart"
  v-model="show"
  @hidden="closed"
  hide-footer
>
  <div class="container" v-if="carts.length">
   <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Vehicle</th>
        <th scope="col-2">Renew</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr  v-for="(cart, index) in carts" :key="index">
        <th scope="row">{{ index + 1}}</th>
        <td>{{ cart.owner }}</td>
        <td>{{ cart.make }}</td>
        <td>
            <tr v-for="(product, index) in cart.products" :key="index">
                <td>{{ product.name }} </td>
                <td>N{{ product.price }}</td>
            </tr>
        </td>
        <td>
            <font-awesome-icon
                icon="trash-alt"
                class="delspan"
            />
        </td>
        </tr>
    </tbody>
    </table>
    <!-- <b-card title="My card">
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
        </b-card-text> -->
        <p>Total: N{{ total }}</p>
        <b-button to="/checkout" variant="primary">Checkout</b-button>
    </b-card>
  </div>
  <div class="container" v-else>
    <div class="row">
        <div class="col center">
            <h1>Empty cart</h1>
        </div>
    </div>
  </div>
</b-modal>
</template>
<script>
import {mapGetters, mapActions, mapMutations} from 'vuex'
export default {
    data(){
        return {
            show: false
        }
    },

    watch:{
        showCart: function(newVal){
            this.show = newVal
        }
    },
    computed: {
        ...mapGetters(["carts", "total", "showCart"])
    },

    methods: {
        ...mapActions(["removeFromCarts"]),
        ...mapMutations(["OPEN_CART"]),

        removeCart(cart){
            this.removeFromCarts(cart)
        },

        closed(){
            this.OPEN_CART(false)
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
