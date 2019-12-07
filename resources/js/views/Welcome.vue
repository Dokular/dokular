<template>
 <div class="site-wrap" id="home-section">
  <TopBar />
  <Header />
  <top-section></top-section>
  <service />
  <Footer />
  </div>
</template>
<script>
import TopBar from '../components/WelcomeTopBar'
import Header from '../components/WelcomeHeader'
import TopSection from '../components/WelcomeFirstSection'
import Service from '../components/WelcomeServiceSection'
import Footer from '../components/WelcomeFooter'

export default {
  components: {
      TopBar,
      Header,
      Service,
      TopSection,
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
