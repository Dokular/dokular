import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import { stat } from 'fs'
import { getToken, setToken, removeToken } from './auth'

Vue.use(Vuex, axios)

let Carts = window.localStorage.getItem('carts')

export const store = new Vuex.Store({
    state: {
        cartlists:Carts ? JSON.parse(Carts) : [],
        products: [],
        location: {
            state:null
        },
        delivery: {
            first_name:'',
            last_name:'',
            phone: '',
            email: '',
            address:'',
            lga: ''
        },
        delivery_fee: 0,
        categories: [],
        precarts: [],
        token: getToken(),
        Payable: true,
        Reference: '',
        service_charge: 0,
        open_cart: false
    },

    mutations: {
        LOAD_PRODUCTS: (state, payload) => {
            state.products = payload
        },

        PUSH_PRODUCT_TO_CART: (state, payload) => {
            state.cartlists.push({...payload})
        },

        STORE_CART: (state) => {
            window.localStorage.setItem('carts', JSON.stringify(state.cartlists))
        },

        REMOVE_FROM_CART: (state, payload) => {
            let index = state.cartlists.indexOf(payload)
            state.cartlists.splice(index, 1)
        },

        CLEAR_CART: (state) => {
            window.localStorage.removeItem('carts')
            state.cartlists = []
        },
        CLEAR_DELIVERY: (state) => {
            state.delivery.first_name = ''
            state.delivery.last_name = '',
            state.delivery.phone = '',
            state.delivery.email = '',
            state.delivery.address = '',
            state.delivery.lga = ''
        },
        LOAD_CATEGORY: (state, payload) => {
            state.categories = payload
        },

        CALCULATE_PRECART_TOTAL: (state, payload) => {
            state.precarts = payload
        },

        SET_TOKEN: (state, token) => {
            state.token = token;
            setToken(token);
        },

        SET_PAYABLE: (state, status) => {
            state.Payable = status
        },

        SET_SERVICE_CHARGE: (state, charge) => {
            state.service_charge = charge
        },

        PAYSTACK_REFERENCE: (state, reference) => {
            state.Reference = reference
        },

        OPEN_CART: (state, status) => {
            state.open_cart = status
        }
    },

    actions: {
        loadProducts({commit}) {
            axios.get(process.env.MIX_API+'products').then(response => {
                // console.log(response.data.data)
                commit('LOAD_PRODUCTS',response.data.data)
            }).catch(error => {
                console.log(error)
            })
        },
        loadCategory({commit}) {
            axios.get(process.env.MIX_API+'categories')
            .then(response => {
                // console.log(response.data.data)
                commit('LOAD_CATEGORY',response.data.data)
            }).catch(error => {
                console.log(error)
            })
        },
        getServiceCharge({commit}) {
            axios.get(process.env.MIX_API+'charge')
            .then(response => {
                console.log(response.data.charge)
                commit('SET_SERVICE_CHARGE',response.data.charge)
            }).catch(error => {
                console.log(error)
            })
        },
        addProductToCart({commit}, payload){
            commit('PUSH_PRODUCT_TO_CART', payload)
            commit('STORE_CART')
        },

        removeFromCarts({commit}, payload){
            commit('REMOVE_FROM_CART', payload)
            commit('STORE_CART')
        },

        logout({commit, state}){
            commit('SET_TOKEN', '')
            removeToken()
        }
    },

    getters: {
        carts: state => {
            return state.cartlists;
        },
        total: (state, getters) => {
            let total = 0;
            getters.carts.forEach( cart => {
                total += Number(cart.total)
            })
            return total;
        },

        products: state => {
            return state.products;
        },

        categories: state => {
            return state.categories;
        },

        preCarts: state => {
           return state.precarts;
        },

        getToken: state => {
            return state.token;
        },

        loggedInStatus: (state, getters) => {
            if(!getters.getToken){
                return false
            }
            return true;
        },

        getDelivery: state => {
            return state.delivery
        },

        getDeliveryFee: state => {
          const getState = state.location.state;

          return !getState ? 0 : getState.price ;
        },

        payable: state => {
            return state.Payable
        },

        email: state => {
           return state.delivery.email
        },

        reference: state => {
            return state.Reference
        },

        serviceCharge: state => {
            return state.service_charge
        },

        showCart: state => {
            return state.open_cart
        }
    },
})
