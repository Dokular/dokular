<template>
<div>
    <b-modal hide-footer title="Using Component Methods" ref="my-modal">
        <div class="d-block text-center">
        <h3>hello modal</h3>
        </div>
        <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-button>
    </b-modal>
</div>
</template>
<script>
export default {
    methods: {
      hideModal() {
        this.$refs['my-modal'].hide()
      },

    },
}
</script>
