<template>
 <div class="site-wrap" id="home-section">
   <TopBar />
   <MainHeader />
   <!-- <MobileHeader></MobileHeader> -->
  <!-- <DesktopHeader></DesktopHeader> -->
  <!-- <br/> -->

  <!-- <Header /> -->
  <slot/>
  <Footer />
  </div>
</template>
<script>
import MobileHeader from '../components/DashboardMobileHeader'
import DesktopHeader from '../components/DashboardDesktopHeader'
import MainHeader from '../components/MainHeader'
import TopBar from '../components/TopHeader'
import Header from '../components/WelcomeHeader'
import Footer from '../components/Footer'

export default {
  components: {
      MobileHeader,
      DesktopHeader,
      MainHeader,
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
<style scoped>

/* @import '../assets/css/style.css'; */


</style>
