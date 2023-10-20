<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formuario</title>
    <link rel="stylesheet" href="css2/estilo.css">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>

    <main>

        <form action="" method="post">
            <div class="cont_back">
                <a href="index.php">
                    <span class="material-symbols-outlined">
                        arrow_back
                    </span>
                </a>
                <h1>Solicitar turno medico</h1>
            </div>

            <input type="text" placeholder="Nombre y apellido" name="nombre" class="enviar">
            <input type="text" class="solicitud" placeholder="solicitud" name="solicitud">
            <input type="text" placeholder="Telefono" name="telefono">
            <input type="text" placeholder="Correo electronico" name="email">
            <select id="localidad" name="localidad" class="selec">
                <option value="Boulogne">Boulogne</option>
                <option value="Carapachay">Carapachay</option>
                <option value="Olivos">Olivos</option>
                <option value="Villa Adelina">Villa Adelina</option>
                <option value="Munro">Munro</option>
                <option value="Florida">Florida</option>
            </select>
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
                $email = $_POST['email'];
                $solicitud = $_POST['solicitud'];
                $localidad = $_POST['localidad'];
                $telefono = $_POST['telefono'];

                // Verifica que todos los campos estén completos
                if (empty($nombre) || empty($email) || empty($solicitud) || empty($localidad) || empty($telefono)) {
                    $mensaje = "Por favor, complete todos los campos.";
                } else {
                    // Sentencia preparada para la inserción
                    $sql = "INSERT INTO solicitud_turno (nombre, localidad, descripcion, telefono, correo) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $conexionDatos->prepare($sql);

                    if ($stmt) {
                        // Vincula los parámetros y ejecuta la consulta
                        $stmt->bind_param("sssss", $nombre, $localidad, $solicitud, $telefono, $email);
                        if ($stmt->execute()) {
                            $mensaje = "Datos insertados correctamente";
                        } else {
                            $mensaje = "Error al insertar datos: " . $stmt->error;
                        }

                        // Cierra la sentencia preparada
                        $stmt->close();
                    } else {
                        $mensaje = "Error en la preparación de la sentencia: " . $conexionDatos->error;
                    }
                }
            }

            // Cierra la conexión a la base de datos
            $conexionDatos->close();
            ?>

            <?php
            if (isset($_POST['btn'])) {


                echo ("<h3>$mensaje</h3>");
                if ($localidad == "Boulogne" || $localidad == "Florida") {

                    echo ("<h3>tendra que ir al Hospiatl Bernardo Houssay</h3>");
                    echo ("<h4>Pres. Hipólito Yrigoyen 1757, Florida</h4>");
                    echo ("<h4>Días y horarios:Lunes a viernes de 7.30 a 16.45hs y sábados de 8 a 14 hs.</h4>");
                }
                
                if ($localidad == "Carapachay") {
                    echo ("<h3>tendra que ir a URI BURMAN</h3>");
                    echo ("<h4> Ituzaingó 5725,Carapachay </h4>");
                    echo ("<h4>Días y horarios: Lunes a sábados de 8 a 18 hs</h4>");
                }
                if ($localidad == "Villa Adelina") {
                    echo ("<h3>tendra que ir a CAPS SCALISE </h3>");
                    echo ("<h4> Cajaraville 4042 Villa Adelina</h4>");
                    echo ("<h4>Días y horarios: Lunes a viernes de 8 a 12 hs y de 13 a 15 hs</h4>");
                }
                if ($localidad == "Munro") {
                    echo ("<h3>tendra que ir a CAPS BARREIRO AGUIRRE</h3>");
                    echo ("<h4> Sargento Baigorria 2461,Munro </h4>");
                    echo ("<h4>Días y horarios: Lunes a viernes de 8:00 a 15:00 hs</h4>");
                }
                if ($localidad == "Olivos") {
                    echo ("<h3>CAPS ILLÍA </h3>");
                    echo ("<h4> San Lorenzo 3522,Olivos </h4>");
                    echo ("<h4>Días y horarios: Lunes, martes, miércoles y viernes de 8:30 a 15:00 hs y jueves de 8:0030 hs a 13:30 hs</h4>");
                }
            }
            ?>
        </form>
    </main>
    <script src="index2.js"></script>
</body>

</html>