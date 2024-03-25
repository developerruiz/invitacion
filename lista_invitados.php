<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Lista de Invitados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establecer la conexión con la base de datos
                // Configuración de la conexión a la base de datos
                // Configuración de la conexión a la base de datos
                $servername = "localhost"; // Cambiar si es necesario
                $username = ""; // Cambiar al nombre de usuario de la base de datos
                $password = ""; // Cambiar a la contraseña de la base de datos
                $database = "lista_invitado"; // Cambiar al nombre de la base de datos

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consultar los datos de la tabla invitados
                $sql = "SELECT * FROM invitados";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    $counter = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $counter . "</td>";
                        echo "<td>" . $row["nombre_completo"] . "</td>";
                        echo "</tr>";
                        $counter++;
                    }
                } else {
                    echo "<tr><td colspan='2'>No hay invitados</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>