<?php
    require_once ('env.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';

   
    setRecipients($emails, $nome, $email_envio, $senha_envio, $email_remetente, $nome_remetente, $email_reply, $subject, $template_path);
    

    function config($email_envio, $senha_envio, $email_remetente, $nome_remetente, $email_reply, $subject, $template_path){

        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
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
        $mail->Subject = $subject;

        //$mail->addAttachment('assets/arq.pdf');

        $mail->isHTML(true);
        $mail->msgHTML(file_get_contents($template_path), __DIR__);
        $mail->AltBody = 'Mensagem Semana de Informática';

        return $mail;
    }

    function setRecipients($emails, $nome, $email_envio, $senha_envio, $email_remetente, $nome_remetente, $email_reply, $subject, $template_path){
        for($i=0; $i< count($emails); $i+=30){
            $mail = config($email_envio, $senha_envio, $email_remetente, $nome_remetente, $email_reply, $subject, $template_path);
            $bloco = array_slice($emails, $i, 30);
            foreach ($bloco as $email) {
                $mail->addBCC($email, $nome);
            }
            sendMail($mail);
        }
    }

    function sendMail($mail){
        if (!$mail->send()) {
            //echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo "Enviado!";
        }
    }

?>
