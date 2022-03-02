<template>
  <div> 
      <div class="form">
        <h1 class="title">JetCamisas</h1>

        <ul>
          <li v-for="(erro, index) in erros" :key="index">{{erro[0]}}</li>
        </ul>

        <label for="email">Digite o seu nome:</label>
        <input type="text" name="name" v-model="userInfo.name">

        <label for="email">Digite o seu email:</label>
        <input type="text" name="email" v-model="userInfo.email">

        <label for="password">Digite sua senha:</label>
        <input type="password" name="password">

        <label for="password">Digite novamente sua senha:</label>
        <input type="password" name="password_confirmation">

        <input type="submit" value="Entrar">
      </div>

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
        postUser(){
            axios.post(`/api/user/${this.userId}`)
            .then(response =>{
                this.$router.push({path: '/usuarios'})
            })
        }
    },
    created(){
        this.getUser()
    }
}
</script>

<style>

</style>