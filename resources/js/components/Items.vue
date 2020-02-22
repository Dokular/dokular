<template>
<div>
<div class="ftco-blocks-cover-1">
    <div class="site-section ftco-service-image-1 pb-5">
    <div class="container">
        <div class="row">
        <div class="col-md service text-center "  v-for="(category, index) in categories" :key="index">
            <a href="#">
              <img :src="category.img" alt="Image" class="img-fluid">
            </a>
            <div class="px-md-3">
            <h3><a href="#">{{ category.name }}</a></h3>
            <p>
                {{ category.description }}
                <br>
                <span
                  v-for="(product, index) in category.products"
                  :key="index"
                >
                    {{ product.name }} => N{{ product.price }}
                    <br>
                </span>
            </p>
            </div>
            <button type="button" class="btn btn-outline-secondary" @click="openPreCart(category)">Renew</button>
        </div>
        </div>
    </div>
    </div>
  </div>
    <b-modal v-if="category" v-model="show" hide-footer >
        <form-wizard :title="title" :subtitle="subtitle" @on-complete="addToCart">
            <tab-content title="Vehicle info" :before-change="validateFirstStep">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Vehicle make</label>
                    <input
                        type="text"
                        class="form-control"
                        v-model="cart.make"
                        aria-required="true"
                        aria-invalid="false"
                        placeholder="E.g Toyota, Kia etc"
                    >
                </div>
                <div class="form-group has-success">
                    <label for="cc-name" class="control-label mb-1">Identification mark</label>
                    <input id="cc-name" type="text" class="form-control" v-model="cart.mark" data-val="true" data-val-required="Please enter the name on card"
                        autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Name of owner</label>
                    <input type="text" class="form-control" v-model="cart.owner" aria-required="true" aria-invalid="false">
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
import { ValidationObserver, ValidationProvider } from "vee-validate";
import {mapMutations, mapActions, mapGetters} from 'vuex'
import Img1 from '../assets/images/depot_img_1.jpg'
import Img2 from '../assets/images/depot_img_2.jpg'
import Img3 from '../assets/images/depot_img_3.jpg'
import BgImg from '../assets/images/depot_hero_1.jpg'
export default {
    props: {
        title: {
            type: String,
            default: 'Vehicle paper renewal'
        },
        subtitle: {
            type: String,
            default: 'Vehicle license, insurance, road worthiness renewal.'
        },
    },
    data() {
        return{
            show: false,
            img1: Img1,
            img2: Img2,
            img3: Img3,
            bgimg: BgImg,
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
        }
    },
    components: {
        ValidationObserver,
        ValidationProvider
    },
    methods: {
        ...mapMutations(['CALCULATE_PRECART_TOTAL']),
        ...mapActions([
            "loadCategory",
            "addProductToCart"
        ]),

        openPreCart(category){
            this.category = category
            this.show = true
        },

        addToCart() {
            this.cart.total = this.preCartTotal
            this.addProductToCart(this.cart)
            this.cart.owner = '',
            this.cart.make = '',
            this.cart.mark = '',
            this.cart.total = '',
            this.cart.products = []
            this.show = false;
        },
        validateFirstStep() {
            return this.$refs.observer.validate()
        },
        validateSecondStep() {
            return this.checked[0];
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
        }
    },

    created() {
        this.loadCategory()
        this.validate
    },
}
</script>
