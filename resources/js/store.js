import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        user: '',
        email: '',
    },
    mutations:{
        changeUser(state, payload){
            state.user = payload
        },
        changeEmail(state, payload){
            state.email = payload
        }
    }
})