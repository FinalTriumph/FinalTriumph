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
            
            require 'vendor/autoload.php';
            
            $readyMessage = str_replace("\n", '<br />', $message);
            
            $request_body = json_decode('{
                    "personalizations": [{
                            "to": [{
                                "email": "final_triumph@outlook.com"
                            }],
                            "subject": "FT Mail"
                        }],
                        "from": {
                            "email": "no-reply@finaltriumph.eu"
                        },
                        "content": [{
                            "type": "text/html",
                            "value": "<p1>Name: <strong>'.$name.'</strong><br />Email: <strong>'.$email.'</strong></p1><br /><p1>Subject: <strong>'.$subject.'</strong></p1><hr /><p1>Message:<br />'.$readyMessage.'</p1>"
                        }]
            }');
                
            $apiKey = getenv('SENDGRID_API_KEY');
            $sg = new \SendGrid($apiKey);
                
            $response = $sg->client->mail()->send()->post($request_body);
            
            if ($response->statusCode() == 202) {
                echo 'Success';
            } else {
                echo "Error: Something went wrong, message wasn't sent. Status code: ".$response->statusCode();
            }

            /*
            Cloud9 with PHPMailer
            require_once("./classes/MailPass.php");
            
            require_once('./classes/PHPMailer/PHPMailerAutoload.php');
            
            $mail = new PHPMailer();
            
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '587';
            $mail->isHTML();
            $mail->Username = 'finaltriumph.es@gmail.com';
            
            $password = MailPass::password();
            
            $mail->Password = $password;
            $mail->SetFrom('no-reply@finaltriumph.eu');
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
            }*/
        }
        
        session_destroy();
    }
}

?>