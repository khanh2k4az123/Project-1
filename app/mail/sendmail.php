<?php
    include "PHPMailer/src/PHPMailer.php";
    include "PHPMailer/src/Exception.php";
    include "PHPMailer/src/POP3.php";
    include "PHPMailer/src/SMTP.php";
    include "PHPMailer/src/DSNConfigurator.php";
    include "PHPMailer/src/OAuthTokenProvider.php";
    
    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mailer{
        public function DatHangEmail($TieuDe,$NoiDung,$MailDatHang){
            $mail = new PHPMailer(true);  
            $mail->CharSet = ('utf8');
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Show trạng thái gửi email( thành công hay lỗi)
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com;';  // chỉ định thg gmail 
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'khakha5087@gmail.com';                 // SMTP username
                $mail->Password = 'kgyx ugkz ygrk hrbk';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('khakha5087@gmail.com', 'Mailer');
                $mail->addAddress($MailDatHang, 'kkk');     // Add a recipient
                $mail->addAddress('xuxa0710@gmail.com', 'xa');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('khakha5087@gmail.com');// gửi về lại cho chính mình
                //$mail->addBCC('bcc@example.com');
                
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $TieuDe;
                $mail->Body    = $NoiDung;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Tin nhắn gửi thành công';
            } catch (Exception $e) {
                echo 'Tin nhắn không thể gửi được.Lỗi ', $mail->ErrorInfo;
            }
        }
    }
?>