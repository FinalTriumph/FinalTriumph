<?php 

class Contact extends Controller {
    
    public static function sendMessage() {
        
        session_start();
        
        if (!isset($_POST['nocsrf']) || $_POST['nocsrf'] !== $_SESSION['token']) {
            echo 'Error: Invalid or not existing NOCSRF token';
        } else {
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            
            require_once("./classes/MailPass.php");
            $password = MailPass::password();
            
            require_once('./classes/PHPMailer/PHPMailerAutoload.php');
            
            $mail = new PHPMailer();
            
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->isHTML();
            $mail->Username = 'finaltriumph.es@gmail.com';
            $mail->Password = $password;
            $mail->SetFrom('finaltriumph.es@gmail.com');
            $mail->Subject = 'FT Mail';
            $mail->Body = '<p1>Name: <strong>'.$name.'</strong><br />
                            Email: <strong>'.$email.'</strong></p1><br />
                            <p1>Subject: <strong>'.$subject.'</strong></p1>
                            <hr />
                            <p1>Message:<br />'.$message.'</p1>';
            $mail->AddAddress('final_triumph@outlook.com');
            
            if ($mail->Send()) {
                echo 'Success';
            } else {
                echo "Error: Something went wrong, message wasn't sent";
            }
        }
        
        session_destroy();
    }
}

?>