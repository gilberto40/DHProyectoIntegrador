<?php
class BaseSQL{
    static public function conexion(){
        try {
            $dsn = "mysql:host=localhost;dbname=juego_db;port=3306;charset=utf8mb4";
            $usuario = "root";
            $password = "";
            $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            //Les recuerdo que para el reconocimiento de los errores de mysql, es que incorpormosr esta línea: $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $bd = new PDO($dsn,$usuario,$password,$opt);
            
            return $bd;
        
        } catch (PDOException $error) {
            echo "<h2>No me pude conectar con la Base de Datos...<br></h2>".$error->getMessage();
            exit;
        }
    }

    static public function buscar($tabla,$campo,$valor){
        $sql = "SELECT * FROM $tabla WHERE $campo=$valor ";
        $query = (BaseSQL::conexion())->prepare($sql);
        $query->execute();
        $registro =$query->fetchAll(PDO::FETCH_ASSOC);
        return $registro;

    }

}






?>