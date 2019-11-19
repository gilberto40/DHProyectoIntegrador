<?php
class Jugador extends Usuario{
    public function __construct($userName,$email,$password,$confirmPassword,$avatar){
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->rol =1;
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
        header('Location:homeJuego.php');
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
    static public function update($bd,$id,$userName,$password){
        $sql = "UPDATE usuarios SET userName = :userName,password = :password WHERE id=$id";
        $query = $bd->prepare($sql);
        $query->bindValue(':userName',$userName);
        $query->bindValue(':password',password_hash($password,PASSWORD_DEFAULT));
        $query->execute();
        header('Location:homeJuego.php');
    }
    
}




?>