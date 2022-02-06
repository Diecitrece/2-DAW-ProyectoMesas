<?php
session_start();
//Este es el php que manda el correo de contacto para que nuestros clientes puedan comunicarse con nosotros
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email
        $mail_to = "reservarmesas@gmail.com";
        
        # Sender Data
        $subject = trim($_POST["subject"]);
        $phone = trim($_POST["phone"]);
        $name = $_SESSION['nombre'];
        $email = $_SESSION['email'];
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($subject) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "<script>";
            echo "window.location.replace('contacto.php');";
            echo "alert('Por favor, rellene el formulario correctamente');";
            echo "</script>";
            exit;
        }
        
        # Mail Content
        $content = "Nombre: $name\n";
        $content = "Tema de la consulta: $subject\n";
        $content = "Telefono: $phone\n";
        $content .= "Email: $email\n\n";
        $content .= "Mensaje:\n$message\n";

        # email headers.
        $headers = "From: $name <$email>";

        # Send the email.
        $success = mail($mail_to,$content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "<script>";
            echo "window.location.replace('../contacto.php');";
            echo "alert('Mensaje enviado con exito');";
            echo "</script>";
            
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<script>";
            echo "window.location.replace('../contacto.php');";
            echo "alert('Mensaje no enviado');";
            echo "</script>";
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Pruebe otra vez.";
    }

?>
 <script>
     function correcto(){
        alert("Mensaje enviado con exito");
        window.location.replace('../contacto.php');
    }   
 </script>