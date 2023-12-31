<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <link rel="stylesheet" href="css2/estilo.css">
    <link rel="shortcut icon" href="../pagina prin/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>

    <main>

        <form action="" method="post" id="form">
            <div class="cont_back">
                <a href="../pagina prin/index.php">
                    <span class="material-symbols-outlined">
                        arrow_back
                    </span>
                </a>
                <h1>Solicitar turno médico</h1>
            </div>

            <input type="text" placeholder="Nombre y apellido" name="nombre" class="enviar">
            <input type="text" placeholder="DNI" name="dni" class="enviar">
            <input type="text" class="solicitud" placeholder="Solicitud" name="solicitud">
            <input type="text" placeholder="Teléfono" name="telefono">
            <input type="email" placeholder="Correo electrónico" name="email">
            <select id="localidad" name="localidad" class="selec">
                <option value="Boulogne">Boulogne</option>
                <option value="Carapachay">Carapachay</option>
                <option value="Olivos">Olivos</option>
                <option value="Villa Adelina">Villa Adelina</option>
                <option value="Munro">Munro</option>
                <option value="Florida">Florida</option>
            </select>
            <input type="date" placeholder="Fecha del turno" name="fecha">
            <input type="time" placeholder="Horario del turno" name="hora">
            <button name="btn" class="btn_enviar">Enviar solicitud</button>
            <?php
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');

            if ($conexionDatos->connect_error) {
                die("Error de conexión a la base de datos: " . $conexionDatos->connect_error);
            }

            // Variable para almacenar mensajes
            $mensaje = "";

            // Verifica si el formulario se ha enviado
            if (isset($_POST['btn'])) {
                $nombre = $_POST['nombre'];
                $dni = $_POST['dni'];
                $email = $_POST['email'];
                $solicitud = $_POST['solicitud'];
                $localidad = $_POST['localidad'];
                $telefono = $_POST['telefono'];
                $hora = $_POST['hora'];
                $fecha = $_POST['fecha'];
                // Verifica que todos los campos estén completos
                if (empty($nombre) || empty($dni) || empty($email) || empty($solicitud) || empty($localidad) || empty($telefono) || empty($fecha)|| empty($hora)){
                    $mensaje = "Por favor, complete todos los campos.";
                } else {
                    // Sentencia preparada para la inserción
                    $sql = "INSERT INTO solicitud_turno (nombre , localidad , descripcion, telefono, correo , dni, dia , hora ) VALUES (?,?,?,?,?,?,?,?)";
                    $stmt = $conexionDatos->prepare($sql);

                    if ($stmt) {
                        // Vincula los parámetros y ejecuta la consulta
                        $stmt->bind_param("ssssssss", $nombre, $localidad, $solicitud, $telefono, $email, $dni , $fecha , $hora);
                        if ($stmt->execute()) {
                            $mensaje = "Turno médico solicitado";
                            echo ("<h3>$mensaje</h3>");
                            if ($localidad == "Boulogne" || $localidad == "Florida") {
            
                                echo ("<h3>Tendrá que ir al Hospital Bernardo Houssay</h3>");
                                echo ("<h4>Pres. Hipólito Yrigoyen 1757, Florida</h4>");
                                echo ("<h4>Días y horarios: Lunes a viernes de 7.30 a 16.45hs y sábados de 8 a 14 hs.</h4>");
                            }
            
                            if ($localidad == "Carapachay") {
                                echo ("<h3>Tendrá que ir a URI BURMAN</h3>");
                                echo ("<h4> Ituzaingó 5725, Carapachay </h4>");
                                echo ("<h4>Días y horarios: Lunes a sábados de 8 a 18 hs</h4>");
                            }
                            if ($localidad == "Villa Adelina") {
                                echo ("<h3>Tendrá que ir a CAPS SCALISE </h3>");
                                echo ("<h4> Cajaraville 4042 Villa Adelina</h4>");
                                echo ("<h4>Días y horarios: Lunes a viernes de 8 a 12 hs y de 13 a 15 hs</h4>");
                            }
                            if ($localidad == "Munro") {
                                echo ("<h3>Tendrá que ir a CAPS BARREIRO AGUIRRE</h3>");
                                echo ("<h4> Sargento Baigorria 2461,Munro </h4>");
                                echo ("<h4>Días y horarios: Lunes a viernes de 8:00 a 15:00 hs</h4>");
                            }
                            if ($localidad == "Olivos") {
                                echo ("<h3>CAPS ILLÍA </h3>");
                                echo ("<h4> San Lorenzo 3522,Olivos </h4>");
                                echo ("<h4>Días y horarios: Lunes, martes, miércoles y viernes de 8:30 a 15:00 hs y jueves de 8:0030 hs a 13:30 hs</h4>");
                            }
                        } else {
                            $mensaje = "Error al insertar datos: " . $stmt->error;
                        }

                        // Cierra la sentencia preparada
                        $stmt->close();
                    } else {
                        $mensaje = "Error en la solicitud de el turno.Intentelo mas tarde." . $conexionDatos->error;
                    }
                }
            }
            // Cierra la conexión a la base de datos
            $conexionDatos->close();
            
            ?>
        </form>
    </main>
</body>

</html>