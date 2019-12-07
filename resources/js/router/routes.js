import Welcome from '../views/Welcome.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Dashboard from '../views/Dashboard.vue'
import Chart from '../views/Charts.vue'

export const routes = [
    {
        path: '/',
        component: Welcome,
        name: 'index',
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
    },
    {
        path: '/chart',
        component: Chart,
        name: 'chart',
    }
]
