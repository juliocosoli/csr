<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


// Asegúrese de que la dirección que proporcionaron sea válida antes de intentar usarla
if (array_key_exists('email', $_POST)&& PHPMailer::validateAddress($_POST['email'])) {
    $email = $_POST['email'];
    //$tel = $_POST['tel'];
    $last = $_POST['last'];
    $select = $_POST['select'];
    $body = $_POST['content'];
    //Aplicar alguna validación básica y filtrado al nombre
    if (array_key_exists('first', $_POST)) {
        //Limite la longitud y elimine las etiquetas HTML
        $name = substr(strip_tags($_POST['first']), 0, 255);
        //echo $name;
    } else {
        $name = '';
    }
    
} else {
    $msg .= 'Error: dirección de correo electrónico no válida proporcionada';
    $err = true;
}
if (!$err) {

    //Create an instance; passing `true` enables exceptions

    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'info@wilap.com.ar';                     //SMTP username
        $mail->Password   = 'Nokia790.';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('info@wilap.com.ar', 'WEB CSR');
        $mail->addAddress('juliocosoli@gmail.com', $name);     //Add a recipient
        $mail->addAddress($email);               //Name is optional
        //$mail->addReplyTo('juliocosoli@gmail.com', 'Information');
        //$mail->addCC('juliocosoli@gmail.com');
        //$mail->addBCC('info@wilap.com.ar');

        //Attachments
        //$mail->addAttachment('');         //Add attachments
        //$mail->addAttachment('', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $select;
        $mail->Body    = "Este mensaje fue enviado desde la Web. 
                            <br> Nombre: {$name} 
                            <br> Apellido: {$last}
                            <br> email: <b>{$email} </b>
                            <br> Opción: <b>{$select}</b>
                            
                            <br> mensaje: {$body}";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

       if ($mail->send()){
        //echo 'el mensaje ha sido enviado';
        $message = "El mensaje ha sido enviado";
        echo "<script type='text/javascript'>alert('$message');
        window.location='index.html'
        </script>";
        }
    } catch (Exception $e) {
        echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
    }
}