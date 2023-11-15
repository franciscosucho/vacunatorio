<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Turno</title>
    <link rel="stylesheet" href="css3/estilo.css">
    <link rel="shortcut icon" href="https://citymis.co/custom/vicentelopez/public/_css/logo150x550.png"
        type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.vicentelopez.gov.ar/apple-touch-icon.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <header>
        <img id="img_prin" src="https://citymis.co/custom/vicentelopez/public/_css/logo150x550.png" alt="">
        <div class="cont_he">

            <h1>Vacunatorio</h1>
            <ul>
                <a href="#sec_info" class="ver_info">Información sobre las vacunas </a>
                <a class="ver_img">Ubicaciones de vacunatorios</a>
                <a class="ver_horarios">Horarios de Vacunación</a>
                <a class="ver_horarios">Info vacunación</a>
            </ul>
            <div class="cont_menu">
                <h3>Menú de usuario</h3>
                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        syringe
                    </span>
                    <a href="form.php">Solicitar vacuna</a>
                </div>
                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        edit_note
                    </span>
                    <li id="modificar_turno">Modificar turno</li>
                </div>


                <span class="material-symbols-outlined icon btn_close">
                    close
                </span>
            </div>
            <span class="material-symbols-outlined btn_menu icon ">
                menu
            </span>

        </div>

        <div class="cont_vic">
            <h3>Vicente López</h3>
        </div>

    </header>
    <main>
        <section id="cont_modificar_turno">

            <form class="form" method="post" action=" ">
                <h3>Modificar turno</h3>
                <label>Ingrese su nombre y apellido</label>
                <input type="text" placeholder="Nombre y apellido" name="nombre">
                <label>Ingrese su dni</label>
                <input type="text" placeholder="Dni" name="dni">
                <button type="submit" name="btn" class="btn_enviar">Enviar solicitud</button>

                <?php 
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');

            if ($conexionDatos->connect_error) {
                die("Error de conexión a la base de datos: " . $conexionDatos->connect_error);
            }
            
        if (isset($_POST['btn'])) { 
             $nombre = $_POST['nombre'];
             $dni = $_POST['dni'];
             if(empty($nombre) || empty($dni)){
                echo("Porfavor complete todos los campos");
            }
            else{
           
                 if( verificar_datos("dia",$nombre,$dni)==true){
                    echo("<h3>$nombre tus turnos son:</h3>");
                    echo("<div class='cont_listas'>");
                        lista("dia",$nombre,$dni);
                        lista("hora",$nombre,$dni);
                        lista("descripcion",$nombre,$dni);
                 }
                 else{
                    echo("<div class='cont_listas'>");
                        echo("<h3>Usted no tiene ningun turno previo.</h3>");
                 }
                
                    echo("</div>");
            }
        }
            ?>
            </form>

        </section>
    </main>
    <script>
    var btn_menu = document.querySelector(".btn_menu");
    var cont_menu = document.querySelector(".cont_menu");
    var btn_close = document.querySelector(".btn_close");
    btn_menu.addEventListener("click", () => {
        cont_menu.classList.toggle("active")
    })
    btn_close.addEventListener("click", () => {
        cont_menu.classList.toggle("active")
    })
    </script>
</body>

</html>

<?php 

function verificar_datos($opcion,$nombre,$dni){
    $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
    $queryselect="SELECT id,$opcion FROM `solicitud_turno` WHERE nombre='$nombre' and dni='$dni'";
    $result_select= mysqli_query($conexionDatos, $queryselect);
    $vacuna = mysqli_fetch_array($result_select);
    if($vacuna > 0){
        return true;
    }
}
function lista($opcion,$nombre,$dni){
    $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
    $queryselect="SELECT id,$opcion FROM `solicitud_turno` WHERE nombre='$nombre' and dni='$dni'";
    $result_select= mysqli_query($conexionDatos, $queryselect);
    $vacuna = mysqli_fetch_array($result_select);
    
    //ponerle los titulos alas tablas.
    echo ('<div class="cont_lista">');
    if ($opcion == "dia") {
        echo ('<h4 class="titulo"> DIA</h4>');
    } elseif ($opcion == "hora") {
        echo ('<h4 class="titulo">HORARIO</h4>');
    } elseif ($opcion == "descripcion") {
        echo ('<h4 class="titulo">SOLICITUD MÉDICA</h4>');
    }
    //rellerna las filas con los datos
    while ($vacuna = mysqli_fetch_array($result_select)) {
        if ($vacuna['id'] % 2 == 0) {
            if ($opcion == "dia") {
                echo ('<p class="vacuna-name par">' . $vacuna['dia'] . '</p>');
            } elseif ($opcion == "hora") {
                echo ('<p class="vacuna-name par"> ' . $vacuna['hora'] . '</p>');
            } elseif ($opcion == "descripcion") {
                echo ('<p class="vacuna-name par">' . $vacuna['descripcion'] . '</p>');
            }
            
        }
        else{
            if ($opcion == "dia") {
                echo ('<p class="vacuna-name">' . $vacuna['dia'] . '</p>');
            } elseif ($opcion == "hora") {
                echo ('<p class="vacuna-name"> ' . $vacuna['hora'] . '</p>');
            } elseif ($opcion == "descripcion") {
                echo ('<p class="vacuna-name">' . $vacuna['descripcion'] . '</p>');
            }
        }
    }
    echo ('</div>');
}?>