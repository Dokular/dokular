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
        categories: [],
        precarts: [],
        token: getToken(),
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

        LOAD_CATEGORY: (state, payload) => {
            state.categories = payload
        },

        CALCULATE_PRECART_TOTAL: (state, payload) => {
            state.precarts = payload
        },

        SET_TOKEN: (state, token) => {
            state.token = token;
            setToken(token);
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
            axios.get(process.env.MIX_API+'categories').then(response => {
                // console.log(response.data.data)
                commit('LOAD_CATEGORY',response.data.data)
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
        }
    },
})
