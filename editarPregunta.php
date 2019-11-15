<?php
require_once 'loader.php';


if($_POST){
    
   $pyr = new PreguntaRespuesta($_POST['editPregunta'],$_POST['editRespuesta1'],$_POST['editRespuesta2'],$_POST['editRespuesta3'],$_POST['editRespuestaCorrecta']);
   $pyr->update($bd,$_POST['id']);


}else{$id = $_GET['id'];
$registro=BaseSQL::buscar('preguntasRespuestas','id',$id);
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

            <form class=" text-center" action="editarPregunta.php" method="post">

                <h1 class="_NiTh1edit-preg">Editar preguntas</h1>

                <div class="_Nibotpreg">            
                    <a href="preguntas.php" class="_NiBsalPreg btn btn-lg active" role="button" aria-pressed="true">Salir</a>
                    <button type="submit" class="_NiBeditpreg btn btn-lg active" role="button" aria-pressed="true">Realizar cambios</button> 
                </div>

                <!--Edit Pregunta-->
                <section class="_Niingresa-preg text-center">

                    <input type="text" class="text-center _NicampEPreg" id="ingresarPregunta" placeholder="Ingresar pregunta" name="editPregunta" value="<?=$registro[0]['pregunta'];?>">

                </section>

                <!--Edit Respuestas-->  
                    
                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="1.- Respuesta 1" name="editRespuesta1" value="<?=$registro[0]['respuesta1'];?>">
                    </article>
                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="2.- Respuesta2" name="editRespuesta2" value="<?=$registro[0]['respuesta2'];?>">
                    </article>

                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="3.- Respuesta 3" name="editRespuesta3" value="<?=$registro[0]['respuesta3'];?>">
                    </article>
                    <article class="col-5">
                        <input type="text" class="text-center _NicampR-editP" id="" placeholder="4.- Respuesta Correcta" name="editRespuestaCorrecta" value="<?=$registro[0]['respuestaCorrecta'];?>">
                    </article>
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                  
            </form>
</div>




    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>