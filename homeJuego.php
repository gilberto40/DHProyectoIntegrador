<?php
include_once "loader.php";
if(isset($_SESSION['email'])){
  $usuario=$baseJson->buscarPorEmail($_SESSION['email']);
  $userName = $usuario['userName'];
 $avatar =$usuario['avatar'];
}else{
  header("Location:index.php");
  exit;
}
//falta buscar la ext respectiva de cada imagen
?>

<?php include_once 'menu/navBar.php';?>


    <div class="container _Nicont-ho">
  <main>
      <div class="col-5 col-sm-5 col-md-4 col-lg-2 text-center nav-item dropdown _Nihamb-perfHo">

        <a class="nav-link dropdown-toggle text-body" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <ion-icon class="mr-2" name="settings"></ion-icon>
        <!-- Nombre jugador --><strong><?php echo $userName;?></strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="editar.php">Perfil</a>
          <a class="dropdown-item" href="cerrarSesion.php">Cerrar sesión</a>
        </div>

      </div>
    
    <section class="row mt-5 _Nisec-ho">
        
            <article class="col-lg-7 text-center _Nicuadro-perf-ho">
            <article class="col-lg-6 p-2">
            <!--falta consicion en la cual si no hay una session muestere foto default-->
            <a class="" href=""><img class="_Nifot-perf mt-3" src="<?php if (strlen($avatar) == 0){echo "fotos/foto-default.png";}else{echo "fotos/".$avatar;}?>" alt="Foto" height="150" width="150" ></a>
            </article>

            <article class="col-lg-6 p-3 _Nitit-bien-ho">
                <h2><ion-icon class="mr-2" name="thumbs-up"></ion-icon>BIENVENIDO: <strong><?php echo $userName;?></strong> <ion-icon class="ml-2" name="happy"></ion-icon></h2>
            </article>

            <article class="_Niart-ho">
            <br>
            <a href="juego.php" class="_Nibot-comen-ho btn btn-lg active mt-3 mb-3" role="button" aria-pressed="true">Comenzar a jugar</a></article>
           </article>

        
    </section>
</main>
    </div>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>