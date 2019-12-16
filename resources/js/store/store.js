import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import { stat } from 'fs'

Vue.use(Vuex, axios)

let Carts = window.localStorage.getItem('carts')

export const store = new Vuex.Store({
    state: {
        cartlists:Carts ? JSON.parse(Carts) : [],
        products: []
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
        },

        addProductToCart({commit}, payload){
            commit('PUSH_PRODUCT_TO_CART', payload)
            commit('STORE_CART')
        },

        removeFromCarts({commit}, payload){
            commit('REMOVE_FROM_CART', payload)
            commit('STORE_CART')
        }
    },

    getters: {
        carts: state => {
            return state.cartlists;
        },
        total: (state, getters) => {
            let total = 0;
            getters.carts.forEach( cart => {
                total += Number(cart.price)
            })
            return total;
        },
        products: state => {
            return state.products;
        }
    },


})
