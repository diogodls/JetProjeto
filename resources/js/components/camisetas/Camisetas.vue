<template>
  <div>
      <div class="mb-4">
            <header>
                <div class="columns container">
                    <div class="column is-10">
                        <h1>Camisetas</h1>
                        <router-link class="button" :to="{name: 'nova_camiseta'}">Nova Camiseta</router-link>
                    </div>
                    <div class="column">
                       Pesquisa por modelo: <input class="input" type="text" name="search" v-model="search" @keyup="findShirt()">
                    </div>  
                </div>
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
                        <button class="button is-info" @click="editShirt(shirt.id)">Editar Camiseta</button>
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
            shirtsInfo: null,
            search: '',
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
            
        },
        editShirt(id){
            this.$router.push({path: `/editar_camiseta/${id}`})
        },
        findShirt(){
            let cleanSearch = (this.search || '').trim()

            if (!cleanSearch.length) {
                this.getShirt()
            }

            if(cleanSearch !== null){
                axios.post(`api/camiseta/${cleanSearch}`)
                .then(response => {
                    this.shirts = response.data
                })
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