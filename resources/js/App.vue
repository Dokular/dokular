<template>
<div>
    <component :is="layout">
    <transition name="leave">
    <router-view></router-view>
    </transition>
    </component>

</div>
</template>
<script>
const default_layout = "home"
export default {
  computed: {
      layout() {
          return (this.$route.meta.layout || default_layout) + '-layout';
      }
  }
}
</script>
