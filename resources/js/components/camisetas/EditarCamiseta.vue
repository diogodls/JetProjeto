<template>
  <div class="container">
      <div class="form card">

        <div class="notification is-danger" v-if="erros">
            <ul>
                <li v-for="(erro, index) in erros" :key="index">{{erro[0]}}</li>
            </ul>
        </div>

        <div class="field">
            <label for="imagem">Imagem da camiseta:</label>
            <input type="file" id="imagem" name="imagem" class="form-control-file">
        </div>

        <div class="field">
            <label for="">Modelo:</label>
            <input type="text" name="modelo" v-model="shirtsInfo.modelo">
        </div>
            
        <label for="">Descrição:</label>
        <textarea name="description" style="resize:initial" maxlength="255" v-model="shirtsInfo.description" @keyup="contador"></textarea>
        {{textcontador}}/255
            
        <div class="field mt-4">
            <label for="">Preço: R$</label>
            <input type="number" step="0.01" name="price" v-model="shirtsInfo.price">
        </div>

        <div class="field">
            <label for="">Marca:</label>
            <input type="text" name="brand" style="margin-bottom:10px" v-model="shirtsInfo.brand">
        </div>

        <input type="submit" value="Editar Camiseta" @click="putShirt()">
    </div>

      <router-link :to="{name: 'camisetas'}">Voltar</router-link>
  </div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            shirtsInfo: {
                modelo: '',
                description: '',
                price: 0,
                brand: '',
            },
            shirtId: this.$route.params.id,
            textcontador: 0,
            erros: null
        }
    },
    methods:{
       getShirt(){
            axios.get(`/api/camiseta/${this.shirtId}`)
            .then(response => {
                this.shirtsInfo.modelo = response.data.modelo
                this.shirtsInfo.description = response.data.description
                this.shirtsInfo.price = response.data.price
                this.shirtsInfo.brand = response.data.brand
            })
        },
        putShirt(){
            axios.put(`/api/camiseta/${this.shirtId}`, this.shirtsInfo)
            .then(response =>{
                this.$router.push({path: '/camisetas'})
            })
            .catch(error  =>{
                this.erros = error.response.data.erro
            })
        },
        voltar(){
            this.$router.push({path: '/camisetas'})
        },
        contador(){
            this.textcontador = this.shirtsInfo.description.length
        }
    },
    created(){
        this.getShirt()
    }
}
</script>

<style>

</style>