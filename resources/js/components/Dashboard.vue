<template>
  <div>
    <div>
        <h1>Dashboard</h1>
    </div>

    <div class="columns container">

        <div class="column">
            <div class="card">
                <div class="card-header">
                    <h3>Camisetas</h3>
                </div>
                <div class="card-body">
                    <p>Total de camisetas no sistema: {{totalCamisetas}}</p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="card-header">
                    <h3>Modelos de camisetas cadastrados:</h3>
                </div>
                <div class="card-body">
                    <span v-if="totalCamisetas === 0">Nenhum modelo cadastrado ainda!</span>
                    <ul>
                        <li v-for="(shirt, index) in shirts" :key="index">{{shirt.modelo}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="card-header">
                    <h3>Usuários</h3>
                </div>
                <div class="card-body">
                    <p>Total de usuários cadastrados: {{totalUsers}}</p>   
                </div>
            </div>
        </div>

    </div>


  </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return{
            totalUsers: 0,
            shirts: [],
            totalCamisetas: 0,
        }
    },
    methods:{
        getInfo(){
            axios.get("/api/users")
            .then((response) => {
                this.totalUsers = response.data.length
            });
            axios.get("/api/camisetas")
            .then((response) => {  
                this.totalCamisetas = response.data.length
                this.shirts = response.data
            });
        }
    },
    mounted(){
        this.getInfo()
    }
}
</script>

<style scoped>
.card-header{
    padding: 9px;
}
.card-body{
    padding: 9px;
}

</style>