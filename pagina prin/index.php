<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Vacunatorio</title>
    <link href="https://api.fontshare.com/v2/css?f[]=panchang@700&f[]=gambarino@400&f[]=synonym@400&f[]=amulya@700&f[]=switzer@400&f[]=boska@701&f[]=rosaline@400&f[]=britney@400,700&f[]=satoshi@500&f[]=author@500&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <img id="img_prin" src="https://citymis.co/custom/vicentelopez/public/_css/logo150x550.png" alt="">
        <div class="cont_he">

            <h1>Vacunatorio</h1>
            <ul>
                <a href="#sec_info"  class="ver_info">Información sobre las vacunas </a>
                <a href="#sec_img"  class="ver_img">Ubicaciones de vacunatorios</a>
                <a href="#sec_horarios"  class="ver_horarios">Horarios de Vacunación</a>
            </ul>
            <div class="cont_menu">
                <h3>Menú de usuario</h3>
                <div class="cont_obj">
                </div>

                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        syringe
                    </span>
                    <a href="../turno/form.php">Solicitar turno</a>
                </div>
                <div class="cont_obj">
                    <span class="material-symbols-outlined">
                        edit_note
                    </span>
                    <a href="../modificar turno/modificar.php" id="modificar_turno">Modificar y ver turnos</a>
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
    <main class="main">

        <img id="img_main" src="https://www.vicentelopez.gov.ar/contenido/2023-01-18-961-imagen.jpg" alt="">
        <section class="sec_prin">

            <h2 class="texto_main">Plan Provincial de vacunación</h2>
            <h5 class="text_encabezado">¿Qué es?</h5>
            <p class="text_p">Buenos Aires Vacunate es el <b>Público, Gratuito y Optativo</b> de vacunación contra el coronavirus en la Provincia de Buenos Aires.</p>
            <p class="text_p">Después de 10 meses de comenzar la pandemia, se convirtió en el <b>operativo de vacunación más grande</b> y sin precedentes en la historia bonaerense.</p>
            <p class="text_p">Incluye la distribución, organización y vacunación simultánea en los <b>135 municipios del territorio provincial.</b>

            </p>
            <h5 class="text_encabezado">¿Cómo te vacunas?</h5>
            <p class="text_p"><b>La vacuna es libre y federal para todas y todos los bonaerenses, personas de otras jurisdicciones y extranjeras</b>, a partir de los 6 meses de edad, en todos los vacunatorios Covid de La Provincia de Buenos Aires.</p>
            <p class="text_p">Si quieres registrarte puedes hacerlo desde la Web ingresando en “me quiero registrar” o desde la App Vacunate. Ahí podrás acceder a tus datos y la constancia de las vacunas recibidas.
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
<?php 
function ver_turnos($opcion){
    $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
    $queryInvent = "SELECT id,$opcion FROM `solicitud_turno`";
    $resultInvent = mysqli_query($conexionDatos, $queryInvent);
    $vacuna = mysqli_fetch_array($resultInvent);
    echo ('<div class="cont_lista">');
    if ($opcion == "nombre") {
        echo ('<h4 class="titulo"> NOMBRE</h4>');
    } elseif ($opcion == "dia") {
        echo ('<h4 class="titulo">FECHA DEL TURNO</h4>');
    } elseif ($opcion == "hora") {
        echo ('<h4 class="titulo">HORARIO</h4>');
    }
    elseif ($opcion == "desc") {
        echo ('<h4 class="titulo">DESCRIPCIÓN</h4>');
    }
    while ($vacuna = mysqli_fetch_array($resultInvent)) {
        if ($vacuna['id_producto'] % 2 == 0) {
            if ($opcion == "nombre") {
                echo ('<p class="vacuna-name par">' . $vacuna['nombre'] . '</p>');
            } elseif ($opcion == "efectividad_en_dias") {
                echo ('<p class="vacuna-name par"> ' . $vacuna['efectividad_en_dias'] . '</p>');
            } elseif ($opcion == "dirigido_para") {
                echo ('<p class="vacuna-name par">' . $vacuna['dirigido_para'] . '</p>');
            }
            elseif ($opcion == "stock") {
                echo ('<p class="vacuna-name par">' . $vacuna['stock'] . '</p>');
            }
        }
        else{
            if ($opcion == "nombre") {
                echo ('<p class="vacuna-name">' . $vacuna['nombre'] . '</p>');
            } elseif ($opcion == "efectividad_en_dias") {
                echo ('<p class="vacuna-name"> ' . $vacuna['efectividad_en_dias'] . '</p>');
            } elseif ($opcion == "dirigido_para") {
                echo ('<p class="vacuna-name">' . $vacuna['dirigido_para'] . '</p>');
            }
            elseif ($opcion == "stock") {
                if($vacuna['stock']>=100 ){
                    echo ('<p class="vacuna-name verde ">' . $vacuna['stock'] . '</p>');
                }
                elseif($vacuna['stock']<50 && $vacuna['stock']>10){
                    echo ('<p class="vacuna-name amarillo ">' . $vacuna['stock'] . '</p>');
                }
                elseif($vacuna['stock']<10){
                    echo ('<p class="vacuna-name rojo ">' .$vacuna['stock']. '</p>');
                }
                

            }
        }
    }
    echo ('</div>');

    }
?>
       
        <section class="sec_info" id="sec_info">
            <h3>Información sobre las vacunas</h3>

            <?php
            // Haciendo la conexión a la base de datos y pidiendo las canciones
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM `inventario` WHERE dirigido_para!=''";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);

            echo ('<div class="cont_info">');

            lista("nombre");
            lista("efectividad_en_dias");
            lista("stock");
            lista("dirigido_para");
            echo ('</div>');
            ?>

        </section>
        <section class="sec_img" id="sec_img">
            <h3>Ubicaciones de los vacunatorios</h3>
            <div class="cont_ubi">
            <a href="https://maps.app.goo.gl/eY2YtbVmqzfUKnXC8">
                <div class="direciones_vacu">
                   
                        <img src="https://images.vexels.com/media/users/3/141916/isolated/preview/dcd10d362e49a3c161379047a940ba7d-icono-de-trazo-de-pin-de-ubicacion.png" alt="">
                    <h4>CAPS ILLIA</h4>
                    <P>SAN LORENZO 3522</P>
                    <p>OLIVOS</p>
                </div>
            </a>
            <a href="https://maps.app.goo.gl/D9zY76vHndjXPToHA">
                <div class="direciones_vacu">
                    <img src="https://images.vexels.com/media/users/3/141916/isolated/preview/dcd10d362e49a3c161379047a940ba7d-icono-de-trazo-de-pin-de-ubicacion.png" alt="">
                    <h4>UAP MARCELINO </h4>
                    <P>LAVALLE 1583</P>
                    <p>FLORIDA</p>
                </div>
            </a>
            <a href="https://maps.app.goo.gl/qKi1GbXWtFKKdsap9">
                <div class="direciones_vacu">
                    <img src="https://images.vexels.com/media/users/3/141916/isolated/preview/dcd10d362e49a3c161379047a940ba7d-icono-de-trazo-de-pin-de-ubicacion.png" alt="">
                    <h4>CAPS LLOBERA</h4>
                    <P>ESTADOS UNIDOS 314</P>
                    <p>VILLA MARTELI</p>
                </div>
                </a>
            <a href="https://maps.app.goo.gl/gX8P5M5qnm3BLZDk8">
                <div class="direciones_vacu">
                    <img src="https://images.vexels.com/media/users/3/141916/isolated/preview/dcd10d362e49a3c161379047a940ba7d-icono-de-trazo-de-pin-de-ubicacion.png" alt="">
                    <h4>CENTRO ODONTOLÒGICO PAUL HARRIS</h4>
                    <P>SGTO.CABRAL 2810</P>
                    <p>MUNRO</p>
                </div>
            </a>

            </div>

        </section>
        <section class="sec_horarios" id="sec_horarios">
            <h3>Horarios de Vacunación.</h3>

            <?php
            // Haciendo la conexión a la base de datos y pidiendo las canciones
            $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
            $queryInvent = "SELECT * FROM clinica ";
            $resultInvent = mysqli_query($conexionDatos, $queryInvent);
            echo ('<div class="cont_info">');

            $vacuna = mysqli_fetch_array($resultInvent);
            while ($vacuna = mysqli_fetch_array($resultInvent)) {
                echo ('<div class="articulo">');
                echo ('<h4 class="vacuna-name"> Clínica: ' . $vacuna['nombre'] . '</h4>');
                echo ('<p class="vacuna-name"> Dirección: ' . $vacuna['direccion'] . '</p>');
                echo ('<p class="vacuna-name"> Teléfono: ' . $vacuna['telefono'] . '</p>');
                echo ('<p class="vacuna-name"> Horario de Atención: ' . $vacuna['horario_atencion'] . '</p>');
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

<?php
function lista($opcion){
    $conexionDatos = new mysqli('localhost', 'root', '', 'vacunatorio');
    $queryInvent = "SELECT id_producto,$opcion FROM `inventario` WHERE dirigido_para!=''";
    $resultInvent = mysqli_query($conexionDatos, $queryInvent);
    $vacuna = mysqli_fetch_array($resultInvent);
    echo ('<div class="cont_lista">');
    if ($opcion == "nombre") {
        echo ('<h4 class="titulo"> NOMBRE</h4>');
    } elseif ($opcion == "efectividad_en_dias") {
        echo ('<h4 class="titulo">EFECTO EN DIAS</h4>');
    } elseif ($opcion == "dirigido_para") {
        echo ('<h4 class="titulo">DIRIGIDO PARA</h4>');
    }
    elseif ($opcion == "stock") {
        echo ('<h4 class="titulo">STOCK</h4>');
    }
    while ($vacuna = mysqli_fetch_array($resultInvent)) {
        if ($vacuna['id_producto'] % 2 == 0) {
            if ($opcion == "nombre") {
                echo ('<p class="vacuna-name par">' . $vacuna['nombre'] . '</p>');
            } elseif ($opcion == "efectividad_en_dias") {
                echo ('<p class="vacuna-name par"> ' . $vacuna['efectividad_en_dias'] . '</p>');
            } elseif ($opcion == "dirigido_para") {
                echo ('<p class="vacuna-name par">' . $vacuna['dirigido_para'] . '</p>');
            }
            elseif ($opcion == "stock") {
                echo ('<p class="vacuna-name par">' . $vacuna['stock'] . '</p>');
            }
        }
        else{
            if ($opcion == "nombre") {
                echo ('<p class="vacuna-name">' . $vacuna['nombre'] . '</p>');
            } elseif ($opcion == "efectividad_en_dias") {
                echo ('<p class="vacuna-name"> ' . $vacuna['efectividad_en_dias'] . '</p>');
            } elseif ($opcion == "dirigido_para") {
                echo ('<p class="vacuna-name">' . $vacuna['dirigido_para'] . '</p>');
            }
            elseif ($opcion == "stock") {
                if($vacuna['stock']>=100 ){
                    echo ('<p class="vacuna-name verde ">' . $vacuna['stock'] . '</p>');
                }
                elseif($vacuna['stock']<50 && $vacuna['stock']>10){
                    echo ('<p class="vacuna-name amarillo ">' . $vacuna['stock'] . '</p>');
                }
                elseif($vacuna['stock']<10){
                    echo ('<p class="vacuna-name rojo ">' .$vacuna['stock']. '</p>');
                }
                

            }
        }
    }
    echo ('</div>');
}
?>
