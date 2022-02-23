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
                    <!---->
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="card-header">
                    <h3></h3>
                </div>
                <div class="card-body">
                    <!---->
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="card-header">
                    <h3>Usuários</h3>
                </div>
                <div class="card-body">
                    Total de usuários cadastrados: {{totalUsers}}
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
            users: []
        }
    },
    methods:{
        getInfo(){
            axios.get("http://127.0.0.1:8000/api/users")
            .then((response) => {
                console.log(response)
                this.users = response.data
                console.log(this.users)
                this.totalUsers = this.users.length
            });
        }
    },
    mounted(){
        this.getInfo()
    }
}
</script>

<style>

</style>