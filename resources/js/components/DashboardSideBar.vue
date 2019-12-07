<template>
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <router-link :to="{ name: 'index'}">
            <img :src="icon" alt="Cool Admin" />
        </router-link>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <router-link :to="{ name: 'dashboard'}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'chart'}">
                        <i class="fas fa-chart-bar"></i>Charts
                    </router-link>
                </li>
            </ul>
        </nav>
    </div>
</aside>
</template>
<script>
import Icon from '../assets/images/icon/logo.png'
export default {

    data() {
        return {
            icon: Icon
        }
    }
}
</script>
