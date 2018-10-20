<?php
    //include('login.html');
    //session_start();
    //mysqli_close($conn);
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HMD Add Student</title>

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
            <form method="">
              <h1>Add New Student</h1>
              <div>
                <input type="text" class="form-control" placeholder="Student ID" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Full Name" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Contac No" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Parent Name" required="" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Address" required="" />
              </div>
                <select class="form-control">
                  <option>--- Homerooms Name ---</option>
                  <option value="0"></option>
                  <option value="1"></option>
                  <option value="2"></option>
                  <option value="3"></option>
                  <option value="4"></option>
                </select>
                <br>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <select class="form-control">
                  <option>--- Security Question ---</option>
                  <option value="0">What was the name of your first pet?</option>
                  <option value="1">What was the first thing you learned to cook?</option>
                  <option value="2">What was the first film you saw in the cinema?</option>
                  <option value="3">Where did you go the first time you flew on an airplane?</option>
                  <option value="4">In what city did your parents meet?</option>
                </select>
                <br>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Security Question Answer" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Add Student</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
