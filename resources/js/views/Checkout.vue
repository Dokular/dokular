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
                <Paystack
                        :amount="amount"
                        :email="email"
                        :paystackkey="paystackkey"
                        :reference="reference"
                        :callback="callback"
                        :triggerPayment="trigger"
                        :close="close"
                        :embed="false">
                </Paystack>
                <button class="btn btn-primary btn-lg btn-block" @click="Prepayment">
                    Continue to checkout
                </button>
            </div>
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Delivery address</h4>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text"
                           class="form-control"
                           v-model="first_name"
                           placeholder=""
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
                            v-model="last_name"
                            placeholder=""
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
                            v-model="phone"
                            placeholder="08030000000">
                    <div class="invalid-feedback">
                        Please enter a valid mobile number
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email </label>
                    <input type="email"
                            class="form-control"
                            v-model="email"
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
                            v-model="address"
                            placeholder="1234 Main St"
                            required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="state">State</label>
                    <select class="custom-select d-block w-100" v-model="state" required>
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
                            v-model="lga"
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
import { ValidationProvider } from 'vee-validate';
import {mapGetters, mapMutations} from 'vuex'
import CheckOutCart from '../components/CheckOutCart'
import Paystack from '../components/Paystack'
import axios from 'axios'

export default {
    data(){
        return{
            paystackkey: process.env.MIX_PAYSTACK_PK,
            first_name:'',
            last_name:'',
            phone: '',
            email: '',
            address:'',
            state:'',
            lga: '',
            trigger: false,
            user: 0
        }
    },
    components: {
        CheckOutCart,
        Paystack,
        ValidationProvider
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
        ...mapMutations(['CLEAR_CART']),
        callback: function(response){
            var self = this;

            axios.post(process.env.MIX_API+'order',{
                order: self.carts,
                reference: this.reference,
                first_name : this.first_name,
                last_name : this.last_name,
                phone : this.phone,
                email : this.email,
                address : this.address,
                state : this.state,
                lga : this.lga
            }).then(response => {
                console.log(response)
                this.CLEAR_CART()
                this.$router.push({'name': 'landing'})
            }).catch(error => {
                console.log(error)
            })
        },
        close(){
            console.log("Payment closed")
        },
        Prepayment() {
            alert('payment!!!');
            this.trigger = true;
        },

        clearData() {
            this.first_name = '',
            this.last_name = '',
            this.phone = '',
            this.email = '',
            this.address = '',
            this.state = '',
            this.lga = ''
        }

    }
}
</script>
