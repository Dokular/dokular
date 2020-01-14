<template>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dokular</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <router-link tag="a" class="nav-link" :to="{ name: 'dashboard'}">
                Home <span class="sr-only">(current)</span>
            </router-link>
        </li>
        <li class="nav-item" v-if="loggedInStatus">
            <router-link tag="a" class="nav-link" :to="{ name: 'order'}">
                Order
            </router-link>
        </li>
        <li class="nav-item" v-if="!loggedInStatus">
          <router-link tag="a" class="nav-link" :to="{ name: 'login'}">log in</router-link>
        </li>
        <li class="nav-item" v-if="loggedInStatus">
          <a class="nav-link disabled" @click="logMeOut()">log out</a>
        </li>
      </ul>
    </div>
</nav>
</template>
<script>
import Icon from '../assets/images/icon/avatar-big-01.jpg'
import {mapActions, mapGetters} from 'vuex'
export default {
    data() {
        return {
            icon: Icon
        }
    },
    computed: {
        ...mapGetters(['loggedInStatus'])
    },
    methods:{
        ...mapActions(['logout']),
        logMeOut() {
            this.logout().then(ok => {
                console.log(ok)
                this.$router.push({'name': 'landing'})
            }).catch(err => {
                console.log(err)
            })
        }
    }
}
</script>
<style lang="css" scoped>

/* .bg-dark, .navbar-collapse{
 background: #393939 !important;
}
.navbar-expand-md{
    height: 76px;
    z-index: 999;
    box-shadow:0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-align: center;
    align-items: center;
    position: sticky;
    top: 0;
}

li .dropdown-menu{
    background: #393939;
} */

</style>
