<template>
    <div>
        <div class="container" v-if="carts.length">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
            <p class="lead">Please complete the form below.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <CheckOutCart></CheckOutCart>
                <paystack
                        :amount="amount"
                        :email="delivery.email"
                        :paystackkey="paystackkey"
                        :reference="reference"
                        :callback="callback"
                        :close="close"
                        :embed="false">
                    <button class="btn btn-primary btn-lg btn-block">Continue to checkout</button>
                </paystack>
            </div>
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Delivery address</h4>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text"
                           class="form-control"
                           v-model="delivery.firstName"
                           placeholder=""
                           value=""
                           required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lastName">
                        Last name
                    </label>
                    <input type="text"
                            class="form-control"
                            v-model="delivery.lastName"
                            placeholder=""
                            value=""
                            required>
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
                </div>
                <div class="mb-3">
                    <label for="phone">Phone </label>
                    <input type="phone"
                            class="form-control"
                            v-model="delivery.phone"
                            placeholder="08030000000">
                    <div class="invalid-feedback">
                        Please enter a valid mobile number
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email </label>
                    <input type="email"
                            class="form-control"
                            v-model="delivery.email"
                            placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address
                        for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Delivery address</label>
                    <input type="text"
                            class="form-control"
                            v-model="delivery.address"
                            placeholder="1234 Main St"
                            required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="state">State</label>
                    <select class="custom-select d-block w-100" v-model="delivery.state" required>
                        <option value="">
                            Choose...
                        </option>
                        <option>
                            Lagos
                        </option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lga">L.G.A</label>
                    <select class="custom-select d-block w-100"
                            v-model="delivery.lga"
                            required>
                    <option value="">
                        Choose...
                    </option>
                    <option>California</option>
                    </select>
                    <div class="invalid-feedback">
                    Please provide a valid local government area.
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        <div v-else>
            <h2>Your cart is empty</h2>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
import CheckOutCart from '../components/CheckOutCart'
import paystack from 'vue-paystack'
import axios from 'axios'

export default {
    data(){
        return{
          paystackkey: process.env.MIX_PAYSTACK_PK,
          delivery: {
              firstName:'',
              lastName:'',
              phone: '',
              email: '',
              address:'',
              state:'',
              lga: ''
          }
        }
    },
    components: {
        CheckOutCart,
        paystack
    },
    computed: {
        ...mapGetters(["carts", "total"]),
        amount() {
            return this.total * 100
        },
        reference(){
            let text = "";
            let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( let i=0; i < 10; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }
    },
    methods: {
        callback: function(response){

            // console.log(response)
            //console.log(res.reference)
            var self = this;

            axios.post(process.env.MIX_API+'order',{
              order: self.carts,
              email: self.email,
              reference: response.reference
            }).then(response => {
                console.log(response)
            }).catch(error => {
                console.log(error)
            })
        },
        close(){
            console.log("Payment closed")
        }
    }
}
</script>
