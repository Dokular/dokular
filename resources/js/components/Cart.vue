<template>
  <div class="container" v-if="carts.length">
      <div class="card">
        <div class="card-header">My Cart</div>
        <table class="table table-bordered">
          <tbody>
            <tr v-for="(cart, index) in carts" :key="index">
              <td>{{ cart.owner }}</td>
              <td>{{ cart.make }}</td>
              <td>
                <p v-for="(product, index) in cart.products" :key="index">
                {{ product.name }} - {{ product.price }}
                </p>
              </td>
              <td>total: {{ cart.total }} </td>
              <td><span @click="removeCart(cart)" class="delspan">X</span></td>
            </tr>
          </tbody>
        </table>

        <div class="card-footer">
          Total: N{{ total }}
          <br>
          <button type="button" class="btn btn-secondary">
            <router-link tag="a" to="/checkout">
              Checkout
            </router-link>
          </button>
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

.container{
 margin-top: 20px;
}

.btn a{
    color: #ffffff;
    text-decoration: none;
    background-color: transparent;
}

</style>
