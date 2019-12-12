<template>
<div class="row">
    <div class="col-lg-4"  v-for="(product, index) in products" :key="index">
        <div class="card">
            <div class="card-header">{{ product.name }}</div>
            <img :src="product.img" class="card-img-top" alt="" style="hight:200px;weigh:200">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Pay Invoice</h3>
                </div>
                <hr>
                <form novalidate="novalidate" @submit.prevent="preCart(index)">
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Price N{{ product.price }}.00</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <b-modal v-if="form.product_id != 0" :title="products[form.product_id - 1].name"
        v-model="show">
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Identification number</label>
            <input type="text" v-model="form.id_number" class="form-control" aria-required="true" aria-invalid="false">
        </div>
        <div class="form-group has-success">
            <label for="cc-name" class="control-label mb-1">Type of vehicle</label>
            <input id="cc-name" v-model="form.type" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
        </div>
    <template v-slot:modal-footer="{ ok, cancel, hide }">
    <b-button size="sm" variant="success" @click="addToCart()">
        Add to cart
    </b-button>
    <b-button size="sm" variant="danger" @click="cancel()">
        Cancel
    </b-button>
    </template>
    </b-modal>
</div>
</template>
<script>
import {mapMutations, mapActions, mapGetters} from 'vuex'
import Licence from '../assets/images/licence.jpg'
import Insurance from '../assets/images/insurance.jpg'
import Worthiness from '../assets/images/rw.jpeg'
import Modal from './ProductAddToCartModal'

export default {
    components: {
        Modal
    },
    data() {
        return {

            show: false,
            form: {
                product_id: 0,
                product_name: '',
                id_number: '',
                type: '',
            }
        }
    },
    computed: {
        ...mapGetters(["products"]),
    },
    methods: {
        ...mapMutations(["ADD_TO_CART"]),
        ...mapActions(["loadProducts"]),
        addToCart() {
            this.ADD_TO_CART(this.form)
            this.form.product_id = ''
            this.form.id_number = ''
            this.form.type = ''
            this.show = false
        },
        preCart(index){
            this.form.product_id = this.products[index].id
            this.show = true
        }
    },
    created() {
        this.loadProducts()
    }
}
</script>
