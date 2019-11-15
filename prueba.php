<?php
include_once 'loader.php';

$busqueda = BaseSQL::buscar('preguntasRespuestas','id','1');
var_dump($busqueda);


?>