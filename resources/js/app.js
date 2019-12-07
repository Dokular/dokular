import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App'
import {routes} from './router/routes'
import Default from './layout/default'
import Home from './layout/home'
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes
})

Vue.component('default-layout', Default);
Vue.component('home-layout', Home);

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  components: {App},
  router
})
