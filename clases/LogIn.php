<?php 
class LogIn{
    private $emailLogin;
    private $passwordLogin;
    private $recordarme;

    public function __construct($emailLogin,$passwordLogin){
        $this->emailLogin = $emailLogin;
        $this->passwordLogin = $passwordLogin;

    }


    public function getEmailLogin(){
        return  $this->emailLogin;
    }
    public function getPasswordLogin(){
        return $this->passwordLogin;
    }

// LOGUEAR USUARIO
    static   public function loguearUsuario($email){
        $_SESSION['email']=$email;
        if(isset($_POST['recordarme'])){
            setcookie("email",$_POST['emailLogIn'],time()+60*60);
        }
    }
    static public function verificar(){
        return isset($_SESSION['email']);
    }
    

}





?>