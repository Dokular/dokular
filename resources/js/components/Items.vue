<template>
<div>
<div class="ftco-blocks-cover-1">
    <div class="site-section ftco-service-image-1 pb-5">
    <div class="container">
        <div class="row">
        <div
          class="col-md-4 service text-center mx-auto"
          v-for="(category, index) in categories"
          :key="index"
        >
            <img :src="category.img" alt="Image" class="img-fluid">

            <div class="px-md-3">
            <h3 class="cat-name">{{ category.name }}</h3>
                <p>
                  {{ category.description }}
                </p>
                <hr />
                <span
                  v-for="(product, index) in category.products"
                  :key="index"
                >
                    {{ product.name.toUpperCase() }}
                    <font-awesome-icon icon="arrow-circle-right" />
                    <span class="pro-price">
                        N{{ product.price }}
                    </span>
                    <hr />
                </span>
            </div>
            <button
              type="button"
              class="btn btn-outline-secondary"
              @click="openPreCart(category)"
            >
                Renew
            </button>
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

export default {
    data() {
        return{
            showCartForm: false,
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

 .cat-name{
    color: #0f75bc;
    font-weight: bold;
 }
.pro-price{
    color: #0f75bc;
    font-weight: bold;
}

.btn-outline-secondary{
    color: #fff;
    border-color: #0f75bc;
    background-color: #0f75bc;
    width: 300px;
}

div.service{
   margin-bottom: 30px;
}
</style>
