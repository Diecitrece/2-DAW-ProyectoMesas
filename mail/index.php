<?php
//Este archvio se carga de recoger los datos para enviarlos al correo de confirmacion junto con la factura
require_once "../templates/controllers/verificarUser.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $factura=$_POST["factura"];
   
    $email=$_SESSION['email'];
    $nombre=$_SESSION['nombre'];
    require_once "vendor/autoload.php";

    $mail = new PHPMailer(true);

    //Habilitar la depuración de SMTP.
    $mail->SMTPDebug = 3;                               
    //Configurar PHPMailer para usar SMTP.
    $mail->isSMTP();            
    //Configurar el nombre de host SMTP                          
    $mail->Host = "smtp.gmail.com";
    //Pon esto en true si el host SMTP requiere autenticación para enviar el correo electrónico
    $mail->SMTPAuth = true;                          
    //Proporciona el nombre de usuario y la contraseña     
    $mail->Username = "reservarmesas@gmail.com";                 
    $mail->Password = "Clase123";                           
    //Si el SMTP requiere una encriptación TLS, entonces configúralo
    $mail->SMTPSecure = "tls";                           
    //Configurar el puerto TCP para conectarse a
    $mail->Port = 587;   
    $mail->CharSet = "UTF-8";                                

    $mail->From = "reservarmesas@gmail.com";
    $mail->FromName = "Reservar Mesas";

    $mail->addAddress($email, $nombre);

    $mail->isHTML(true);

    $mail->Subject = "Reserva confirmada";
    $mail->Body = "<i>Muchas gracias $nombre .Su reserva se ha realizado con éxito. Le esperamos en el restaurante. </i><br>
    
    <div id='todo' style='width:100%'>".$factura."</div>";
    $mail->AltBody = "Muchas gracias por confiar en nosotros";

    try {
        $mail->send();
        echo "El mensaje ha sido enviado correctamente";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}