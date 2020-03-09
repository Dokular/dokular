import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import Vue from 'vue'
import axios from 'axios'
import App from './App'
import router from './router/routes'
import Default from './layout/default'
import Home from './layout/home'
import { store } from './store/store'
import {BootstrapVue, BootstrapVueIcons} from 'bootstrap-vue'
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import VeeValidate from 'vee-validate';
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

Vue.use(VueFormWizard)
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons);
Vue.use(VeeValidate, {
    classes: true,
    classNames: {
      valid: 'is-valid',
      invalid: 'is-invalid'
    }
});

Vue.component('font-awesome-icon', FontAwesomeIcon)
library.add(fas, fab)

Vue.prototype.$http = axios

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

axios.interceptors.request.use(
    (config) => {
      let token = store.getters.getToken;

      if (token) {
        config.headers['Authorization'] = `Bearer ${ token }`;
      }
      return config;
    },
    (error) => {
      //return Promise.reject(error);
    }
);

axios.interceptors.response.use(null, error => {
    const err = error.response
    if (err.statusText === 'Unauthorized' && err.status === 401) {
        store.dispatch('logout').then(response => {
            router.push({'name': 'login'})
        }, error => {
            router.push({'name': 'login'})
        });
        return err.statusText;
    }
    return Promise.reject(error);
});



/* eslint-disable no-new */
new Vue({
  el: '#app',
  store,
  components: {App},
  router
})
