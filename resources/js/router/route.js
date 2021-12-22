import Home from "../view/Home.vue";

export default {
    mode: 'hash',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/docs',
            name: 'docs',
            component: () => import('../view/Docs.vue')
        },
        {
            path: '/show/:slug',
            name: 'show',
            component: () => import('../view/Show.vue')
        },
        {
            path: '/post/:repo/:slug',
            name: 'post',
            component: () => import('../view/Post.vue'),
        },

    ],
}
