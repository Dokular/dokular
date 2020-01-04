import Vue from 'vue'
import VueRouter from 'vue-router'

import Welcome from '../views/Welcome.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Dashboard from '../views/Dashboard.vue'
import Order from '../views/Order.vue'
import Checkout from '../views/Checkout.vue'
import Auth from '../views/authenticate'

Vue.use(VueRouter)

export const routes = [
    {
        path: '/',
        meta: { layout: 'default'},
        component: Welcome,
        name: 'landing',
    },
    {
        path: '/login',
        meta: { layout: 'default'},
        component: Login,
        name: 'login',
        meta: { guest: true}
    },
    {
        path: '/login/email/:token',
        meta: { layout: 'default'},
        props: true,
        component: Auth,
        meta: { guest: true}
    },
    {
        path: '/register',
        meta: { layout: 'default'},
        component: Register,
        name: 'register',
        meta: { guest: true}
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
        meta: { requiresAuth: true}
    },
    {
        path: '/order',
        component: Order,
        name: 'order',
        meta: { requiresAuth: true}
    },
    {
        path: '/checkout',
        component: Checkout,
        name: 'checkout',
    }
]

const createRouter = () => new VueRouter({
    mode: 'history',
    routes
})

const router = createRouter()


export default router
