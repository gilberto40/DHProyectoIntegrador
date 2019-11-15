<?php 
include_once 'loader.php';
$id = $_GET['id'];
PreguntaRespuesta::delete($bd,$id);
header('Location:preguntas.php');
exit;
?>