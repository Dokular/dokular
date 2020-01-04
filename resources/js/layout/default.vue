<template>
 <div class="site-wrap" id="home-section">
  <TopBar />
  <MobileHeader></MobileHeader>
  <DesktopHeader></DesktopHeader>
  <!-- <Header /> -->
  <slot/>
  <Footer />
  </div>
</template>
<script>
import MobileHeader from '../components/DashboardMobileHeader'
import DesktopHeader from '../components/DashboardDesktopHeader'
import TopBar from '../components/TopHeader'
import Header from '../components/WelcomeHeader'
import Footer from '../components/WelcomeFooter'

export default {
  components: {
      MobileHeader,
      DesktopHeader,
      TopBar,
      Header,
      Footer
  },
  data() {
    return{
    }
  }
}
</script>
<style lang="scss">
@import '../assets/css/style.css';
</style>
