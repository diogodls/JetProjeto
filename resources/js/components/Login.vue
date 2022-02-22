<template>
  <div>

      <form class="form" action="/login" method="POST" v-if="trocarForm">
        <input type="hidden" name="_token" :value="csrf_token">
        <h1 class="title">JetCamisas</h1>

        <label for="email">Digite o seu email:</label>
        <input type="text" name="email">

        <label for="password">Digite sua senha:</label>
        <input type="password" name="password">

        <input type="submit" value="Entrar">
        <input type="submit" value="Registrar" @click.prevent="trocarFormulario()">
      </form>


      <form class="form" action="/register" method="POST" v-if="!trocarForm">
        <input type="hidden" name="_token" :value="csrf_token">
        <h1 class="title">JetCamisas</h1>

        <label for="email">Digite o seu nome:</label>
        <input type="text" name="name">

        <label for="email">Digite o seu email:</label>
        <input type="text" name="email">

        <label for="password">Digite sua senha:</label>
        <input type="password" name="password">

        <label for="password">Digite novamente sua senha:</label>
        <input type="password" name="password_confirmation">

        <input type="submit" value="Entrar">
      </form>

  </div>
</template>

<script>
export default {
  data(){
    return{
      trocarForm: true
    }
  },
  methods:{
    trocarFormulario(){
        this.trocarForm = !this.trocarForm
    }
  },
  props:[
    'csrf_token' 
  ]
}
</script>

<style>
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
</style>