<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HMDS Sign Up</title>

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
            <form method="post" action="registration.php">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" name="staffid" placeholder="Staff ID" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="fullName" placeholder="Full Name" required="" />
              </div>
              <div>
                <input type="text" class="form-control" name="phoneNo" placeholder="Phone No +6019..." required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                  <select class="form-control" name="position">
                      <option>--- Position ---</option>
                      <option value="01">Admin</option>
                      <option value="02">Homeroom Teacher</option>
                      <!--<option value="03">Student</option>-->
                  </select>
                  <br>
              </div>
              <div>
                <input type="password" class="form-control" name="pass" placeholder="Password" required="" />
              </div>
              <div>
                <select class="form-control" name="question">
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
                <input type="text" class="form-control" name="answer" placeholder="Security Question Answer" required="" />
              </div>
              <div>
                <!--<a class="btn btn-default submit" name="submit">Submit</a>-->
                <button class="btn btn-default submit" name="submit">Submit</button>
              </div>
            </form>
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="loginPage.php" class="to_register"> Log In </a>
                </p>
<!--                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-university" aria-hidden="true"></i> Homeroom Merit Demerit</h1>
                  <p>©2018 All Rights Reserved. Homeroom Merit Demerit is a CopyRight template. Privacy and Terms</p>
                </div>-->
              </div>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
