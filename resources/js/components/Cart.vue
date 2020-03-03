<template>
<b-modal
  title="My cart"
  size="xl"
  ref="cart"
  v-model="show"
  @hidden="closed"
  @ok="checkout"
  ok-title="Checkout"
  ok-only
>
  <div class="container table-responsive-xl" v-if="carts.length">
   <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Vehicle</th>
        <th scope="col">Renew</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr  v-for="(cart, index) in carts" :key="index">
            <th scope="row">{{ index + 1}}</th>
            <td>{{ cart.owner }}</td>
            <td>{{ cart.make }}</td>
            <td >
                <tr v-for="(product, index) in cart.products" :key="index">
                    <td>{{ product.name }} </td>
                    <td>N{{ product.price }}</td>
                </tr>
            </td>
             <td>
                <font-awesome-icon
                    icon="trash-alt"
                    @click="removeCart(cart)"
                    class="delspan"
                />
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <p>Total: N{{ total }}</p>
            </td>
        </tr>
    </tbody>
   </table>
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

        checkout(){
            this.OPEN_CART(false)
            this.$router.push({'name': 'checkout'})
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
