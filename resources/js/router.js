import Vue from 'vue';
import VueRouter from 'vue-router';

//  Import Routes
import Start from './views/Start';

//  Install vue router as a plugin for vue application
Vue.use(VueRouter);

//  Vue Router Instance (instantiate)
export default new VueRouter({

    routes : [

        {
            path: '/', component: Start
        }
    ],

    mode: 'history',

});
