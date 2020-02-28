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
            <h3>{{ category.name }}</h3>
            <p>
                {{ category.description }}
                <hr />
                <span
                  v-for="(product, index) in category.products"
                  :key="index"

                >
                    {{ product.name }} => <span class="{category.name == 'saloon' ? saloon  : suv}">
                        N{{ product.price }}
                        </span>
                    <hr />
                </span>
            </p>
            </div>
            <button type="button" class="btn btn-outline-secondary" @click="openPreCart(category)">Renew</button>
        </div>
        </div>
    </div>
    </div>
</div>
  <CartForm
    :show="showCartForm"
    :getCategory="category"
    @close="closeModal"
  />
</div>
</template>

<script>
import {mapMutations, mapActions, mapGetters} from 'vuex'
import CartForm from '../components/ItemCartForm'
import Img1 from '../assets/images/depot_img_1.jpg'
import Img2 from '../assets/images/depot_img_2.jpg'
import Img3 from '../assets/images/depot_img_3.jpg'
import BgImg from '../assets/images/depot_hero_1.jpg'

export default {
    data() {
        return{
            showCartForm: false,
            img1: Img1,
            img2: Img2,
            img3: Img3,
            bgimg: BgImg,
            category: null,
            base_url: process.env.MIX_APP_URL,
        }
    },

    components: {
        CartForm
    },

    methods: {
        ...mapActions(["loadCategory"]),

        openPreCart(category){
            this.category = category
            this.showCartForm = true
        },

        closeModal(){
            this.showCartForm = false
        }
    },

    computed: {
       ...mapGetters(["categories"]),
    },

    created() {
        this.loadCategory()
        this.validate
    },
}
</script>
<style scoped>
 .suv{
     color: red;
 }
 .saloon{
color: blue;
 }
</style>
