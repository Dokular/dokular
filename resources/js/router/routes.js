import Welcome from '../views/Welcome.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Dashboard from '../views/Dashboard.vue'
import Order from '../views/Order.vue'
import Checkout from '../views/Checkout.vue'

export const routes = [
    {
        path: '/',
        meta: { layout: 'default'},
        component: Welcome,
        name: 'index',
    },
    {
        path: '/login',
        meta: { layout: 'default'},
        component: Login,
        name: 'login',
    },
    {
        path: '/register',
        meta: { layout: 'default'},
        component: Register,
        name: 'register',
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
    },
    {
        path: '/order',
        component: Order,
        name: 'order',
    },
    {
        path: '/checkout',
        component: Checkout,
        name: 'checkout',
    }
]
