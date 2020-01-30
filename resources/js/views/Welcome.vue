<template>
  <div>
  <Products />
  <service />
  </div>
</template>
<script>
import Products from '../components/Products'
import Service from '../components/WelcomeServiceSection'

export default {
  components: {
      Service,
      Products
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
