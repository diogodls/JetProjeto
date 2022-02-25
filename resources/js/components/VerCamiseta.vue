<template>
  <div>
      <div class="container card mt-5 infocard"  v-if="shirtsInfo">
          <p>Modelo da camiseta: {{shirtsInfo.modelo}}</p>
          <p>Marca da camiseta: {{shirtsInfo.brand}}</p>
          <p>Descrição da camiseta: {{shirtsInfo.description}}</p>
          <p>Número de pesquisa da camiseta: {{shirtsInfo.id}}</p>
          <p>Preço: R$ {{shirtsInfo.price}}</p>
          <router-link class="button is-danger" :to="{name: 'camisetas'}">Fechar Informações</router-link>        
      </div> 
  </div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            shirtsInfo: []
        }
    },
    methods:{
        seeShirt(id){
            axios.get(`/api/camiseta/${id}`)
            .then(response => {
               this.shirtsInfo = response.data
            })
        },
    },
    created(){
        this.seeShirt()
    }
}
</script>

<style>

</style>