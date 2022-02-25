<template>
  <div>
      <div>
            <header>
                <h1>Camisetas</h1> 
                <router-link :to="{name: 'nova-camiseta'}">Nova Camiseta</router-link>
            </header>
      </div>

      <div class="shirt-list container card">
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

      <div class="container card mt-5 infocard"  v-if="shirtsInfo">
          <p>Modelo da camiseta: {{shirtsInfo.modelo}}</p>
          <p>Marca da camiseta: {{shirtsInfo.brand}}</p>
          <p>Descrição da camiseta: {{shirtsInfo.description}}</p>
          <p>Número de pesquisa da camiseta: {{shirtsInfo.id}}</p>
          <p>Preço: R$ {{shirtsInfo.price}}</p>

          <button class="button is-danger">Fechar Informações</button>        
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
            axios.get("http://127.0.0.1:8000/api/camisetas")
            .then((response) => {
                this.shirts = response.data
            });
        },
        seeShirt(id){
            axios.get(`/api/camiseta/${id}`)
            .then(response => {
               this.shirtsInfo = response.data
            })
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