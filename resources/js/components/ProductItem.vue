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
                <form novalidate="novalidate">
                    <div>
                        <b-button v-b-modal="'my-modal'+index">Show Modal</b-button>
                    </div>
                </form>
            </div>
        </div>
        <b-modal :id="'my-modal'+index"
            :title="products[index].name"
            @ok="handleOk">
            <form action="" method="post" novalidate="novalidate">
                <input type="text" v-model="products[index].id" class="form-control">
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
            </form>
        </b-modal>
    </div>
</div>
</template>
<script>
import {mapMutations} from 'vuex'
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
            products: [
                {
                    id: 1,
                    name: "Vehicle License",
                    img: Licence,
                    price: 3500
                },
                {
                    id: 2,
                    name: "3rd party Insurance",
                    img: Insurance,
                    price: 4500
                },
                {
                    id: 3,
                    name: "Road Worthiness",
                    img: Worthiness,
                    price: 2500
                }
            ],
            form: {
                product_id: 0,
                id_number: '',
                type: '',
            }
        }
    },
    methods: {
        ...mapMutations(["ADD_TO_CART"]),

        addToCart() {
            this.ADD_TO_CART(this.form)
        },

        handleOk(bvModalEvt) {
            // Prevent modal from closing
            bvModalEvt.preventDefault()
            // Trigger submit handler
            this.addToCart()
        },

        hideModal() {
            this.$refs['my-modal'].hide()
        },

    },
}
</script>
