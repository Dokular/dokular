<template>
    <div>
        <div class="container" v-if="carts.length">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
            <p class="lead">Please complete the form below.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <CheckOutCart :delivery="delivery_fee"></CheckOutCart>
                <Paystack
                    :amount="amount"
                    :email="email"
                    :paystackkey="paystackkey"
                    :reference="reference"
                    :callback="callback"
                    :triggerPayment="trigger"
                    :close="close"
                    :embed="false"
                    :key="componentKey"
                />
                <button class="btn btn-primary btn-lg btn-block" @click="Prepayment">
                    Continue to checkout
                </button>
            </div>
            <div class="col-md-8 order-md-1">
                <ValidationObserver ref="observer" v-slot="{ invalid }">
                    <h4 class="mb-3">Delivery address</h4>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <ValidationProvider name="First name" rules="required" v-slot="{ errors }">
                            <label for="firstName">First name</label>
                            <input type="text"
                                class="form-control"
                                v-model="first_name"
                                placeholder=""
                                required>
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>

                    <div class="col-md-6 mb-3">
                        <ValidationProvider name="Last name" rules="required" v-slot="{ errors }">
                            <label for="lastName">
                                Last name
                            </label>
                            <input type="text"
                                    class="form-control"
                                    v-model="last_name"
                                    placeholder=""
                                    required
                            >
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                    </div>
                    <div class="mb-3">
                        <ValidationProvider name="Phone number" rules="required" v-slot="{ errors }">
                            <label for="phone">Phone </label>
                            <input type="phone"
                                    class="form-control"
                                    v-model="phone"
                                    placeholder="08030000000"
                            >
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                    <div class="mb-3">
                        <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                            <label for="email">Email </label>
                            <input type="email"
                                    class="form-control"
                                    v-model="email"
                                    placeholder="you@example.com"
                            >
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                    <div class="mb-3">
                        <ValidationProvider name="adddress" rules="required" v-slot="{ errors }">
                            <label for="address">Delivery address</label>
                            <input type="text"
                                    class="form-control"
                                    v-model="address"
                                    placeholder="1234 Main St"
                                    required>
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                    <div class="row">
                    <div class="col-md-5 mb-3">
                        <ValidationProvider name="state" rules="oneOf:lagos," v-slot="{ errors }">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" v-model="state" required>
                                <option>
                                    Choose...
                                </option>
                                <option value="lagos">
                                    Lagos
                                </option>
                            </select>
                            <span>{{ errors[0] }}</span>
                        </ValidationProvider>
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
                </ValidationObserver>
            </div>
        </div>
        </div>
        <div v-else>
            <h2>Your cart is empty</h2>
        </div>
    </div>
</template>
<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
import {mapGetters, mapMutations} from 'vuex'
import CheckOutCart from '../components/CheckOutCart'
import Paystack from '../components/Paystack'
import axios from 'axios'
import { reject } from 'q';

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
            delivery_fee: 100,
            trigger: false,
            user: 0,
            componentKey: 0,
            reference:'',
        }
    },
    components: {
        CheckOutCart,
        Paystack,
        ValidationObserver,
        ValidationProvider
    },
    computed: {
        ...mapGetters(["carts", "total"]),
        amount() {
            return this.total * 100
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
                this.clearData()
                this.$router.push({'name': 'landing'})
            }).catch(error => {
                this.trigger = false
                this.forceRerender()
                alert(error)
            })
        },
        close(){
            console.log("Payment closed")
        },
        Prepayment() {
            let validate = this.$refs.observer.validate();

            validate.then(resolve => {
                if(!resolve){
                    return;
                }
                this.makeReference();
                this.trigger = true;
            })
        },

        clearData() {
            this.first_name = '',
            this.last_name = '',
            this.phone = '',
            this.email = '',
            this.address = '',
            this.state = '',
            this.lga = ''
        },
        makeReference(){
            let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for( let i=0; i < 10; i++ )
            this.reference += possible.charAt(Math.floor(Math.random() * possible.length));
        },
        forceRerender() {
            this.componentKey += 1;
            this.reference
        },
        getState(){
            
        }
    }
}
</script>
