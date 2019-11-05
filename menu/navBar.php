
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <script src="https://kit.fontawesome.com/eccefc8370.js"></script>
    <script src="menu/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Play|Staatliches&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="menu/style.css">


</head>
<body>
    <header>
    <nav>
        <?php if(isset($_SESSION['email'])){?> 
             <div id="juega">
                    JUGAR!
                </div>
            <div id ="botonPerfil">
                <img src="menu/foto-default.png" alt="">
              
                    <div>
                        <span><?=$userName;?> </span>  
                            
                        </div>        
                    </div>
                <div id="opcionesUsuario">
                    
                    <li><a href="">Tu Ranking</a></li>
                    <hr>
                    <li><a href="editar.php">Editar Perfil</a></li>
                    <hr>
                    <li><a href="cerrarSesion.php">Salir</a></li>
                </div>
        <?php ;}else{?>
                <li id="logIn"><a href="index.php"><ion-icon name="log-in"></ion-icon><span>Iniciar Sesion</span></a></li>
                <li id="register"><a href="registro.php">Registrarse</a></li>
                
        <?php ;}?>
        <li id="logo"><a href=""><img src="menu/logochico.png" alt=""></a></li>
        <div id="menuDesc">
            <li><a href="">Ranking</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="">Contacto</a></li>
        </div>
        <button id="botonMenu">
            <ion-icon name="menu"></ion-icon>
        </button>
        <div id="navMenu">
            <li id="logoMenu">
                <img src="menu/logochico.png" alt="">
            </li>
            
            <button id="botonMenuCerrar">
                    <ion-icon name="close-circle"></ion-icon>
            </button>
            <div id="opciones">
                <?php if(!isset($_SESSION['email'])){?>
                <li id="reg"><a href="">Registro</a></li>
                <?php ;}else{?>
                    <li id="jugar"><a href="homeJuego.php" id="palabra">JUGAR!!!</a></li>
                <?php ;}?>
                <li><a href="">Ranking</a></li>
                <li><a href="">FAQ</a></li>
                <li><a href="">Contacto</a></li>
            </div>
        </div>
    </nav>
  </header>