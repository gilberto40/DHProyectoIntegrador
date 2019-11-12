<?php
include_once "functions/funciones.php";
if($_POST){
    $erroresComent = validarComents($_POST);
     
    if(count($erroresComent)==0){
        $registroC = creaComents($_POST);
        guardarComents($registroC);
      }
}
?>



<?php include_once "menu/navBar.php";?>

  <div class="container">
    
    <section>
      <article class="row">
        <h1 class="text-center _Nititulo-contacto">Contacto</h1>
      </article>
      
      <h6 class="_Nih6-fundado ml-3">Fundado por:</h6>
      <article class="_Nibgmap-cont">
          <iframe class="d-block w-100 _Nigoogle-maps"  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3286.19325518621!2d-58.4439337!3d-34.548662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb436efe09303%3A0xfb39818e7624ac76!2sDigital%20House!5e0!3m2!1ses!2sar!4v1572914223062!5m2!1ses!2sar" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </article>
    </section>


    <section class="_Nimedia-cajas text-center">

      <article class="_medialg-2cajas">

        <article class="_Nicajita-nombre pt-4 pb-4">
          <h3 class="text-center _Nih3-telefono">Telefono</h3>
          <ion-icon class="_Niicono-general" name="call"></ion-icon>
          <p class="_Nitext-info1">Llamadas en horario de oficina:</p>
          <p class="_Nitext-info1">9:00-12:00/13:00-18:00</p>
          <p class="_Nitext-info1">+54 9 12345678</p>
        </article>

        <article class="_Nicajita-email pt-4 pb-4">
          <h3 class="text-center _Nih3-email">Email</h3>
          <ion-icon class="_Niicono-general" name="mail"></ion-icon>
          <p class="_Nitext-info2">Alguna duda comunicarse al:</p>
          <p class="_Nitext-info2">Pregunta²@gmail.com</p>
          <p class="_Nitext-info2">Fax: 123-456-7890</p>

        </article>

      </article>


      <article class="_Nicajita-redessociales col-lg-12 mt-3 pt-4 pb-4">

        <h3 class="text-center _Nih3-redessociales">Redes sociales</h3>
        <ion-icon class="_Niicono-general" name="at"></ion-icon>
        <p class="_Nitext-info1">Síguenos en nuestras redes sociales:</p>
        <article class="_Niiconos-redessociales">
          <a class="_Niiconos-redessociales" href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a>
          <a class="_Niiconos-redessociales" href="https://www.instagram.com/?hl=es-la"><ion-icon name="logo-instagram"></ion-icon></a>
          <a class="_Niiconos-redessociales" href="https://twitter.com/login?lang=es"><ion-icon name="logo-twitter"></ion-icon></a>
        </article>
        <p class="_Nitext-info1">@Pregunta²2019</p>

      </article>
    </section>


    <section class="text-center _Niico-deco">
      <ion-icon name="return-right"></ion-icon><ion-icon name="logo-game-controller-b"></ion-icon><ion-icon name="return-left"></ion-icon>
    </section>

    
    <section>

      <article class="row _Nicaja-comentario">

        <article class="d-flex _Nidejatucomentario col-12">
          <h2 class="m-auto"><ion-icon class="mt-4 mr-3 _Niicono-dejatucoment" name="thumbs-up"></ion-icon>Deja tu comentario por acá<ion-icon class=" ml-3 _Niicono-dejatucoment" name="arrow-round-down"></ion-icon></h2>
        </article>
                        
        <form class="mx-auto text-center mt-4" method="post">

          <div class="col-8 form-group text-center">
            <label class="_Nitext-comentario" for="nombreC">Nombre</label>
            <input type="text" class="_Nicolor-barra _NiTw-barr" id="text" name="nombreC" >
            <br>
            <label class="_Nitext-comentario" for="apellidoC">Apellido</label>
            <input type="text" class="_Nicolor-barra _NiTw-barr" id="apellido"  name="apellidoC">
          </div>

          <div class="form-group">
            <label class="_Nitext-comentario" for="comentarios">Comentarios</label>
            <input type="comentarios" class="form-control _Nicolor-barra" id="comentarios" name="comentarios" >
          </div>
          
          <div  class="botonesLogin">
            <button type="submit" class="btn btn-primary btn-sm _boton-enviar-comentario">Enviar</button>
          </div>

        </form>

      </article>

    </section>

  </div>
  
  <footer class="mt-5">
    <?php   include "footer.php"; ?>
  </footer>