import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex, axios)

export const store = new Vuex.Store({
    state: {
        cartlists:[],
        products: []
    },

    mutations: {
        ADD_TO_CART: (state, payload) => {
            state.cartlists.push(payload)
        },
        LOAD_PRODUCTS: (state, payload) => {
            state.products = payload
        }
    },

    getters: {
        carts: state => {
            return state.cartlists;
        },
        total: state => {
            return
        },
        products: state => {
            return state.products;
        }
    },

    actions: {
        loadProducts({commit}) {
            axios.get(process.env.MIX_API+'products').then(response => {
                console.log(response)
                commit('LOAD_PRODUCTS',response.data.data)
            }).catch(error => {
                console.log(error)
            })
        }
    }

})
