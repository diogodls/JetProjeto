<template>
   <div>
      <div>
            <header>
                <h1>Usuários</h1> 

            </header>
      </div>
      

      <div class="shirt-list container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Nome</th> 
                    <th>Email</th> 
                
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in users" :key="index">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>
                        <a href="">Ver</a>
                        <a href="">Editar</a>

                    </td> 
                </tr>
            </tbody>
            
        </table>
      </div>

      <div>
        
      </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
    data(){
        return{
            users: []
        }
    },
    methods:{
        getUsers(){
            axios.get("http://127.0.0.1:8000/api/users")
            .then((response) => {
                console.log(response)
                this.users = response.data
            });
        }
    },
    created(){
        this.getUsers()
    }
}
</script>

<style>

</style>