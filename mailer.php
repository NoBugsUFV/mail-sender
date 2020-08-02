<?php
    require_once ('env.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;


    $mail->SMTPAuth = true;
    $mail->Username = $email_envio;
    $mail->Password = $senha_envio;

    $mail->setFrom($email_remetente,$nome_remetente);
    $mail->addReplyTo($email_reply);
    $mail->addAddress($email, $nome);
    $mail->Subject = 'NL de Julho, meu bom! Toda nova!';
    $mail->isHTML(true);
    $mail->msgHTML(file_get_contents('./templates/julho/julho.html'), __DIR__);
    $mail->AltBody = 'Mensagem alternativa';

    //$mail->addAttachment('assets/arq.pdf');

    if (!$mail->send()) {
        //echo 'Mailer Error: '. $mail->ErrorInfo;
    } else {
        echo "Enviado!";
    }

?>
