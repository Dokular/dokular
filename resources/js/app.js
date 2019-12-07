import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App'
import {routes} from './router/routes'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes
})


Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  components: {App},
  router
})
