<?php 
  include_once "loader.php";

  
// Proceso de login
//===========================
// 1) Chequear que el formulario este cargando por POST.
// 2) Validar los datos del formualario.
//  2.1) Si el formulario no valida vamos a mostrar los errores al usuario.
//  2.2) No vamos a persistir datos correctos por cuestiones de seguridad. El usuario debe colocar correctamente ambos datos.
// 3) Si no hay $errores:
//  3.1) Loguearemos al usuario.
//  3.2) Si tildó la casilla "recordarme" cargaremos el email en una cookie.
//  3.3) Redirigimos al usuario a la página de inicio mostrando cambios por estar logueado.
 
  if(isset($_COOKIE['email'])){
    //Si está seteada la cookie es porque el usuario tildó recordarme. Vamos a loguerarlo desde la cookie.
    LogIn::loguearUsuario($_COOKIE['email']);
  }else{
    if(LogIn::Verificar()){
      header("Location:homeJuego.php");
      exit;
  }else{
      if($_POST){
        $logIn = new LogIn($_POST['emailLogIn'],$_POST['passwordLogIn']);
        $errores = Validador::validarLogIn($logIn,$baseJson);
        // var_dump($errores);
        // exit;
        if(!$errores){
          LogIn::loguearUsuario($_POST['emailLogIn']);
          
          if(!$_SESSION){
            $_SESSION['email']=$_COOKIE['email'];
          }
          $usu = $baseJson->buscarPorEmail($_SESSION['email']);
          $rol = $usu['rol'];
          if($rol == 2){
            header('Location:homeAdmin.php');
          }else{
          header("Location:homeJuego.php");
        }
      } 
    }
  }
}
?>


<?php include_once "menu/navBar.php";?>

      <div class="container">
        <main class="row _Nimain-log  ">
                      <!-- habia un margin ridht 0 (mr-0)en la clase de main  -->
            <form class="col-lg-4 col-md-6 col-sm-8 col-8 _NiCua-log text-center " action="index.php" method="post">
                <!---cambie las medidas de el form en bootstap le reste dos a cada medida y coloque una medida para "xs"-->
                <!--Impresion de errores-->         
                <?php if(isset($errores)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>  
                    <?php foreach($errores as $value){ ?>
                        <li>
                        <?php echo $value; ?>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
                <?php }?>
                <!---->

                <ion-icon class="mt-2 _Niico-cont-log" name="contact"></ion-icon>
                <hr>
                <div class="text-center _Nius-na-log">
                    <label  class="col-12 _Nius-cla-lo" for="usuario" >Usuario</label>
                    <input class="col-5 _Niimp-log" type="text" name="emailLogIn">
                    <label class="col-12 _Nius-cla-lo mt-2" for="clave" >Clave</label>
                    <input class="col-5 _Niimp-log" type="password" name="passwordLogIn">
                </div>
                <input class="mt-3 mr-2 mb-2 " type="checkbox" name="recordarme"> <span style="color:#dfdce3;"> Recordarme</span>
                <br>
                <div class="_Nidiv-hoLog">
                <button class="_Nibot-2log mr-2 mt-3 mb-2 btn btn-sm _Nicolor-EnReLo "><a class="_Nibotreg-log" href="registro.php">Registro</a></button>
                <button  class="_Nibot-2log mt-3 mb-2 btn btn-sm _Nicolor-EnReLo" type="submit">Entrar</button>
                </div>
                <!-- <a href="olvidaPass.php">Olvidé contraseña</a> -->
            
            </form>

        </main>

      </div>    

        <?php   include "footer.php"; ?>
      

