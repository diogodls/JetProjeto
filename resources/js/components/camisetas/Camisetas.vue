<template>
  <div>
      <div>
            <header>
                <h1>Camisetas</h1> 
                <router-link :to="{name: 'nova-camiseta'}">Nova Camiseta</router-link>
            </header>
      </div>

      <div class="shirt-list container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Modelo</th> 
                    <th>Preço</th> 
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(shirt, index) in shirts" :key="index">
                    <td>{{shirt.id}}</td>
                    <td>{{shirt.modelo}}</td>
                    <td>{{shirt.price}}</td>
                    <td>
                        <button class="button is-success" @click="seeShirt(shirt.id)">Ver Informações</button>
                        <button class="button is-danger" @click="deleteShirt(shirt.id)">Excluir Camiseta</button>
                    </td> 
                </tr>
            </tbody>
            
        </table>
      </div>

      <router-view></router-view>

  </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return{
            shirts: [],
            shirtsInfo: null
        }
    },
    methods:{
        getShirt(){
            axios.get("/api/camisetas")
            .then((response) => {
                this.shirts = response.data
            });
        },
        seeShirt(id){
            this.$router.push({path: `/ver_camiseta/${id}`})
        },
        deleteShirt(id){
            let resultado = confirm('Você deseja mesmo excluir esta camiseta?');
            if(resultado){
                axios.delete(`/api/camiseta/${id}`)
                this.getShirt()
            }
            
        }
    },
    created(){
        this.getShirt()
    }
}
</script>

<style>

.infocard{
    padding: 20px;
}
.shirt-list{
    max-height: 432px;
    overflow-y: auto;
}

</style>