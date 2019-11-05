<?php
    class BaseJson extends BaseDeDato{
        private $baseJson;

        public function __construct($baseJson){
            $this->baseJson = $baseJson;
        }
        public function getBaseJson(){
            return $this->baseJson;
        }
        public function setBaseJson(){
            return $this->baseJson = $baseJson;
        }
        
        // FUNCION DE ID PARA CADA USUARIO
       public function nextId(){
            $json = file_get_contents($this->getBaseJson());
            $usuarios = json_decode($json,true);
            $ultimoUsuario = array_pop($usuarios['usuarios']);
            $ultimoId = $ultimoUsuario['id'];
            if($ultimoId != 0){
                return $ultimoId + 1;
            }else{
                return 1;
            }
        }

        public function crear($usuario){
            $array = [
                "id"       => $this->nextId(),
                "userName" => $usuario->getUserName(),
                "email"    => $usuario->getEmail(),
                "password" =>password_hash($usuario->getPassword(),PASSWORD_DEFAULT),
                "rol"      => 1,
                "avatar" => $usuario->getAvatar(),
            ];
             $json = file_get_contents($this->getBaseJson());
            $usuarios = json_decode($json,true);
            $usuarios["usuarios"][] = $array;
            $json = json_encode($usuarios,JSON_PRETTY_PRINT);
            file_put_contents($this->getBaseJson(),$json);
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
            $json = file_get_contents($this->getBaseJson());
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
            $json = file_get_contents($this->getBaseJson());
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
            return $this->buscarPorEmail($email)!= NULL;
        }
            






    }





?>