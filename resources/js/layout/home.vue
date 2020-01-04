<template>
    <div class="page-wrapper">
      <TopBar />
      <MobileHeader></MobileHeader>
      <DesktopHeader></DesktopHeader>
      <div class="page-content--bgf7">
        <slot/>
      </div>
      <Footer />
    </div>
</template>
<script>
import MobileHeader from '../components/DashboardMobileHeader'
import DesktopHeader from '../components/DashboardDesktopHeader'
import TopBar from '../components/TopHeader'
import Footer from '../components/Footer'
export default {
  components: {
      MobileHeader,
      DesktopHeader,
      TopBar,
      Footer
  }

}
</script>
