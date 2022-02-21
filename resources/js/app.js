import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes.js";

Vue.use(VueRouter)

 const app = new Vue({
     el: '#app',
     router: routes
 });
 