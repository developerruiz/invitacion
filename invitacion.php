<?php
require_once('vendor/autoload.php');
require_once('invitacion.php');

// Verifica si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han recibido los nombres completos del formulario
    if (isset($_POST["fullName"]) && !empty($_POST["fullName"])) {
        // Obtiene los nombres completos del formulario
        $nombres_completos = $_POST["fullName"];

        // Inicializa la variable para la lista de invitados
        $lista_invitados = '';

        // Construye la lista de invitados
        foreach ($nombres_completos as $nombre_completo) {
            $lista_invitados .= "<h3>" . utf8_decode($nombre_completo) . "</h3>";
        }

        // Incluye la lista de invitados en la plantilla HTML
        function getPlantilla($lista_invitados) {
            $css = file_get_contents('css/styles.css'); // Lee el contenido del archivo CSS
            $background = "background-image: url('img/bg-invitacion.png');";

            $plantilla = '<body style="font-size: 15px; ' . $background . '">
                <style>' . $css . '</style> <!-- Agrega el CSS aquí -->
                <div style="text-align: center;">
                <br>
                <br>     
                <br>
                <br>
                <br>
                <h3>Mis XV Años</h3>
                <h2>Alisson Yue Vázquez Castro</h2>
                <h6 style="font-weight: bold;"> INVITADOS</h6>
               ' . $lista_invitados . '
                <div>
                    <h4>Mis papás</h4>
                    <p>Lorem ipsum dolor sit.</p>
                    <p>Lorem ipsum dolor sit.</p>
                </div>
                <div style="margin: 10px 0 10px;">
                    <span style="font-size: 20px; font-weight: bold;">Junio</span>
                    <span style="font-size: 39px; font-weight: bold;">|</span>
                    <span style="font-size: 20px; font-weight: bold;">01</span>
                    <span style="font-size: 39px; font-weight: bold;">|</span>
                    <span style="font-size: 20px; font-weight: bold;">2024</span>
                </div>
                <div class="text-center">
                        <h6>IGLESIA Lorem ipsum dolor sit.</h6>
                        <p>
                            <small>direccion: Lorem ipsum dolor sit amet <br>consectetur adipisicing elit. Aspernatur, ex.</small>
                        </p>
                        <time>06:00 PM</time>
                    <br>
                        <h6><strong>SALÓN DE EVENTOS Lorem ipsum dolor.</strong></h6>
                        <p>
                            <small>direccion: Lorem ipsum dolor sit amet <br>consectetur adipisicing elit. Aspernatur, ex.</small>
                        </p>
                        <time>08:30 PM</time>
                 
                </div>
            </div>
                </body>';
            return $plantilla;
        }

        // Genera el PDF
        $mpdf = new \Mpdf\Mpdf();
        $plantilla_html = getPlantilla($lista_invitados);
        $mpdf->WriteHTML($plantilla_html);
        $css = file_get_contents('css/styles.css');
        $mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);

        $mpdf->Output();
    } else {
        // Si no se recibieron los nombres completos, muestra un mensaje de error
        echo "No se recibieron los nombres completos del formulario.";
    }
} else {
    // Si no se recibió una solicitud POST, muestra un mensaje de error
    echo "No se recibió una solicitud POST.";
}
?>
