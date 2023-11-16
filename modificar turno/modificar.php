<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Turno</title>
    <link rel="stylesheet" href="css3/estilo.css">
    <link rel="shortcut icon" href="../pagina prin/img/logo.ico" type="image/x-icon">
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
                    <a href="../turno/form.php">Solicitar Turno</a>
                </div>
                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        edit_note
                    </span>
                    <a href="../pagina prin/index.php">Pagina principal</a>
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
                <label>Ingrese su DNI</label>
                <input type="text" placeholder="DNI" name="dni">
                <button type="submit" name="btn_enviar" class="btn_enviar">Enviar solicitud</button>

                <?php 
                $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');

                if ($conexionDatos->connect_error) {
                    die("Error de conexión a la base de datos: " . $conexionDatos->connect_error);
                }
                
                if (isset($_POST['btn_enviar'])) { 
                     $nombre = $_POST['nombre'];
                     $dni = $_POST['dni'];
                     if(empty($nombre) || empty($dni)){
                        echo("Por favor complete todos los campos");
                    }
                    else{
                       
                         if( verificar_datos("dia",$nombre,$dni)==true){

                            echo("<div class='cont_texto'> 
                                <h3>$nombre</h3>
                                <p> tus turnos son:</p> 
                            </div>");
                            
                            echo("<div class='cont_listas'>");
                            lista("editar",$nombre,$dni);
                            lista("borrar",$nombre,$dni);
                            lista("dia",$nombre,$dni);
                            lista("hora",$nombre,$dni);
                            lista("descripcion",$nombre,$dni);
                            }
                            else{
                            echo("<div class='cont_listas'>");
                            echo("<p>Usted no tiene ningún turno previo.</p>");
                             }
                        
                            
                         
                    }
                }
                if (isset($_POST['btn_borrar'])){
                    $id_a_borrar = $_POST['btn_borrar']; // Obtén el ID del turno a borrar
                    $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
                    echo '<p>Turno  medico cancelado</p>';
                    // Evitar inyección SQL utilizando sentencias preparadas
                    $query_delete = $conexionDatos->prepare("DELETE FROM `solicitud_turno` WHERE id = ?");
                    $query_delete->bind_param("i", $id_a_borrar); // "i" indica que es un número entero
                    $query_delete->execute();
            
                       
                }
                if (isset($_POST['btn_editar'])){
                    $id_a_editar = $_POST['btn_editar']; 
                    $input_desc = $_POST['input_desc']; 
                    $input_dia = $_POST['input_dia'];
                    $input_hora = $_POST['input_hora']; 
                   
                    $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
                
                    // Verifica la conexión
                    if ($conexionDatos->connect_error) {
                        die("Error de conexión a la base de datos: " . $conexionDatos->connect_error);
                    }
                
                    // Actualiza los datos en la base de datos
                    $query_update = $conexionDatos->prepare("UPDATE `solicitud_turno` SET `descripcion`=?, `dia`=?, `hora`=? WHERE `id`=?");
                    $query_update->bind_param("sssi", $input_desc, $input_dia, $input_hora, $id_a_editar); // "sssi" indica los tipos de datos de los parámetros
                    $query_update->execute();
                
                    // Verifica si la actualización se realizó correctamente
                    if ($query_update->affected_rows > 0) {
                        echo '<p>Turno médico reprogramado</p>';
                        echo("<br>");
                        echo($id_a_editar);
                        echo("<br>");
                        echo($input_desc);
                        echo("<br>");
                        echo($input_dia);
                        echo("<br>");
                        echo($input_hora);
                    } else {
                        echo "Error al actualizar el turno: " . $conexionDatos->error;
                    }
                
                    // Cierra la conexión y la consulta preparada
                    $query_update->close();
                    $conexionDatos->close();
                }
                echo("</div>");
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
    function lista($opcion, $nombre, $dni) {
        $num = 1;
        $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');

        // Realizar la consulta según la opción seleccionada
        if ($opcion == "borrar" || $opcion == "editar") {
            $queryselect = "SELECT id FROM `solicitud_turno` WHERE nombre='$nombre' and dni='$dni'";
        } else {
            $queryselect = "SELECT id, $opcion FROM `solicitud_turno` WHERE nombre='$nombre' and dni='$dni'";
        }

        $result_select = mysqli_query($conexionDatos, $queryselect);

        // Ponerle los títulos a las tablas.
        echo '<div class="cont_lista">';
        if ($opcion == "dia") {
            echo '<h4 class="titulo">DIA</h4>';
        } elseif ($opcion == "hora") {
            echo '<h4 class="titulo">HORARIO</h4>';
        } elseif ($opcion == "descripcion") {
            echo '<h4 class="titulo">SOLICITUD MÉDICA</h4>';
        } elseif ($opcion == "borrar") {
            echo '<h4 class="titulo">CANCELAR  TURNO</h4>';
        } elseif ($opcion == "editar") {
            echo '<h4 class="titulo">EDITAR TURNO</h4>';
        }

        // Rellenar las filas con los datos
        if ($result_select) {
            $num_rows = mysqli_num_rows($result_select);
            if ($num_rows == 0) {
                echo '<p>No hay turnos disponibles</p>';
            } else {
                // Imprimir los detalles de los turnos
                while ($vacuna = mysqli_fetch_array($result_select)) {
                    
                    if ($num % 2 == 0) {
                        
                        if ($opcion == "dia") {
                            echo '<input type="date" name="input_dia" class="vacuna-name par" value="'.$vacuna['dia'].'">';
                        } elseif ($opcion == "hora") {
                            echo '<input type="time" name="input_hora" class="vacuna-name par" value="'.$vacuna['hora'].'">';
                        } elseif ($opcion == "descripcion") {
                            echo '<input type="text" name="input_desc" class="vacuna-name par" value="'.$vacuna['descripcion'].'">';
                        }
                         elseif ($opcion == "editar") {
                            echo ('<button type="submit" name="btn_editar" class="vacuna-name par" value='. $vacuna['id'] .'>
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                            </button>');
                        } elseif ($opcion == "borrar") {
                            echo ('<button type="submit" name="btn_borrar" class="vacuna-name par" value='. $vacuna['id'] .'>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            </button> ');
                        } 
                    }
                    else{
                        if ($opcion == "dia") {
                            echo '<input type="date" name="input_dia" class="vacuna-name" value="'.$vacuna['dia'].'">';
                        } elseif ($opcion == "hora") {
                            echo '<input type="time" name="input_hora" class="vacuna-name" value="'.$vacuna['hora'].'">';
                        } elseif ($opcion == "descripcion") {
                            echo '<input type="text" name="input_desc" class="vacuna-name" value="'.$vacuna['descripcion'].'">';
                        }
                        elseif ($opcion == "editar") {
                            echo ('<button type="submit" name="btn_editar" class="vacuna-name " value='. $vacuna['id'] .'>
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                            </button> ');
                        } elseif ($opcion == "borrar") {
                            echo ('<button type="submit" name="btn_borrar" class="vacuna-name" value='. $vacuna['id'] .'>
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            </button> ');
                        } 
                    }
                    $num=$num+1;
                }
            }
        } else {
            echo '<p>No se encontraron datos</p>';
        }

        echo '</div>';
    }
   
    ?>
</body>

</html>