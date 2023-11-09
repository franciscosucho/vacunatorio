<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacunatorio</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="https://citymis.co/custom/vicentelopez/public/_css/logo150x550.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.vicentelopez.gov.ar/apple-touch-icon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <header>
        <img src="https://citymis.co/custom/vicentelopez/public/_css/logo150x550.png" alt="">
        <div class="cont_he">

            <h1>Vacunatorio</h1>
            <ul>
                <li class="ver_info">Informacion sobre las vacunas </li>
                <li class="ver_vacunas">Tipos de vacunas</li>
                <li class="ver_img">Ubicaciones de vacuatorios</li>
                <li class="ver_horarios">Horarios de Vacunacion</li>
                <li class="ver_horarios">Info vacunacion</li>
            </ul>
            <div class="cont_menu">
                <h3>Menu de usuario</h3>
                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        list_alt
                    </span>
                    <a>Ver turnos medicos</a>
                </div>

                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        syringe
                    </span>
                    <a href="form.php?ocultarForm=true">Solicitar vacuna</a>
                </div>
                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        edit_note
                    </span>
                    <a href="form.php" id="modificar_turno">Modificar turno</a>
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
            <h3>Vicente lopez</h3>
        </div>

    </header>
    <main class="main">

        <img src="https://www.vicentelopez.gov.ar/contenido/2023-01-18-961-imagen.jpg" alt="">
        <section class="sec_prin">

            <h2 class="texto_main">Plan Provincial de vacunacion</h2>
            <h5 class="text_encabezado">Que es?</h5>
            <p class="text_p">Buenos Aires Vacunate es el <b> Público, Gratuito y Optativo </b> de vacunación contra el coronavirus en la Provincia de Buenos Aires.</p>
            <p class="text_p"> Después de 10 meses de comenzar la pandemia, se convirtió en el <b>operativo de vacunación más grande </b>y sin precedentes en la historia bonaerense.</p>
            <p class="text_p"> Incluye la distribución, organización y vacunación simultánea en los <b> 135 municipios del territorio provincial.</b>

            </p>
            <h5 class="text_encabezado">¿Cómo te vacunas?</h5>
            <p class="text_p"><b>La vacuna es libre y federal para todas y todos los bonaerenses, personas de otras jurisdicciones y extranjeras</b>, a partir de los 6 meses de edad, en todos los vacunatorios Covid de La Provincia de Buenos Aires.</p>
            <p class="text_p">Si querés registrarte podés hacerlo desde la Web ingresando en “ me quiero registrar” o desde la App Vacunate. Ahí vas a poder acceder a tus datos y la constancia de las vacunas recibidas.
            </p>
            <h5 class="text_encabezado">Pautas de Alarma</h5>
            <p class="text_p">La aplicación de cualquier vacuna es un proceso seguro, pero existen algunos efectos que pueden aparecer luego de su colocación.</p>
            <div class="cont_sintomas">
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_01.png" alt="">
                    <p>Dolor, picazón, sensibilidad, enrojecimiento o hinchazón en el lugar de aplicación</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_02.png" alt="">
                    <p>Fiebre</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_03.png" alt="">
                    <p>Dolor de cabeza</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_04.png" alt="">
                    <p>Cansancio</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_05.png" alt="">
                    <p>Escalofríos</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_06.png" alt="">
                    <p>Pérdida del apetito</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_07.png" alt="">
                    <p>Dolor muscular</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_08.png" alt="">
                    <p>Dolor en las articulaciones</p>
                </div>
                <div class="cont_sintoma">
                    <img src="img/iconos_sintomas_09.png" alt="">
                    <p>Sudoración</p>
                </div>
            </div>
        </section>
        <section class="sec_vacunas">
            <h3 class="text_vacunas">Tipos De vacuna</h3>

            <?php

            // Haciendo la conexión a la base de datos y pidiendo las canciones
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE id_producto >= 16 and dirigido_para='Recién nacidos'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');

            $vacuna = mysqli_fetch_array($resultInvent);
            echo ('<h4>  ' . $vacuna['dirigido_para'] . '</h4>');
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('</div>');
            }

            echo ('</div> ');
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE id_producto >= 16 and dirigido_para='Lactantes'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');
            $vacuna = mysqli_fetch_array($resultInvent);
            echo ('<h4>  ' . $vacuna['dirigido_para'] . '</h4>');
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('</div>');
            }
            echo ('</div> ');

            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE dirigido_para='3 Meses'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');
            $vacuna = mysqli_fetch_array($resultInvent);
            echo ('<h4> ' . $vacuna['dirigido_para'] . '</h4>');
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('</div>');
            }
            echo ('</div> ');

            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE id_producto >= 16 and dirigido_para='4 Meses'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');
            $vacuna = mysqli_fetch_array($resultInvent);
            echo ('<h4>  ' . $vacuna['dirigido_para'] . '</h4>');
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('</div>');
            }

            echo ('</div> ');

            ?>

        </section>
        <section class="sec_info">
            <h3>Informacion sobre las vacunas</h3>

            <?php

            // Haciendo la conexión a la base de datos y pidiendo las canciones
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE id_producto >= 16 and dirigido_para='Recién nacidos'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');

            $vacuna = mysqli_fetch_array($resultInvent);
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('<p class="vacuna-name"> Efectividad en dias: ' . $vacuna['efectividad_en_dias'] . '</p>');
                echo ('</div>');
            }

            echo ('</div> ');
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE id_producto >= 16 and dirigido_para='Lactantes'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');
            $vacuna = mysqli_fetch_array($resultInvent);
            echo ('<h4>  ' . $vacuna['dirigido_para'] . '</h4>');
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('<p class="vacuna-name"> Efectividad en dias: ' . $vacuna['efectividad_en_dias'] . '</p>');
                echo ('</div>');
            }
            echo ('</div> ');

            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE dirigido_para='3 Meses'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');
            $vacuna = mysqli_fetch_array($resultInvent);
            echo ('<h4> ' . $vacuna['dirigido_para'] . '</h4>');
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('<p class="vacuna-name"> Efectividad en dias: ' . $vacuna['efectividad_en_dias'] . '</p>');
                echo ('</div>');
            }
            echo ('</div> ');

            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM inventario WHERE id_producto >= 16 and dirigido_para='4 Meses'";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');
            $vacuna = mysqli_fetch_array($resultInvent);
            echo ('<h4>  ' . $vacuna['dirigido_para'] . '</h4>');
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<p class="vacuna-name"> Nombre: ' . $vacuna['nombre'] . '</p>');
                echo ('<p class="vacuna-name"> Efectividad en dias: ' . $vacuna['efectividad_en_dias'] . '</p>');
                echo ('</div>');
            }

            echo ('</div> ');
            ?>

        </section>
        <section class="sec_img">
            <h3>Ubicaciones de los vacunatorios.</h3>
            <img src="vacunatorio.png" alt="Ubicaciones de vacunatorios">

        </section>
        <section class="sec_horarios">
            <h3>Horarios de Vacunacion.</h3>

            <?php
            // Haciendo la conexión a la base de datos y pidiendo las canciones
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM clinica ";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');

            $vacuna = mysqli_fetch_array($resultInvent);
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<h4 class="vacuna-name"> Clinica: ' . $vacuna['nombre'] . '</h4>');
                echo ('<p class="vacuna-name"> Direccion: ' . $vacuna['direccion'] . '</p>');
                echo ('<p class="vacuna-name"> Telefono: ' . $vacuna['telefono'] . '</p>');
                echo ('<p class="vacuna-name"> Horario de Atencion: ' . $vacuna['horario_atencion'] . '</p>');
                echo ('</div>');
            }
            echo ('</div> ');
            ?>

        </section>
        <section class="covid"></section>
        <section class="sub_footer">


            <div class="cont_telefonos">
                <div class="cont_telefono">
                    <h4>ATENCIÓN TELEFÓNICA 24HS.
                        GOBIERNO EN LÍNEA</h4>
                    <h2>148</h2>
                </div>
                <div class="cont_telefono">
                    <h3>
                        CORONAVIRUS
                        COVID-19</h3>
                </div>
                <div class="cont_telefono">
                    <h3>
                        MINISTERIO
                        DE SALUD</h3>
                </div>
            </div>
            <div class="cont_img">
                <img src="img/imagen_footer2.png" alt="">
            </div>
        </section>
    </main>
    <footer>
        <div class="back"></div>
    </footer>
    <script src="index.js"></script>
</body>

</html>