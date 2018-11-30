<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HMD PassReset</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="resetPass.php">
              <h1>New Password</h1>
              <p>In the fields below, enter your new password :</p>
              <p>New Password</p>
              <div>
                <input type="password" class="form-control" name="newpass" required/>
              </div>
              <p>Confirm Password</p>
              <div>
                <input type="password" class="form-control" name="confrmpass" required/>
              </div>
              <div>
                  <?php 
                    include('../Connections/connection.php');

                    $userid = $_GET['staffid']; 

                    $stmt = $conn->prepare("SELECT * FROM staff WHERE staffID = ?");
                    $stmt->bind_param("s", $userid);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                  ?>
                <button type="submit" class="btn btn-default submit" name="submit">Reset Password</button>
                <input type="hidden" name="userid" value="<?php echo $userid;?>">
                <!--<a class="btn btn-default submit" href="resetPassPage.php">Reset Password</a>-->
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-university" aria-hidden="true"></i> Homeroom Merit Demerit</h1>
                  <p>©2018 All Rights Reserved. Homeroom Merit Demerit is a CopyRight template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
