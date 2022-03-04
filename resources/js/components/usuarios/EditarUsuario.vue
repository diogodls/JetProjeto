<template>
  <div> 
      <div class="form">
        <h1 class="title">JetCamisas</h1>

        <div class="notification is-danger" v-if="erros">
            <ul>
                <li v-for="(erro, index) in erros" :key="index">{{erro[0]}}</li>
            </ul>
        </div>

        <label for="email">Digite o seu nome:</label>
        <input class="input mb-3" type="text" name="name" v-model="userInfo.name">

        <label for="email">Digite o seu email:</label>
        <input class="input mb-3" type="text" name="email" v-model="userInfo.email">

        <label for="password">Digite sua senha:</label>
        <input class="input mb-3" type="password" name="password" v-model="userInfo.password">

        <label for="password">Digite novamente sua senha:</label>
        <input class="input mb-3" type="password" name="password_confirmation" v-model="userInfo.password_confirmation">

        <input type="submit" value="Enviar" class="button" @click="putUser">
      </div>

      <button class="button" @click="voltar">Voltar</button>
  </div>    
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            userInfo: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            userId: this.$route.params.id,
            erros: null
        }
    },
    methods:{
        getUser(){
            axios.get(`/api/user/${this.userId}`)
            .then(response => {
                this.userInfo.name = response.data.name
                this.userInfo.email = response.data.email
            })
        },
        putUser(){
            axios.put(`/api/user/${this.userId}`, this.userInfo)
            .then(response =>{
                this.$store.commit("changeUser", this.userInfo.name)
                this.$store.commit("changeEmail", this.userInfo.email)
                this.$router.push({path: '/usuarios'})
            })
            .catch(error  =>{
                this.erros = error.response.data.erro
            })
        },
        voltar(){
            this.$router.push({path: '/usuarios'})
        }
    },
    created(){
        this.getUser()
    }
}
</script>

<style>

</style>