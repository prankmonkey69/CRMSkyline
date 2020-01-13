<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class crm{

public function sendEmail()
{
    session_start();
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jericonacrio107@gmail.com';
            $mail->Password = 'Jerico005';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('jericonacrio107@gmail.com');
            $mail->addAddress($email);
            $mail->addReplyTo('jericonacrio107@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
           
            $_SESSION['status'] = 'ok';
            $_SESSION['result'] = 'Message has been sent';
        } catch (Exception $e) {
            $_SESSION['result'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            $_SESSION['status'] = 'error';
        }

        header("location: index.php");

    }
    public function Redirect($url){
        header("Location: $url");
        exit;
    }

    public function GetSelfScript(){
        return htmlentities($_SERVER['PHP_SELF']);
    }
}

?>