<!-- CODIGO PHP -->
<?php 

  include_once "loader.php";
    // Camino de la registración.
  // 1) Chequear que el formulario este cargando por POST.
  // 2) Validar los datos del formualario.
  //  2.1) Si el formulario no valida vamos a mostrar los errores al usuario.
  //  2.2) Persistir para el usuario los datos que si completo correctamente.
  // 3) Si no hay $errores:
  //  3.1) Crear al usario
  //  3.2) Guardarlo en json
  //  3.3) Guardar su imagen de perfil
  //  3.4) Redirigir al usuario a la página de inicio
  if(LogIn::verificar()){
    header("Location:homeJuego.php");
    exit;
  }
  if($_POST){
    //2
    $ext = pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
    $usuario = new Usuario($_POST['userName'],$_POST['email'],$_POST['password'],$_POST['confirmPassword'],$_POST['email'].".".$ext);
    $errores = Validador::validarDatos($usuario,$baseJson);
    // var_dump($errores);
    // exit;
  
    if(!$errores){
      $baseJson->crear($usuario);
      move_uploaded_file($_FILES['avatar']['tmp_name'],"fotos/".$usuario->getAvatar());
      //luego de crear el usuario y guardar todos sus datos y avatar, si todo esta bien logueramos al usuario y lo redirigiremos automaticamente al home
       LogIn::loguearUsuario($_POST['email']);
       header("Location:homeJuego.php");
        exit;
    }
  }
?>



<?php include_once "menu/navBar.php";?>
 
  <div class="container">

    <header>

    </header>

    <main class="row">
      <article class="_Nibgh1-registrate">
        <h1 class="_Natit-reg">Registrate</h1>
      </article>

      <section class="row _Nacuadro-completo-reg mb-3">

        <article class="col-12 _Nadeco-lin-reg">
          deco
        </article>

        <article class="col-12 text-center _Naico-reg-deco">
          <ion-icon name="arrow-round-down"></ion-icon>
          <ion-icon name="person-add"></ion-icon>
          <ion-icon name="arrow-round-down"></ion-icon>
        </article>

        <article class="col-lg-6 col-sm-12 _Nacuadro-info-reg">

          <article class="p-5">
            <h1 class="_Nah1-izqui-reg">Pregunta²</h1>
            <br>
            <h2 class="_Nah2-izqui-reg">Resgístrate y juega!</h2>
            <p class="_Nacolor-text-norm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti necessitatibus placeat vitae id iste   vero saepe soluta recusandae, laboriosam voluptatibus, est nihil sint non facere aspernatur cumque.   Nesciunt, corporis! Harum!</p>
            <br>
            <p class="_Nacolor-text-norm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi similique repellendus qui expedita   aliquam natus quis fugit, non perspiciatis blanditiis nam aspernatur! Distinctio a libero similique   repellendus suscipit perspiciatis placeat!</p>
          </article>

        </article>

        <article class="col-lg-5 col-sm-12 _Naseccion ml-2 pb-2 ">

          <form class=" text-center mt-5 _Naform-reg" action="registro.php" method="post" enctype="multipart/form-data">
            <div class="form-group text-white">

              <label for=""><i class="fas fa-user" ></i> Usuario</label>
              <input type="text" class="form-control _Nainp-input" id="userName" aria-describedby="emailHelp" placeholder="Nombre de Usuario" name="userName" value="<?php $baseJson->reincidencia('userName');?>">
              <!--Impresion de error USER NAME-->
              <?php if(isset($errores['userName'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?= $errores['userName']; ?>
                </div>
              <?php } ?>
              <!---->

            </div>

            <div class="form-group text-white">

              <label for=""><i class="fas fa-envelope"></i> Email</label>
              <input type="Email" class="form-control _Nainp-input" id="email"  placeholder="Email" name="email" value="<?php $baseJson->reincidencia('email');?>">
              <!--Impresion de error EMAIL-->
              <?php if(isset($errores['email'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?= $errores['email']; ?>
                </div>
              <?php } ?>
              <!---->
            </div>

            <div class="form-group text-white">
              <label for=""><i class="fas fa-key"></i> password</label>
              <input type="password" class="form-control _Nainp-input" id="password" placeholder=" password" name="password">
              <!--Impresion de error password-->
              <?php if(isset($errores['password'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?= $errores['password']; ?>
                </div>
              <?php } ?>
              <!---->
            </div>

            <div class="form-group text-white">
              <label for=""><i class="fas fa-key"></i> Confirmar password</label>
              <input type="password" class="form-control _Nainp-input" id="confirmPassword"  placeholder=" Confirmar password" name="confirmPassword">
              <!--Impresion de error confirmacion password-->
              <?php if(isset($errores['confirmPassword'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?= $errores['confirmPassword']; ?>
                </div>
              <?php } ?>
              <!---->
            </div>

            <div class="form-group text-white">
              <label for="">Foto</label>
              <input type="file" class="" id="avatar" name="avatar">
              <!--Impresion de error avatar-->
              <?php if(isset($errores['avatar'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?= $errores['avatar']; ?>
                </div>
              <?php } ?>
              <!---->
            </div>
                          
            <div class="form-group form-check">

            </div>

            <div  class="botonesLogin">
              <button type="submit" class="col-2 btn btn-primary btn-sm _Nacolor-entrar">Entrar</button>
            </div>
            
          </form>

        </article>

      </section>

    </main>

  </div>

  <div class="mt-5">
    <?php   include "footer.php"; ?>
  </div>
