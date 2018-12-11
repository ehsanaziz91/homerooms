<?php
 require 'php-mailer-master/PHPMailerAutoload.php';
include('../../Connections/connection.php');



  if(isset($_POST['send']))
  {
    $email=$_POST['email'];
    $userid = $_REQUEST['userid'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
      echo "<script type='text/javascript'>alert('Please enter your valid email.')</script>";
      }
      else
       {


         $mail = new PHPMailer;

         //$mail->SMTPDebug = 2;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'homeroomsmeritdemerit@gmail.com';                 // SMTP username
        $mail->Password = '123456Abc';                           // SMTP password
        $mail->SMTPSecure = false;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('homeroomsmeritdemerit@gmail.com', 'HomeroomsMeritDemeritlOfficial');     // Add a recipient
        $mail->addAddress($email);               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');


        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Amaran Kepada Pelajar';
        $mail->Body    = 'PERAKUAN TINGKAH LAKU DAN DISIPLIN MURID<br/>
                          Saya dengan ini diarahkan untuk memaklumkan bahawa anak / jagaan Tuan / Puan bahawa telah mengumpul pungutan mata demerit disiplin sekolah pada tahap tertinggi berturut- turut mengikut <Strong>Buku Peraturan Sistem Demerit Sekolah</strong>.<br/>
                          Sila maklumi pihak sekolah atau berhubung terus Guru Besar dengan kadar segera untuk berbincang.<br/>
                          Mengikut Peraturan Sekolah anak Tuan / Puan boleh <strong>dikenakan tindakan gantung / buang sekolah</strong> jika masih meneruskan perbuatan yang menyebabkan penambahan mata demerit.<br/>
                          Sekian untuk makluman. Terima Kasih.<br/>
                          <strong>BERKHIDMAT UNTUK NEGARA<strong>';


        $mail->AltBody = 'PERAKUAN TINGKAH LAKU DAN DISIPLIN MURID<br/>
                          Saya dengan ini diarahkan untuk memaklumkan bahawa anak / jagaan Tuan / Puan bahawa telah mengumpul pungutan mata demerit disiplin sekolah pada tahap tertinggi berturut- turut mengikut <Strong>Buku Peraturan Sistem Demerit Sekolah</strong>.<br/>
                          Sila maklumi pihak sekolah atau berhubung terus Guru Besar dengan kadar segera untuk berbincang.<br/>
                          Mengikut Peraturan Sekolah anak Tuan / Puan boleh <strong>dikenakan tindakan gantung / buang sekolah</strong> jika masih meneruskan perbuatan yang menyebabkan penambahan mata demerit.<br/>
                          Sekian untuk makluman. Terima Kasih.<br/>
                          <strong>BERKHIDMAT UNTUK NEGARA<strong>';

        if(!$mail->send()) {

            /*echo "<script type='text/javascript'>alert('Message could not be sent.')</script>";*/
            echo "<script type=\"text/javascript\">";
            echo "alert('Message could not be sent !'),location.href='../admin_studListPage.php?userid=$userid'";
            echo "</script>";
            echo "<script type='text/javascript'>alert('Mailer Error: ' . $mail->ErrorInfo)</script>";
        } else {
          /*echo "<script type='text/javascript'>alert('Message has been sent')</script>";*/
            echo "<script type=\"text/javascript\">";
            echo "alert('Message has been sent !'),location.href='../admin_studListPage.php?userid=$userid'";
            echo "</script>";
        }

      }

  }
?>
