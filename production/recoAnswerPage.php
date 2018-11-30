<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HMDS RecoAnswer</title>

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
            <form method="post" action="recoAnswer.php">
              <?php 
                include('../Connections/connection.php');
                
                $userid = $_GET['staffid']; 
                
                $stmt = $conn->prepare("SELECT staffID, recoQuestion FROM staff WHERE staffID = ?");
                $stmt->bind_param("s", $userid);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
                $question = $row["recoQuestion"]; 
              ?>
              <h1>Password Recovery</h1>
              <p>Please answer the security question below :</p>
                <p><?php $question;
                        if($question == 0)
                        {
                            echo "What was the name of your first pet?";
                        }
                        else if ($question == 1)
                        {
                             echo "What was the first thing you learned to cook?";
                        }
                        else if ($question == 2)
                        {
                             echo "What was the first film you saw in the cinema?";
                        }
                        else if ($question == 3)
                        {
                             echo "Where did you go the first time you flew on an airplane?";
                        }
                        else if ($question == 4)
                        {
                             echo "In what city did your parents meet?";
                        }
                    ?></p>
              <div>
                <input type="text" class="form-control" name="answer" required/>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="submit">Reset My Password</button>
                <input type="hidden" name="userid" value="<?php echo $userid;?>">
<!--               <a type="submit" class="btn btn-default" href="recoAnswer.php?staffid=">Reset My Password</a>-->
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
