import Vue from 'vue';
import VueRouter from 'vue-router';

//  Import Routes
import NewsFeed from './views/NewsFeed.vue';

//  Install vue router as a plugin for vue application
Vue.use(VueRouter);

//  Vue Router Instance (instantiate)
export default new VueRouter({

    routes: [

        {
            path: '/',
            component: NewsFeed
        }
    ],

    mode: 'history',

});