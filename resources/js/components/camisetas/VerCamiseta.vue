<template>
  <div>
      <div class="container card mt-5 infocard"  v-if="shirtsInfo">
          <img :src="shirtsInfo.image" class="shirtImage" alt="">
          <p class="mb-3">Modelo da camiseta: {{shirtsInfo.modelo}}</p>
          <p class="mb-3">Marca da camiseta: {{shirtsInfo.brand}}</p>
          <p class="mb-3">Descrição da camiseta: {{shirtsInfo.description}}</p>
          <p class="mb-3">Número de pesquisa da camiseta: {{shirtsInfo.id}}</p>
          <p class="mb-3">Preço: R$ {{shirtsInfo.price}}</p>
          <router-link class="button is-danger" :to="{name: 'camisetas'}">Fechar Informações</router-link>        

      </div> 
  </div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            shirtsInfo: [],
            shirtId: this.$route.params.id
        }
    },
    methods:{
        seeShirt(){
            axios.get(`/api/camiseta/${this.shirtId}`)
            .then(response => {
               this.shirtsInfo = response.data
               console.log(response.data)
            })
        },
    },
    created(){
        this.seeShirt()
    }
}
</script>

<style>
.shirtImage{
    width: 200px;
    height: 200px;
    margin-bottom: 5px;
}
</style>