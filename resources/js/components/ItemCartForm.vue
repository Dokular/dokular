<template>
    <div>
        <b-modal
          v-if="category"
          v-model="showModal"
          @hidden="closedModal"
          hide-footer
        >
            <form-wizard
              :title="title"
              :subtitle="subtitle"
              @on-complete="addToCart"
              color="#0f75bc"
            >
                <tab-content title="Vehicle info" :before-change="validateFirstStep">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Vehicle make</label>
                        <input
                            type="text"
                            class="form-control"
                            v-validate="'required'"
                            data-vv-as="car make"
                            v-model="cart.make"
                            name="car_make"
                            aria-required="true"
                            aria-invalid="false"
                            placeholder="E.g Toyota, Kia etc"
                        >
                        <span>{{ errors.first('car_make') }}</span>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Vehicle plate number</label>
                        <input
                          id="cc-name"
                          type="text"
                          class="form-control"
                          v-validate="'required'"
                          v-model="cart.mark"
                          name="mark"
                          data-val="true"
                        >
                        <span>{{ errors.first('mark') }}</span>
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Owner's full name</label>
                        <input
                          type="text"
                          class="form-control"
                          data-vv-as="car owner name"
                          v-validate="'required'"
                          v-model="cart.owner"
                          name="owner_name"
                        >

                        <span>{{ errors.first('owner_name') }}</span>
                    </div>
                </tab-content>
                <tab-content title="Papers to renew" :before-change="validateSecondStep">
                    <b-form-checkbox
                        v-for="product in category.products"
                        v-model="cart.products"
                        :key="product.id"
                        :value="product"
                        name="flavour-4a"
                        inline
                    >
                        {{ product.name }}
                    </b-form-checkbox>
                    <div class="form-group">
                        Total: {{ preCartTotal }}
                    </div>
                </tab-content>
            </form-wizard>
        </b-modal>
    </div>
</template>
<script>
import {mapMutations, mapActions, mapGetters} from 'vuex'
export default {
    props: {
        show: {
            type: Boolean,
            default: false
        },
        title: {
            type: String,
            default: 'Vehicle paper renewal'
        },
        subtitle: {
            type: String,
            default: 'Vehicle license, insurance, road worthiness renewal.'
        },
        getCategory: {
            type: Object,
            default: function() { return {} }
        },
    },
    data() {
        return{
            category: null,
            selected: [],
            cart: {
                owner: '',
                make: '',
                mark: '',
                total: '',
                products: []
            },
            base_url: process.env.MIX_APP_URL,
            showModal: false
        }
    },
    watch: {
        show(newVal){
            this.showModal = newVal
        },
        getCategory(newVal) {
            this.category = newVal
        }
    },
    computed: {
       ...mapGetters(["categories","preCarts"]),

        preCartTotal() {
            let total = 0;
            this.cart.products.forEach( cart => {
                total += Number(cart.price)
            })
            return total
        },
        checked() {
            return [
                this.cart.products.length > 0 || false
            ]
        },
    },
    methods: {
        ...mapMutations(['CALCULATE_PRECART_TOTAL',"OPEN_CART"]),
        ...mapActions(["addProductToCart"]),
        addToCart() {
            this.cart.total = this.preCartTotal
            this.addProductToCart(this.cart)
            this.cart.owner = '',
            this.cart.make = '',
            this.cart.mark = '',
            this.cart.total = '',
            this.cart.products = []
            this.showModal = false;
            this.OPEN_CART(true)
        },
        validateSecondStep() {
            return this.checked[0];
        },
        validateFirstStep: function() {
            return new Promise((resolve, reject) => {
                this.$validator.validate().then(valid => {
                    if (!valid) {
                      reject(false)
                    }else{
                      resolve(true)
                    }
                });
            })
        },
        closedModal () {
          this.$emit('close');
        },
    }
}
</script>
