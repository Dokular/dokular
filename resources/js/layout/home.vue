<template>
    <div class="page-wrapper">
      <MainHeader />
      <div class="page-content--bgf7">
        <slot/>
      </div>
      <Footer />
    </div>
</template>
<script>
import MainHeader from '../components/MainHeader'
import TopBar from '../components/TopHeader'
import Footer from '../components/Footer'
export default {
  components: {
      MainHeader,
      TopBar,
      Footer
  }

}
</script>
