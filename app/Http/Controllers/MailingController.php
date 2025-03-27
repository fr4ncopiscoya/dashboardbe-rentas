<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class MailingController extends Controller{

    public function webSendContactMail(Request $request){
        $fullname = $request['fullname'];
        $email = $request['email'];
        $number = $request['number'];
        $project = $request['project'];
        $message = $request['message'];

        $html_mail = '<html><head><title>Contacto desde la Web | We are Voilã</title></head><body><p><strong>Fullname:</strong> '.$fullname.'</p><p><strong>E-Mail:</strong> '.$email.'</p><p><strong>Phone Number:</strong> '.$number.'</p><p><strong>Project:</strong> '.$project.'</p><p><strong>Message:</strong> <br>'.$message.'</p></body></html>';
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hello@wearevoila.io';
            $mail->Password = 'rpvhjmqzfsbkcvgh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom('hello@wearevoila.io', 'Hello Voilã');
            $mail->addAddress('hello@wearevoila.io', 'Hello Voilã');
            $mail->addCC('harry.arroyo@wearevoila.io', 'Harry Arroyo');
            $mail->addCC('diego.strato@wearevoila.io', 'Diego Strato');
            $mail->addCC('camila.duenas@wearevoila.io', 'Camila Dueñas');
            $mail->addReplyTo('hello@wearevoila.io', 'Hello Voilã');
            $mail->Subject = 'Contacto desde la Web | We are Voilã!';
            $mail->Body = $html_mail;
            $mail->isHTML(true);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->send();

            $results = [
                'error' => 0,
                'message' => 'Mail sent successfully'
            ];
            
            return response()->json($results);
        }catch(Exception $e){
            $results = [
                'error' => -10,
                'message' => $mail->ErrorInfo
            ];
            
            return response()->json($results);
        }
    }
}
