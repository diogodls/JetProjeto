<template>
<div>
    <nav class="navbar is-active" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <h1><a href="/">JetCamisas</a> </h1>
        </div>
    
        <div class="navbar-menu">
            <div class="navbar-start">
                <router-link class="navbar-item" :to="{name: 'dashboard'}">
                    Dashboard
                </router-link>
    
                <router-link class="navbar-item" :to="{name: 'camisetas'}">
                    Minhas camisetas
                </router-link>
    
                <router-link class="navbar-item" :to="{name: 'usuarios'}">
                    Meus usuários
                </router-link>
            </div>
    
            <div class="navbar-end">
                <div class="navbar-item">
                    <p>Olá, {{user}}!</p>
                </div>
                <div class="navbar-item">
                    <a href="/logout" >Sair</a>
                </div>                
            </div>

        </div>
    </nav>
  
      
    <div class="content" style="background:white">
        <router-view></router-view>
    </div>
</div>
</template>

<script>
import {mapState} from "vuex";

export default {
    data(){
        return{
            userInfo: {

            }
        }
    },
    computed:{
        ...mapState(["user"])
    },
    methods:{
        clearEmail(){
            this.$store.commit("changeEmail", null)
        }
    },
    created(){

    }
}
</script>

<style>
.navbar{
    display: flex;
    justify-content: space-between;
}

</style>