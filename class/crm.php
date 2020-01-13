<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class crm{
    

public function sendEmail()
{
        $email = $_POST['email'];
        $subject = "Complaint";
        $message = "We will verify your complaint. Please wait for the action";
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        try {

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'Skylinehotel2020@gmail.com';
            $mail->Password = 'SkylineHotel2020';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('Skylinehotel2020@gmail.com');
            $mail->addAddress($email);
            $mail->addReplyTo('Skylinehotel2020@gmail.com');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
            echo "
            <div class='alert alert-success'>
            <strong>Successfully Notify!</strong>.
            </div>";
        } catch (Exception $e) {
            echo "
            <div class='alert alert-danger'>
            <strong>Unsuccessfully Notify!</strong>.
            </div>";
        }



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