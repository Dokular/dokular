<template>
  <div>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center position-relative">
          <div class="site-logo">
            <a href="index.html" class="text-black"><span class="text-primary">Regidital</span></a>
          </div>
          <div class="col-12">
            <nav class="site-navigation text-right ml-auto " role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li>
                    <router-link :to="{ name: 'index'}">
                        Home
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'login'}">
                        Login
                    </router-link>
                </li>
                <li>
                  <router-link :to="{ name: 'register'}">
                        Register
                  </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'dashboard'}">
                        Dashboard
                    </router-link>
                </li>
              </ul>
            </nav>
          </div>
          <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
        </div>
      </div>
    </header>
  </div>
</template>
