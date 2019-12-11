<template>
    <div>
        <div class="top-campaign" v-if="carts.length">
            <h3 class="title-3 m-b-30">Add to cart</h3>
            <div class="table-responsive">
                {{ carts }}
                <table class="table table-top-campaign">
                    <tbody>
                        <tr v-for="(cart, index) in carts" :key="index">
                            <td>{{ cart.product_id }}</td>
                            <td>{{ cart.id_number}}</td>
                            <td>{{ cart.type }}</td>
                            <td>$ {{ cart.price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from 'vuex'
export default {
    computed: {
        ...mapGetters(['carts']),
    }
}
</script>
