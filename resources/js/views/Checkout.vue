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
                  :delivery="deliverFee"
                  :charge="service_charge"
                />
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
                            <span class="invalid">{{ errors[0] }}</span>
                        </ValidationProvider>
                    </div>
                    <div class="row">
                    <div class="col-md-5 mb-3">
                        <ValidationProvider name="state" rules="required" v-slot="{ errors }">
                            <label for="state">State</label>
                            <select
                              class="custom-select d-block w-100"
                              v-model="stateObject"
                            >
                                <option
                                  :value="null"
                                >
                                    Choose...
                                </option>
                                <option
                                  v-for="(state, index) in states"
                                  :value="state"
                                  :key="index"
                                >
                                  {{ state.name }}
                                </option>
                            </select>
                            <span class="invalid">{{ errors[0] }}</span>
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
                        </select>
                    </div>
                    </div>
                </ValidationObserver>
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
import { ValidationObserver, ValidationProvider } from "vee-validate";
import SuccessAlert from '../components/CheckoutSuccessAlert'
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
            service_charge: 0,
            stateObject: null,
            lga: '',
            trigger: false,
            user: 0,
            states:[],
            componentKey: 0,
            reference:'',
            successModal: false,
            isLoading: false,
        }
    },
    components: {
      CheckOutCart,
      Paystack,
      ValidationObserver,
      ValidationProvider,
      SuccessAlert,
      Loading
    },
    computed: {
        ...mapGetters(["carts", "total"]),
        amount() {
            return (this.total  + this.deliverFee + this.service_charge) * 100;
        },
        deliverFee(){
            return this.stateObject ? this.stateObject.price : 0;
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
                first_name : this.first_name,
                last_name : this.last_name,
                delivery_fee: this.deliverFee,
                phone : this.phone,
                email : this.email,
                address : this.address,
                state : this.stateObject.name,
                lga : this.lga
            }).then(response => {
                console.log(response)
                this.CLEAR_CART()
                self.isLoading = false;
                this.successModal = true;
                //this.clearData()
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
            this.first_name = '';
            this.last_name = '';
            this.phone = '';
            this.email = '';
            this.address = '';
            this.stateObject = null;
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
.invalid{
  color: #d44950;
}

.emptycart{
    min-height: 100vh;
}
</style>
