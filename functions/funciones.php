<?php

// FUNCION PARA VALIDAR DATOS DE REGISTRO
function validarDatos($datos){
    $errores = [];
    $datosFinales = [];
    //aplicandole el trim() a todos los registros 
    foreach($datos as $key => $value){
        if($key == "userName" || $key == "email"){
            $datosFinales[$key] = trim($value);

        }else{
            $datosFinales[$key]= $value;
        }
    }

    // VALIDAR USER NAME
    if(strlen($datosFinales["userName"])==0){
        $errores["userName"] = "No puedes dejar el campo vacio";
    }else if(!ctype_alpha($datosFinales["userName"])){
        $errores["userName"] = "No puedes usar numeros o caracteres especiales";
    }
    // PARA QUE NO EXISTA EL MISMO USER
    if(buscarPorUser($datosFinales['userName'])!=NULL){
        $errores['userName'] = "Este nombre de usuario ya se encuentra ocupado";
    }
    //validacion del email 
    if(strlen($datosFinales["email"]) == 0){
        $errores["email"] = "No puedes dejar este campo vacio"; 
    }else if(!filter_var($datosFinales["email"],FILTER_VALIDATE_EMAIL)){
        $errores["email"]= "Email invalido";
    }

    // VERIFICAR SI YA EXISTE EL MAIL EN LA BASE DE DATOS 
    if(existeUsuario($datosFinales['email'])){
        $errores["email"] = "El email ya se encuentra registrado en otra cuenta ";
    }

    // VALIDAR PASSWORD
    if(strlen($datosFinales["password"]) == 0){
        $errores["password"] = "No puedes dejar este campo vacio";
    } else if(strlen($datosFinales["password"]) <6){
        $errores["password"] = "la contraseña debe de tener mas de 6 caracteres";
    } else if(!is_numeric($datosFinales["password"])){
        $errores["password"] = "La contraseña solo puede contener caracteres numericos";
    }

    // VALIDAR COMFIRMACION DE PASSWORD
    if(strlen($datosFinales["confirmPassword"]) == 0){
        $errores["confirmPassword"] = "No puedes dejar este campo vacio";
    }else if($datosFinales["confirmPassword"] != $datosFinales["password"]){
        $errores["confirmPassword"] = "La contraseña no coincide"; 
    }

    // VALIDAR FILE
    $ext = pathinfo($_FILES["avatar"]['name'], PATHINFO_EXTENSION);
    if(strlen($_FILES["avatar"]["name"])==0){
        $errores["avatar"] = "no agregaste nada";
    }
    else if($ext != "jpg" && $ext != "png" && $ext != "jpeg"){
     $errores["avatar"] = "Elige  un archivo de tipo jpg o png o jpeg";   
    }
    return $errores;
}


// FUNCION DE ID PARA CADA USUARIO
function nextId(){
    $json = file_get_contents("db.json");
    $usuarios = json_decode($json,true);
    $ultimoUsuario = array_pop($usuarios['usuarios']);
    $ultimoId = $ultimoUsuario['id'];
    if($ultimoId != 0){
        return $ultimoId + 1;
    }else{
        return 1;
    }
}


// CREAR ARRAY ASOCIATIVO PARA USUARIOS
function crearUsuario($datos){
    return[
        "id"       => nextId(),
        "userName" => $_POST["userName"],
        "email"    => $_POST["email"],
        "password" =>password_hash($_POST["password"],PASSWORD_DEFAULT),
        "rol"      => 1,
        "avatar" => $_POST['email'].".".pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION),
    ];
}


// FUNCION PARA GUARDAR USUARIO EN UN ARCHIVO JSON
function guardarUsuario($usuario){
    $json = file_get_contents("db.json");
    $usuarios = json_decode($json,true);
    $usuarios["usuarios"][] = $usuario;
    $json = json_encode($usuarios,JSON_PRETTY_PRINT);
    file_put_contents("db.json",$json);
}


// FUNCION PARA IMPRIMIR DATOS ANTERIORES QUE PASARON VALIDACION
function reincidencia($campo){
    if($_POST){
        if(!isset($errores[$campo])){
            echo $_POST[$campo];                        
        } 
    }
}


// FUNCION QUE TARE TODOS LOS DATOS DE UN USUARIO POR SU MAIL, LA USAREMOS EN LA COMPARACION DE EMAILS EN EL LOGIN Y EN EL PASSWORD_VERIFY
function buscarPorEmail($email){
    $json = file_get_contents("db.json");
    $usuarios = json_decode($json,true);
    foreach($usuarios['usuarios'] as $usuario){
        if($usuario['email'] == $email){
            return $usuario;
        }   
    }
    return null;
}


// FUNCTION QUE BUSCA USUARIO YA EXISTENTE
function buscarPorUser($user){
    $json = file_get_contents("db.json");
    $usuarios = json_decode($json,true);
    foreach($usuarios['usuarios'] as $usuario){
        if($usuario['userName'] == $user){
            return $usuario;
        }  
    }
    return null;
}


// SI EXISTE EL USUARIO UN TRUE
function existeUsuario($email){
    return buscarPorEmail($email)!= NULL;
}
    

// VALIDAR LOGIN
function validarLogIn($usuario){
    $errores=[];
    $data = buscarPorEmail($usuario['emailLogIn']);

    // VALIDAR EMAIL
    if(strlen($usuario['emailLogIn']) == 0){
        $errores['emailLogIn'] = "Deber ingresar un email";
    }
    else if(!filter_var($usuario['emailLogIn'],FILTER_VALIDATE_EMAIL)){
        $errores['emailLogIn'] = "Email invalido";
    }
    else if(!existeUsuario($usuario['emailLogIn'])){
        $errores['emailLogIn'] = "Usuario no registrado";
    }

    // VALIDAR PASSWORD
    if(strlen($usuario['passwordLogIn']== 0)){
        $errores['passwordLogIn'] ="Debes llenar el campo clave "; 
    }
    else if(!password_verify($usuario['passwordLogIn'],$data['password'])){
        $errores['passwordLogIn']= "contraseña no coinciden";
    }
    return $errores;
}


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


?>