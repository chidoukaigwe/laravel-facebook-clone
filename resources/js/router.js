import Vue from 'vue';
import VueRouter from 'vue-router';

//  Import Routes
import NewsFeed from './views/NewsFeed';
import UserShow from "./views/Users/Show"

//  Install vue router as a plugin for vue application
Vue.use(VueRouter);

//  Vue Router Instance (instantiate)
export default new VueRouter({

    routes: [

        {
            path: '/',
            name: 'home',
            component: NewsFeed
        },
        {
            path: '/users/:userId',
            name: 'user.show',
            component: UserShow
        },
    ],

    mode: 'history',

});