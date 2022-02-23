<template>
  <div>
      <div>
            <header>
                <h1>Camisetas</h1> 
                <router-link>Nova camiseta</router-link>
            </header>
      </div>
      

      <div class="shirt-list container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Descrição</th> 
                    <th>Preço</th> 
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr><!--aqui vai o v-for 
                    <td>/*{{shirt.id}}*/</td>
                    <td>/*{{shirt.description}}*/</td>
                    <td>/*{{shirt.price}}*/</td>
                    <td>
                        <router-link>Visualizar</router-link>
                        <router-link>Editar</router-link>
                        <form class="d-inline" method="POST" action="{{ route('pages.destroy', ['page' => $page->id]) }}" onsubmit="return confirm('Deseja mesmo excluir a página?')">
                            <button class="btn btn-sm btn-danger">Excluir Camiseta</button>
                        </form>
                    </td> -->
                </tr>
            </tbody>
            
        </table>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>