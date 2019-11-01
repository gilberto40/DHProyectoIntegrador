<?php
include_once "functions/funciones.php";
if(isset($_SESSION['email'])){
    $usuario=buscarPorEmail($_SESSION['email']);
    $userName = $usuario['userName'];
    $avatar =$usuario['avatar'];
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
    <title>Editar Perfil</title>
</head>


<body class="_Nibgedit-perf">


    <div class="container">

        <form class="" action="" method="post" enctype="multipart/form-data">

            <section class="_NisecP-edit text-center">

                <h5><?php echo $userName;?> quisieras editar tu usuario?</h5>
                <p><ion-icon name="arrow-round-down"></ion-icon>ESTAS EN EL SITIO INDICADO.!<ion-icon name="arrow-round-down"></ion-icon></p>
                <h1><ion-icon name="happy"></ion-icon></h1>
                <article class="mt-2">
                    <img class="_NiimgPerf-edit" src="<?php if (strlen($avatar) == 0){echo "fotos/foto-default.png";}else{echo "fotos/".$avatar;}?>" alt="" width="250" height="250">
                    <h6 class="">Editar foto</h6>
                    <label for="">New Foto</label>
                    <input type="file" class="" id="newAvatar" name="newAvatar">
                    <hr>
                </article>

                <article class="_NiediNom-edit">
                    <br>
                    <h4 class="text-center">Editar Nombre</h4>
                    <article class="text-center">
                        <h2>Nombre De Usuario</h2>
                        <input class="_NicampoEscrip-edit" type="text" name="newNombre">
                    </article>
                    <br>
                </article>

                <article class="_NiediPass-edit">
                    <h4>Editar Password</h4>
                    <article>
                        <label for="">Password Actual</label>
                        <input class="_NicampoEscrip-edit" type="password" name="password">
                    </article>
                    <article>
                        <label for="">Nuevo Password</label>
                        <input class="_NicampoEscrip-edit" type="password" name="newPassword">
                    </article>
                    <article>
                        <label for="">Confirmar password</label>
                        <input class="_NicampoEscrip-edit" type="password" name="newPasswordConfirm">
                    </article>
                </article>

                <article class="_Niart-ho">
                <button class="_Nibot-comen-ho btn btn-lg active mt-3 mb-3">Enviar</button></article>
                </article>

            </section>
        </form>
    </div> 
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>