import { createRouter, createWebHashHistory } from "vue-router";

import AppLayout from '../components/layouts/AppLayout.vue';
import store from "../store";

const routes = [
    {
        path: '/admin',
        name: 'Admin',
        redirect: '/dashboard',
        component: AppLayout,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: "dashboard",
                name: "Dashboard",
                component: () => import('../pages/admin/Dashboard/Dashboard.vue'),
            },
            {
                path: "city",
                name: "City",
                component: () => import('../pages/admin/city/City.vue'),
            },

        ]
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../pages/Auth/Login.vue'),
        meta: {
            requiresGuest: true
        }
    },

    // not found 404
    {
        path: '/:pathMatch(.*)',
        name: 'notfound',
        component: () => import('../pages/Page404/Page404.vue'),
    },
];



const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: 'login' })
    } else if (to.meta.requiresGuest && store.state.user.token) {
        next({ name: 'Dashboard' })
    } else {
        next();
    }

})

export default router;