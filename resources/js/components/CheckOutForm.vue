<template>
    <div>
        <ValidationObserver ref="observer" v-slot="{ invalid }">
            <h4 class="mb-3">Delivery address</h4>
            <div class="row">
            <div class="col-md-6 mb-3">
                <ValidationProvider name="First name" rules="required" v-slot="{ errors }">
                    <label for="firstName">First name</label>
                    <input type="text"
                        class="form-control"
                        v-model="first_name"
                        placeholder=""
                        required>
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>
            </div>

            <div class="col-md-6 mb-3">
                <ValidationProvider name="Last name" rules="required" v-slot="{ errors }">
                    <label for="lastName">
                        Last name
                    </label>
                    <input type="text"
                            class="form-control"
                            v-model="last_name"
                            placeholder=""
                            required
                    >
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            </div>
            <div class="mb-3">
                <ValidationProvider name="Phone number" rules="required" v-slot="{ errors }">
                    <label for="phone">Phone </label>
                    <input type="phone"
                            class="form-control"
                            v-model="phone"
                            placeholder="08030000000"
                    >
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            <div class="mb-3">
                <ValidationProvider name="email" rules="required|email" v-slot="{ errors }">
                    <label for="email">Email </label>
                    <input type="email"
                            class="form-control"
                            v-model="email"
                            placeholder="you@example.com"
                    >
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            <div class="mb-3">
                <ValidationProvider name="adddress" rules="required" v-slot="{ errors }">
                    <label for="address">Delivery address</label>
                    <input type="text"
                            class="form-control"
                            v-model="address"
                            placeholder="1234 Main St"
                            required>
                    <span class="invalid">{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            <div class="row">
            <div class="col-md-5 mb-3">
                <ValidationProvider name="state" rules="required" v-slot="{ errors }">
                    <label for="state">State</label>
                    <select
                        class="custom-select d-block w-100"
                        v-model="stateObject"
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
                    <span class="invalid">{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            <div class="col-md-4 mb-3">
                <label for="lga">L.G.A</label>
                <select class="custom-select d-block w-100"
                        v-model="lga"
                        required>
                    <option value="">
                        Choose...
                    </option>
                </select>
            </div>
            </div>
        </ValidationObserver>
    </div>
</template>
<script>
export default {
    data(){
        return {
            first_name:'',
            last_name:'',
            phone: '',
            email: '',
            address:'',
            service_charge: 0,
            stateObject: null,
            lga: '',
            trigger: false,
            user: 0,
            states:[],
            componentKey: 0,
            reference:'',
        }
    }
}
</script>
