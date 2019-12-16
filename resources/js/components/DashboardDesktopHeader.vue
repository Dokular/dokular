<template>
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <router-link :to="{ name: 'index'}">
                    <img :src="logo" alt="Cool Admin" />
                </router-link>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <router-link :to="{ name: 'dashboard'}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                            <span class="bot-line"></span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'order'}">
                        <i class="fas fa-shopping-basket"></i>
                            Order
                        </router-link>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fas fa-trophy"></i>
                            <span class="bot-line"></span>
                            Transactions
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img :src="icon" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">john doe</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img :src="icon" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#">john doe</a>
                                    </h5>
                                    <span class="email">johndoe@example.com</span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                </div>
                                <div class="account-dropdown__item">
                                    <a href="#">
                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="#">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
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
    }
}
</script>

