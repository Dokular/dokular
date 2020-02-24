<template>
    <div>
        <loading
          :active.sync="isLoading"
          :is-full-page="true">
        </loading>
        <div class="container" v-if="carts.length">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
            <p class="lead">Please complete the form below.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <CheckOutCart
                  :charge="service_charge"
                />
                <Paystack
                    :amount="amount"
                    :paystackkey="paystackkey"
                    :callback="callback"
                    :close="close"
                    :embed="false"
                />
            </div>
            <div class="col-md-8 order-md-1">
                <CheckOutForm />
            </div>
        </div>
        </div>
        <div class="emptycart" v-else>
          <center>
            <h2>Your cart is empty</h2>
          </center>
        </div>
        <SuccessAlert
          :show="successModal"
          @hidden="successModalClosed"
        />
    </div>
</template>
<script>
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import SuccessAlert from '../components/CheckoutSuccessAlert'
import {mapGetters, mapMutations} from 'vuex'
import CheckOutCart from '../components/CheckOutCart'
import CheckOutForm from '../components/CheckOutForm'
import Paystack from '../components/Paystack'
import axios from 'axios'
import { reject } from 'q';

export default {
    data(){
        return{
            paystackkey: process.env.MIX_PAYSTACK_PK,
            service_charge: 0,
            stateObject: null,
            user: 0,
            states:[],
            successModal: false,
            isLoading: false,
        }
    },
    components: {
      CheckOutCart,
      Paystack,
      SuccessAlert,
      Loading,
      CheckOutForm
    },
    computed: {
        ...mapGetters(["carts", "total", "getDeliveryFee", "getDelivery", "reference"]),
        //Calculate paystack amount
        amount() {
            return (this.total  + this.getDeliveryFee + this.service_charge) * 100;
        }
    },
    created() {
        this.getState();
    },
    methods: {
        ...mapMutations(['CLEAR_CART']),
        callback: function(response){
            var self = this;
            self.isLoading = true;
            axios.post(process.env.MIX_API+'order',{
                order: self.carts,
                reference: this.reference,
                delivery: this.getDelivery,
            }).then(response => {
                self.isLoading = false;
                this.successModal = true;
                console.log(response)
                this.CLEAR_CART()
            }).catch(error => {
                alert(error)
            })
        },
        close(){
            console.log("Payment closed")
        },
        getState(){
            axios.get(process.env.MIX_API+'states')
            .then(response => {
                this.states = response.data[0]
                // console.log(response.data[0])
            }).catch(error => {
                console.log(error)
            })
        },
        successModalClosed(){
          this.$router.push({'name': 'landing'})
        }
    }
}
</script>
<style scoped>

</style>
