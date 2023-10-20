<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NIXELAR</title>


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


</head>
<body>
       <!--Un header para toda la parte de arriba, el encabezado-->
  <nav>

    <h2 class="Titulo"><a href="/">NIXELAR</a></h2>

 <div class="Barra">
   <form >
    <input placeholder type="text"="Buscar producto o tienda">
    <button type="submit"><a href="/inicio">Buscar</a></button>
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

<div class="contenedor">
    <!--banner de presentacion-->
    <img src="img/collares.jpg" width="800 px" height="200px">
    <div class="Texto">
        <h1>Explora...</h1>
        <h3>Y sumérgete en el mundo artistico Nicaraguense</h3>
    </div>
</div>
<div class="Titulosgrandes">
<h1>Tendencias</h1></div>
<div class="container01">
<section class="container">
    <article>
    <!--Seccion de las tendencias, cualquiera de los elementos lleva a la pagina de tendencias-->
    <a href="/tendencias"  class="flex">
        <div class="Textodesc">
            <h3>DLorem ipsum dolor sit amet consectetur. Facilisis dignissim sapien nunc suscipit magna viverra diam bibendum. Feugiat libero elit cras amet. Sed blandit sit euismod diam donec sed scelerisque. Tristique hac commodo sagittis quis habitasse.</h3>
        </div>

    <div class="imagenten">
        <img src="img/jaulas.jpg" width="200 px" height="200px" class="Bordes">
    </div>
</a>
</article>
</section>

<section class="container2">
    <article>
    <!--Lo mismo pero diferente "boton")?-->
    <a href="/tendencias" class="flex">
        <div class="Textodesc">
        <h3>DLorem ipsum dolor sit amet consectetur. Facilisis dignissim sapien nunc suscipit magna viverra diam bibendum. Feugiat libero elit cras amet. Sed blandit sit euismod diam donec sed scelerisque. Tristique hac commodo sagittis quis habitasse</h3>
    </div>
    <div class="imagenten">
        <img src="img/casas.jpg" width="200 px" height="200px" class="bordes">
    </div>
    </a>
</article></section>
<div class="container3">

<div class="Enlaces">
    <a href="/listadeseos">
        <h3 class="text1">Lista de deseos</h3>
        <img src="img/platos cafes con azul.jpg" width="100 px" height="100px" class="img1">
        <img src="img/vajilla.jpg" width="100 px" height="100px">
        <img src="img/tejido.jpg" width="100 px" height="100px">
    </a>
</div>
<div class="Enlaces">
<a href="/podriangustar">
    <h3>Podrían gustarte</h3>
    <img src="img/silla.jpg" width="100 px" height="100px" class="img1">
    <img src="img/pintando.jpg" width="100 px" height="100px">
    <img src="img/cuchara.jpg" width="100 px" height="100px">
    </a>
</div>
<div class="Enlaces">
    <a href="/categorias">
        <h3>Categorías</h3>
        <img src="img/jarron barro proc.jpg" width="100 px" height="100px" class="img1">
        <img src="img/pintura cuadernos.jpg" width="100 px" height="100px">
        <img src="img/collares.jpg" width="100 px" height="100px">
        </a>
    </div>
    <div class="Enlaces">
        <a href="/historial">
            <h3>Comprado recientemente</h3>
            <img src="img/jarron barro proc.jpg" width="100 px" height="100px" class="img1">
            <img src="img/platos cafes con azul.jpg" width="100 px" height="100px">
            <img src="img/pince;es.jpg" width="100 px" height="100px">
            </a>
        </div>
    </div>
</div>
</body>
</html>
