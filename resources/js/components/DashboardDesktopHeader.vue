<template>
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <router-link :to="{ name: 'landing'}">
                    <img :src="logo" alt="Cool Admin" />
                </router-link>
            </div>
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img :src="icon" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">guest</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item" v-if="loggedInStatus">
                                    <router-link :to="{ name: 'dashboard'}">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard
                                        <span class="bot-line"></span>
                                    </router-link>
                                </div>
                                <div class="account-dropdown__item" v-if="loggedInStatus">
                                    <router-link :to="{ name: 'order'}">
                                        <i class="zmdi zmdi-account"></i>
                                        Order
                                    </router-link>
                                </div>
                                <div class="account-dropdown__item" v-if="!loggedInStatus">
                                    <router-link :to="{ name: 'login'}">
                                        <i class="zmdi zmdi-money-box"></i>Sign in
                                    </router-link>
                                </div>
                            </div>
                            <div class="account-dropdown__footer" v-if="loggedInStatus">
                                <a @click="logMeOut()">
                                    <i class="zmdi zmdi-power"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</template>
<script>
import Avatar6 from '../assets/images/icon/avatar-06.jpg'
import Avatar5 from '../assets/images/icon/avatar-05.jpg'
import Avatar4 from '../assets/images/icon/avatar-04.jpg'
import Avatar1 from '../assets/images/icon/avatar-01.jpg'
import Logo from '../assets/images/icon/logo-white.png'
import Icon from '../assets/images/icon/avatar-big-01.jpg'
import {mapActions, mapGetters} from 'vuex'
export default {

    data() {
        return {
            avatar6: Avatar6,
            avatar5: Avatar5,
            avatar4: Avatar4,
            avatar1: Avatar1,
            logo: Logo,
            icon: Icon
        }
    },
    computed: {
        ...mapGetters(['loggedInStatus'])
    },
    methods:{
        ...mapActions(['logout']),
        logMeOut() {
            this.logout().then(ok => {
                console.log(ok)
                this.$router.push({'name': 'landing'})
            }).catch(err => {
                console.log(err)
            })
        }
    }
}
</script>
<style lang="css" scoped>
img {
    max-width: 100% !important;
    height: auto !important;
}

.account-wrap {
    position: relative;
}

.account-item {
    cursor: pointer;
}

.account-item .image {
    width: 45px;
    height: 45px;
    float: left;
    overflow: hidden;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

.account-item .image > img {
    width: 100%;
}

.account-item > .content {
    margin-left: 45px;
    padding: 9px 0;
    padding-left: 12px;
}

.account-item > .content > a {
    color: #333;
    text-transform: capitalize;
    font-weight: 500;
}

.account-item > .content > a:after {
    font-family: "Material-Design-Iconic-Font";
    font-weight: 500;
    content: '\f2f9';
    display: inline-block;
    font-size: 16px;
    margin-left: 5px;
}

.account-item > .content > a:hover {
    color: #666;
}

.account-dropdown {
    min-width: 305px;
    position: absolute;
    top: 58px;
    right: 0;
    background: #fff;
    -webkit-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -ms-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
    -webkit-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-transform-origin: right top;
    -moz-transform-origin: right top;
    -ms-transform-origin: right top;
    -o-transform-origin: right top;
    transform-origin: right top;
    z-index: 3;
}

.account-dropdown .info {
    padding: 25px;
    border-top: 1px solid #f5f5f5;
    border-bottom: 1px solid #f2f2f2;
}

.account-dropdown .info .image {
    float: left;
    height: 65px;
    width: 65px;
    overflow: hidden;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}

.account-dropdown .info .content {
    margin-left: 65px;
    padding: 11px 0;
    padding-left: 12px;
}

.account-dropdown .info .content .name {
    line-height: -webkit-calc(20/16);
    line-height: -moz-calc(20/16);
    line-height: calc(20/16);
}

.account-dropdown .info .content .name a {
    color: #333;
    font-weight: 500;
    text-transform: capitalize;
}

.account-dropdown .info .content .name a:hover {
    color: #666;
}

.account-dropdown .info .content .email {
    font-size: 13px;
    color: #999;
    line-height: -webkit-calc(20/13);
    line-height: -moz-calc(20/13);
    line-height: calc(20/13);
}

.account-dropdown:after {
    content: '';
    display: block;
    width: 19px;
    height: 19px;
    border-bottom: 9px solid #fff;
    border-top: 9px solid transparent;
    border-left: 9px solid transparent;
    border-right: 9px solid transparent;
    position: absolute;
    top: -18px;
    right: 33px;
}

.account-dropdown__item a {
    display: block;
    color: #333;
    padding: 15px 25px;
    font-size: 14px;
}

.account-dropdown__item a:hover {
    background: #4272d7;
    color: #fff;
}

.account-dropdown__item a i {
    line-height: 1;
    margin-right: 20px;
    font-size: 18px;
    vertical-align: middle;
}

.account-dropdown__body {
    padding: 12px 0;
}

.account-dropdown__footer {
    border-top: 1px solid #f2f2f2;
}

.account-dropdown__footer a {
    display: block;
    color: #333;
    padding: 15px 25px;
    font-size: 14px;
}

.account-dropdown__footer a:hover {
    background: #4272d7;
    color: #fff;
}

.account-dropdown__footer a i {
    line-height: 1;
    margin-right: 20px;
    font-size: 18px;
    vertical-align: middle;
}

.header-desktop3 {
    background: #393939;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    height: 76px;
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 999;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
}

.header-desktop3 .section__content {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 0;
    right: 0;
}

@media (max-width: 1315px) and (min-width: 992px) {
    .header-desktop3 .section__content {
        padding: 0 15px;
    }
}

.header-desktop3 .header-button-item {
    color: #ccc;
}

.header3-wrap {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    position: relative;
}

.header3-wrap .header__navbar {
    width: 100%;
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    transform: translateX(-50%);
    top: -12px;
}

.header__logo {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    position: relative;
    z-index: 3;
}

</style>
