<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NIXELAR</title>
        @vite(['resources/css/app.css'])
    </head>

    <body> <!--Un div para toda la parte de arriba, el encabezado-->
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
        <!--boton que te lleva de nuevo al historial-->
        <form>
            <button type="button"><a href="/historial"> Volver</a></button>
        </form>
       <form>
        <div class="prodhist">   <h1>Producto</h1>
            <h3>Nombre Producto</h3>
            <h4>Descripcion del producto</h4>
            <img src="img/pintura cuadernos.jpg" width="200 px" height="200 px">
        </div>