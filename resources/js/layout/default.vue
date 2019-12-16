<template>
 <div class="site-wrap" id="home-section">
  <TopBar />
  <Header />
  <slot/>
  <Footer />
  </div>
</template>
<script>
import TopBar from '../components/TopHeader'
import Header from '../components/WelcomeHeader'
import Footer from '../components/WelcomeFooter'

export default {
  components: {
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
