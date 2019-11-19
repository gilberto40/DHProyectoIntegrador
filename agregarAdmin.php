<?php 
include_once 'loader.php';
if($_POST){
    $admin = new Administrador($_POST['userName'],$_POST['email'],$_POST['password'],$_POST['confirmPassword']);
    
    $errores =Validador::validarDatosAdministrador($admin);
    if(!$errores){
        $admin->create($bd);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <title>Agregar Administrador</title>
</head>


<body>

    <div class="container">
        <h1 class="_Nih1aggAdm">Agregar administrador</h1>
    </div>

    <section class="">
        
        <article class="">
            <a href="homeAdmin.php" class="btn _NibotSal-aggAdm btn-lg active" role="button" aria-pressed="true">Salir</a>
        </article>

    </section>

    <div class="row">
        <img class="_NilogoAgg-admin" src="img/nuevoAdmin.png" width="100" heigth="100" alt="">
    </div>

    <form class="col-4 text-center _NicuaAgg-adm" action="agregarAdmin.php" method="post">

        <div class="form-group text-white">

            <label for=""><i class="fas fa-user" ></i> Usuario</label>
            <input type="text" class="form-control _Nainp-input" id="userName" aria-describedby="emailHelp" placeholder="Nombre de Usuario" name="userName" value="">

        </div>

        <div class="form-group text-white">

            <label for=""><i class="fas fa-envelope"></i> Email</label>
            <input type="Email" class="form-control _Nainp-input" id="email"  placeholder="Email" name="email" value="">
        </div>

        <div class="form-group text-white">
            <label for=""><i class="fas fa-key"></i> password</label>
            <input type="password" class="form-control _Nainp-input" id="password" placeholder=" password" name="password">
        </div>

        <div class="form-group text-white">
            <label for=""><i class="fas fa-key"></i> Confirmar password</label>
            <input type="password" class="form-control _Nainp-input" id="confirmPassword"  placeholder=" Confirmar password" name="confirmPassword">
        </div>
                          
        <div class="form-group form-check">

        </div>

        <div  class="botonesLogin">
            <button type="submit" class="col-2 btn btn-primary btn-sm _Nacolor-entrar">Entrar</button>
        </div>
            
    </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>