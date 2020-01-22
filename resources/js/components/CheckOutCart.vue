<template>
    <div>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{ carts.length }}</span>
        </h4>
        <ul class="list-group mb-3">
          <ul
            class="list-group mb-3"
            v-for="(cart, index) in carts" :key="index"
          >
            <li
              class="list-group-item d-flex justify-content-between align-items-center"
            >
              <h4>{{ cart.make }}</h4>
            </li>
            <li
              class="list-group-item d-flex justify-content-between align-items-center"
              v-for="(product, index) in cart.products" :key="index"
            >

                {{ product.name }}
                <span class="badge badge-pill">N{{ product.price }}</span>
            </li>
          </ul>
          <li class="list-group-item d-flex justify-content-between">
              <span>Delivery fee</span>
              <strong>{{ delivery }}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
              <span>Service charge</span>
              <strong>{{ charge }}</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
              <span>Total (NGN)</span>
              <strong>N{{ total + delivery  + charge}}</strong>
          </li>
        </ul>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    props: ["delivery", "charge"],
    computed: {
        ...mapGetters(["carts", "total"]),
    },
}
</script>
