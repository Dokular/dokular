<template>
    <div class="page-wrapper">
      <MobileHeader></MobileHeader>
      <SideBar></SideBar>
      <div class="page-container2">
        <DesktopHeader></DesktopHeader>
        <!-- <MainContent></MainContent> -->
        <div class="main-content">
          <div class="section__content section__content--p30">
            <div class="container-fluid">
                <slot/>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
import MobileHeader from '../components/DashboardMobileHeader'
import SideBar from '../components/DashboardSideBar'
import DesktopHeader from '../components/DashboardDesktopHeader'
export default {
  components: {
      MobileHeader,
      SideBar,
      DesktopHeader,
  }

}
</script>
