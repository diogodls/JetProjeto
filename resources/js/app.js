import Vue from "vue";
import VueRouter from "vue-router";
import Login from "./components/Login.vue";
import routes from "./routes.js";

Vue.use(VueRouter);

const vm = new Vue({
    el: '#app',
    components:{
        Login
    },
    router: new VueRouter(routes)
});
