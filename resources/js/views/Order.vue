<template>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Owner</th>
      <th scope="col">Status</th>
      <th scope="col">More</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(owner, index) in owners" :key="index">
      <th scope="row">{{ index + 1}}</th>
      <td>{{ owner.car }}</td>
      <td>{{ owner.name }}</td>
      <td>pending</td>
      <td class="more-info" @click="showOrder(owner.orders)">Info</td>
    </tr>
  </tbody>
</table>
<b-modal v-model="show" hide-footer >
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">price</th>
      <th scope="col">Download</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="(order, index) in orders" :key="index">
      <th scope="row">{{ index + 1 }}</th>
      <td>{{ order.product }}</td>
      <td>N {{ order.price }}</td>
      <td><b-icon icon="download"></b-icon></td>
    </tr>
  </tbody>
</table>
</b-modal>
</div>
</template>
<script>
import MyOrders from '../components/MyOrders'
import { mapGetters } from 'vuex'
import axios from 'axios'
export default {
    data() {
        return {
            owners: [],
            show: false,
            orders:[]
        }
    },
    components: {
        MyOrders
    },
    methods: {
        getOrders() {
            axios.get(process.env.MIX_API+'order').then(response => {
                this.owners = response.data.data
                console.log(response)
            }).catch(error => {
                console.log(error)
            })
        },
        showOrder(getOrder) {
            this.orders = getOrder
            this.show = true
        }
    },
    created(){
        this.getOrders();
    }
}
</script>
<style lang="css" scoped>
.container{
    padding-top:50px ;
}
.more-info{
    cursor: pointer
}
</style>
