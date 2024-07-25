//import vue router
import { createRouter, createWebHistory } from 'vue-router'

//define a routes
const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import( /* webpackChunkName: "home" */ '../views/dashboard.vue')
    },
    {
        path: '/ruangs',
        name: 'ruangs.index',
        component: () => import( /* webpackChunkName: "index" */ '../views/ruangs/index.vue')
    },
    {
        path: '/create',
        name: 'ruangs.create',
        component: () => import( /* webpackChunkName: "create" */ '../views/ruangs/create.vue')
    },
    {
        path: '/edit/:id',
        name: 'ruangs.edit',
        component: () => import( /* webpackChunkName: "edit" */ '../views/ruangs/edit.vue')
    },
    {
        path: '/user',
        name: 'user.index',
        component: () => import('../views/user/index.vue')
    }
]

//create router
const router = createRouter({
    history: createWebHistory(),
    routes // <-- routes,
})

export default router