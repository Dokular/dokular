<template>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img :src="icon" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="login-form">
                        <form @submit.prevent="sendLoginMail">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" v-model="email" placeholder="Email">
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Icon from '../assets/images/icon/logo.png'
import axios from 'axios'

export default {
    data() {
        return {
            icon: Icon,
            email: '',
        }
    },
    methods: {

        sendLoginMail(){
            axios.post(process.env.MIX_API+'login/attempt',{
               email: this.email
            }).then(response => {
                console.log(response.data.token)
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>
