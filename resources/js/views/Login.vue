<template>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <b-alert variant="success" :show="show">
                        Please check your mail for login detail.
                    </b-alert>
                    <div class="login-form">
                        <form @submit.prevent="sendLoginMail">
                            <div class="form-group">
                                <label>Enter email</label>
                                <input class="au-input au-input--full" type="email" v-model="email">
                            </div>
                            <br/>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">
                                <b-spinner :hidden="spinner" label="Floated Left" small></b-spinner>
                                sign in
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data() {
        return {
            email: '',
            spinner: true,
            show: false
        }
    },
    methods: {

        sendLoginMail(){
            this.spinner = false
            this.$http.post(process.env.MIX_API+'login/attempt',{
               email: this.email
            }).then(response => {
                this.spinner = true
                this.email = ''
                this.show = true
            }).catch(error => {
                this.spinner = true
                alert('Something went wrong, try again later.')
                console.log(error)
            })
        }
    }
}
</script>
<style lang="css" scoped>
* {
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

body {
    font-family: "Poppins", sans-serif;
    font-weight: 400;
    font-size: 16px;
    line-height: 1.625;
    color: #666;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

input, textarea {
    border: none;
}

button {
    border: none;
    background: none;
}

.login-logo {
    text-align: center;
    margin-bottom: 30px;
}

.register-link {
    padding-top: 15px;
    text-align: center;
    font-size: 14px;
}

.register-link > p > a {
    color: #ff2e44;
}

@media (min-width: 1200px) {
    .container {
        max-width: 1320px;
    }
}

.login-wrap {
    max-width: 540px;
    padding-top: 8vh;
    margin: 0 auto;
}

.login-content {
    background: #fff;
    padding: 30px 30px 20px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
}

.page-wrapper {
    overflow: hidden;
    background: #e5e5e5;
    padding-bottom: 8vh;
}

.page-content--bge5 {
    background: #e5e5e5;
    height: 100vh;
}

.au-input--full {
    width: 100%;
}

.au-input {
    line-height: 43px;
    border: 1px solid #e5e5e5;
    font-size: 14px;
    color: #666;
    padding: 0 17px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.login-form .form-group label {
    display: block;
}

.m-b-20 {
    margin-bottom: 20px;
}

.au-btn--green {
    background: #63c76a;
}
.au-btn--block {
    display: block;
    width: 100%;
}

.au-btn {
    line-height: 45px;
    padding: 0 35px;
    text-transform: uppercase;
    color: #fff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    transition: all 0.3s ease;
    cursor: pointer;
}
</style>
