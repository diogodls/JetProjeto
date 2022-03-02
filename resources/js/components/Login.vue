<template>
  <div>

      <div class="form" action="/login" method="POST" v-if="trocarForm">
        <input type="hidden" name="_token" :value="csrf_token">
        <h1 class="title">JetCamisas</h1>

        <div class="notification is-danger" v-if="erros">
          <ul>
            <li v-for="(erro, index) in erros" :key="index">{{erro[0]}}</li>
          </ul>
        </div>
        
        <label for="email">Digite o seu email:</label>
        <input type="text" name="email" v-model="infoLogin.email">

        <label for="password">Digite sua senha:</label>
        <input type="password" name="password" v-model="infoLogin.password">

        <input type="submit" value="Entrar" @click="loginUser()">
        <button class="btn btn-secondary btn-sm" @click="trocarFormulario">Registrar</button>
      </div>

      <div class="form" v-if="!trocarForm">
        <input type="hidden" name="_token" :value="csrf_token">
        <h1 class="title">JetCamisas</h1>

        <div class="notification is-danger" v-if="erros">
          <ul>
            <li v-for="(erro, index) in erros" :key="index">{{erro[0]}}</li>
          </ul>
        </div>

        <label for="email">Digite o seu nome:</label>
        <input type="text" name="name" v-model="infoRegister.name">

        <label for="email">Digite o seu email:</label>
        <input type="text" name="email" v-model="infoRegister.email">

        <label for="password">Digite sua senha:</label>
        <input type="password" name="password" v-model="infoRegister.password">

        <label for="password">Digite novamente sua senha:</label>
        <input type="password" name="password_confirmation" v-model="infoRegister.password_confirmation">

        <input type="submit" value="Entrar" @click="registerUser()">
        <button class="btn btn-secondary btn-sm" @click="trocarFormulario">Voltar</button>
      </div>

  </div>
</template>

<script>
import axios from "axios"
export default {
  data(){
    return{
      trocarForm: true,
      infoLogin: {
        email: '',
        password: '',
      },
      infoRegister:{
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      },
      erros: null,
      acesso: null
    }
  },
  methods:{
    trocarFormulario(){
        this.trocarForm = !this.trocarForm
        this.erros = null
    },
    loginUser(){
      axios.post("api/login", this.infoLogin)
      .then(response => {
        if(response.status == 200){
          this.$router.push({path: '/'})
        }
      })
      .catch(error =>{
         this.erros = error.response.data.erros
      })
    },
    registerUser(){
      axios.post("api/register", this.infoRegister)
      .then(response => {
        if(response.status == 200){
          this.$router.push({path: '/'})
        }
      })
      .catch((error) =>{
          this.erros = error.response.data.error
      })
    }
  },
  props:[
    'csrf_token' 
  ]
}
</script>

<style scoped>
.form{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  border-radius: 6px;
  padding: 20px;
  background: lightslategray;
  display: flex;
  flex-flow: column;
}
.input{
  max-width: 100%;
  width: 100%;
}
.notification{
  max-width: 100%;
}
.title{
  display: flex;
  justify-content: center;
}
</style>