<template>
  <div>
  <top-section></top-section>
  <service />
  </div>
</template>
<script>
import TopSection from '../components/WelcomeFirstSection'
import Service from '../components/WelcomeServiceSection'

export default {
  components: {
      Service,
      TopSection,
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
