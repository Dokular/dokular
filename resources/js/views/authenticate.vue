<template>
    <div>
        processing login
    </div>
</template>
<script>
import {mapMutations} from 'vuex'
import axios from 'axios'
export default {
    props: ['token'],
    data() {
        return {
        }
    },

    methods : {
        ...mapMutations(['SET_TOKEN']),

        processLogin() {
            axios.post(process.env.MIX_API+'login/verify',{
               token: this.token
            }).then(response => {
                console.log(response.data.token)
                this.SET_TOKEN(response.data.token)
                this.$router.push('dashboard')
            }).catch(error => {
                console.log(error)
            })
            console.log(this.token);
        }
    },

    mounted(){
        this.processLogin();
    }

}
</script>
