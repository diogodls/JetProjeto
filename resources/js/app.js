import Vue from "vue";
import VueRouter from "vue-router";
import Login from "./components/Login.vue";

const app = new Vue({
    el: '#app',
    components:{
        Login
    },
    router: VueRouter
});
