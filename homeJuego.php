<?php
include_once "loader.php";

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
 $registro = BaseSQL::buscar('usuarios','email',"'$email'");
var_dump($registro);
exit;
 $userName = $usuario['userName'];
 $avatar =$usuario['avatar'];
}else{
  header("Location:index.php");
  exit;
}
//falta buscar la ext respectiva de cada imagen
?>
<?php include_once "menu/navBar.php";?>

    <div class="container _Nicont-ho">

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

    </div>
<?php   include "footer.php"; ?>