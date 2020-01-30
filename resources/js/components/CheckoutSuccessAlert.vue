<template>
  <b-modal
    v-model="modalShow"
    @hidden="modalClosed"
    hide-footer
  >
    <b-alert show variant="success">
      <h4 class="alert-heading">Thank you!</h4>
      <p>
        Aww yeah, you successfully paid for the services of renewal of your vehicle papers,
        We'll take over from here to renew and deliver your particulars to you.
      </p>
      <hr>
      <p class="mb-0">
        A confirmation receipt has been sent to your email
      </p>
    </b-alert>
  </b-modal>
</template>
<script>
export default {
    props: ["show"],
    data(){
        return{
            modalShow: this.show
        }
    },
    methods:{
        modalClosed(){
            this.$emit("hidden")
        }
    }
}
</script>
