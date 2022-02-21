<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       <link rel="stylesheet" href="{{asset('css/app.css')}}">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    </head>
    
    <body class="antialiased">
       
        <div id="app">
            <router-view></router-view>
        </div>
    

        <script src="js/app.js"></script>
        
    </body>
</html>
