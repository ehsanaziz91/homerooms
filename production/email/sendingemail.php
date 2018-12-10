<?php
 require 'php-mailer-master/PHPMailerAutoload.php';

  if(isset($_POST['send']))
  {
    $email=$_POST['email'];

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

        $mail->Subject = 'Amaran Pelajar';
        $mail->Body    = 'Your parcel has arrived at the post office.<br/>
                          The parcel will sent to your hostel within <strong>2 days</strong>.<br/>
                          You can take your parcel with the given <strong>QR code</strong> as shown the link below this email.<br/>
                          <p style="color:red;">Note:Please take your parcel within 2 weeks.After 2 weeks, the parcel will send back to the main post office Melaka.</p> ';


        $mail->AltBody = 'Your parcel has arrived at the post office.<br/>
                          The parcel will sent to your hostel within <strong>2 days</strong>.<br/>
                          You can take your parcel with the given <strong>QR code</strong> as shown the link below this email.<br/>
                          <p style="color:red;">Note:Please take your parcel within 2 weeks.After 2 weeks, the parcel will send back to the main post office Melaka.</p>';

        if(!$mail->send()) {

            echo "<script type='text/javascript'>alert('Message could not be sent.')</script>";
            echo "<script type='text/javascript'>alert('Mailer Error: ' . $mail->ErrorInfo)</script>";
        } else {
          echo "<script type='text/javascript'>alert('Message has been sent')</script>";
            /*echo "<script type=\"text/javascript\">";
            echo "alert('Deleted data successfully'),location.href='admin_studListPage.php?userid=$userid'";
            echo "</script>";*/
        }

      }

  }
?>
