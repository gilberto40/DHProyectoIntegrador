<?php
session_start();
include_once 'clases/BaseDeDato.php';
include_once 'clases/BaseJson.php';
include_once 'clases/Usuario.php';
include_once 'clases/Validador.php';
include_once 'clases/LogIn.php';
include_once 'clases/BaseSQL.php';
include_once 'clases/PreguntaRespuesta.php';
include_once 'clases/Jugador.php';
include_once 'clases/Administrador.php';

$baseJson = new BaseJson('db.json');
$bd = BaseSQL::conexion();

?>