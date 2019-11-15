<?php
class Jugador extends Usuario{
    public function __construct($userName,$email,$password,$confirmPassword,$avatar){
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->rol =2;
        $this->avatar = $avatar;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getConfirmPassword(){
        return $this->confirmPassword;
    }
    public function getAvatar(){
        return $this->avatar;
    }
    public function getRol(){
        return $this->rol;
    }

    public function create($bd){
        $sql ='INSERT INTO usuarios(userName,email,password,avatar,rol) VALUES (:userName,:email,:password,:avatar,:rol)';
        $query = $bd->prepare($sql);
        $query->bindValue(':userName',$this->getUserName());
        $query->bindValue(':email',$this->getEmail());
        $query->bindValue(':password',password_hash($this->getPassword(),PASSWORD_DEFAULT));
        $query->bindValue(':avatar',$this->getAvatar());
        $query->bindValue(':rol',$this->getRol());
        $query->execute();
        header('Location:homeAdmin.php');
    }
//    static  public function read($bd){
//         $sql = "SELECT id,pregunta,respuesta1,respuesta2,respuesta3,respuestaCorrecta FROM preguntasRespuestas ";
//         $query = $bd->prepare($sql);
//         $query->execute();
//         $registro = $query->fetchAll(PDO::FETCH_ASSOC);
//         return $registro;
//     }
//     static public function delete($bd,$id){
//         $sql = 'DELETE FROM preguntasRespuestas WHERE id ='.$id;
//         $query = $bd->prepare($sql);
//         $query->execute();
//         header('Location:preguntas.php');
//     }
//     public function update($bd,$id){
//         $sql = "UPDATE preguntasRespuestas SET pregunta =:pregunta,respuesta1=:respuesta1,respuesta2=:respuesta2,respuesta3=:respuesta3,respuestaCorrecta=:respuestaCorrecta WHERE id=$id";
//         $query = $bd->prepare($sql);
//         $query->bindValue(':pregunta',$this->getPregunta());
//         $query->bindValue(':respuesta1',$this->getRespuesta1());
//         $query->bindValue(':respuesta2',$this->getRespuesta2());
//         $query->bindValue(':respuesta3',$this->getRespuesta3());
//         $query->bindValue(':respuestaCorrecta',$this->getRespuestaCorrecta());
//         $query->execute();
//         header('Location:preguntas.php');
//     }
    
}




?>