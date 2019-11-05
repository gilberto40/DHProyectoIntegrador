<?php
session_start();
// LOGUEAR USUARIO
function loguearUsuario($email){
    $_SESSION['email']=$email;
    if(isset($_POST["recordarme"])){
        setcookie("email",$_POST['emailLogIn'],time()+60*60);
    }
}


// FUNCION PAERA SABER SI EL USUARIO ESTA LOGUADO
function usuarioLogueado(){
    return isset($_SESSION['email']);
}


// FUNCION PARA CERRAR SESION 
function cerrarSesion(){
    session_destroy();
    setcookie("email","", time()-1);
    header("Location:index.php");
    exit;
}


// FUNCIONES PARA GUARDAR LOS COMENTARIOS EN UN ARCHIVO JSON
function validarComents($infoComent){
    $erroresComent = [];
    
    // VALIDAR LOS DATOS DE USUARIO Y CAMPO DE COMENTARIO
    $nombreC = trim($infoComent['nombreC']);
    if(empty($nombreC)){
        $erroresComent['nombreC']="El campo nombre no lo puedes dejar en blanco..";
    }
    $apellidoC = trim($infoComent['apellidoC']);
    if(empty($apellidoC)){
        $erroresComent['apellidoC']="El campo apellido no lo puede dejar en blanco..";
    }
    $comentarios = trim($infoComent['comentarios']);
    if(empty($apellidoC)){
        $erroresComent['comentarios']="Haga algun comentario..";
    }
    return $erroresComent;
}


// CREA UN ARRAY ASOCIATIVO CON LA INFO DE COMETARIOS
function creaComents($infoComent){
$usuarioCo = [
    'nombreC' => $infoComent['nombreC'],
    'apellidoC' => $infoComent['apellidoC'],
    'comentarios' => $infoComent['comentarios']
];
return $usuarioCo;
}


// GUARDAR COMETARIOS 
function guardarComents($usuarioCo){
    $usuarioJson = json_encode($usuarioCo);
    file_put_contents('comenta.json',$usuarioJson.PHP_EOL,FILE_APPEND);
}
function validarNewAvatar(){
    $errores = [];
    $ext = pathinfo($_FILES["newAvatar"]['name'], PATHINFO_EXTENSION);
    if(strlen($_FILES["newAvatar"]["name"])==0){
        $errores["newAvatar"] = "no agregaste nada";
    }
    else if($ext != "jpg" && $ext != "png" && $ext != "jpeg"){
     $errores["newAvatar"] = "Elige  un archivo de tipo jpg o png o jpeg";   
    }
    return $errores;
}
function validarPasswordEdit($usuario){
    $errores =[];
    $data=buscarPorEmail($_SESSION['email']);
    /*validaciones de user name*/
    if(strlen($usuario["newNombre"]) == 0){
        $errores["password"] = "No puedes dejar este campo vacio";
        /* validadcion de el password anterior*/
    }if(strlen($usuario["password"]) == 0){
        $errores["password"] = "No puedes dejar este campo vacio";
    }else if(!password_verify($usuario['password'],$data['password'])){
        $errores['password']="no coincide con tu password anterior ";
    }
    /* validacion del nuevo password*/ 
    if(strlen($usuario["password"]) == 0){
        $errores["newPassword"] = "No puedes dejar este campo vacio";
    } else if(strlen($usuario["password"]) <6){
        $errores["newPassword"] = "la contraseña debe de tener mas de 6 caracteres";
    } else if(!is_numeric($usuario["password"])){
        $errores["newPassword"] = "La contraseña solo puede contener caracteres numericos";
    }
/** validacion de la confirmacion del password y su comparacion entre el otro campo  */
    if(strlen($usuario["newPasswordConfirm"]) == 0){
        $errores["newPasswordConfirm"] = "No puedes dejar este campo vacio";
    }else if($usuario["newPasswordConfirm"] != $usuario['newPassword']){
        $errores["newPasswordConfirm"] = "no coinciden las contraseñas";
    }

       
    return $errores;
}

function editarRegistro($data){
    $usuario = buscarPorEmail($_SESSION['email']);
    
    $json=file_get_contents("db.json");
    $usuarios = json_decode($json,true);
    $usuario['userName'] = $data['newNombre'];
    $usuario['password'] = password_hash($data['newPassword'],PASSWORD_DEFAULT);
    if($_FILES){
        $ext = pathinfo($_FILES['newAvatar']['name'],PATHINFO_EXTENSION);
        $usuario['avatar'] = $usuario['email'].".".$ext;
    }
    $posicion = $usuario['id'] - 1;
    $usuarios['usuarios'][$posicion] = $usuario;
    $json = json_encode($usuarios,JSON_PRETTY_PRINT);
    file_put_contents("db.json",$json);
    
}

?>