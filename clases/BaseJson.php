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

        public function update($baseJson,$usuario){
            $id = $usuario['id'];
            $json = file_get_contents($baseJson->getBaseJson());
            $bd = json_decode($json,true);
            $usuario['userName'] = $_POST['newNombre'];
            $usuario['password']= password_hash($_POST['newPassword'],PASSWORD_DEFAULT);
            $bd['usuarios'][$id-1] = $usuario;
            $json=json_encode($bd,JSON_PRETTY_PRINT);
            file_put_contents($baseJson->getBaseJson(),$json);
            header('Location:homeJuego.php');
            }
        
        // FUNCION PARA IMPRIMIR DATOS ANTERIORES QUE PASARON VALIDACION
        public function reincidencia($campo){
            if($_POST){
                if(!isset($errores[$campo])){
                    echo $_POST[$campo];                        
                } 
            }
        }
        
        
        // FUNCION QUE TARE TODOS LOS DATOS DE UN USUARIO POR SU MAIL, LA USAREMOS EN LA COMPARACION DE EMAILS EN EL LOGIN Y EN EL PASSWORD_VERIFY
        public function buscarPorEmail($email){
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
        public function buscarPorUser($user){
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
        public function existeUsuario($email){
            return $this->buscarPorEmail($email)!= NULL;
        }
            
         public function editarRegistro($data){
            $usuario = $this->buscarPorEmail($_SESSION['email']);
            
            $json=file_get_contents($this->getBaseJson());
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





    }





?>