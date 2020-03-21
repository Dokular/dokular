<template>
    <div class="checkout">
        <loading :active.sync="isLoading" :is-full-page="true"> </loading>
        <div class="container" v-if="carts.length">
            <div class="py-5 text-center">
                <h2>Checkout form</h2>
                <p class="lead">Please complete the form below.</p>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <CheckOutForm />
                </div>
                <div class="col-md-4" style="padding-bottom:50px;">
                    <CheckOutCart :charge="totalServiceCharge" />
                    <!-- <Paystack
                        :amount="amount"
                        :paystackkey="paystackkey"
                        :callback="callback"
                        :close="close"
                        :embed="false"
                    /> -->
                    <RavePay
                        :amount="amount"
                        :rave-key="raveKey"
                        payment-options="card"
                        :on-close="close"
                        currency="NGN"
                    />
                </div>
            </div>
        </div>
        <div class="emptycart" v-else>
            <center>
                <h2>Your cart is empty</h2>
            </center>
        </div>
        <SuccessAlert :show="successModal" @hidden="successModalClosed" />
    </div>
</template>
<script>
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";
import SuccessAlert from "../components/CheckoutSuccessAlert";
import { mapGetters, mapMutations, mapActions } from "vuex";
import CheckOutCart from "../components/CheckOutCart";
import CheckOutForm from "../components/CheckOutForm";
import Paystack from "../components/Paystack";
import RavePay from "../components/RavePay";
import axios from "axios";
import { reject } from "q";

export default {
    data() {
        return {
            paystackkey: process.env.MIX_PAYSTACK_PK,
            stateObject: null,
            raveKey: "FLWPUBK_TEST-8c0215a65daca57549847d959dfe2564-X",
            user: 0,
            states: [],
            successModal: false,
            isLoading: false
        };
    },
    components: {
        CheckOutCart,
        Paystack,
        SuccessAlert,
        Loading,
        CheckOutForm,
        RavePay
    },
    computed: {
        ...mapGetters([
            "carts",
            "total",
            "getDeliveryFee",
            "getDelivery",
            "reference",
            "serviceCharge"
        ]),

        totalServiceCharge() {
            return this.carts.length * this.serviceCharge;
        },
        //Calculate paystack amount
        amount() {
            return (
                (this.total + this.getDeliveryFee + this.totalServiceCharge) *
                1
            );
        }
    },
    created() {
        this.getState();
        this.getServiceCharge();
    },
    methods: {
        ...mapMutations(["CLEAR_CART", "CLEAR_DELIVERY"]),
        ...mapActions(["getServiceCharge"]),

        close: function(response) {
            this.isLoading = true;
            axios.post(process.env.MIX_API + "order", {
                order: this.carts,
                reference: this.reference,
                delivery: this.getDelivery
            }).then(response => {
                this.isLoading = false;
                this.successModal = true;
                //this.CLEAR_DELIVERY();
                //this.CLEAR_CART();
            }).catch(error => {
                console.log(error);
            });
        },
        getState() {
            axios
                .get(process.env.MIX_API + "states")
                .then(response => {
                    this.states = response.data[0];
                    // console.log(response.data[0])
                })
                .catch(error => {
                    console.log(error);
                });
        },
        successModalClosed() {
            this.$router.push({ name: "landing" });
        }
    }
};
</script>
<style scoped>
.checkout {
    min-height: 100vh;
}
</style>
