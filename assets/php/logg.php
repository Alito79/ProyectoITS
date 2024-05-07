<?php
// Iniciar la sesión
session_start();

// Que es session_start?

// La función session_start() en PHP se utiliza para iniciar una nueva sesión o reanudar la sesión actual, 
// según el caso. Una sesión en PHP permite almacenar datos de manera persistente a lo largo de múltiples 
// páginas vistas o solicitudes del usuario.

// Cuando se llama a session_start(), PHP verifica si ya existe una sesión iniciada para el usuario actual.
// Si la sesión ya está iniciada, reanuda la sesión existente y carga los datos almacenados previamente en la 
// sesión en el array superglobal $_SESSION. Si no existe una sesión previa, PHP crea una nueva sesión y asigna 
// un identificador único de sesión al usuario. Este identificador se utiliza para asociar los datos de la sesión 
// con el usuario que los ha iniciado.

// La función session_start() debe llamarse al principio de cada script PHP donde se desee iniciar o 
// reanudar una sesión. Por lo general, se coloca al comienzo del archivo PHP antes de cualquier salida 
// al navegador, como etiquetas HTML, espacios en blanco o incluso comentarios, ya que cualquier salida 
// antes de session_start() puede provocar errores relacionados con las sesiones en PHP.

// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia esto al nombre de tu servidor MySQL
$username = "root"; // Cambia esto al nombre de usuario de tu base de datos MySQL
$password = ""; // Cambia esto a la contraseña de tu base de datos MySQL
$database = "proyecto"; // Cambia esto al nombre de tu base de datos MySQL

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el formulario de inicio de sesión se ha enviado
if(isset($_POST['login'])) {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['email'] = $email;
        header('Location: ../pages/inicio.html'); // Redirigir al usuario a la página de inicio
        exit;
    } else {
        // Credenciales incorrectas, mostrar un mensaje de error
        $error_message = "Correo electrónico o contraseña incorrectos. Por favor, inténtalo de nuevo.";
    }
}

// Verificar si el formulario de registro se ha enviado
if(isset($_POST['registro'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para insertar un nuevo usuario en la base de datos
    $sql = "INSERT INTO user (name, email, password) VALUES ('$nombre', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirigir al usuario a la página de inicio de sesión
        header('Location: login.php'); // Redirigir al usuario a la página de inicio de sesión
        exit;
    } else {
        // Error al registrar el usuario, mostrar un mensaje de error
        $error_message = "Error al registrar el usuario: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
