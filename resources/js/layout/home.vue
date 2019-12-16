<template>
    <div class="page-wrapper">
      <MobileHeader></MobileHeader>
      <DesktopHeader></DesktopHeader>
      <div class="page-content--bgf7">
        <slot/>
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
