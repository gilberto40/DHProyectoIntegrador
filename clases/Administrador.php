<?php
class Administrador extends Usuario{
    
    public function __construct($userName,$email,$password,$confirmPassword){
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->rol =2;
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
    public function getRol(){
        return $this->rol;
    }



    public function setUserName($userName){
        return $this->userName = $userName;
    }
    public function setEmail($email){
        return $this->email = $email;
    }
    public function setPassword($password){
        return $this->password = $password;
    }
    public function setConfirmPassword($confirmPassword){
        return $this->confirmPassword = $confirmPassword;
    }

    public function create($bd){
        $sql ='INSERT INTO usuarios(userName,email,password,rol) VALUES (:userName,:email,:password,:rol)';
        $query = $bd->prepare($sql);
        $query->bindValue(':userName',$this->getUserName());
        $query->bindValue(':email',$this->getEmail());
        $query->bindValue(':password',password_hash($this->getPassword(),PASSWORD_DEFAULT));
        $query->bindValue(':rol',$this->getRol());
        $query->execute();
        header('Location:homeAdmin.php');
    }
}



?>