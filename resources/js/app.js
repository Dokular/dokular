import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App'
import {routes} from './router/routes'
import Default from './layout/default'
import Home from './layout/home'
import {store }from './store/store'
import { FormPlugin, ModalPlugin, ButtonPlugin } from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


Vue.use(VueRouter)
Vue.use(ModalPlugin)
Vue.use(ButtonPlugin)
Vue.use(FormPlugin)


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
  store,
  components: {App},
  router
})
