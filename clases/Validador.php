<?php 
class Validador{
    static public function validarDatos($usuario){
        $errores = [];
        // //aplicandole el trim() a todos los registros 
        // foreach($usuario as $key => $value){
        //     if($key == "userName" || $key == "email"){
        //         $datosFinales[$key] = trim($value);
    
        //     }else{
        //         $datosFinales[$key]= $value;
        //     }
        // }
    
        // VALIDAR USER NAME
        $userName=$usuario->getUserName();
        $email =$usuario->getEmail();
        if(strlen($usuario->getUserName())==0){
            $errores["userName"] = "No puedes dejar el campo vacio";
        }else if(!ctype_alpha($usuario->getUserName())){
            $errores["userName"] = "No puedes usar numeros o caracteres especiales";
        }
        // PARA QUE NO EXISTA EL MISMO USER
        if(BaseSQL::buscar("usuarios","userName","'$userName'")!=NULL){
            $errores['userName'] = "Este nombre de usuario ya se encuentra ocupado";
        }
        //validacion del email 
        if(strlen($usuario->getEmail()) == 0){
            $errores["email"] = "No puedes dejar este campo vacio"; 
        }else if(!filter_var($usuario->getEmail(),FILTER_VALIDATE_EMAIL)){
            $errores["email"]= "Email invalido";
        }
    
        // VERIFICAR SI YA EXISTE EL MAIL EN LA BASE DE DATOS 
        if(BaseSQL::buscar('usuarios','email',"'$email'")!=NULL){
            $errores["email"] = "El email ya se encuentra registrado en otra cuenta ";
        }
    
        // VALIDAR PASSWORD
        if(strlen($usuario->getPassword() == 0)){
            $errores["password"] = "No puedes dejar este campo vacio";
        } else if(strlen($usuario->getPassword()) <6){
            $errores["password"] = "la contraseña debe de tener mas de 6 caracteres";
        } else if(!is_numeric($usuario->getPassword())){
            $errores["password"] = "La contraseña solo puede contener caracteres numericos";
        }
    
        // VALIDAR COMFIRMACION DE PASSWORD
        if(strlen($usuario->getConfirmPassword()) == 0){
            $errores["confirmPassword"] = "No puedes dejar este campo vacio";
        }else if($usuario->getConfirmPassword() != $usuario->getPassword()){
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


    static  public function validarLogIn($logIn,$baseJson){
        $errores=[];
        $data = $baseJson->buscarPorEmail($logIn->getEmailLogIn());
    
        // VALIDAR EMAIL
        if(strlen($logIn->getEmailLogIn()) == 0){
            $errores['emailLogIn'] = "Deber ingresar un email";
        }
        else if(!filter_var($logIn->getEmailLogIn(),FILTER_VALIDATE_EMAIL)){
            $errores['emailLogIn'] = "Email invalido";
        }
        else if(!$baseJson->existeUsuario($logIn->getEmailLogIn())){
            $errores['emailLogIn'] = "Usuario no registrado";
        }
    
        // VALIDAR PASSWORD
        if(strlen($logIn->getPasswordLogIn()== 0)){
            $errores['passwordLogIn'] ="Debes llenar el campo clave "; 
        }
        else if(!password_verify($logIn->getPasswordLogIn(),$data['password'])){
            $errores['passwordLogIn']= "contraseña no coinciden";
        }
        return $errores;
    }
    static public function validarNewAvatar(){
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
    static public function validarEdit($post,$baseJson){
        $errores =[];
        $data=$baseJson->buscarPorEmail($_SESSION['email']);
        /*validaciones de user name*/
        if(strlen($post["newNombre"]) == 0){
            $errores["password"] = "No puedes dejar este campo vacio";
            /* validadcion de el password anterior*/
        }if(strlen($post["password"]) == 0){
            $errores["password"] = "No puedes dejar este campo vacio";
        }else if(!password_verify($post['password'],$data['password'])){
            $errores['password']="no coincide con tu password anterior ";
        }
        /* validacion del nuevo password*/ 
        if(strlen($post["password"]) == 0){
            $errores["newPassword"] = "No puedes dejar este campo vacio";
        } else if(strlen($post["password"]) <6){
            $errores["newPassword"] = "la contraseña debe de tener mas de 6 caracteres";
        } else if(!is_numeric($post["password"])){
            $errores["newPassword"] = "La contraseña solo puede contener caracteres numericos";
        }
    /** validacion de la confirmacion del password y su comparacion entre el otro campo  */
        if(strlen($post["newPasswordConfirm"]) == 0){
            $errores["newPasswordConfirm"] = "No puedes dejar este campo vacio";
        }else if($post["newPasswordConfirm"] != $post['newPassword']){
            $errores["newPasswordConfirm"] = "no coinciden las contraseñas";
        }
    
           
        return $errores;
    }

}





?>