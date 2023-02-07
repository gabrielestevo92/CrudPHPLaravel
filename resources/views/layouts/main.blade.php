<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cookie - @yield('title')</title>

        <!-- Fonts do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

        <!-- CSS bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link href="css/style.css" rel="stylesheet">
        

        <link rel="stylesheet" 
            href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        
        

        <link rel="stylesheet" 
            href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
            crossorigin=""/>
             <!-- Make sure you put this AFTER Leaflet's CSS -->
        
        
       
  </head>
        
    </head>
    <body>

        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logoMenu.png" alt="Rita Echo"/>
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="/clientes" class="nav-link">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a href="/maps" class="nav-link">Mapa de Clientes</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </header>
        
        @yield('content')

        <footer>
            <p>Rita Echo &copy; 2023</p>
        </footer> 
        <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
            crossorigin="anonymous">
        </script>
        <script  
            type = "module"  
            src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"> 
        </script> 
        
        <script 
            nomodule  
            src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js"> 
        </script>
        
        
        
        
    </body>

    
</html>
