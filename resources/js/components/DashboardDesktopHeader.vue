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

