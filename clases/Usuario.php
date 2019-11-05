<?php

class Usuario{
    private $userName ;
    private $email ;
    private $password;
    private $confirmPassword;
    private $avatar;

    public function __construct($userName,$email,$password,$confirmPassword,$avatar){
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
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
    public function setAvatar($avatar){
        return $this->avatar = $avatar;
    }

}





?>