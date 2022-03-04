<template>
  <div class="container">
      <div class="form card">
            <input type="hidden" name="_token" :value="csrf">

            <div class="notification is-danger" v-if="erros">
                <ul>
                    <li v-for="(erro, index) in erros" :key="index">{{erro[0]}}</li>
                </ul>
            </div>

            <div class="field">
                <label for="imagem">Imagem da camiseta:</label>
                <input type="file" id="imagem" name="imagem" class="form-control-file" @change="onChange">
            </div>

            <div class="field">
                <label for="">Modelo:</label>
                <input type="text" name="modelo" v-model="shirt.modelo">
            </div>
            
            <label for="">Descrição:</label>
            <textarea name="description" style="resize:initial" maxlength="255" v-model="shirt.description" @keyup="contador"></textarea>
            {{textcontador}}/255
            
            <div class="field mt-4">
                <label for="">Preço: R$</label>
                <input type="number" step="0.01" name="price" v-model="shirt.price">
            </div>

            <div class="field">
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
                brand: ''
            },
            textcontador: 0,
            erros: null,
            image: null
        }
    },
    methods:{
        submit(){
            const formData = new FormData
            formData.append('image', this.image)
            formData.append('modelo', this.shirt.modelo)
            formData.append('description', this.shirt.description)
            formData.append('price', this.shirt.price)
            formData.append('brand', this.shirt.brand)

            axios.post("/api/camisetas", formData, {headers:{
                'Content-Type': 'multipart/form-data'
            }})
            .then(response => {
                this.$router.push({name: "camisetas"})
            })
            .catch(error => {
                this.erros = error.response.data.erros
            })
            
        },
        onChange(e){
            this.image = e.target.files[0];
        },
        contador(){
            this.textcontador = this.shirt.description.length
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