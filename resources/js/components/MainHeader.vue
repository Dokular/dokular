<template>
<div>
  <b-navbar toggleable="lg">
    <b-navbar-brand :to="{ name: 'landing'}">
        <img :src="logo" height="35px"/>
    </b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto right">
        <b-nav-item :to="{name: 'dashboard'}">Dashboard</b-nav-item>
        <b-nav-item :to="{ name: 'order'}" v-if="loggedInStatus">
            Order
        </b-nav-item>
        <b-nav-item :to="{name: 'login'}" v-if="!loggedInStatus">
            Login
        </b-nav-item>
        <b-nav-item @click="logMeOut()" v-if="loggedInStatus">
            Log out
        </b-nav-item>
        <b-nav-item @click="cartModal()">
            <font-awesome-icon icon="cart-plus" />
        </b-nav-item>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
  <Cart />
</div>
</template>
<script>
import Cart from './Cart'
import Logo from '../assets/images/dokular.png'
import {mapActions,mapMutations, mapGetters} from 'vuex'
export default {
    data() {
        return {
            logo: Logo,
            cart_modal: true
        }
    },
    components:{
        Cart
    },
    computed: {
        ...mapGetters(['loggedInStatus'])
    },
    methods:{
        ...mapActions(['logout']),
        ...mapMutations(['OPEN_CART']),
        logMeOut() {
            this.logout().then(ok => {
                console.log(ok)
                this.$router.push({'name': 'landing'})
            }).catch(err => {
                console.log(err)
            })
        },
        cartModal() {
            this.OPEN_CART(true)
        }
    }
}
</script>
<style lang="css" scoped>
b-nav-item{
    padding: 15px 20px;
    color: #000;
    display: inline-block;
    text-decoration: none !important;
}

</style>
