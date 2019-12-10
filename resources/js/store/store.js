import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        cartlists:[]
    },

    mutations: {
        ADD_TO_CART: (state, payload) => {
            state.cartlists.push(payload)
        }
    },

    getters: {
        carts: state => {
            return state.cartlists;
        },
        total: state => {
            return
        }
    }

})
