import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes.js";
import store from "./store.js"

Vue.use(VueRouter);

const vm = new Vue({
    el: '#app',
    store,
    router: new VueRouter(routes)
});
