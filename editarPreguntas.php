<?php
include_once 'loader.php'; 
if($_POST){
    $registro = new PreguntaRespuesta($_POST['pregunta'],$_POST['respuesta1'],$_POST['respuesta2'],$_POST['respuesta3'],$_POST['respuestaCorrecta']);

   $confirm = $registro->create($bd);
    var_dump($confirm);
    exit;
}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <title>Editar Pregunta</title>
</head>
<body>
    <div class="container">

        <div>

            <form class=" text-center" action="editarPreguntas.php" method="post">

                <h1 class="_NiTh1edit-preg">Editar preguntas</h1>

                <div class="_Nibotpreg">            
                    <a href="homeAdmin.php" class="_NiBsalPreg btn btn-lg active" role="button" aria-pressed="true">Salir</a>
                    <button type="submit" class="_NiBeditpreg btn btn-lg active" role="button" aria-pressed="true">Enviar pregunta</button> 
                </div>

                <!--Edit Pregunta-->
                <section class="_Niingresa-preg text-center">

                    <input type="text" class="text-center _NicampEPreg" id="ingresarPregunta" placeholder="Ingresar pregunta" name="pregunta" value="">

                </section>

                <!--Edit Respuestas-->  
                    
                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="1.- Respuesta 1" name="respuesta1" value="">
                    </article>
                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="2.- Respuesta2" name="respuesta2" value="">
                    </article>

                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="3.- Respuesta 3" name="respuesta3" value="">
                    </article>
                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="4.- Respuesta Correcta" name="respuestaCorrecta" value="">
                    </article>
                  
            </form>
</div>




    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>