<template>
    <div>
        <h4 class="mb-3">Delivery address</h4>
        <div class="row">
        <div class="col-md-6">
            <label for="firstName">First name</label>
            <input type="text"
                class="form-control"
                v-validate="'required'"
                data-vv-as="first name"
                v-model="delivery.first_name"
                name="first_name"
                placeholder=""
                required
                @input="validate"
            >
            <span>{{ errors.first('first_name') }}</span>
        </div>
        <div class="col-md-6">
            <label for="lastName">
                Last name
            </label>
            <input
                type="text"
                class="form-control"
                v-validate="'required'"
                data-vv-as="last name"
                v-model="delivery.last_name"
                name="last_name"
                placeholder=""
                required
                @input="validate"
            >
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <label for="phone">Phone </label>
            <input
                type="phone"
                class="form-control"
                v-validate="'required'"
                v-model="delivery.phone"
                placeholder="08030000000"
                name="phone"
                required
                @input="validate"
            >
        </div>
        <div class="col-md-6">
            <label for="email">Email </label>
            <input
                type="email"
                class="form-control"
                v-validate="'required|email'"
                v-model="delivery.email"
                name="email"
                required
                placeholder="you@example.com"
                @input="validate"
            >
        </div>
        </div>

        <div class="row">
        <div class="col-md-6">
            <label for="state">State</label>
            <select
              class="form-control"
              v-validate="'required'"
              @change="selectedState($event)"
              name="state"
              required
              @input="validate"
            >
                <option value="" disabled selected>Select state</option>
                <option
                  v-for="(state, index) in states"
                  :value="JSON.stringify(state)"
                  :key="index"
                >
                  {{ state.name }}
                </option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="lga">L.G.A</label>
            <select
                @change="lgaSelected($event)"
                v-validate="'required'"
                class="form-control"
                name="lga"
                required
            >
                <option value="" disabled selected>Select local government</option>
                <option
                  :value="lga.id"
                  v-for="(lga, index) in lgas"
                  :key="index"
                >
                    {{ lga.name }}
                </option>
            </select>
        </div>
        </div>
        <div class="row">
        <div class="col">
            <label for="address">Delivery address</label>
            <input type="text"
                class="form-control"
                v-validate="'required'"
                v-model="delivery.address"
                placeholder="1234 Main St"
                name="address"
                @input="validate"
                required
            >
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
            states: [],
            lgas: []
        }
    },
    created() {
        this.getState();
    },
    mounted(){
        this.validate();
    },
    watch: {
        stateData: function(newValue){
            this.delivery.state_id = newValue.id;
            this.delivery.fee = newValue.price;
        }
    },
    computed: {
        ...mapState(['delivery','location'])
    },
    methods: {
        ...mapMutations(['SET_PAYABLE']),
        getState(){
            axios.get(process.env.MIX_API+'states')
            .then(response => {
                this.states = response.data[0]
                // console.log(response.data[0])
            }).catch(error => {
                console.log(error)
            })
        },
        getStateLgas(id){
            axios.get(process.env.MIX_API+'lgas/'+id)
            .then(response => {
                //this.states = response.data[0]
                //console.log(response.data.data)
                this.lgas = response.data.data
            }).catch(error => {
                console.log(error)
            })
        },
        selectedState(event){
            let state = JSON.parse(event.target.value)
            this.location.state = state
            //console.log(state)
            this.getStateLgas(state.id)
            this.delivery.lga = ''
        },
        lgaSelected: function(event){
          //console.log(event.target.value)
          this.delivery.lga = parseInt(event.target.value)
          this.validate()
        },
        validate(){
            this.$validator.validate().then(valid => {
                if (!valid) {
                  this.SET_PAYABLE(true)
                }else{
                   this.SET_PAYABLE(false)
                }
            });
        }
    }
}
</script>
<style scoped>
input:invalid {
  border-color: red;
}
.row{
    margin-bottom: 15px;
}
</style>
