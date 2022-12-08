<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($nombre, $email, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
        
    }

    public function enviarConfirmacion() {

        // Crear el objeto de email
        $mail = new PHPMailer();

            //Configurar SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '605d9bd134f5e0';
        $mail->Password = 'a3acc73963f3ec';

        $mail->SMTPSecure = 'tls';
        $mail->Port = '2525';

            // Configurar el contenido del mail
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon, solo debes 
        confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token=". $this->token ."'>
        Confirmar Cuenta</a></p>";
        $contenido .= 'Si tu no solicitaste esta cuenta puedes ignorar el mensaje';
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->AltBody = 'Esto es texto alternativo sin HTML';

         // Enviar el email
        $mail->send();
        
    }

    public function enviarInstrucciones() {

        // Crear el objeto de email
        $mail = new PHPMailer();

            //Configurar SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '605d9bd134f5e0';
        $mail->Password = 'a3acc73963f3ec';

        $mail->SMTPSecure = 'tls';
        $mail->Port = '2525';

            // Configurar el contenido del mail
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Restablece tu password';

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> has solicitado restablecer tu password, 
        sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=". $this->token ."'>
        Reestablecer password</a></p>";
        $contenido .= 'Si tu no solicitaste esta cuenta puedes ignorar el mensaje';
        $contenido .= "</html>";

        $mail->Body = $contenido;
        $mail->AltBody = 'Esto es texto alternativo sin HTML';

         // Enviar el email
        $mail->send();

    }

}

