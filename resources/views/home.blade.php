<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Página Principal</title>

       <link rel="stylesheet" href="{{asset('css/app.css')}}">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    </head>
    
    <body>
       
     
    <div id="app" class="is-flex is-flex-direction-column ">
        <nav class="navbar is-active" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <h1><a href="/">JetCamisas</a> </h1>
            </div>
    
            <div class="navbar-menu">
                <div class="navbar-start">
                    <router-link class="navbar-item" :to="{name: 'dashboard'}">
                        Dashboard
                    </router-link>
    
                    <router-link class="navbar-item" :to="{name: 'camisetas'}">
                        Minhas camisetas
                    </router-link>
    
                    <router-link class="navbar-item" :to="{name: 'usuarios'}">
                        Meus usuários
                    </router-link>
          
                </div>
    
                <div class="navbar-end">
                    <div class="navbar-item">
                        <a href="/logout" >Sair</a>
                    </div>
                </div>
            </div>
        </nav>
  
      
        <div class="content" style="background:white">
            <router-view></router-view>
        </div>
  </div>

    <script src="/js/app.js"></script>
        
    </body>
</html>
