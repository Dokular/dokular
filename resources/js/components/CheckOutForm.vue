<template>
    <div>
        <h4 class="mb-3">Delivery address</h4>
        <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text"
                class="form-control"
                v-model="delivery.first_name"
                placeholder=""
                required
            >
        </div>

        <div class="col-md-6 mb-3">
            <label for="lastName">
                Last name
            </label>
            <input type="text"
                    class="form-control"
                    v-model="delivery.last_name"
                    placeholder=""
                    required
            >
        </div>
        </div>
        <div class="row">
        <div class="mb-3 col-md-6">
            <label for="phone">Phone </label>
            <input type="phone"
                    class="form-control"
                    v-model="delivery.phone"
                    placeholder="08030000000"
            >
        </div>
        <div class="mb-3 col-md-6">
            <label for="email">Email </label>
            <input type="email"
                    class="form-control"
                    v-model="delivery.email"
                    placeholder="you@example.com"
            >
        </div>
        </div>
        <div class="mb-3">
            <label for="address">Delivery address</label>
            <input type="text"
                class="form-control"
                v-model="delivery.address"
                placeholder="1234 Main St"
                required
            >
        </div>
        <div class="row">
        <div class="col-md-5 mb-3">
            <label for="state">State</label>
            <select
                class="custom-select d-block w-100"
                v-model="stateData"
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
        </div>
        <div class="col-md-4 mb-3">
            <label for="lga">L.G.A</label>
            <select class="custom-select d-block w-100"
                    v-model="delivery.lga"
                    required>
                <option value="">
                    Choose...
                </option>
            </select>
        </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import {mapMutations, mapState} from 'vuex'

export default {
    data(){
        return {
            trigger: this.validation,
            stateData: null,
            states: [],
        }
    },
    created() {
        this.getState();
    },
    watch: {
        stateData: function(newValue){
            this.delivery.state_id = newValue.id;
            this.delivery.fee = newValue.price;
        }
    },
    computed: {
        ...mapState(['delivery']),
    },
    methods: {
        getState(){
            axios.get(process.env.MIX_API+'states')
            .then(response => {
                this.states = response.data[0]
                // console.log(response.data[0])
            }).catch(error => {
                console.log(error)
            })
        },
    }
}
</script>
