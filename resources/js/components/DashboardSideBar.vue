<template>
<aside class="menu-sidebar2">
    <div class="logo">
        <router-link :to="{ name: 'index'}">
            <img :src="logo" alt="Cool Admin" />
        </router-link>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img :src="icon" alt="John Doe" />
            </div>
            <h4 class="name">john doe</h4>
            <a href="#">Sign out</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <router-link :to="{ name: 'dashboard'}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'order'}">
                        <i class="fas fa-shopping-basket"></i>
                        Order
                    </router-link>
                    <span class="inbox-num">3</span>
                </li>
                <li>
                    <a href="inbox.html">
                        <i class="fas fa-shopping-basket"></i>
                        Transactions
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
</template>
<script>
import Logo from '../assets/images/icon/logo-white.png'
import Icon from '../assets/images/icon/avatar-big-01.jpg'
export default {

    data() {
        return {
            logo: Logo,
            icon: Icon
        }
    }
}
</script>
