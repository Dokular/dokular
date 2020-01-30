<template>
<div>
    <component :is="layout">
    <router-view></router-view>
    </component>
</div>
</template>
<script>
import {mapActions} from 'vuex'

const default_layout = "home"

export default {
  created() {
      //this.enableIntercepto();
  },
  computed: {
      layout() {
          return (this.$route.meta.layout || default_layout) + '-layout';
      }
  },
  methods:{
      ...mapActions(['logout']),
      enableIntercepto(){
        this.$http.interceptors.response.use(response => {
            return response
        }, error => {
            if (error.response && error.response.status === 401) {
                this.logout();
                this.$router.push({'name': 'landing'})
            }
            return Promise.reject(error)
        });
      }
  },
}
</script>
