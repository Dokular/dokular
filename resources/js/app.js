import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import Vue from 'vue'
import App from './App'
import router from './router/routes'
import Default from './layout/default'
import Home from './layout/home'
import { store }from './store/store'
import BootstrapVue from 'bootstrap-vue'
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import Axios from 'axios'

Vue.use(VueFormWizard)
Vue.use(BootstrapVue)

Vue.prototype.$http = Axios;

const token = store.getters.getToken
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}

Vue.component('default-layout', Default);
Vue.component('home-layout', Home);

Vue.config.productionTip = false

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const guest = to.matched.some(record => record.meta.guest);
    const LoggedInStatus = store.getters.loggedInStatus;

    if(requiresAuth && !LoggedInStatus){
      next('/login')
    } else if(guest && LoggedInStatus){
        next('/dashboard')
    } else {
        next()
    }
});

/* eslint-disable no-new */
new Vue({
  el: '#app',
  store,
  components: {App},
  router
})
