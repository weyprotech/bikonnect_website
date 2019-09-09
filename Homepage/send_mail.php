<?php
    require_once("./PHPMailer-5.2.9/PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.sendgrid.net';
    $mail->SMTPAuth = true;
    $mail->Username = "azure_9131e480018e796d9d0b46988542082b@azure.com";
    $mail->Password = "test#12ab";    
    $mail->Port = 587;
    $mail->setFrom('azure_9131e480018e796d9d0b46988542082b@azure.com','test');
    $mail->AddAddress('joe08088@gmail.com', 'test');
    $mail->IsHTML(true);
    $mail->Subject = 'bikonnect_mail';
    $content = '姓名:'.$_POST['name'].'信箱:'.$_POST['email'].'連絡電話:'.$_POST['phone'].'內容'.$_POST['message'];
    $mail->Body = $content;

    if($mail->Send()){
        return true;
    }else{
        echo $mail->ErrorInfo;
    }
?>