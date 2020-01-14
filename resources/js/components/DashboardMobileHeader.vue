<template>
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img :src="icon" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>Charts</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>Tables</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>Forms</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Pages</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="register.html">Register</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">Forget Password</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>UI Elements</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
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
<style lang="css" scoped>

.header-mobile {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
}

.header-mobile .header-mobile__bar {
    padding: 15px 0;
}

.header-mobile .header-mobile-inner {
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
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

.header-mobile .hamburger {
    width: 36px;
    height: 36px;
    padding: 0;
    line-height: 1;
    vertical-align: top;
    background: #fff;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -moz-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}

.header-mobile .hamburger .hamburger-box {
    width: 20px;
    height: 15px;
}

.header-mobile .hamburger .hamburger-box .hamburger-inner {
    width: 20px;
    height: 2px;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}

.header-mobile .hamburger .hamburger-box .hamburger-inner:before {
    width: 20px;
    height: 2px;
    top: 6px;
}

.header-mobile .hamburger .hamburger-box .hamburger-inner:after {
    top: 12px;
    width: 20px;
    height: 2px;
}

.header-mobile .navbar-mobile {
    display: none;
    position: absolute;
    width: 100%;
    top: 88px;
    z-index: 20;
}

.header-mobile .navbar-mobile .navbar-mobile__list {
    background: #f8f8f8;
}

.header-mobile .navbar-mobile .navbar-mobile__list > li > a {
    padding-left: 15px !important;
}

.header-mobile .navbar-mobile .navbar-mobile__list li a {
    color: #555;
    display: block;
    padding: 10px 15px;
    padding-right: 25px;
    padding-left: 0;
    border-bottom: 1px solid #e6e6e6;
    text-transform: capitalize;
    line-height: inherit;
}

.header-mobile .navbar-mobile .navbar-mobile__list li a:hover {
    color: #4272d7;
}

.header-mobile .navbar-mobile .navbar-mobile__list li a > i {
    margin-right: 19px;
}

.header-mobile .navbar-mobile .navbar-mobile__list li.has-dropdown > a:after {
    content: '\f105';
    font-family: FontAwesome, cursive;
    float: right;
    font-size: 16px;
    line-height: 22px;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.header-mobile .navbar-mobile .navbar-mobile__list li.has-dropdown > a.active::after {
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    transform: rotate(90deg);
}

.header-mobile .navbar-mobile .navbar-mobile__dropdown {
    padding-left: 35px;
    display: none;
}

.navbar-mobile-sub__list {
    display: none;
    padding-left: 30px;
    background: #fff;
}

.header-mobile .navbar-mobile .navbar-mobile-sub__list li a {
    padding-left: 15px;
}

.header-mobile-2 {
    background: #393939;
    position: static;
}

.header-mobile-2.header-mobile .navbar-mobile {
    top: 82px;
}

.header-mobile-2.header-mobile .hamburger {
    background: transparent;
}

.header-mobile-2.header-mobile .hamburger .hamburger-box .hamburger-inner {
    background: #fff;
}

.header-mobile-2.header-mobile .hamburger .hamburger-box .hamburger-inner::before {
    background: #fff;
}

.header-mobile-2.header-mobile .hamburger .hamburger-box .hamburger-inner::after {
    background: #fff;
}

.sub-header-mobile-2 {
    background: #fff;
    padding: 15px;
}

.sub-header-mobile-2 .header__tool {
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -moz-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
}

.sub-header-mobile-2 .header__tool .header-button-item {
    color: #a9b3c9;
}

.sub-header-mobile-2 .header__tool .account-wrap .account-item--style2 .content a {
    color: #333;
}

.sub-header-mobile-2 .header__tool .notifi-dropdown {
    top: 49px;
}

.sub-header-mobile-2 .header__tool .setting-dropdown {
    top: 49px;
}

</style>
