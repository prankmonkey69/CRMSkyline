<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class mailctrl{
    

protected function sendEmail($email,$name){
    
    require 'vendor/autoload.php';
    $subject = 'Complaint';
    $message = "<h1> SkyLine Hotel </h1>
                <br>
                <br>
                <p>Hi ! <b>".$name."</b> </p> <p>This is SkyLine Hotel Customer Service, 
                <br> Thank you for Contacting us! 
                We will verify your complaint as soon as possible. 
                <br>
                <br>
                <br>
                Thank you for your patience. God Bless~</p>";

    $mail = new PHPMailer(true);
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
    return $mail;

}
protected function sendNewsletter($email,$title,$description,$filename){
    
    require 'vendor/autoload.php';
    $subject = $title;
    
    $message = '<img src=\"cid:filename\" ><br>'.$description.'
    <br>
    <br>
    To more news visit us on 
     <a href="localhost/CRM-Skyline/">Skyline.com</a> ';
    $mail = new PHPMailer(true);
    
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

    $mail->AddEmbeddedImage(dirname(__FILE__). 'Storage/CRM/5de53fa88558c1.53100793.jpg','filename');
    $mail->send();
    return $mail;

}

    
    
}
