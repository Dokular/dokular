<template>
 <div class="site-wrap" id="home-section">
   <MainHeader />
  <slot/>
  <Footer />
  </div>
</template>
<script>
import MainHeader from '../components/MainHeader'
import TopBar from '../components/TopHeader'
import Header from '../components/WelcomeHeader'
import Footer from '../components/Footer'

export default {
  components: {
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
