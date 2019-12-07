<template>
    <div class="page-wrapper">
      <MobileHeader></MobileHeader>
      <SideBar></SideBar>
      <div class="page-container">
        <DesktopHeader></DesktopHeader>
        <!-- <MainContent></MainContent> -->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
                <router-view></router-view>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
import MobileHeader from './components/DashboardMobileHeader'
import SideBar from './components/DashboardSideBar'
import DesktopHeader from './components/DashboardDesktopHeader'
import MainContent from './components/DashboardMainContent'

export default {
  components: {
      MobileHeader,
      SideBar,
      DesktopHeader,
      MainContent
  }
}
</script>
