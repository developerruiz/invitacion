<?php

// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambiar si es necesario
$username = ""; // Cambiar al nombre de usuario de la base de datos
$password = ""; // Cambiar a la contraseña de la base de datos
$database = "lista_invitado"; // Cambiar al nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombres_completos = $_POST["fullName"];

    // Preparar la consulta SQL para insertar los datos en la tabla
    $stmt = $conn->prepare("INSERT INTO invitados (nombre_completo) VALUES (?)");
    $stmt->bind_param("s", $nombre_completo);

    // Iterar sobre los nombres completos y ejecutar la consulta para cada uno
    foreach ($nombres_completos as $nombre_completo) {
        if ($stmt->execute()) {
            echo "Datos insertados correctamente para $nombre_completo <br>";
        } else {
            echo "Error al insertar datos para $nombre_completo: " . $conn->error . "<br>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <audio id="audioPlayer">
        <source src="music.wav" type="audio/mp3">
        <!-- Tu navegador no soporta el elemento de audio. -->
    </audio>

    <button id="playPauseButton" class="btn btn-primary floating-button border-gold bg-btn">Pausar</button>

    <div class="welcome-screen">
        <div class="content">
            <h2 class="display-1">Bienvenido</h2>
            <img id="openInvitation" src="img/sello_1.png" alt="" width="150px">
        </div>
    </div>


    <!-- Sección 1: Banner principal -->
    <div id="banner" class="banner">
        <div class="container position-relative">
            <div class="col-12">
                <img src="img/rg-cerezo-frame.png" alt="" class="position-absolute top-50 start-50 translate-middle">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <h1 class="display-6 text-white">Alisson Yue <br> Vázquez Castro</h1>
                </div>

            </div>
        </div>
        <div class="position-absolute bottom-0 start-50 translate-middle-x">

            <h4 class="text-center">
                Mis XV
            </h4>

            <div class="card">
                <div class="card-body text-center bg-pl">
                    <h3>25|05|24</h3>
                </div>
            </div>
            <br>
        </div>
    </div>


    <section class="bg-flores">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="fs-2 text-center">Hoy guardo en mis brazos la estrella divina que fue mi niñez.
                        Y hoy, mi adolescencia con alas de ángel se eleva hacia el cielo por primera vez.
                        Por eso quiero compartir con mis padres y contigo mis Quince Años.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </section>


    <section class="padrinos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center my-5">
                    <img src="img/rg-cerezo-flores-top-left.png" alt="" style="width: 200px; margin-top: -100px;">


                    <p class="text-pink fs-2">Con la bendición de Dios y el amor de mis padres:</p>
                    <br>
                    <h3 class="color-gray fs-3">Candelaria Sánchez</h3>
                    <br>

                    <p class="text-pink display-2 fw-bold">&</p>
                    <br>

                    <h3 class="text-gray fs-3">Ángel Vidal</h3>
                    <br>

                    <img src="img/rg-cerezo-flores-1.png" alt="">
                    <br>

                    <p class="text-pink fs-3">Mis padrinos de Velación</p>
                    <br>

                    <h3 class="text-gray fs-3">Leticia Castillo</h3>
                    <br>

                    <h3 class="text-gray fs-3">Julio César Alcocer</h3>


                    <br><br><br><br><br>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-lg-10 card card-blur position-absolute top-50 start-50 translate-middle">
                        <div class="card-body text-center my-5">

                            <img src="img/rg-cerezo-flores-top-left.png" alt="" class="position-absolute top-0 start-0" style="width: 150px; margin-left: -50px;">
                            <img src="img/rg-cerezo-flores-bottom-right.png" alt="" class="position-absolute bottom-0 end-0" style="width: 150px; margin-right: -50px;">

                            <h4 class="text-pink">17 de diciembre de 2021</h4>
                            <img src="img/rg-cerezo-flores-1.png" alt="">
                            <h4 class="text-white my-4">Sólo faltan:</h4>

                            <div id="countdown" class="d-flex justify-content-center my-4">

                                <div>
                                    <div class="display-5 text-white mx-5" id="days"></div>
                                    <p class="fs-4 text-white">Días</p>
                                </div>
                                <div>
                                    <div class="display-5 text-white mx-5" id="hours"></div>
                                    <p class="fs-4 text-white">Horas</p>
                                </div>
                                <div>
                                    <div class="display-5 text-white mx-5" id="minutes"></div>
                                    <p class="fs-4 text-white">Minutos</p>
                                </div>
                                <div>
                                    <div class="display-5 text-white mx-5" id="seconds"></div>
                                    <p class="fs-4 text-white">Segundos</p>
                                </div>


                            </div>
                            <div>
                                <a href="#asiste">
                                    <button class="btn btn-lg bg-pl">¡Asistire!</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="bg-lugar" style="padding: 150px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap">
                    <div class="col-lg-6 p-4">
                        <h2 class="text-center text-pink">Ceremonia</h2>
                        <br>
                        <div class="card overflow-hidden h-100">
                            <div class="card-img img-ceremonia">
                                <!-- <img src="img/ana-paola-templo.jpg" alt="" style="width: 100%;"> -->
                            </div>
                            <div class="card-body text-center">
                                <h3 class="text-pink">
                                    Santuario Diocesano Mariano de Nuestra Señora del Carmen
                                </h3>
                                <p class="fs-5 text-gray">Calle 31 s/n, Centro, 24100 Cd del Carmen, Camp.</p>

                                <span class="fs-3 text-pink">5:30 pm</span>
                                <br>
                                <button class="bg-pl btn btn-lg text-white my-3">CÓMO LLEGAR</button>
                            </div>

                            <img src="img/rg-cerezo-flores-bottom-right.png" alt="" class="position-absolute bottom-0 end-0" style="width: 180px; margin-right: -30px; margin-bottom: -50px;">
                        </div>
                    </div>
                    <div class="col-lg-6 p-4">
                        <h2 class="text-center text-pink">Recepción</h2>
                        <br>

                        <div class="card overflow-hidden h-100">
                            <div class="card-img img-ceremonia">
                                <!-- <img src="img/rg-xv-foto-rosa-10.jpg" alt="" style="width: 100%;"> -->
                            </div>
                            <div class="card-body text-center">
                                <h3 class="text-pink">
                                    Santuario Diocesano Mariano de Nuestra Señora del Carmen
                                </h3>
                                <p class="fs-5 text-gray">Calle 31 s/n, Centro, 24100 Cd del Carmen, Camp.</p>

                                <span class="fs-3 text-pink">5:30 pm</span>
                                <br>
                                <button class="bg-pl btn btn-lg text-white my-3">CÓMO LLEGAR</button>
                            </div>
                            <img src="img/rg-cerezo-flores-bottom-right.png" alt="" class="position-absolute bottom-0 end-0" style="width: 180px; margin-right: -30px; margin-bottom: -50px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </section>


    <section id="asiste">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="d-flex justify-content-center py-5">
                        <div class="formulario p-5 col-10">
                            <div class="">
                                <h2 class="display-4 text-pink text-center">Confirma tu asistencia</h2>
                                <form id="attendance-form">
                                    <div class="mb-3">
                                        <label for="fullName" class="form-label text-gray">Nombre completo</label>
                                        <input id="inputform" type="text" class="form-control" id="fullName" name="fullName[]" required placeholder="Nombre completo">
                                    </div>
                                    <div>

                                        <button type="button" class="btn btn-pink add-field text-white">+ Agregar otro
                                            invitado</button>
                                    </div>
                                    <div class="mt-3">
                                        <h3 class="text-gray">Comentarios y Felicitaciones</h3>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg btn-pink mt-5">CONFIRMAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </section>

    <section class="bg-fotos">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h2 class="text-center text-pink">Damas</h2>

                    <div class="d-flex justify-content-evenly flex-wrap">

                        <div class="text-center col-6 my-4">
                            <img src="img/jazmin-y-mario-dama-sonia-r.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>
                        <div class="text-center col-6 my-4">
                            <img src="img/jazmin-y-mario-dama-sonia-r.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>

                        <div class="text-center col-6 my-4">
                            <img src="img/jazmin-y-mario-dama-sonia-r.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>

                        <div class="text-center col-6 my-4">
                            <img src="img/jazmin-y-mario-dama-sonia-r.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>

                        <div class="text-center col-12 my-5">
                            <img src="img/rg-cerezo-flores-1.png" alt="">
                            <br>
                            <h2 class="text-pink">Chambelanes</h2>
                        </div>


                        <div class="text-center col-6 my-4">
                            <img src="img/ana-paola-chambelan-3.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>
                        <div class="text-center col-6 my-4">
                            <img src="img/ana-paola-chambelan-3.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>

                        <div class="text-center col-6 my-4">
                            <img src="img/ana-paola-chambelan-3.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>

                        <div class="text-center col-6 my-4">
                            <img src="img/ana-paola-chambelan-3.png" class="rounded-circle" alt="...">
                            <h2 class="text-pink">Flor Marín</h2>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-img-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="col-lg-10 card card-blur position-absolute top-50 start-50 translate-middle">
                        <div class="card-body text-center my-5">

                            <img src="img/rg-cerezo-flores-top-left.png" alt="" class="position-absolute top-0 start-0" style="width: 150px; margin-left: -50px;">
                            <img src="img/rg-cerezo-flores-bottom-right.png" alt="" class="position-absolute bottom-0 end-0" style="width: 150px; margin-right: -50px;">

                            <h4 class="text-pink">Mesa de Regalos</h4>
                            <img src="img/rg-cerezo-flores-1.png" alt="">
                            <h4 class="text-white my-4">mejor regalo es que compartas ese día conmigo, pero si deseas
                                obsequiarme algo más, aquí tienes algunas opciones:</h4>

                            <div>
                                <img src="img/rg-regalo-rosa.png" alt="" class="my-4">
                                <br>
                                <img src="img/rg-liverpool-rosa.png" alt="">
                                <br>
                                <h4 class="text-white">EVENTO: 50672757</h4>
                            </div>
                            <div>
                                <button class="btn btn-lg bg-pl text-white mt-4">VER REGALOS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="bg-flores" style="height: 300px;">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>

    <div id="banner" class="banner">
        <div class="container position-relative">
            <div class="col-12">
                <img src="img/rg-cerezo-frame.png" alt="" class="position-absolute top-50 start-50 translate-middle">
                <div class="position-absolute top-50 start-50 translate-middle">
                    <h1 class="display-6 text-white">Alisson Yue <br> Vázquez Castro</h1>
                </div>

            </div>
        </div>
        <div class="position-absolute bottom-0 start-50 translate-middle-x">

            <h4 class="text-center">
                Mis XV
            </h4>

            <div class="card">
                <div class="card-body text-center bg-pl">
                    <h3>25|05|24</h3>
                </div>
            </div>
            <br>
        </div>
    </div>


    <footer class="bg-pl">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-evenly align-items-center">

                    <div class="col-lg-4 text-center">
                        <img src="" alt="LOGO">
                    </div>

                    <div class="col-lg-4 text-center">
                        <h6>Invitaciones Digitales</h6>
                    </div>

                    <div class="col-lg-4 d-flex justify-content-center">
                        <div class="list-unstyled d-flex">
                            <a href="">
                                <li class="mx-3 text-white">
                                    <i class="fab fa-facebook-f"></i>
                                </li>
                            </a>

                            <a href="">
                                <li class="mx-3 text-white">
                                    <i class="fab fa-instagram"></i>
                                </li>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¡Éxito!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tu lista de invitados ha sido enviada. ¡Gracias por asistir a mi fiesta de XV!</p>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <a href="#" class="btn btn-primary generate-pdf" data-bs-dismiss="modal">Aceptar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar lista de invitados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea enviar esta lista de invitados?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="confirmButton" type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función para contar tiempo restante hasta una fecha específica (ejemplo: tus XV años)
        function countdown() {
            const targetDate = new Date('2024-06-01'); // Fecha objetivo (ejemplo)
            const now = new Date();
            const difference = targetDate - now;

            const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days;
            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;
        }

        // Actualizar contador cada segundo
        setInterval(countdown, 1000);


        // Agregar nuevo elemento en el formulario
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('add-field')) {
                const container = event.target.parentNode; // Selecciona el contenedor del formulario

                // Crear un div contenedor con las clases de Bootstrap
                const inputContainer = document.createElement('div');
                inputContainer.classList.add('d-flex', 'mb-3');

                // Crear el nuevo input dentro del div contenedor
                const input = document.createElement('input');
                input.type = 'text';
                input.classList.add('form-control');
                input.name = 'fullName[]';
                input.placeholder = "Nombre Completo"
                // Insertar el nuevo input dentro del div contenedor
                inputContainer.appendChild(input);

                // Crear el botón "X" para eliminar el campo
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'X';
                deleteButton.classList.add('delete-button', 'btn', 'btn-danger', 'ms-2');
                deleteButton.onclick = function() {
                    container.removeChild(inputContainer);
                };

                // Insertar el botón "X" después del nuevo campo de entrada
                inputContainer.appendChild(deleteButton);

                // Insertar el div contenedor dentro del formulario
                container.insertBefore(inputContainer, event.target);
            }
        });


        // ---------------------------------

        // cancion y boton de Pausa y Play

        // cancion y boton de Pausa y Play

        let isPlaying = false;
        const audioPlayer = document.getElementById('audioPlayer');

        function togglePlayPause() {
            const button = document.getElementById('playPauseButton');
            if (isPlaying) {
                button.textContent = "Reproducir";
                audioPlayer.pause(); // Pausa la canción
            } else {
                button.textContent = "Pausar";
                audioPlayer.play(); // Reproduce la canción
            }
            isPlaying = !isPlaying; // Invertir el estado de reproducción
        }
        document.getElementById('playPauseButton').addEventListener('click', togglePlayPause);

        // ---------------------------------

        // Prevenir el envío del formulario y enviar datos con AJAX
        document.getElementById('attendance-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado de enviar el formulario

            // Obtener los datos del formulario
            const formData = new FormData(this);

            // Mostrar la ventana emergente
            var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
            confirmModal.show();

            document.getElementById('confirmButton').addEventListener('click', function() {

                confirmModal.hide();

                // Enviar los datos con AJAX
                fetch(window.location.href, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(
                            data
                        ); // Puedes hacer algo con la respuesta del servidor, como mostrar un mensaje de éxito
                        // Mostrar la ventana modal de éxito
                        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                        myModal.show();
                        // Limpiar el formulario después de enviar los datos (mantenerlo como está)
                        // ...
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });


            });
        });

        // -----------------------------------------

        // pantalla de inicio
        // Espera a que el DOM esté completamente cargado
        document.addEventListener("DOMContentLoaded", function() {
            // Obtén el botón "Abrir invitación"
            var openButton = document.getElementById("openInvitation");

            // Agrega un listener para el evento click del botón
            openButton.addEventListener("click", function() {
                // Obtén la pantalla de bienvenida
                var welcomeScreen = document.querySelector(".welcome-screen");
                // Agrega una clase para animar la pantalla hacia arriba
                welcomeScreen.classList.add("slide-up");
                var audio = document.getElementById('audioPlayer');
                audio.play(); // Reproducir audio
                // Espera a que termine la animación
                setTimeout(function() {
                    // Oculta la pantalla de bienvenida
                    welcomeScreen.style.display = "none";
                    // Muestra la página principal
                    document.querySelector(".main-content").style.display = "block";
                }, 1000); // Ajusta el tiempo de espera según la duración de tu animación
            });
        });

        // ---------------------------

        // Enviar los datos para generar PDF
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('generate-pdf')) {
                // Detener la acción predeterminada del enlace
                event.preventDefault();

                // Obtener los datos del formulario
                const formData = new FormData();

                // Obtener todos los campos de nombre completo y agregarlos al FormData
                const fullNames = document.getElementsByName('fullName[]');
                fullNames.forEach(input => {
                    formData.append('fullName[]', input.value);
                });

                // Hacer una solicitud al servidor para generar el PDF
                fetch('generar_pdf.php', {
                        method: 'POST', // Usar el método POST
                        body: formData // Pasar los datos del formulario
                    })
                    .then(response => {
                        // Verificar si la solicitud fue exitosa
                        if (response.ok) {
                            // Devuelve el contenido del PDF como un blob
                            return response.blob();
                        }
                        throw new Error('Error al generar el PDF');
                    })
                    .then(blob => {
                        // Crear una URL para el blob (contenido del PDF)
                        const url = URL.createObjectURL(blob);

                        // Abrir una nueva ventana o pestaña con el PDF
                        window.open(url);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });

        // // Animacion de SLIDE
        // document.addEventListener('DOMContentLoaded', function () {
        //     var images = [
        //         'url("img/imagen1.png")',
        //         'url("img/imagen2.png")',
        //         'url("img/imagen3.png")'
        //         // Agrega más URLs de imágenes según sea necesario
        //     ];

        //     var animation = document.querySelector('.animation');
        //     var imageContainers = document.querySelectorAll('.image');
        //     var currentIndex = 0;
        //     var nextIndex = 1;

        //     function changeImage() {
        //         imageContainers[nextIndex].style.backgroundImage = images[currentIndex];
        //         imageContainers[currentIndex].style.opacity = 0;
        //         imageContainers[nextIndex].style.opacity = 1;

        //         currentIndex = (currentIndex + 1) % images.length;
        //         nextIndex = (nextIndex + 1) % images.length;
        //     }

        //     changeImage();
        //     setInterval(changeImage, 5000); // Cambia cada 5 segundos (5000 ms)
        // });
    </script>

</body>



</html>