<template>
    <div class="login-auth">
        <loading
          :active.sync="isLoading"
          :is-full-page="true">
        </loading>
    </div>
</template>
<script>
import Loading from 'vue-loading-overlay';
import {mapMutations} from 'vuex'
import axios from 'axios'
export default {
    props: ['token'],
    data() {
        return {
            isLoading: false
        }
    },
    components: {
      Loading
    },
    methods : {
        ...mapMutations(['SET_TOKEN']),

        processLogin() {
            this.isLoading = true
            axios.post(process.env.MIX_API+'login/verify',{
               token: this.token
            }).then(response => {
                this.isLoading = false
                console.log(response.data.token)
                this.SET_TOKEN(response.data.token)
                this.$router.push({'name': 'dashboard'})
            }).catch(error => {
                this.isLoading = false
                this.$router.push({'name': 'login'})
                console.log(error)
            })
        }
    },

    mounted(){
        this.processLogin();
    }

}
</script>
<style scoped>
.login-auth{
    height: 100vh;
}
</style>
