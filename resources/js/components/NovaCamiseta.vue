<template>
  <div class="container">
      <div class="form card">
            <input type="hidden" name="_token" :value="csrf">
            <div class="form-group">
                <label for="imagem">Imagem da camiseta:</label>
                <input type="file" id="imagem" name="imagem" class="form-control-file" @change="onChange">
            </div>
            <div class="form-group">
                <label for="">Modelo:</label>
                <input type="text" name="modelo" v-model="shirt.modelo">
            </div>
            
            <label for="">Descrição:</label>
            <textarea name="description" style="resize:initial" v-model="shirt.description"></textarea>

            <div class="form-group mt-4">
                <label for="">Preço:</label>
                <input type="number" step="0.01" name="price" v-model="shirt.price">
            </div>

            <div class="form-group">
                <label for="">Marca:</label>
                <input type="text" name="brand" style="margin-bottom:10px" v-model="shirt.brand">
            </div>

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
                brand: '',
                image: ''
            }
        }
    },
    methods:{
        submit(){
            const formData = new FormData
            this.shirt.image = formData.set('image', this.shirt.image)

            axios.post("/api/camisetas", this.shirt);
            this.$router.push({name: "camisetas"})
        },
        onChange(e){
            this.shirt.image = e.target.files[0];
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