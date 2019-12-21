<template>
<div>
<div class="ftco-blocks-cover-1">
    <div class="site-section ftco-service-image-1 pb-5">
    <div class="container">
        <div class="row">
        <div class="col service text-center" v-for="(category, index) in categories" :key="index">
            <a href="#"><img :src="category.img" alt="Image" class="img-fluid"></a>
            <div class="px-md-3">
            <h3><a href="#">{{ category.name }}</a></h3>
            <p>{{ category.description }}</p>
            </div>
            <button type="button" class="btn btn-outline-secondary" @click="openPreCart(category)">Renew</button>
        </div>
        </div>
    </div>
    </div>
  </div>
    <b-modal v-if="category" v-model="show">
        <b-form-group label="Individual inline checkboxes">
            <b-form-checkbox
                v-for="product in category.products"
                v-model="selected"
                :key="product.id"
                :value="product"
                name="flavour-4a"
                inline
            >
                {{ product.name }}
            </b-form-checkbox>
        </b-form-group>
        <div class="form-group">
            Total: {{ preCartTotal }}
        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Vehicle make</label>
            <input type="text" class="form-control" v-model="selected['vehicle_make']" aria-required="true" aria-invalid="false">
        </div>
        <div class="form-group has-success">
            <label for="cc-name" class="control-label mb-1">Identification mark</label>
            <input id="cc-name" type="text" class="form-control" v-model="selected['identity_mark']" data-val="true" data-val-required="Please enter the name on card"
                autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Name of owner</label>
            <input type="text" class="form-control" v-model="selected['owner_name']" aria-required="true" aria-invalid="false">
        </div>
    <template v-slot:modal-footer="{ ok, cancel, hide }">
    <b-button size="sm" variant="success" @click="addToCart()">
        Add to cart
    </b-button>
    <b-button size="sm" variant="danger" >
        Cancel
    </b-button>
    </template>
    </b-modal>
</div>
</template>

<script>
import {mapMutations, mapActions, mapGetters} from 'vuex'
import Img1 from '../assets/images/depot_img_1.jpg'
import Img2 from '../assets/images/depot_img_2.jpg'
import Img3 from '../assets/images/depot_img_3.jpg'
import BgImg from '../assets/images/depot_hero_1.jpg'
export default {
    data() {
        return{
            show: false,
            img1: Img1,
            img2: Img2,
            img3: Img3,
            bgimg: BgImg,
            category: null,
            selected: [],
        }
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
            this.addProductToCart(this.preCarts)
            this.selected = []
            this.show = false;
        },
    },
    watch: {
        selected() {
          console.log(this.selected)
          this.CALCULATE_PRECART_TOTAL(this.selected)
        }

    },

    computed: {
       ...mapGetters(["categories","preCarts","preCartTotal"]),
    },

    created() {
        this.loadCategory()
    },
}
</script>
