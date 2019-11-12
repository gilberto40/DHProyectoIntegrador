<?php
include_once 'loader.php';
$registro =PreguntaRespuesta::read($bd);
// var_dump($registro);
// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <title>Preguntas</title>
</head>

<body>
    <div class="container">

        <div>
         <h1 class="text-center _Nih1preg">Preguntas</h1> 
        </div>

        <div>
            <div class="_Nibotpreg">            
                <a href="homeAdmin.php" class="_NiBsalPreg btn btn-lg active" role="button" aria-pressed="true">Salir</a>
                <a href="editarPreguntas.php" class="_NiBeditpreg btn btn-lg active" role="button" aria-pressed="true">Agregar pregunta</a>
            </div>
        </div>

        <table class="table _NiTpreg">

            <thead class="thead-dark">
                <th>ID</th>
                <th>Pregunta</th>
                <th>Respuesta</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>

             
            <tbody>
            <?php foreach($registro as $value):?>
                <tr>
                    <td><?php echo $value['id'];?></td>
                    <td><?php echo $value['pregunta'];?></td>
                    <td><?php echo $value['respuestaCorrecta'];?></td>
                    <td><a href="editarPreguntas.php"><ion-icon name="create"></ion-icon></a></td>
                    <td><a href=""><ion-icon name="close"></ion-icon></a></td>
                </tr>
            <?php endforeach?>
            </tbody>

        </table>






    </div>

<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>