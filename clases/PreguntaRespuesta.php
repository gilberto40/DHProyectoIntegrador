<?php
class preguntaRespuesta{
    private $pregunta;
    private $respuesta1;
    private $respuesta2;
    private $respuesta3;
    private $respuestaCorrecta;

    public function __construct($pregunta,$respuesta1,$respuesta2,$respuesta3,$respuestaCorrecta){
        $this->pregunta = $pregunta;
        $this->respuesta1 = $respuesta1;
        $this->respuesta2 = $respuesta2;
        $this->respuesta3 = $respuesta3;
        $this->respuestaCorrecta = $respuestaCorrecta;
    }
    public function getPregunta(){
      return $this->pregunta;  
    }
    public function getRespuesta1(){
        return $this->respuesta1;  
    }
    public function getRespuesta2(){
        return $this->respuesta2;  
      }
    public function getRespuesta3(){
        return $this->respuesta3;  
    }
    public function getRespuestaCorrecta(){
        return $this->respuestaCorrecta;  
    }
    

    public function create($bd){
        $sql ='INSERT INTO preguntasRespuestas (pregunta,respuesta1,respuesta2,respuesta3,respuestaCorrecta) VALUES (:pregunta,:respuesta1,:respuesta2,:respuesta3,:respuestaCorrecta)';
        $query = $bd->prepare($sql);
        $query->bindValue(':pregunta',$this->getPregunta());
        $query->bindValue(':respuesta1',$this->getRespuesta1());
        $query->bindValue(':respuesta2',$this->getRespuesta2());
        $query->bindValue(':respuesta3',$this->getRespuesta3());
        $query->bindValue(':respuestaCorrecta',$this->getRespuestaCorrecta());
        $query->execute();
        header('Location:homeAdmin.php');
    }
   static  public function read($bd){
        $sql = "SELECT id,pregunta,respuesta1,respuesta2,respuesta3,respuestaCorrecta FROM preguntasRespuestas ";
        $query = $bd->prepare($sql);
        $query->execute();
        $registro = $query->fetchAll(PDO::FETCH_ASSOC);
        return $registro;
    }
    // public function update(){

    // }
    // public function delete(){

    // }



}




?>