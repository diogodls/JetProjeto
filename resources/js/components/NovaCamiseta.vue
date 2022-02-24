<template>
  <div class="container">
      <div class="form card">
          <input type="hidden" name="_token" :value="csrf">
          <label for="">Modelo:</label>
          <input type="text" name="modelo" v-model="shirt.modelo">

          <label for="">Descrição:</label>
          <textarea name="description" style="resize:initial" v-model="shirt.description"></textarea>

          <label for="">Preço:</label>
          <input type="number" step="0.01" name="price" v-model="shirt.price">

          <label for="">Marca:</label>
          <input type="text" name="brand" style="margin-bottom:10px" v-model="shirt.brand">

          <input type="submit" value="Adicionar Camiseta" @click="submit()">
      </div>

      <router-link :to="{name: 'camisetas'}">Voltar</router-link>
  </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return{
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            shirt: {
                modelo: '',
                description: '',
                price: '',
                brand: ''
            }
        }
    },
    methods:{
        submit(){
            axios.post("/api/camisetas", this.shirt);
            this.$router.push({name: "camisetas"})
        }
    }
}
</script>

<style>
.form{
    display: flex;
    flex-flow: column;
    margin-bottom: 15px;
    padding: 20px;
}
label{
    margin-bottom: 15px;
    margin-top: 5px;
}
</style>