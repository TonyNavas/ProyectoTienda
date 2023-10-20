<!DOCTYPE html>
<!-- Parte estandar que contiene el idioma, tildes y etc-->
<html lang="en">
<head>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Raleway&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@600&display=swap" rel="stylesheet">
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIXELAR</title>

</head>

<body>
    <!--Un header para toda la parte de arriba, el encabezado-->
  <nav>
    <h2 class="Titulo"><a href="Welcome">NIXELAR</a></h2>
 <div class="Barra">
   <form >
    <input placeholder type="text"="Buscar producto o tienda">
    <button type="submit">Buscar</button>
   </form>
</div>
<!--Botones que llevan a las otras paginas-->
    <div>
<ul>
    <li><a href="/carrito" class="boton">Carrito</a></li>
    <li><a href="/perfil" class="boton">Perfil</a></li>
    <li><a href="/menu" class="boton">Menu</a></li>
</ul>
</div>
</nav>
        <!--boton que te lleva de nuevo al Home-->
        <form>
            <button type="button"><a href="/"> Volver</a></button>
        </form>
       <form>
        <div class="categorias" >
              <!--Lista que te lleva a una categoria (con imagenes)-->
              <a href="/arte">
           
                <img src="img/pince;es.jpg" width="100px" height="100px">
                <h4>Arte</h4> </a>
                
                <a href="/artesania">
           
                    <img src="img/jarron barro proc.jpg" width="100px" height="100px">
                    <h4>Artesania</h4> </a>
                    
                    <a href="/manual">
           
                        <img src="img/tejido.jpg" width="100px" height="100px">
                        <h4>Manual</h4> </a>
        </div>