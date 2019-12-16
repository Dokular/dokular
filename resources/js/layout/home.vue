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
import TopBar from '../components/TopHeader'
import DesktopHeader from '../components/DashboardDesktopHeader'
import Footer from '../components/Footer'
export default {
  components: {
      MobileHeader,
      TopBar,
      DesktopHeader,
      Footer
  }

}
</script>
