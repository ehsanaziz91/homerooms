<?php
include('../Connections/connection.php');
session_start();

if (isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
}else
{
    header ('location:../production/loginPage.php');
}


?>

<?php
                                        include('../Connections/connection.php');

                                        if (isset($_GET['studid']))
                                        {
                                            $stmt = $conn->prepare("SELECT * FROM student WHERE studentID = ?");
                                            $stmt->bind_param('s', $studid);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $row = $result->fetch_assoc();

                                            /*$name = $row['staffName'];*/
                                        }
              ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta http-equiv="REFRESH" content="10; url=http://localhost/homerooms/production/teacher_studListPage.php"> <!--loading page in every 10 second-->

    <title>HMDS Student List</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-university"></i> <span>HMD System</span></a>
            </div>

            <div class="clearfix"></div>
<?php
                                        include('../Connections/connection.php');

                                        if (isset($_GET['userid']))
                                        {
                                            $stmt = $conn->prepare("SELECT * FROM staff WHERE staffID = ?");
                                            $stmt->bind_param('s', $userid);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $row = $result->fetch_assoc();

                                            $name = $row['staffName'];
                                        }
              ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.JPG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Teacher</span>
                 <h2><?php echo $name;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

 <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-home"></i>Dashboard</a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Users</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-users"></i>Teacher<span class="fa fa-chevron-down"></span></a>
                       <ul class="nav child_menu">
                      <li><a href="#">Merit & Demerit</a></li>
                      <li><a href="#">Demerit Stage</a></li>
                      <li><a href="#">Merit & Demerit Schedule</a></li>

                      </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Report</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-edit"></i>Demerit Record</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $name;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                     <li><a href="teacher_profilePage.php?userid=<?php echo $userid; ?>"> Profile</a></li>
                    <li><a href="recoveryPage.php?userid=<?php echo $userid; ?>"> Change Password</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-24">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Report </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >

                    <div class="col-md-6 col-sm-6 col-xs-12 profile_left"><!--ubah kedudukan graf-->

                      <h3>Student's Profile</h3>
                <div class="x_panel">
                    <div class="panel-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <tr>
                                        <?php
                                        include('../Connections/connection.php');

                                        if (isset($_GET['studid']))
                                        {
                                            $stmt = $conn->prepare("SELECT * FROM student WHERE studentID = ?");
                                            $stmt->bind_param('s', $studid);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $row = $result->fetch_assoc();

                                           /* while*/

                                            $studid = $row['studentID'];
                                            $studname = $row['studName'];
                                            $studAddr = $row['studAddress'];
                                            $studno = $row['studContcNo'];
                                            $parent = $row['parentName'];
                                            $hr = $row['hrName'];
                                            $question = $row['recoQuestion'];
                                            $answer = $row['recoAnswer'];

                                            echo $studid;

                                        }

                                        ?>
                                        <td>Student ID</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $studid;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Full Name</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $studname;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $studAddr;?>
                                        </td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Contact No</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $studno;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Homeroom</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $hr;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Recovery Question</td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>:</td>
                                        <td><?php
                                                $question;
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
                                            ?>
                                        </td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Recovery Answer</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>:</td>
                                        <td><?php echo $answer;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Update Profile
                                        </button>
                                        <!--<button type="submit" class="btn btn-primary" name="update">Update Profile</button>-->
                                        <button type="submit" class="btn btn-default" name="del">Delete Account</button>
                                    </tr>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Update Profile</h4>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="profile.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student ID</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="userid" class="form-control col-md-7 col-xs-12" value="<?php echo $studid;?>" readonly>
                                </div>
                              </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="staffName" class="form-control col-md-7 col-xs-12" value="<?php echo $studname;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="position" class="form-control col-md-7 col-xs-12" value="<?php echo $studAddr;?>" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contac No.</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="phoneNo" class="form-control col-md-7 col-xs-12" value="<?php echo $studno;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Homeroom</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $hr;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Recovery Question</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <select name="recoQuestion" class="form-control">
                                    <option value="<?php echo $question;?>">
                                    <?php
                                        $question;
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
                                    ?>
                                    </option>
                                    <option value="0">What was the name of your first pet?</option>
                                    <option value="1">What was the first thing you learned to cook?</option>
                                    <option value="2">What was the first film you saw in the cinema?</option>
                                    <option value="3">Where did you go the first time you flew on an airplane?</option>
                                    <option value="4">In what city did your parents meet?</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Recovery Answer</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="recoAnswer" class="form-control col-md-7 col-xs-12" value="<?php echo $answer;?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="update" id="update">Update Profile</button>
                                <!--<input type="submit" class="btn btn-primary" name="update" id="update"  value="Update">-->
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>



                    </div>
                      <div style="width:left; height:280px;">
                    <div class="col-md-9 col-sm-6 col-xs-12" style="width:50%; height:280px;">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">

                        </div>
                      </div>
                      <?php
                      $decm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
                        $resultdecm1 = $conn->query($decm1);
                        $sumdecm1 = 0;
                        $sumdecd1 = 0;
                        if($resultdecm1 == true){
                        while($rdecm1 = $resultdecm1->fetch_assoc()) {
                        $sumdecm1 = $sumdecm1+$rdecm1['meritPoint'];
                        $sumdecd1 = $sumdecd1+$rdecm1['demeritPoint'];
                      }
                    }

                    $decm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
                      $resultdecm2 = $conn->query($decm2);
                      $sumdecm2 = 0;
                      $sumdecd2 = 0;
                      if($resultdecm2 == true){
                      while($rdecm2 = $resultdecm2->fetch_assoc()) {
                      $sumdecm2 = $sumdecm2+$rdecm2['meritPoint'];
                      $sumdecd2 = $sumdecd2+$rdecm2['demeritPoint'];
                    }
                  }

                  $decm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
                    $resultdecm3 = $conn->query($decm3);
                    $sumdecm3 = 0;
                    $sumdecd3 = 0;
                    if($resultdecm3 == true){
                    while($rdecm3 = $resultdecm3->fetch_assoc()) {
                    $sumdecm3 = $sumdecm3+$rdecm3['meritPoint'];
                    $sumdecd3 = $sumdecd3+$rdecm3['demeritPoint'];
                  }}

                  $decm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
                    $resultdecm4 = $conn->query($decm4);
                    $sumdecm4 = 0;
                    $sumdecd4 = 0;
                    if($resultdecm4 == true){
                    while($rdecm4 = $resultdecm4->fetch_assoc()) {
                    $sumdecm4 = $sumdecm4+$rdecm4['meritPoint'];
                    $sumdecd4 = $sumdecd4+$rdecm4['demeritPoint'];
                  }}

                  $decm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
                    $resultdecm5 = $conn->query($decm5);
                    $sumdecm5 = 0;
                    $sumdecd5 = 0;
                    if($resultdecm5 == true){
                    while($rdecm5 = $resultdecm5->fetch_assoc()) {
                    $sumdecm5 = $sumdecm5+$rdecm5['meritPoint'];
                    $sumdecd5 = $sumdecd5+$rdecm5['demeritPoint'];
                  }}

                  $decm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
                    $resultdecm6 = $conn->query($decm6);
                    $sumdecm6 = 0;
                    $sumdecd6 = 0;
                    if($resultdecm2 == true){
                    while($rdecm6 = $resultdecm6->fetch_assoc()) {
                    $sumdecm6 = $sumdecm6+$rdecm6['meritPoint'];
                    $sumdecd6 = $sumdecd6+$rdecm6['demeritPoint'];
                  }}

                  $decm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
                    $resultdecm7 = $conn->query($decm7);
                    $sumdecm7 = 0;
                    $sumdecd7 = 0;
                    if($resultdecm7 == true){
                    while($rdecm7 = $resultdecm7->fetch_assoc()) {
                    $sumdecm7 = $sumdecm7+$rdecm7['meritPoint'];
                    $sumdecd7 = $sumdecd7+$rdecm7['demeritPoint'];
                  }}

                  $decm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
                    $resultdecm8 = $conn->query($decm8);
                    $sumdecm8 = 0;
                    $sumdecd8 = 0;
                    if($resultdecm8 == true){
                    while($rdecm8 = $resultdecm8->fetch_assoc()) {
                    $sumdecm8 = $sumdecm8+$rdecm8['meritPoint'];
                    $sumdecd8 = $sumdecd8+$rdecm8['demeritPoint'];
                  }}

                  $decm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
                    $resultdecm9 = $conn->query($decm9);
                    $sumdecm9 = 0;
                    $sumdecd9 = 0;
                    if($resultdecm9 == true){
                    while($rdecm9 = $resultdecm9->fetch_assoc()) {
                    $sumdecm9 = $sumdecm9+$rdecm9['meritPoint'];
                    $sumdecd9 = $sumdecd9+$rdecm9['demeritPoint'];
                  }}

                  $decm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
                    $resultdecm10 = $conn->query($decm10);
                    $sumdecm10 = 0;
                    $sumdecd10 = 0;
                    if($resultdecm10 == true){
                    while($rdecm10 = $resultdecm10->fetch_assoc()) {
                    $sumdecm10 = $sumdecm10+$rdecm10['meritPoint'];
                    $sumdecd10 = $sumdecd10+$rdecm10['demeritPoint'];
                  }}

                  $decm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
                    $resultdecm11 = $conn->query($decm11);
                    $sumdecm11 = 0;
                    $sumdecd11 = 0;
                    if($resultdecm11 == true){
                    while($rdecm11 = $resultdecm11->fetch_assoc()) {
                    $sumdecm11 = $sumdecm11+$rdecm11['meritPoint'];
                    $sumdecd11 = $sumdecd11+$rdecm11['demeritPoint'];
                  }}

                  $decm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
                    $resultdecm12 = $conn->query($decm12);
                    $sumdecm12 = 0;
                    $sumdecd12 = 0;
                    if($resultdecm12 == true){
                    while($rdecm12 = $resultdecm12->fetch_assoc()) {
                    $sumdecm12 = $sumdecm12+$rdecm12['meritPoint'];
                    $sumdecd12 = $sumdecd12+$rdecm12['demeritPoint'];
                  }}

                  $decm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
                    $resultdecm13 = $conn->query($decm10);
                    $sumdecm13 = 0;
                    $sumdecd13 = 0;
                    if($resultdecm13 == true){
                    while($rdecm13 = $resultdecm13->fetch_assoc()) {
                    $sumdecm13 = $sumdecm13+$rdecm13['meritPoint'];
                    $sumdecd13 = $sumdecd13+$rdecm13['demeritPoint'];
                  }}

                  $decm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
                    $resultdecm14 = $conn->query($decm14);
                    $sumdecm14 = 0;
                    $sumdecd14 = 0;
                    if($resultdecm14 == true){
                    while($rdecm14 = $resultdecm14->fetch_assoc()) {
                    $sumdecm14 = $sumdecm14+$rdecm14['meritPoint'];
                    $sumdecd14 = $sumdecd14+$rdecm14['demeritPoint'];
                  }}

                  $decm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
                    $resultdecm15 = $conn->query($decm15);
                    $sumdecm15 = 0;
                    $sumdecd15 = 0;
                    if($resultdecm15 == true){
                    while($rdecm15 = $resultdecm15->fetch_assoc()) {
                    $sumdecm15 = $sumdecm15+$rdecm15['meritPoint'];
                    $sumdecd15 = $sumdecd15+$rdecm15['demeritPoint'];
                  }}

                  $decm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
                    $resultdecm16 = $conn->query($decm16);
                    $sumdecm16 = 0;
                    $sumdecd16 = 0;
                    if($resultdecm16 == true){
                    while($rdecm16 = $resultdecm16->fetch_assoc()) {
                    $sumdecm16 = $sumdecm16+$rdecm16['meritPoint'];
                    $sumdecd16 = $sumdecd16+$rdecm16['demeritPoint'];
                  }}

                  $decm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
                    $resultdecm17 = $conn->query($decm17);
                    $sumdecm17 = 0;
                    $sumdecd17 = 0;
                    if($resultdecm17 == true){
                    while($rdecm17 = $resultdecm17->fetch_assoc()) {
                    $sumdecm17 = $sumdecm17+$rdecm17['meritPoint'];
                    $sumdecd17 = $sumdecd17+$rdecm17['demeritPoint'];
                  }}


                  $novm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
                    $resultnovm1 = $conn->query($novm1);
                    $sumnovm1 = 0;
                    $sumnovd1 = 0;
                    if($resultnovm1 == true){
                    while($rnovm1 = $resultnovm1->fetch_assoc()) {
                    $sumnovm1 = $sumnovm1+$rnovm1['meritPoint'];
                    $sumnovd1 = $sumnovd1+$rnovm1['demeritPoint'];
                  }
                }

                $novm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
                  $resultnovm2 = $conn->query($novm2);
                  $sumnovm2 = 0;
                  $sumnovd2 = 0;
                  if($resultnovm2 == true){
                  while($rnovm2 = $resultnovm2->fetch_assoc()) {
                  $sumnovm2 = $sumnovm2+$rnovm2['meritPoint'];
                  $sumnovd2 = $sumnovd2+$rnovm2['demeritPoint'];
                }
              }

              $novm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
                $resultnovm3 = $conn->query($novm3);
                $sumnovm3 = 0;
                $sumnovd3 = 0;
                if($resultnovm3 == true){
                while($rnovm3 = $resultnovm3->fetch_assoc()) {
                $sumnovm3 = $sumnovm3+$rnovm3['meritPoint'];
                $sumnovd3 = $sumnovd3+$rnovm3['demeritPoint'];
              }}

              $novm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
                $resultnovm4 = $conn->query($novm4);
                $sumnovm4 = 0;
                $sumnovd4 = 0;
                if($resultnovm4 == true){
                while($rnovm4 = $resultnovm4->fetch_assoc()) {
                $sumnovm4 = $sumnovm4+$rnovm4['meritPoint'];
                $sumnovd4 = $sumnovd4+$rnovm4['demeritPoint'];
              }}

              $novm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
                $resultnovm5 = $conn->query($novm5);
                $sumnovm5 = 0;
                $sumnovd5 = 0;
                if($resultnovm5 == true){
                while($rnovm5 = $resultnovm5->fetch_assoc()) {
                $sumnovm5 = $sumnovm5+$rnovm5['meritPoint'];
                $sumnovd5 = $sumnovd5+$rnovm5['demeritPoint'];
              }}

              $novm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
                $resultnovm6 = $conn->query($novm6);
                $sumnovm6 = 0;
                $sumnovd6 = 0;
                if($resultnovm2 == true){
                while($rnovm6 = $resultnovm6->fetch_assoc()) {
                $sumnovm6 = $sumnovm6+$rnovm6['meritPoint'];
                $sumnovd6 = $sumnovd6+$rnovm6['demeritPoint'];
              }}

              $novm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
                $resultnovm7 = $conn->query($novm7);
                $sumnovm7 = 0;
                $sumnovd7 = 0;
                if($resultnovm7 == true){
                while($rnovm7 = $resultnovm7->fetch_assoc()) {
                $sumnovm7 = $sumnovm7+$rnovm7['meritPoint'];
                $sumnovd7 = $sumnovd7+$rnovm7['demeritPoint'];
              }}

              $novm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
                $resultnovm8 = $conn->query($novm8);
                $sumnovm8 = 0;
                $sumnovd8 = 0;
                if($resultnovm8 == true){
                while($rnovm8 = $resultnovm8->fetch_assoc()) {
                $sumnovm8 = $sumnovm8+$rnovm8['meritPoint'];
                $sumnovd8 = $sumnovd8+$rnovm8['demeritPoint'];
              }}

              $novm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
                $resultnovm9 = $conn->query($novm9);
                $sumnovm9 = 0;
                $sumnovd9 = 0;
                if($resultnovm9 == true){
                while($rnovm9 = $resultnovm9->fetch_assoc()) {
                $sumnovm9 = $sumnovm9+$rnovm9['meritPoint'];
                $sumnovd9 = $sumnovd9+$rnovm9['demeritPoint'];
              }}

              $novm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
                $resultnovm10 = $conn->query($novm10);
                $sumnovm10 = 0;
                $sumnovd10 = 0;
                if($resultnovm10 == true){
                while($rnovm10 = $resultnovm10->fetch_assoc()) {
                $sumnovm10 = $sumnovm10+$rnovm10['meritPoint'];
                $sumnovd10 = $sumnovd10+$rnovm10['demeritPoint'];
              }}

              $novm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
                $resultnovm11 = $conn->query($novm11);
                $sumnovm11 = 0;
                $sumnovd11 = 0;
                if($resultnovm11 == true){
                while($rnovm11 = $resultnovm11->fetch_assoc()) {
                $sumnovm11 = $sumnovm11+$rnovm11['meritPoint'];
                $sumnovd11 = $sumnovd11+$rnovm11['demeritPoint'];
              }}

              $novm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
                $resultnovm12 = $conn->query($novm12);
                $sumnovm12 = 0;
                $sumnovd12 = 0;
                if($resultnovm12 == true){
                while($rnovm12 = $resultnovm12->fetch_assoc()) {
                $sumnovm12 = $sumnovm12+$rnovm12['meritPoint'];
                $sumnovd12 = $sumnovd12+$rnovm12['demeritPoint'];
              }}

              $novm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
                $resultnovm13 = $conn->query($novm10);
                $sumnovm13 = 0;
                $sumnovd13 = 0;
                if($resultnovm13 == true){
                while($rnovm13 = $resultnovm13->fetch_assoc()) {
                $sumnovm13 = $sumnovm13+$rnovm13['meritPoint'];
                $sumnovd13 = $sumnovd13+$rnovm13['demeritPoint'];
              }}

              $novm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
                $resultnovm14 = $conn->query($novm14);
                $sumnovm14 = 0;
                $sumnovd14 = 0;
                if($resultnovm14 == true){
                while($rnovm14 = $resultnovm14->fetch_assoc()) {
                $sumnovm14 = $sumnovm14+$rnovm14['meritPoint'];
                $sumnovd14 = $sumnovd14+$rnovm14['demeritPoint'];
              }}

              $novm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
                $resultnovm15 = $conn->query($novm15);
                $sumnovm15 = 0;
                $sumnovd15 = 0;
                if($resultnovm15 == true){
                while($rnovm15 = $resultnovm15->fetch_assoc()) {
                $sumnovm15 = $sumnovm15+$rnovm15['meritPoint'];
                $sumnovd15 = $sumnovd15+$rnovm15['demeritPoint'];
              }}

              $novm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
                $resultnovm16 = $conn->query($novm16);
                $sumnovm16 = 0;
                $sumnovd16 = 0;
                if($resultnovm16 == true){
                while($rnovm16 = $resultnovm16->fetch_assoc()) {
                $sumnovm16 = $sumnovm16+$rnovm16['meritPoint'];
                $sumnovd16 = $sumnovd16+$rnovm16['demeritPoint'];
              }}

              $novm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
                $resultnovm17 = $conn->query($novm17);
                $sumnovm17 = 0;
                $sumnovd17 = 0;
                if($resultnovm17 == true){
                while($rnovm17 = $resultnovm17->fetch_assoc()) {
                $sumnovm17 = $sumnovm17+$rnovm17['meritPoint'];
                $sumnovd17 = $sumnovd17+$rnovm17['demeritPoint'];
              }}

              $octm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
                $resultoctm1 = $conn->query($octm1);
                $sumoctm1 = 0;
                $sumoctd1 = 0;
                if($resultoctm1 == true){
                while($roctm1 = $resultoctm1->fetch_assoc()) {
                $sumoctm1 = $sumoctm1+$roctm1['meritPoint'];
                $sumoctd1 = $sumoctd1+$roctm1['demeritPoint'];
              }
            }

            $octm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
              $resultoctm2 = $conn->query($octm2);
              $sumoctm2 = 0;
              $sumoctd2 = 0;
              if($resultoctm2 == true){
              while($roctm2 = $resultoctm2->fetch_assoc()) {
              $sumoctm2 = $sumoctm2+$roctm2['meritPoint'];
              $sumoctd2 = $sumoctd2+$roctm2['demeritPoint'];
            }
          }

          $octm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
            $resultoctm3 = $conn->query($octm3);
            $sumoctm3 = 0;
            $sumoctd3 = 0;
            if($resultoctm3 == true){
            while($roctm3 = $resultoctm3->fetch_assoc()) {
            $sumoctm3 = $sumoctm3+$roctm3['meritPoint'];
            $sumoctd3 = $sumoctd3+$roctm3['demeritPoint'];
          }}

          $octm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
            $resultoctm4 = $conn->query($octm4);
            $sumoctm4 = 0;
            $sumoctd4 = 0;
            if($resultoctm4 == true){
            while($roctm4 = $resultoctm4->fetch_assoc()) {
            $sumoctm4 = $sumoctm4+$roctm4['meritPoint'];
            $sumoctd4 = $sumoctd4+$roctm4['demeritPoint'];
          }}

          $octm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
            $resultoctm5 = $conn->query($octm5);
            $sumoctm5 = 0;
            $sumoctd5 = 0;
            if($resultoctm5 == true){
            while($roctm5 = $resultoctm5->fetch_assoc()) {
            $sumoctm5 = $sumoctm5+$roctm5['meritPoint'];
            $sumoctd5 = $sumoctd5+$roctm5['demeritPoint'];
          }}

          $octm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
            $resultoctm6 = $conn->query($octm6);
            $sumoctm6 = 0;
            $sumoctd6 = 0;
            if($resultoctm2 == true){
            while($roctm6 = $resultoctm6->fetch_assoc()) {
            $sumoctm6 = $sumoctm6+$roctm6['meritPoint'];
            $sumoctd6 = $sumoctd6+$roctm6['demeritPoint'];
          }}

          $octm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
            $resultoctm7 = $conn->query($octm7);
            $sumoctm7 = 0;
            $sumoctd7 = 0;
            if($resultoctm7 == true){
            while($roctm7 = $resultoctm7->fetch_assoc()) {
            $sumoctm7 = $sumoctm7+$roctm7['meritPoint'];
            $sumoctd7 = $sumoctd7+$roctm7['demeritPoint'];
          }}

          $octm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
            $resultoctm8 = $conn->query($octm8);
            $sumoctm8 = 0;
            $sumoctd8 = 0;
            if($resultoctm8 == true){
            while($roctm8 = $resultoctm8->fetch_assoc()) {
            $sumoctm8 = $sumoctm8+$roctm8['meritPoint'];
            $sumoctd8 = $sumoctd8+$roctm8['demeritPoint'];
          }}

          $octm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
            $resultoctm9 = $conn->query($octm9);
            $sumoctm9 = 0;
            $sumoctd9 = 0;
            if($resultoctm9 == true){
            while($roctm9 = $resultoctm9->fetch_assoc()) {
            $sumoctm9 = $sumoctm9+$roctm9['meritPoint'];
            $sumoctd9 = $sumoctd9+$roctm9['demeritPoint'];
          }}

          $octm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
            $resultoctm10 = $conn->query($octm10);
            $sumoctm10 = 0;
            $sumoctd10 = 0;
            if($resultoctm10 == true){
            while($roctm10 = $resultoctm10->fetch_assoc()) {
            $sumoctm10 = $sumoctm10+$roctm10['meritPoint'];
            $sumoctd10 = $sumoctd10+$roctm10['demeritPoint'];
          }}

          $octm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
            $resultoctm11 = $conn->query($octm11);
            $sumoctm11 = 0;
            $sumoctd11 = 0;
            if($resultoctm11 == true){
            while($roctm11 = $resultoctm11->fetch_assoc()) {
            $sumoctm11 = $sumoctm11+$roctm11['meritPoint'];
            $sumoctd11 = $sumoctd11+$roctm11['demeritPoint'];
          }}

          $octm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
            $resultoctm12 = $conn->query($octm12);
            $sumoctm12 = 0;
            $sumoctd12 = 0;
            if($resultoctm12 == true){
            while($roctm12 = $resultoctm12->fetch_assoc()) {
            $sumoctm12 = $sumoctm12+$roctm12['meritPoint'];
            $sumoctd12 = $sumoctd12+$roctm12['demeritPoint'];
          }}

          $octm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
            $resultoctm13 = $conn->query($octm10);
            $sumoctm13 = 0;
            $sumoctd13 = 0;
            if($resultoctm13 == true){
            while($roctm13 = $resultoctm13->fetch_assoc()) {
            $sumoctm13 = $sumoctm13+$roctm13['meritPoint'];
            $sumoctd13 = $sumoctd13+$roctm13['demeritPoint'];
          }}

          $octm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
            $resultoctm14 = $conn->query($octm14);
            $sumoctm14 = 0;
            $sumoctd14 = 0;
            if($resultoctm14 == true){
            while($roctm14 = $resultoctm14->fetch_assoc()) {
            $sumoctm14 = $sumoctm14+$roctm14['meritPoint'];
            $sumoctd14 = $sumoctd14+$roctm14['demeritPoint'];
          }}

          $octm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
            $resultoctm15 = $conn->query($octm15);
            $sumoctm15 = 0;
            $sumoctd15 = 0;
            if($resultoctm15 == true){
            while($roctm15 = $resultoctm15->fetch_assoc()) {
            $sumoctm15 = $sumoctm15+$roctm15['meritPoint'];
            $sumoctd15 = $sumoctd15+$roctm15['demeritPoint'];
          }}

          $octm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
            $resultoctm16 = $conn->query($octm16);
            $sumoctm16 = 0;
            $sumoctd16 = 0;
            if($resultoctm16 == true){
            while($roctm16 = $resultoctm16->fetch_assoc()) {
            $sumoctm16 = $sumoctm16+$roctm16['meritPoint'];
            $sumoctd16 = $sumoctd16+$roctm16['demeritPoint'];
          }}

          $octm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
            $resultoctm17 = $conn->query($octm17);
            $sumoctm17 = 0;
            $sumoctd17 = 0;
            if($resultoctm17 == true){
            while($roctm17 = $resultoctm17->fetch_assoc()) {
            $sumoctm17 = $sumoctm17+$roctm17['meritPoint'];
            $sumoctd17 = $sumoctd17+$roctm17['demeritPoint'];
          }}

          $sepm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
            $resultsepm1 = $conn->query($sepm1);
            $sumsepm1 = 0;
            $sumsepd1 = 0;
            if($resultsepm1 == true){
            while($rsepm1 = $resultsepm1->fetch_assoc()) {
            $sumsepm1 = $sumsepm1+$rsepm1['meritPoint'];
            $sumsepd1 = $sumsepd1+$rsepm1['demeritPoint'];
          }
        }

        $sepm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
          $resultsepm2 = $conn->query($sepm2);
          $sumsepm2 = 0;
          $sumsepd2 = 0;
          if($resultsepm2 == true){
          while($rsepm2 = $resultsepm2->fetch_assoc()) {
          $sumsepm2 = $sumsepm2+$rsepm2['meritPoint'];
          $sumsepd2 = $sumsepd2+$rsepm2['demeritPoint'];
        }
      }

      $sepm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
        $resultsepm3 = $conn->query($sepm3);
        $sumsepm3 = 0;
        $sumsepd3 = 0;
        if($resultsepm3 == true){
        while($rsepm3 = $resultsepm3->fetch_assoc()) {
        $sumsepm3 = $sumsepm3+$rsepm3['meritPoint'];
        $sumsepd3 = $sumsepd3+$rsepm3['demeritPoint'];
      }}

      $sepm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
        $resultsepm4 = $conn->query($sepm4);
        $sumsepm4 = 0;
        $sumsepd4 = 0;
        if($resultsepm4 == true){
        while($rsepm4 = $resultsepm4->fetch_assoc()) {
        $sumsepm4 = $sumsepm4+$rsepm4['meritPoint'];
        $sumsepd4 = $sumsepd4+$rsepm4['demeritPoint'];
      }}

      $sepm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
        $resultsepm5 = $conn->query($sepm5);
        $sumsepm5 = 0;
        $sumsepd5 = 0;
        if($resultsepm5 == true){
        while($rsepm5 = $resultsepm5->fetch_assoc()) {
        $sumsepm5 = $sumsepm5+$rsepm5['meritPoint'];
        $sumsepd5 = $sumsepd5+$rsepm5['demeritPoint'];
      }}

      $sepm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
        $resultsepm6 = $conn->query($sepm6);
        $sumsepm6 = 0;
        $sumsepd6 = 0;
        if($resultsepm2 == true){
        while($rsepm6 = $resultsepm6->fetch_assoc()) {
        $sumsepm6 = $sumsepm6+$rsepm6['meritPoint'];
        $sumsepd6 = $sumsepd6+$rsepm6['demeritPoint'];
      }}

      $sepm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
        $resultsepm7 = $conn->query($sepm7);
        $sumsepm7 = 0;
        $sumsepd7 = 0;
        if($resultsepm7 == true){
        while($rsepm7 = $resultsepm7->fetch_assoc()) {
        $sumsepm7 = $sumsepm7+$rsepm7['meritPoint'];
        $sumsepd7 = $sumsepd7+$rsepm7['demeritPoint'];
      }}

      $sepm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
        $resultsepm8 = $conn->query($sepm8);
        $sumsepm8 = 0;
        $sumsepd8 = 0;
        if($resultsepm8 == true){
        while($rsepm8 = $resultsepm8->fetch_assoc()) {
        $sumsepm8 = $sumsepm8+$rsepm8['meritPoint'];
        $sumsepd8 = $sumsepd8+$rsepm8['demeritPoint'];
      }}

      $sepm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
        $resultsepm9 = $conn->query($sepm9);
        $sumsepm9 = 0;
        $sumsepd9 = 0;
        if($resultsepm9 == true){
        while($rsepm9 = $resultsepm9->fetch_assoc()) {
        $sumsepm9 = $sumsepm9+$rsepm9['meritPoint'];
        $sumsepd9 = $sumsepd9+$rsepm9['demeritPoint'];
      }}

      $sepm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
        $resultsepm10 = $conn->query($sepm10);
        $sumsepm10 = 0;
        $sumsepd10 = 0;
        if($resultsepm10 == true){
        while($rsepm10 = $resultsepm10->fetch_assoc()) {
        $sumsepm10 = $sumsepm10+$rsepm10['meritPoint'];
        $sumsepd10 = $sumsepd10+$rsepm10['demeritPoint'];
      }}

      $sepm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
        $resultsepm11 = $conn->query($sepm11);
        $sumsepm11 = 0;
        $sumsepd11 = 0;
        if($resultsepm11 == true){
        while($rsepm11 = $resultsepm11->fetch_assoc()) {
        $sumsepm11 = $sumsepm11+$rsepm11['meritPoint'];
        $sumsepd11 = $sumsepd11+$rsepm11['demeritPoint'];
      }}

      $sepm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
        $resultsepm12 = $conn->query($sepm12);
        $sumsepm12 = 0;
        $sumsepd12 = 0;
        if($resultsepm12 == true){
        while($rsepm12 = $resultsepm12->fetch_assoc()) {
        $sumsepm12 = $sumsepm12+$rsepm12['meritPoint'];
        $sumsepd12 = $sumsepd12+$rsepm12['demeritPoint'];
      }}

      $sepm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
        $resultsepm13 = $conn->query($sepm10);
        $sumsepm13 = 0;
        $sumsepd13 = 0;
        if($resultsepm13 == true){
        while($rsepm13 = $resultsepm13->fetch_assoc()) {
        $sumsepm13 = $sumsepm13+$rsepm13['meritPoint'];
        $sumsepd13 = $sumsepd13+$rsepm13['demeritPoint'];
      }}

      $sepm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
        $resultsepm14 = $conn->query($sepm14);
        $sumsepm14 = 0;
        $sumsepd14 = 0;
        if($resultsepm14 == true){
        while($rsepm14 = $resultsepm14->fetch_assoc()) {
        $sumsepm14 = $sumsepm14+$rsepm14['meritPoint'];
        $sumsepd14 = $sumsepd14+$rsepm14['demeritPoint'];
      }}

      $sepm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
        $resultsepm15 = $conn->query($sepm15);
        $sumsepm15 = 0;
        $sumsepd15 = 0;
        if($resultsepm15 == true){
        while($rsepm15 = $resultsepm15->fetch_assoc()) {
        $sumsepm15 = $sumsepm15+$rsepm15['meritPoint'];
        $sumsepd15 = $sumsepd15+$rsepm15['demeritPoint'];
      }}

      $sepm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
        $resultsepm16 = $conn->query($sepm16);
        $sumsepm16 = 0;
        $sumsepd16 = 0;
        if($resultsepm16 == true){
        while($rsepm16 = $resultsepm16->fetch_assoc()) {
        $sumsepm16 = $sumsepm16+$rsepm16['meritPoint'];
        $sumsepd16 = $sumsepd16+$rsepm16['demeritPoint'];
      }}

      $sepm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
        $resultsepm17 = $conn->query($sepm17);
        $sumsepm17 = 0;
        $sumsepd17 = 0;
        if($resultsepm17 == true){
        while($rsepm17 = $resultsepm17->fetch_assoc()) {
        $sumsepm17 = $sumsepm17+$rsepm17['meritPoint'];
        $sumsepd17 = $sumsepd17+$rsepm17['demeritPoint'];
      }}

      $Augm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
        $resultAugm1 = $conn->query($Augm1);
        $sumAugm1 = 0;
        $sumAugd1 = 0;
        if($resultAugm1 == true){
        while($rAugm1 = $resultAugm1->fetch_assoc()) {
        $sumAugm1 = $sumAugm1+$rAugm1['meritPoint'];
        $sumAugd1 = $sumAugd1+$rAugm1['demeritPoint'];
      }
    }

    $Augm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
      $resultAugm2 = $conn->query($Augm2);
      $sumAugm2 = 0;
      $sumAugd2 = 0;
      if($resultAugm2 == true){
      while($rAugm2 = $resultAugm2->fetch_assoc()) {
      $sumAugm2 = $sumAugm2+$rAugm2['meritPoint'];
      $sumAugd2 = $sumAugd2+$rAugm2['demeritPoint'];
    }
  }

  $Augm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
    $resultAugm3 = $conn->query($Augm3);
    $sumAugm3 = 0;
    $sumAugd3 = 0;
    if($resultAugm3 == true){
    while($rAugm3 = $resultAugm3->fetch_assoc()) {
    $sumAugm3 = $sumAugm3+$rAugm3['meritPoint'];
    $sumAugd3 = $sumAugd3+$rAugm3['demeritPoint'];
  }}

  $Augm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
    $resultAugm4 = $conn->query($Augm4);
    $sumAugm4 = 0;
    $sumAugd4 = 0;
    if($resultAugm4 == true){
    while($rAugm4 = $resultAugm4->fetch_assoc()) {
    $sumAugm4 = $sumAugm4+$rAugm4['meritPoint'];
    $sumAugd4 = $sumAugd4+$rAugm4['demeritPoint'];
  }}

  $Augm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
    $resultAugm5 = $conn->query($Augm5);
    $sumAugm5 = 0;
    $sumAugd5 = 0;
    if($resultAugm5 == true){
    while($rAugm5 = $resultAugm5->fetch_assoc()) {
    $sumAugm5 = $sumAugm5+$rAugm5['meritPoint'];
    $sumAugd5 = $sumAugd5+$rAugm5['demeritPoint'];
  }}

  $Augm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
    $resultAugm6 = $conn->query($Augm6);
    $sumAugm6 = 0;
    $sumAugd6 = 0;
    if($resultAugm2 == true){
    while($rAugm6 = $resultAugm6->fetch_assoc()) {
    $sumAugm6 = $sumAugm6+$rAugm6['meritPoint'];
    $sumAugd6 = $sumAugd6+$rAugm6['demeritPoint'];
  }}

  $Augm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
    $resultAugm7 = $conn->query($Augm7);
    $sumAugm7 = 0;
    $sumAugd7 = 0;
    if($resultAugm7 == true){
    while($rAugm7 = $resultAugm7->fetch_assoc()) {
    $sumAugm7 = $sumAugm7+$rAugm7['meritPoint'];
    $sumAugd7 = $sumAugd7+$rAugm7['demeritPoint'];
  }}

  $Augm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
    $resultAugm8 = $conn->query($Augm8);
    $sumAugm8 = 0;
    $sumAugd8 = 0;
    if($resultAugm8 == true){
    while($rAugm8 = $resultAugm8->fetch_assoc()) {
    $sumAugm8 = $sumAugm8+$rAugm8['meritPoint'];
    $sumAugd8 = $sumAugd8+$rAugm8['demeritPoint'];
  }}

  $Augm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
    $resultAugm9 = $conn->query($Augm9);
    $sumAugm9 = 0;
    $sumAugd9 = 0;
    if($resultAugm9 == true){
    while($rAugm9 = $resultAugm9->fetch_assoc()) {
    $sumAugm9 = $sumAugm9+$rAugm9['meritPoint'];
    $sumAugd9 = $sumAugd9+$rAugm9['demeritPoint'];
  }}

  $Augm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
    $resultAugm10 = $conn->query($Augm10);
    $sumAugm10 = 0;
    $sumAugd10 = 0;
    if($resultAugm10 == true){
    while($rAugm10 = $resultAugm10->fetch_assoc()) {
    $sumAugm10 = $sumAugm10+$rAugm10['meritPoint'];
    $sumAugd10 = $sumAugd10+$rAugm10['demeritPoint'];
  }}

  $Augm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
    $resultAugm11 = $conn->query($Augm11);
    $sumAugm11 = 0;
    $sumAugd11 = 0;
    if($resultAugm11 == true){
    while($rAugm11 = $resultAugm11->fetch_assoc()) {
    $sumAugm11 = $sumAugm11+$rAugm11['meritPoint'];
    $sumAugd11 = $sumAugd11+$rAugm11['demeritPoint'];
  }}

  $Augm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
    $resultAugm12 = $conn->query($Augm12);
    $sumAugm12 = 0;
    $sumAugd12 = 0;
    if($resultAugm12 == true){
    while($rAugm12 = $resultAugm12->fetch_assoc()) {
    $sumAugm12 = $sumAugm12+$rAugm12['meritPoint'];
    $sumAugd12 = $sumAugd12+$rAugm12['demeritPoint'];
  }}

  $Augm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
    $resultAugm13 = $conn->query($Augm10);
    $sumAugm13 = 0;
    $sumAugd13 = 0;
    if($resultAugm13 == true){
    while($rAugm13 = $resultAugm13->fetch_assoc()) {
    $sumAugm13 = $sumAugm13+$rAugm13['meritPoint'];
    $sumAugd13 = $sumAugd13+$rAugm13['demeritPoint'];
  }}

  $Augm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
    $resultAugm14 = $conn->query($Augm14);
    $sumAugm14 = 0;
    $sumAugd14 = 0;
    if($resultAugm14 == true){
    while($rAugm14 = $resultAugm14->fetch_assoc()) {
    $sumAugm14 = $sumAugm14+$rAugm14['meritPoint'];
    $sumAugd14 = $sumAugd14+$rAugm14['demeritPoint'];
  }}

  $Augm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
    $resultAugm15 = $conn->query($Augm15);
    $sumAugm15 = 0;
    $sumAugd15 = 0;
    if($resultAugm15 == true){
    while($rAugm15 = $resultAugm15->fetch_assoc()) {
    $sumAugm15 = $sumAugm15+$rAugm15['meritPoint'];
    $sumAugd15 = $sumAugd15+$rAugm15['demeritPoint'];
  }}

  $Augm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
    $resultAugm16 = $conn->query($Augm16);
    $sumAugm16 = 0;
    $sumAugd16 = 0;
    if($resultAugm16 == true){
    while($rAugm16 = $resultAugm16->fetch_assoc()) {
    $sumAugm16 = $sumAugm16+$rAugm16['meritPoint'];
    $sumAugd16 = $sumAugd16+$rAugm16['demeritPoint'];
  }}

  $Augm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
    $resultAugm17 = $conn->query($Augm17);
    $sumAugm17 = 0;
    $sumAugd17 = 0;
    if($resultAugm17 == true){
    while($rAugm17 = $resultAugm17->fetch_assoc()) {
    $sumAugm17 = $sumAugm17+$rAugm17['meritPoint'];
    $sumAugd17 = $sumAugd17+$rAugm17['demeritPoint'];
  }}

  $julm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
    $resultjulm1 = $conn->query($julm1);
    $sumjulm1 = 0;
    $sumjuld1 = 0;
    if($resultjulm1 == true){
    while($rjulm1 = $resultjulm1->fetch_assoc()) {
    $sumjulm1 = $sumjulm1+$rjulm1['meritPoint'];
    $sumjuld1 = $sumjuld1+$rjulm1['demeritPoint'];
  }
}

$julm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
  $resultjulm2 = $conn->query($julm2);
  $sumjulm2 = 0;
  $sumjuld2 = 0;
  if($resultjulm2 == true){
  while($rjulm2 = $resultjulm2->fetch_assoc()) {
  $sumjulm2 = $sumjulm2+$rjulm2['meritPoint'];
  $sumjuld2 = $sumjuld2+$rjulm2['demeritPoint'];
}
}

$julm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
$resultjulm3 = $conn->query($julm3);
$sumjulm3 = 0;
$sumjuld3 = 0;
if($resultjulm3 == true){
while($rjulm3 = $resultjulm3->fetch_assoc()) {
$sumjulm3 = $sumjulm3+$rjulm3['meritPoint'];
$sumjuld3 = $sumjuld3+$rjulm3['demeritPoint'];
}}

$julm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
$resultjulm4 = $conn->query($julm4);
$sumjulm4 = 0;
$sumjuld4 = 0;
if($resultjulm4 == true){
while($rjulm4 = $resultjulm4->fetch_assoc()) {
$sumjulm4 = $sumjulm4+$rjulm4['meritPoint'];
$sumjuld4 = $sumjuld4+$rjulm4['demeritPoint'];
}}

$julm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
$resultjulm5 = $conn->query($julm5);
$sumjulm5 = 0;
$sumjuld5 = 0;
if($resultjulm5 == true){
while($rjulm5 = $resultjulm5->fetch_assoc()) {
$sumjulm5 = $sumjulm5+$rjulm5['meritPoint'];
$sumjuld5 = $sumjuld5+$rjulm5['demeritPoint'];
}}

$julm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
$resultjulm6 = $conn->query($julm6);
$sumjulm6 = 0;
$sumjuld6 = 0;
if($resultjulm2 == true){
while($rjulm6 = $resultjulm6->fetch_assoc()) {
$sumjulm6 = $sumjulm6+$rjulm6['meritPoint'];
$sumjuld6 = $sumjuld6+$rjulm6['demeritPoint'];
}}

$julm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
$resultjulm7 = $conn->query($julm7);
$sumjulm7 = 0;
$sumjuld7 = 0;
if($resultjulm7 == true){
while($rjulm7 = $resultjulm7->fetch_assoc()) {
$sumjulm7 = $sumjulm7+$rjulm7['meritPoint'];
$sumjuld7 = $sumjuld7+$rjulm7['demeritPoint'];
}}

$julm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
$resultjulm8 = $conn->query($julm8);
$sumjulm8 = 0;
$sumjuld8 = 0;
if($resultjulm8 == true){
while($rjulm8 = $resultjulm8->fetch_assoc()) {
$sumjulm8 = $sumjulm8+$rjulm8['meritPoint'];
$sumjuld8 = $sumjuld8+$rjulm8['demeritPoint'];
}}

$julm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
$resultjulm9 = $conn->query($julm9);
$sumjulm9 = 0;
$sumjuld9 = 0;
if($resultjulm9 == true){
while($rjulm9 = $resultjulm9->fetch_assoc()) {
$sumjulm9 = $sumjulm9+$rjulm9['meritPoint'];
$sumjuld9 = $sumjuld9+$rjulm9['demeritPoint'];
}}

$julm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
$resultjulm10 = $conn->query($julm10);
$sumjulm10 = 0;
$sumjuld10 = 0;
if($resultjulm10 == true){
while($rjulm10 = $resultjulm10->fetch_assoc()) {
$sumjulm10 = $sumjulm10+$rjulm10['meritPoint'];
$sumjuld10 = $sumjuld10+$rjulm10['demeritPoint'];
}}

$julm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
$resultjulm11 = $conn->query($julm11);
$sumjulm11 = 0;
$sumjuld11 = 0;
if($resultjulm11 == true){
while($rjulm11 = $resultjulm11->fetch_assoc()) {
$sumjulm11 = $sumjulm11+$rjulm11['meritPoint'];
$sumjuld11 = $sumjuld11+$rjulm11['demeritPoint'];
}}

$julm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
$resultjulm12 = $conn->query($julm12);
$sumjulm12 = 0;
$sumjuld12 = 0;
if($resultjulm12 == true){
while($rjulm12 = $resultjulm12->fetch_assoc()) {
$sumjulm12 = $sumjulm12+$rjulm12['meritPoint'];
$sumjuld12 = $sumjuld12+$rjulm12['demeritPoint'];
}}

$julm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
$resultjulm13 = $conn->query($julm10);
$sumjulm13 = 0;
$sumjuld13 = 0;
if($resultjulm13 == true){
while($rjulm13 = $resultjulm13->fetch_assoc()) {
$sumjulm13 = $sumjulm13+$rjulm13['meritPoint'];
$sumjuld13 = $sumjuld13+$rjulm13['demeritPoint'];
}}

$julm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
$resultjulm14 = $conn->query($julm14);
$sumjulm14 = 0;
$sumjuld14 = 0;
if($resultjulm14 == true){
while($rjulm14 = $resultjulm14->fetch_assoc()) {
$sumjulm14 = $sumjulm14+$rjulm14['meritPoint'];
$sumjuld14 = $sumjuld14+$rjulm14['demeritPoint'];
}}

$julm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
$resultjulm15 = $conn->query($julm15);
$sumjulm15 = 0;
$sumjuld15 = 0;
if($resultjulm15 == true){
while($rjulm15 = $resultjulm15->fetch_assoc()) {
$sumjulm15 = $sumjulm15+$rjulm15['meritPoint'];
$sumjuld15 = $sumjuld15+$rjulm15['demeritPoint'];
}}

$julm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
$resultjulm16 = $conn->query($julm16);
$sumjulm16 = 0;
$sumjuld16 = 0;
if($resultjulm16 == true){
while($rjulm16 = $resultjulm16->fetch_assoc()) {
$sumjulm16 = $sumjulm16+$rjulm16['meritPoint'];
$sumjuld16 = $sumjuld16+$rjulm16['demeritPoint'];
}}

$julm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
$resultjulm17 = $conn->query($julm17);
$sumjulm17 = 0;
$sumjuld17 = 0;
if($resultjulm17 == true){
while($rjulm17 = $resultjulm17->fetch_assoc()) {
$sumjulm17 = $sumjulm17+$rjulm17['meritPoint'];
$sumjuld17 = $sumjuld17+$rjulm17['demeritPoint'];
}}

$junm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
  $resultjunm1 = $conn->query($junm1);
  $sumjunm1 = 0;
  $sumjund1 = 0;
  if($resultjunm1 == true){
  while($rjunm1 = $resultjunm1->fetch_assoc()) {
  $sumjunm1 = $sumjunm1+$rjunm1['meritPoint'];
  $sumjund1 = $sumjund1+$rjunm1['demeritPoint'];
}
}

$junm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
$resultjunm2 = $conn->query($junm2);
$sumjunm2 = 0;
$sumjund2 = 0;
if($resultjunm2 == true){
while($rjunm2 = $resultjunm2->fetch_assoc()) {
$sumjunm2 = $sumjunm2+$rjunm2['meritPoint'];
$sumjund2 = $sumjund2+$rjunm2['demeritPoint'];
}
}

$junm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
$resultjunm3 = $conn->query($junm3);
$sumjunm3 = 0;
$sumjund3 = 0;
if($resultjunm3 == true){
while($rjunm3 = $resultjunm3->fetch_assoc()) {
$sumjunm3 = $sumjunm3+$rjunm3['meritPoint'];
$sumjund3 = $sumjund3+$rjunm3['demeritPoint'];
}}

$junm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
$resultjunm4 = $conn->query($junm4);
$sumjunm4 = 0;
$sumjund4 = 0;
if($resultjunm4 == true){
while($rjunm4 = $resultjunm4->fetch_assoc()) {
$sumjunm4 = $sumjunm4+$rjunm4['meritPoint'];
$sumjund4 = $sumjund4+$rjunm4['demeritPoint'];
}}

$junm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
$resultjunm5 = $conn->query($junm5);
$sumjunm5 = 0;
$sumjund5 = 0;
if($resultjunm5 == true){
while($rjunm5 = $resultjunm5->fetch_assoc()) {
$sumjunm5 = $sumjunm5+$rjunm5['meritPoint'];
$sumjund5 = $sumjund5+$rjunm5['demeritPoint'];
}}

$junm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
$resultjunm6 = $conn->query($junm6);
$sumjunm6 = 0;
$sumjund6 = 0;
if($resultjunm2 == true){
while($rjunm6 = $resultjunm6->fetch_assoc()) {
$sumjunm6 = $sumjunm6+$rjunm6['meritPoint'];
$sumjund6 = $sumjund6+$rjunm6['demeritPoint'];
}}

$junm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
$resultjunm7 = $conn->query($junm7);
$sumjunm7 = 0;
$sumjund7 = 0;
if($resultjunm7 == true){
while($rjunm7 = $resultjunm7->fetch_assoc()) {
$sumjunm7 = $sumjunm7+$rjunm7['meritPoint'];
$sumjund7 = $sumjund7+$rjunm7['demeritPoint'];
}}

$junm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
$resultjunm8 = $conn->query($junm8);
$sumjunm8 = 0;
$sumjund8 = 0;
if($resultjunm8 == true){
while($rjunm8 = $resultjunm8->fetch_assoc()) {
$sumjunm8 = $sumjunm8+$rjunm8['meritPoint'];
$sumjund8 = $sumjund8+$rjunm8['demeritPoint'];
}}

$junm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
$resultjunm9 = $conn->query($junm9);
$sumjunm9 = 0;
$sumjund9 = 0;
if($resultjunm9 == true){
while($rjunm9 = $resultjunm9->fetch_assoc()) {
$sumjunm9 = $sumjunm9+$rjunm9['meritPoint'];
$sumjund9 = $sumjund9+$rjunm9['demeritPoint'];
}}

$junm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
$resultjunm10 = $conn->query($junm10);
$sumjunm10 = 0;
$sumjund10 = 0;
if($resultjunm10 == true){
while($rjunm10 = $resultjunm10->fetch_assoc()) {
$sumjunm10 = $sumjunm10+$rjunm10['meritPoint'];
$sumjund10 = $sumjund10+$rjunm10['demeritPoint'];
}}

$junm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
$resultjunm11 = $conn->query($junm11);
$sumjunm11 = 0;
$sumjund11 = 0;
if($resultjunm11 == true){
while($rjunm11 = $resultjunm11->fetch_assoc()) {
$sumjunm11 = $sumjunm11+$rjunm11['meritPoint'];
$sumjund11 = $sumjund11+$rjunm11['demeritPoint'];
}}

$junm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
$resultjunm12 = $conn->query($junm12);
$sumjunm12 = 0;
$sumjund12 = 0;
if($resultjunm12 == true){
while($rjunm12 = $resultjunm12->fetch_assoc()) {
$sumjunm12 = $sumjunm12+$rjunm12['meritPoint'];
$sumjund12 = $sumjund12+$rjunm12['demeritPoint'];
}}

$junm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
$resultjunm13 = $conn->query($junm10);
$sumjunm13 = 0;
$sumjund13 = 0;
if($resultjunm13 == true){
while($rjunm13 = $resultjunm13->fetch_assoc()) {
$sumjunm13 = $sumjunm13+$rjunm13['meritPoint'];
$sumjund13 = $sumjund13+$rjunm13['demeritPoint'];
}}

$junm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
$resultjunm14 = $conn->query($junm14);
$sumjunm14 = 0;
$sumjund14 = 0;
if($resultjunm14 == true){
while($rjunm14 = $resultjunm14->fetch_assoc()) {
$sumjunm14 = $sumjunm14+$rjunm14['meritPoint'];
$sumjund14 = $sumjund14+$rjunm14['demeritPoint'];
}}

$junm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
$resultjunm15 = $conn->query($junm15);
$sumjunm15 = 0;
$sumjund15 = 0;
if($resultjunm15 == true){
while($rjunm15 = $resultjunm15->fetch_assoc()) {
$sumjunm15 = $sumjunm15+$rjunm15['meritPoint'];
$sumjund15 = $sumjund15+$rjunm15['demeritPoint'];
}}

$junm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
$resultjunm16 = $conn->query($junm16);
$sumjunm16 = 0;
$sumjund16 = 0;
if($resultjunm16 == true){
while($rjunm16 = $resultjunm16->fetch_assoc()) {
$sumjunm16 = $sumjunm16+$rjunm16['meritPoint'];
$sumjund16 = $sumjund16+$rjunm16['demeritPoint'];
}}

$junm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
$resultjunm17 = $conn->query($junm17);
$sumjunm17 = 0;
$sumjund17 = 0;
if($resultjunm17 == true){
while($rjunm17 = $resultjunm17->fetch_assoc()) {
$sumjunm17 = $sumjunm17+$rjunm17['meritPoint'];
$sumjund17 = $sumjund17+$rjunm17['demeritPoint'];
}}

$maym1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
  $resultmaym1 = $conn->query($maym1);
  $summaym1 = 0;
  $summayd1 = 0;
  if($resultmaym1 == true){
  while($rmaym1 = $resultmaym1->fetch_assoc()) {
  $summaym1 = $summaym1+$rmaym1['meritPoint'];
  $summayd1 = $summayd1+$rmaym1['demeritPoint'];
}
}

$maym2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
$resultmaym2 = $conn->query($maym2);
$summaym2 = 0;
$summayd2 = 0;
if($resultmaym2 == true){
while($rmaym2 = $resultmaym2->fetch_assoc()) {
$summaym2 = $summaym2+$rmaym2['meritPoint'];
$summayd2 = $summayd2+$rmaym2['demeritPoint'];
}
}

$maym3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
$resultmaym3 = $conn->query($maym3);
$summaym3 = 0;
$summayd3 = 0;
if($resultmaym3 == true){
while($rmaym3 = $resultmaym3->fetch_assoc()) {
$summaym3 = $summaym3+$rmaym3['meritPoint'];
$summayd3 = $summayd3+$rmaym3['demeritPoint'];
}}

$maym4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
$resultmaym4 = $conn->query($maym4);
$summaym4 = 0;
$summayd4 = 0;
if($resultmaym4 == true){
while($rmaym4 = $resultmaym4->fetch_assoc()) {
$summaym4 = $summaym4+$rmaym4['meritPoint'];
$summayd4 = $summayd4+$rmaym4['demeritPoint'];
}}

$maym5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
$resultmaym5 = $conn->query($maym5);
$summaym5 = 0;
$summayd5 = 0;
if($resultmaym5 == true){
while($rmaym5 = $resultmaym5->fetch_assoc()) {
$summaym5 = $summaym5+$rmaym5['meritPoint'];
$summayd5 = $summayd5+$rmaym5['demeritPoint'];
}}

$maym6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
$resultmaym6 = $conn->query($maym6);
$summaym6 = 0;
$summayd6 = 0;
if($resultmaym2 == true){
while($rmaym6 = $resultmaym6->fetch_assoc()) {
$summaym6 = $summaym6+$rmaym6['meritPoint'];
$summayd6 = $summayd6+$rmaym6['demeritPoint'];
}}

$maym7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
$resultmaym7 = $conn->query($maym7);
$summaym7 = 0;
$summayd7 = 0;
if($resultmaym7 == true){
while($rmaym7 = $resultmaym7->fetch_assoc()) {
$summaym7 = $summaym7+$rmaym7['meritPoint'];
$summayd7 = $summayd7+$rmaym7['demeritPoint'];
}}

$maym8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
$resultmaym8 = $conn->query($maym8);
$summaym8 = 0;
$summayd8 = 0;
if($resultmaym8 == true){
while($rmaym8 = $resultmaym8->fetch_assoc()) {
$summaym8 = $summaym8+$rmaym8['meritPoint'];
$summayd8 = $summayd8+$rmaym8['demeritPoint'];
}}

$maym9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
$resultmaym9 = $conn->query($maym9);
$summaym9 = 0;
$summayd9 = 0;
if($resultmaym9 == true){
while($rmaym9 = $resultmaym9->fetch_assoc()) {
$summaym9 = $summaym9+$rmaym9['meritPoint'];
$summayd9 = $summayd9+$rmaym9['demeritPoint'];
}}

$maym10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
$resultmaym10 = $conn->query($maym10);
$summaym10 = 0;
$summayd10 = 0;
if($resultmaym10 == true){
while($rmaym10 = $resultmaym10->fetch_assoc()) {
$summaym10 = $summaym10+$rmaym10['meritPoint'];
$summayd10 = $summayd10+$rmaym10['demeritPoint'];
}}

$maym11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
$resultmaym11 = $conn->query($maym11);
$summaym11 = 0;
$summayd11 = 0;
if($resultmaym11 == true){
while($rmaym11 = $resultmaym11->fetch_assoc()) {
$summaym11 = $summaym11+$rmaym11['meritPoint'];
$summayd11 = $summayd11+$rmaym11['demeritPoint'];
}}

$maym12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
$resultmaym12 = $conn->query($maym12);
$summaym12 = 0;
$summayd12 = 0;
if($resultmaym12 == true){
while($rmaym12 = $resultmaym12->fetch_assoc()) {
$summaym12 = $summaym12+$rmaym12['meritPoint'];
$summayd12 = $summayd12+$rmaym12['demeritPoint'];
}}

$maym13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
$resultmaym13 = $conn->query($maym10);
$summaym13 = 0;
$summayd13 = 0;
if($resultmaym13 == true){
while($rmaym13 = $resultmaym13->fetch_assoc()) {
$summaym13 = $summaym13+$rmaym13['meritPoint'];
$summayd13 = $summayd13+$rmaym13['demeritPoint'];
}}

$maym14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
$resultmaym14 = $conn->query($maym14);
$summaym14 = 0;
$summayd14 = 0;
if($resultmaym14 == true){
while($rmaym14 = $resultmaym14->fetch_assoc()) {
$summaym14 = $summaym14+$rmaym14['meritPoint'];
$summayd14 = $summayd14+$rmaym14['demeritPoint'];
}}

$maym15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
$resultmaym15 = $conn->query($maym15);
$summaym15 = 0;
$summayd15 = 0;
if($resultmaym15 == true){
while($rmaym15 = $resultmaym15->fetch_assoc()) {
$summaym15 = $summaym15+$rmaym15['meritPoint'];
$summayd15 = $summayd15+$rmaym15['demeritPoint'];
}}

$maym16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
$resultmaym16 = $conn->query($maym16);
$summaym16 = 0;
$summayd16 = 0;
if($resultmaym16 == true){
while($rmaym16 = $resultmaym16->fetch_assoc()) {
$summaym16 = $summaym16+$rmaym16['meritPoint'];
$summayd16 = $summayd16+$rmaym16['demeritPoint'];
}}

$maym17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
$resultmaym17 = $conn->query($maym17);
$summaym17 = 0;
$summayd17 = 0;
if($resultmaym17 == true){
while($rmaym17 = $resultmaym17->fetch_assoc()) {
$summaym17 = $summaym17+$rmaym17['meritPoint'];
$summayd17 = $summayd17+$rmaym17['demeritPoint'];
}}

$aplm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
  $resultaplm1 = $conn->query($aplm1);
  $sumaplm1 = 0;
  $sumapld1 = 0;
  if($resultaplm1 == true){
  while($raplm1 = $resultaplm1->fetch_assoc()) {
  $sumaplm1 = $sumaplm1+$raplm1['meritPoint'];
  $sumapld1 = $sumapld1+$raplm1['demeritPoint'];
}
}

$aplm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
$resultaplm2 = $conn->query($aplm2);
$sumaplm2 = 0;
$sumapld2 = 0;
if($resultaplm2 == true){
while($raplm2 = $resultaplm2->fetch_assoc()) {
$sumaplm2 = $sumaplm2+$raplm2['meritPoint'];
$sumapld2 = $sumapld2+$raplm2['demeritPoint'];
}
}

$aplm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
$resultaplm3 = $conn->query($aplm3);
$sumaplm3 = 0;
$sumapld3 = 0;
if($resultaplm3 == true){
while($raplm3 = $resultaplm3->fetch_assoc()) {
$sumaplm3 = $sumaplm3+$raplm3['meritPoint'];
$sumapld3 = $sumapld3+$raplm3['demeritPoint'];
}}

$aplm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
$resultaplm4 = $conn->query($aplm4);
$sumaplm4 = 0;
$sumapld4 = 0;
if($resultaplm4 == true){
while($raplm4 = $resultaplm4->fetch_assoc()) {
$sumaplm4 = $sumaplm4+$raplm4['meritPoint'];
$sumapld4 = $sumapld4+$raplm4['demeritPoint'];
}}

$aplm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
$resultaplm5 = $conn->query($aplm5);
$sumaplm5 = 0;
$sumapld5 = 0;
if($resultaplm5 == true){
while($raplm5 = $resultaplm5->fetch_assoc()) {
$sumaplm5 = $sumaplm5+$raplm5['meritPoint'];
$sumapld5 = $sumapld5+$raplm5['demeritPoint'];
}}

$aplm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
$resultaplm6 = $conn->query($aplm6);
$sumaplm6 = 0;
$sumapld6 = 0;
if($resultaplm2 == true){
while($raplm6 = $resultaplm6->fetch_assoc()) {
$sumaplm6 = $sumaplm6+$raplm6['meritPoint'];
$sumapld6 = $sumapld6+$raplm6['demeritPoint'];
}}

$aplm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
$resultaplm7 = $conn->query($aplm7);
$sumaplm7 = 0;
$sumapld7 = 0;
if($resultaplm7 == true){
while($raplm7 = $resultaplm7->fetch_assoc()) {
$sumaplm7 = $sumaplm7+$raplm7['meritPoint'];
$sumapld7 = $sumapld7+$raplm7['demeritPoint'];
}}

$aplm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
$resultaplm8 = $conn->query($aplm8);
$sumaplm8 = 0;
$sumapld8 = 0;
if($resultaplm8 == true){
while($raplm8 = $resultaplm8->fetch_assoc()) {
$sumaplm8 = $sumaplm8+$raplm8['meritPoint'];
$sumapld8 = $sumapld8+$raplm8['demeritPoint'];
}}

$aplm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
$resultaplm9 = $conn->query($aplm9);
$sumaplm9 = 0;
$sumapld9 = 0;
if($resultaplm9 == true){
while($raplm9 = $resultaplm9->fetch_assoc()) {
$sumaplm9 = $sumaplm9+$raplm9['meritPoint'];
$sumapld9 = $sumapld9+$raplm9['demeritPoint'];
}}

$aplm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
$resultaplm10 = $conn->query($aplm10);
$sumaplm10 = 0;
$sumapld10 = 0;
if($resultaplm10 == true){
while($raplm10 = $resultaplm10->fetch_assoc()) {
$sumaplm10 = $sumaplm10+$raplm10['meritPoint'];
$sumapld10 = $sumapld10+$raplm10['demeritPoint'];
}}

$aplm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
$resultaplm11 = $conn->query($aplm11);
$sumaplm11 = 0;
$sumapld11 = 0;
if($resultaplm11 == true){
while($raplm11 = $resultaplm11->fetch_assoc()) {
$sumaplm11 = $sumaplm11+$raplm11['meritPoint'];
$sumapld11 = $sumapld11+$raplm11['demeritPoint'];
}}

$aplm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
$resultaplm12 = $conn->query($aplm12);
$sumaplm12 = 0;
$sumapld12 = 0;
if($resultaplm12 == true){
while($raplm12 = $resultaplm12->fetch_assoc()) {
$sumaplm12 = $sumaplm12+$raplm12['meritPoint'];
$sumapld12 = $sumapld12+$raplm12['demeritPoint'];
}}

$aplm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
$resultaplm13 = $conn->query($aplm10);
$sumaplm13 = 0;
$sumapld13 = 0;
if($resultaplm13 == true){
while($raplm13 = $resultaplm13->fetch_assoc()) {
$sumaplm13 = $sumaplm13+$raplm13['meritPoint'];
$sumapld13 = $sumapld13+$raplm13['demeritPoint'];
}}

$aplm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
$resultaplm14 = $conn->query($aplm14);
$sumaplm14 = 0;
$sumapld14 = 0;
if($resultaplm14 == true){
while($raplm14 = $resultaplm14->fetch_assoc()) {
$sumaplm14 = $sumaplm14+$raplm14['meritPoint'];
$sumapld14 = $sumapld14+$raplm14['demeritPoint'];
}}

$aplm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
$resultaplm15 = $conn->query($aplm15);
$sumaplm15 = 0;
$sumapld15 = 0;
if($resultaplm15 == true){
while($raplm15 = $resultaplm15->fetch_assoc()) {
$sumaplm15 = $sumaplm15+$raplm15['meritPoint'];
$sumapld15 = $sumapld15+$raplm15['demeritPoint'];
}}

$aplm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
$resultaplm16 = $conn->query($aplm16);
$sumaplm16 = 0;
$sumapld16 = 0;
if($resultaplm16 == true){
while($raplm16 = $resultaplm16->fetch_assoc()) {
$sumaplm16 = $sumaplm16+$raplm16['meritPoint'];
$sumapld16 = $sumapld16+$raplm16['demeritPoint'];
}}

$aplm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
$resultaplm17 = $conn->query($aplm17);
$sumaplm17 = 0;
$sumapld17 = 0;
if($resultaplm17 == true){
while($raplm17 = $resultaplm17->fetch_assoc()) {
$sumaplm17 = $sumaplm17+$raplm17['meritPoint'];
$sumapld17 = $sumapld17+$raplm17['demeritPoint'];
}}

$marm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
  $resultmarm1 = $conn->query($marm1);
  $summarm1 = 0;
  $summard1 = 0;
  if($resultmarm1 == true){
  while($rmarm1 = $resultmarm1->fetch_assoc()) {
  $summarm1 = $summarm1+$rmarm1['meritPoint'];
  $summard1 = $summard1+$rmarm1['demeritPoint'];
}
}

$marm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
$resultmarm2 = $conn->query($marm2);
$summarm2 = 0;
$summard2 = 0;
if($resultmarm2 == true){
while($rmarm2 = $resultmarm2->fetch_assoc()) {
$summarm2 = $summarm2+$rmarm2['meritPoint'];
$summard2 = $summard2+$rmarm2['demeritPoint'];
}
}

$marm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
$resultmarm3 = $conn->query($marm3);
$summarm3 = 0;
$summard3 = 0;
if($resultmarm3 == true){
while($rmarm3 = $resultmarm3->fetch_assoc()) {
$summarm3 = $summarm3+$rmarm3['meritPoint'];
$summard3 = $summard3+$rmarm3['demeritPoint'];
}}

$marm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
$resultmarm4 = $conn->query($marm4);
$summarm4 = 0;
$summard4 = 0;
if($resultmarm4 == true){
while($rmarm4 = $resultmarm4->fetch_assoc()) {
$summarm4 = $summarm4+$rmarm4['meritPoint'];
$summard4 = $summard4+$rmarm4['demeritPoint'];
}}

$marm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
$resultmarm5 = $conn->query($marm5);
$summarm5 = 0;
$summard5 = 0;
if($resultmarm5 == true){
while($rmarm5 = $resultmarm5->fetch_assoc()) {
$summarm5 = $summarm5+$rmarm5['meritPoint'];
$summard5 = $summard5+$rmarm5['demeritPoint'];
}}

$marm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
$resultmarm6 = $conn->query($marm6);
$summarm6 = 0;
$summard6 = 0;
if($resultmarm2 == true){
while($rmarm6 = $resultmarm6->fetch_assoc()) {
$summarm6 = $summarm6+$rmarm6['meritPoint'];
$summard6 = $summard6+$rmarm6['demeritPoint'];
}}

$marm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
$resultmarm7 = $conn->query($marm7);
$summarm7 = 0;
$summard7 = 0;
if($resultmarm7 == true){
while($rmarm7 = $resultmarm7->fetch_assoc()) {
$summarm7 = $summarm7+$rmarm7['meritPoint'];
$summard7 = $summard7+$rmarm7['demeritPoint'];
}}

$marm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
$resultmarm8 = $conn->query($marm8);
$summarm8 = 0;
$summard8 = 0;
if($resultmarm8 == true){
while($rmarm8 = $resultmarm8->fetch_assoc()) {
$summarm8 = $summarm8+$rmarm8['meritPoint'];
$summard8 = $summard8+$rmarm8['demeritPoint'];
}}

$marm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
$resultmarm9 = $conn->query($marm9);
$summarm9 = 0;
$summard9 = 0;
if($resultmarm9 == true){
while($rmarm9 = $resultmarm9->fetch_assoc()) {
$summarm9 = $summarm9+$rmarm9['meritPoint'];
$summard9 = $summard9+$rmarm9['demeritPoint'];
}}

$marm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
$resultmarm10 = $conn->query($marm10);
$summarm10 = 0;
$summard10 = 0;
if($resultmarm10 == true){
while($rmarm10 = $resultmarm10->fetch_assoc()) {
$summarm10 = $summarm10+$rmarm10['meritPoint'];
$summard10 = $summard10+$rmarm10['demeritPoint'];
}}

$marm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
$resultmarm11 = $conn->query($marm11);
$summarm11 = 0;
$summard11 = 0;
if($resultmarm11 == true){
while($rmarm11 = $resultmarm11->fetch_assoc()) {
$summarm11 = $summarm11+$rmarm11['meritPoint'];
$summard11 = $summard11+$rmarm11['demeritPoint'];
}}

$marm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
$resultmarm12 = $conn->query($marm12);
$summarm12 = 0;
$summard12 = 0;
if($resultmarm12 == true){
while($rmarm12 = $resultmarm12->fetch_assoc()) {
$summarm12 = $summarm12+$rmarm12['meritPoint'];
$summard12 = $summard12+$rmarm12['demeritPoint'];
}}

$marm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
$resultmarm13 = $conn->query($marm10);
$summarm13 = 0;
$summard13 = 0;
if($resultmarm13 == true){
while($rmarm13 = $resultmarm13->fetch_assoc()) {
$summarm13 = $summarm13+$rmarm13['meritPoint'];
$summard13 = $summard13+$rmarm13['demeritPoint'];
}}

$marm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
$resultmarm14 = $conn->query($marm14);
$summarm14 = 0;
$summard14 = 0;
if($resultmarm14 == true){
while($rmarm14 = $resultmarm14->fetch_assoc()) {
$summarm14 = $summarm14+$rmarm14['meritPoint'];
$summard14 = $summard14+$rmarm14['demeritPoint'];
}}

$marm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
$resultmarm15 = $conn->query($marm15);
$summarm15 = 0;
$summard15 = 0;
if($resultmarm15 == true){
while($rmarm15 = $resultmarm15->fetch_assoc()) {
$summarm15 = $summarm15+$rmarm15['meritPoint'];
$summard15 = $summard15+$rmarm15['demeritPoint'];
}}

$marm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
$resultmarm16 = $conn->query($marm16);
$summarm16 = 0;
$summard16 = 0;
if($resultmarm16 == true){
while($rmarm16 = $resultmarm16->fetch_assoc()) {
$summarm16 = $summarm16+$rmarm16['meritPoint'];
$summard16 = $summard16+$rmarm16['demeritPoint'];
}}

$marm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
$resultmarm17 = $conn->query($marm17);
$summarm17 = 0;
$summard17 = 0;
if($resultmarm17 == true){
while($rmarm17 = $resultmarm17->fetch_assoc()) {
$summarm17 = $summarm17+$rmarm17['meritPoint'];
$summard17 = $summard17+$rmarm17['demeritPoint'];
}}

$febm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
  $resultfebm1 = $conn->query($febm1);
  $sumfebm1 = 0;
  $sumfebd1 = 0;
  if($resultfebm1 == true){
  while($rfebm1 = $resultfebm1->fetch_assoc()) {
  $sumfebm1 = $sumfebm1+$rfebm1['meritPoint'];
  $sumfebd1 = $sumfebd1+$rfebm1['demeritPoint'];
}
}

$febm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
$resultfebm2 = $conn->query($febm2);
$sumfebm2 = 0;
$sumfebd2 = 0;
if($resultfebm2 == true){
while($rfebm2 = $resultfebm2->fetch_assoc()) {
$sumfebm2 = $sumfebm2+$rfebm2['meritPoint'];
$sumfebd2 = $sumfebd2+$rfebm2['demeritPoint'];
}
}

$febm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
$resultfebm3 = $conn->query($febm3);
$sumfebm3 = 0;
$sumfebd3 = 0;
if($resultfebm3 == true){
while($rfebm3 = $resultfebm3->fetch_assoc()) {
$sumfebm3 = $sumfebm3+$rfebm3['meritPoint'];
$sumfebd3 = $sumfebd3+$rfebm3['demeritPoint'];
}}

$febm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
$resultfebm4 = $conn->query($febm4);
$sumfebm4 = 0;
$sumfebd4 = 0;
if($resultfebm4 == true){
while($rfebm4 = $resultfebm4->fetch_assoc()) {
$sumfebm4 = $sumfebm4+$rfebm4['meritPoint'];
$sumfebd4 = $sumfebd4+$rfebm4['demeritPoint'];
}}

$febm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
$resultfebm5 = $conn->query($febm5);
$sumfebm5 = 0;
$sumfebd5 = 0;
if($resultfebm5 == true){
while($rfebm5 = $resultfebm5->fetch_assoc()) {
$sumfebm5 = $sumfebm5+$rfebm5['meritPoint'];
$sumfebd5 = $sumfebd5+$rfebm5['demeritPoint'];
}}

$febm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
$resultfebm6 = $conn->query($febm6);
$sumfebm6 = 0;
$sumfebd6 = 0;
if($resultfebm2 == true){
while($rfebm6 = $resultfebm6->fetch_assoc()) {
$sumfebm6 = $sumfebm6+$rfebm6['meritPoint'];
$sumfebd6 = $sumfebd6+$rfebm6['demeritPoint'];
}}

$febm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
$resultfebm7 = $conn->query($febm7);
$sumfebm7 = 0;
$sumfebd7 = 0;
if($resultfebm7 == true){
while($rfebm7 = $resultfebm7->fetch_assoc()) {
$sumfebm7 = $sumfebm7+$rfebm7['meritPoint'];
$sumfebd7 = $sumfebd7+$rfebm7['demeritPoint'];
}}

$febm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
$resultfebm8 = $conn->query($febm8);
$sumfebm8 = 0;
$sumfebd8 = 0;
if($resultfebm8 == true){
while($rfebm8 = $resultfebm8->fetch_assoc()) {
$sumfebm8 = $sumfebm8+$rfebm8['meritPoint'];
$sumfebd8 = $sumfebd8+$rfebm8['demeritPoint'];
}}

$febm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
$resultfebm9 = $conn->query($febm9);
$sumfebm9 = 0;
$sumfebd9 = 0;
if($resultfebm9 == true){
while($rfebm9 = $resultfebm9->fetch_assoc()) {
$sumfebm9 = $sumfebm9+$rfebm9['meritPoint'];
$sumfebd9 = $sumfebd9+$rfebm9['demeritPoint'];
}}

$febm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
$resultfebm10 = $conn->query($febm10);
$sumfebm10 = 0;
$sumfebd10 = 0;
if($resultfebm10 == true){
while($rfebm10 = $resultfebm10->fetch_assoc()) {
$sumfebm10 = $sumfebm10+$rfebm10['meritPoint'];
$sumfebd10 = $sumfebd10+$rfebm10['demeritPoint'];
}}

$febm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
$resultfebm11 = $conn->query($febm11);
$sumfebm11 = 0;
$sumfebd11 = 0;
if($resultfebm11 == true){
while($rfebm11 = $resultfebm11->fetch_assoc()) {
$sumfebm11 = $sumfebm11+$rfebm11['meritPoint'];
$sumfebd11 = $sumfebd11+$rfebm11['demeritPoint'];
}}

$febm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
$resultfebm12 = $conn->query($febm12);
$sumfebm12 = 0;
$sumfebd12 = 0;
if($resultfebm12 == true){
while($rfebm12 = $resultfebm12->fetch_assoc()) {
$sumfebm12 = $sumfebm12+$rfebm12['meritPoint'];
$sumfebd12 = $sumfebd12+$rfebm12['demeritPoint'];
}}

$febm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
$resultfebm13 = $conn->query($febm10);
$sumfebm13 = 0;
$sumfebd13 = 0;
if($resultfebm13 == true){
while($rfebm13 = $resultfebm13->fetch_assoc()) {
$sumfebm13 = $sumfebm13+$rfebm13['meritPoint'];
$sumfebd13 = $sumfebd13+$rfebm13['demeritPoint'];
}}

$febm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
$resultfebm14 = $conn->query($febm14);
$sumfebm14 = 0;
$sumfebd14 = 0;
if($resultfebm14 == true){
while($rfebm14 = $resultfebm14->fetch_assoc()) {
$sumfebm14 = $sumfebm14+$rfebm14['meritPoint'];
$sumfebd14 = $sumfebd14+$rfebm14['demeritPoint'];
}}

$febm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
$resultfebm15 = $conn->query($febm15);
$sumfebm15 = 0;
$sumfebd15 = 0;
if($resultfebm15 == true){
while($rfebm15 = $resultfebm15->fetch_assoc()) {
$sumfebm15 = $sumfebm15+$rfebm15['meritPoint'];
$sumfebd15 = $sumfebd15+$rfebm15['demeritPoint'];
}}

$febm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
$resultfebm16 = $conn->query($febm16);
$sumfebm16 = 0;
$sumfebd16 = 0;
if($resultfebm16 == true){
while($rfebm16 = $resultfebm16->fetch_assoc()) {
$sumfebm16 = $sumfebm16+$rfebm16['meritPoint'];
$sumfebd16 = $sumfebd16+$rfebm16['demeritPoint'];
}}

$febm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
$resultfebm17 = $conn->query($febm17);
$sumfebm17 = 0;
$sumfebd17 = 0;
if($resultfebm17 == true){
while($rfebm17 = $resultfebm17->fetch_assoc()) {
$sumfebm17 = $sumfebm17+$rfebm17['meritPoint'];
$sumfebd17 = $sumfebd17+$rfebm17['demeritPoint'];
}}

$janm1 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 1 AND studID='$studid'";
  $resultjanm1 = $conn->query($janm1);
  $sumjanm1 = 0;
  $sumjand1 = 0;
  if($resultjanm1 == true){
  while($rjanm1 = $resultjanm1->fetch_assoc()) {
  $sumjanm1 = $sumjanm1+$rjanm1['meritPoint'];
  $sumjand1 = $sumjand1+$rjanm1['demeritPoint'];
}
}

$janm2 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 2 AND studID='$studid'";
$resultjanm2 = $conn->query($janm2);
$sumjanm2 = 0;
$sumjand2 = 0;
if($resultjanm2 == true){
while($rjanm2 = $resultjanm2->fetch_assoc()) {
$sumjanm2 = $sumjanm2+$rjanm2['meritPoint'];
$sumjand2 = $sumjand2+$rjanm2['demeritPoint'];
}
}

$janm3 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 3 AND studID='$studid'";
$resultjanm3 = $conn->query($janm3);
$sumjanm3 = 0;
$sumjand3 = 0;
if($resultjanm3 == true){
while($rjanm3 = $resultjanm3->fetch_assoc()) {
$sumjanm3 = $sumjanm3+$rjanm3['meritPoint'];
$sumjand3 = $sumjand3+$rjanm3['demeritPoint'];
}}

$janm4 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 4 AND studID='$studid'";
$resultjanm4 = $conn->query($janm4);
$sumjanm4 = 0;
$sumjand4 = 0;
if($resultjanm4 == true){
while($rjanm4 = $resultjanm4->fetch_assoc()) {
$sumjanm4 = $sumjanm4+$rjanm4['meritPoint'];
$sumjand4 = $sumjand4+$rjanm4['demeritPoint'];
}}

$janm5 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 5 AND studID='$studid'";
$resultjanm5 = $conn->query($janm5);
$sumjanm5 = 0;
$sumjand5 = 0;
if($resultjanm5 == true){
while($rjanm5 = $resultjanm5->fetch_assoc()) {
$sumjanm5 = $sumjanm5+$rjanm5['meritPoint'];
$sumjand5 = $sumjand5+$rjanm5['demeritPoint'];
}}

$janm6 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 6 AND studID='$studid'";
$resultjanm6 = $conn->query($janm6);
$sumjanm6 = 0;
$sumjand6 = 0;
if($resultjanm2 == true){
while($rjanm6 = $resultjanm6->fetch_assoc()) {
$sumjanm6 = $sumjanm6+$rjanm6['meritPoint'];
$sumjand6 = $sumjand6+$rjanm6['demeritPoint'];
}}

$janm7 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 7 AND studID='$studid'";
$resultjanm7 = $conn->query($janm7);
$sumjanm7 = 0;
$sumjand7 = 0;
if($resultjanm7 == true){
while($rjanm7 = $resultjanm7->fetch_assoc()) {
$sumjanm7 = $sumjanm7+$rjanm7['meritPoint'];
$sumjand7 = $sumjand7+$rjanm7['demeritPoint'];
}}

$janm8 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 8 AND studID='$studid'";
$resultjanm8 = $conn->query($janm8);
$sumjanm8 = 0;
$sumjand8 = 0;
if($resultjanm8 == true){
while($rjanm8 = $resultjanm8->fetch_assoc()) {
$sumjanm8 = $sumjanm8+$rjanm8['meritPoint'];
$sumjand8 = $sumjand8+$rjanm8['demeritPoint'];
}}

$janm9 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 9 AND studID='$studid'";
$resultjanm9 = $conn->query($janm9);
$sumjanm9 = 0;
$sumjand9 = 0;
if($resultjanm9 == true){
while($rjanm9 = $resultjanm9->fetch_assoc()) {
$sumjanm9 = $sumjanm9+$rjanm9['meritPoint'];
$sumjand9 = $sumjand9+$rjanm9['demeritPoint'];
}}

$janm10 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 10 AND studID='$studid'";
$resultjanm10 = $conn->query($janm10);
$sumjanm10 = 0;
$sumjand10 = 0;
if($resultjanm10 == true){
while($rjanm10 = $resultjanm10->fetch_assoc()) {
$sumjanm10 = $sumjanm10+$rjanm10['meritPoint'];
$sumjand10 = $sumjand10+$rjanm10['demeritPoint'];
}}

$janm11 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 11 AND studID='$studid'";
$resultjanm11 = $conn->query($janm11);
$sumjanm11 = 0;
$sumjand11 = 0;
if($resultjanm11 == true){
while($rjanm11 = $resultjanm11->fetch_assoc()) {
$sumjanm11 = $sumjanm11+$rjanm11['meritPoint'];
$sumjand11 = $sumjand11+$rjanm11['demeritPoint'];
}}

$janm12 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 12 AND studID='$studid'";
$resultjanm12 = $conn->query($janm12);
$sumjanm12 = 0;
$sumjand12 = 0;
if($resultjanm12 == true){
while($rjanm12 = $resultjanm12->fetch_assoc()) {
$sumjanm12 = $sumjanm12+$rjanm12['meritPoint'];
$sumjand12 = $sumjand12+$rjanm12['demeritPoint'];
}}

$janm13 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 13 AND studID='$studid'";
$resultjanm13 = $conn->query($janm10);
$sumjanm13 = 0;
$sumjand13 = 0;
if($resultjanm13 == true){
while($rjanm13 = $resultjanm13->fetch_assoc()) {
$sumjanm13 = $sumjanm13+$rjanm13['meritPoint'];
$sumjand13 = $sumjand13+$rjanm13['demeritPoint'];
}}

$janm14 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 14 AND studID='$studid'";
$resultjanm14 = $conn->query($janm14);
$sumjanm14 = 0;
$sumjand14 = 0;
if($resultjanm14 == true){
while($rjanm14 = $resultjanm14->fetch_assoc()) {
$sumjanm14 = $sumjanm14+$rjanm14['meritPoint'];
$sumjand14 = $sumjand14+$rjanm14['demeritPoint'];
}}

$janm15 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 15 AND studID='$studid'";
$resultjanm15 = $conn->query($janm15);
$sumjanm15 = 0;
$sumjand15 = 0;
if($resultjanm15 == true){
while($rjanm15 = $resultjanm15->fetch_assoc()) {
$sumjanm15 = $sumjanm15+$rjanm15['meritPoint'];
$sumjand15 = $sumjand15+$rjanm15['demeritPoint'];
}}

$janm16 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 16 AND studID='$studid'";
$resultjanm16 = $conn->query($janm16);
$sumjanm16 = 0;
$sumjand16 = 0;
if($resultjanm16 == true){
while($rjanm16 = $resultjanm16->fetch_assoc()) {
$sumjanm16 = $sumjanm16+$rjanm16['meritPoint'];
$sumjand16 = $sumjand16+$rjanm16['demeritPoint'];
}}

$janm17 = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018 AND categoryID = 17 AND studID='$studid'";
$resultjanm17 = $conn->query($janm17);
$sumjanm17 = 0;
$sumjand17 = 0;
if($resultjanm17 == true){
while($rjanm17 = $resultjanm17->fetch_assoc()) {
$sumjanm17 = $sumjanm17+$rjanm17['meritPoint'];
$sumjand17 = $sumjand17+$rjanm17['demeritPoint'];
}}
                    ?>
                      <!-- start of user-activity-graph -->
                      <div id="main" style="width:100%; height:280px;"></div>
                      <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script>
                      <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-gl/echarts-gl.min.js"></script>
                      <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"></script>
                      <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
                      <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
                      <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
                      <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
                      <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/simplex.js"></script>
                      <script>
                // based on prepared DOM, initialize echarts instance
                var myChart = echarts.init(document.getElementById('main'));

                // specify chart configuration item and data
                var option = {
                  tooltip : {
                    trigger: 'axis',
                    axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                        type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                    }
                },
                legend: {
                    data:['Pengawas/Pusat Sumber/Koperasi/PRS','Unit Beruniform/Persatuan/Kelab/Rumah Sukan','Pertandingan/Penyertaan','Tindakan Sahsiah','Tingkah Laku Jenayah','Melanggar Peraturan Peperiksaan','Ponteng'
                    ,'Tingkah Laku Mencemar Alam Sekitar','Tingkah Laku/Tabiat Buruk','Tingkah Laku Lucah/Tidak Senonoh','Tingkah Laku Kekemasan Diri','Memakai Barang Perhiasan/Menghiaskan Diri','Membawa Barang-Barang Yang Tidak Dibenarkan'
                  ,'Tingkah Laku Yang Tidak Mementingkan Masa','Tingkah Laku Kurang Sopan','Tingkah Laku Musnah/Anti Sosia','Tingkah Laku Tidak Jujur/Menipu']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis : [
                    {
                        type : 'category',
                        data : ['decuary','Febuary','March','April','May','June','July','August','September','October','November','December']
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name:'Pengawas/Pusat Sumber/Koperasi/PRS',
                        type:'bar',
                        stack: 'Merit',
                        data:[<?php echo $sumjanm14 ?>, <?php echo $sumfebm14 ?>, <?php echo $summarm14 ?>, <?php echo $sumaplm14 ?>, <?php echo $summaym14 ?>, <?php echo $sumjunm14 ?>, <?php echo $sumjulm14 ?>,<?php echo $sumaugm14 ?>,<?php echo $sumsepm14 ?>,<?php echo $sumoctm14 ?>,<?php echo $sumnovm14 ?>,<?php echo $sumdecm14 ?>]
                    },
                    {
                        name:'Unit Beruniform/Persatuan/Kelab/Rumah Sukan',
                        type:'bar',
                        stack: 'Merit',
                        data:[<?php echo $sumjanm15 ?>, <?php echo $sumfebm15 ?>, <?php echo $summarm15 ?>, <?php echo $sumaplm15 ?>, <?php echo $summaym15 ?>, <?php echo $sumjunm15 ?>, <?php echo $sumjulm15 ?>,<?php echo $sumaugm15 ?>,<?php echo $sumsepm15 ?>,<?php echo $sumoctm15 ?>,<?php echo $sumnovm15 ?>,<?php echo $sumdecm15 ?>]
                    },
                    {
                        name:'Pertandingan/Penyertaan',
                        type:'bar',
                        stack: 'Merit',
                        data:[<?php echo $sumjanm16 ?>, <?php echo $sumfebm16 ?>, <?php echo $summarm16 ?>, <?php echo $sumaplm16 ?>, <?php echo $summaym16 ?>, <?php echo $sumjunm16 ?>, <?php echo $sumjulm16 ?>,<?php echo $sumaugm16 ?>,<?php echo $sumsepm16 ?>,<?php echo $sumoctm16 ?>,<?php echo $sumnovm16 ?>,<?php echo $sumdecm16 ?>]
                    },
                    {
                        name:'Tindakan Sahsiah',
                        type:'bar',
                        stack: 'Merit',
                        data:[<?php echo $sumjanm17 ?>, <?php echo $sumfebm17 ?>, <?php echo $summarm17 ?>, <?php echo $sumaplm17 ?>, <?php echo $summaym17 ?>, <?php echo $sumjunm17 ?>, <?php echo $sumjulm17 ?>,<?php echo $sumaugm17 ?>,<?php echo $sumsepm17 ?>,<?php echo $sumoctm17 ?>,<?php echo $sumnovm17 ?>,<?php echo $sumdecm17 ?>]

                    },
                    {
                        name:'Tingkah Laku Jenayah',
                        type:'bar',
                        barWidth : 13,
                        stack: 'Demerit',
                        data:[<?php echo $sumjand1 ?>, <?php echo $sumfebd1 ?>, <?php echo $summard1 ?>, <?php echo $sumapld1 ?>, <?php echo $summayd1 ?>, <?php echo $sumjund1 ?>, <?php echo $sumjuld1 ?>,<?php echo $sumaugd1 ?>,<?php echo $sumsepd1 ?>,<?php echo $sumoctd1 ?>,<?php echo $sumnovd1 ?>,<?php echo $sumdecd1 ?>]
                    },
                    {
                        name:'Melanggar Peraturan Peperiksaan',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand2 ?>, <?php echo $sumfebd2 ?>, <?php echo $summard2 ?>, <?php echo $sumapld2 ?>, <?php echo $summayd2 ?>, <?php echo $sumjund2 ?>, <?php echo $sumjuld2 ?>,<?php echo $sumaugd2 ?>,<?php echo $sumsepd2 ?>,<?php echo $sumoctd2 ?>,<?php echo $sumnovd2 ?>,<?php echo $sumdecd2 ?>]
                    },
                    {
                        name:'Ponteng',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand3 ?>, <?php echo $sumfebd3 ?>, <?php echo $summard3 ?>, <?php echo $sumapld3 ?>, <?php echo $summayd3 ?>, <?php echo $sumjund3 ?>, <?php echo $sumjuld3 ?>,<?php echo $sumaugd3 ?>,<?php echo $sumsepd3 ?>,<?php echo $sumoctd3 ?>,<?php echo $sumnovd3 ?>,<?php echo $sumdecd3 ?>]
                    },
                    {
                        name:'Tingkah Laku Mencemar Alam Sekitar',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand4 ?>, <?php echo $sumfebd4 ?>, <?php echo $summard4 ?>, <?php echo $sumapld4 ?>, <?php echo $summayd4 ?>, <?php echo $sumjund4 ?>, <?php echo $sumjuld4 ?>,<?php echo $sumaugd4 ?>,<?php echo $sumsepd4 ?>,<?php echo $sumoctd4 ?>,<?php echo $sumnovd4 ?>,<?php echo $sumdecd4 ?>]
                    },
                    {
                        name:'Tingkah Laku/Tabiat Buruk',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand5 ?>, <?php echo $sumfebd5 ?>, <?php echo $summard5 ?>, <?php echo $sumapld5 ?>, <?php echo $summayd5 ?>, <?php echo $sumjund5 ?>, <?php echo $sumjuld5 ?>,<?php echo $sumaugd5 ?>,<?php echo $sumsepd5 ?>,<?php echo $sumoctd5 ?>,<?php echo $sumnovd5 ?>,<?php echo $sumdecd5 ?>]
                    },
                    {
                        name:'Tingkah Laku Lucah/Tidak Senonoh',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand6 ?>, <?php echo $sumfebd6 ?>, <?php echo $summard6 ?>, <?php echo $sumapld6 ?>, <?php echo $summayd6 ?>, <?php echo $sumjund6 ?>, <?php echo $sumjuld6 ?>,<?php echo $sumaugd6 ?>,<?php echo $sumsepd6 ?>,<?php echo $sumoctd6 ?>,<?php echo $sumnovd6 ?>,<?php echo $sumdecd6 ?>]
                    },
                    {
                        name:'Tingkah Laku Kekemasan Diri',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand7 ?>, <?php echo $sumfebd7 ?>, <?php echo $summard7 ?>, <?php echo $sumapld7 ?>, <?php echo $summayd7 ?>, <?php echo $sumjund7 ?>, <?php echo $sumjuld7 ?>,<?php echo $sumaugd7 ?>,<?php echo $sumsepd7 ?>,<?php echo $sumoctd7 ?>,<?php echo $sumnovd7 ?>,<?php echo $sumdecd7 ?>]
                    },
                    {
                        name:'Memakai Barang Perhiasan/Menghiaskan Diri',
                        type:'bar',
                        stack: 'Demerit',
                        data::[<?php echo $sumjand8 ?>, <?php echo $sumfebd8 ?>, <?php echo $summard8 ?>, <?php echo $sumapld8 ?>, <?php echo $summayd8 ?>, <?php echo $sumjund8 ?>, <?php echo $sumjuld8 ?>,<?php echo $sumaugd8 ?>,<?php echo $sumsepd8 ?>,<?php echo $sumoctd8 ?>,<?php echo $sumnovd8 ?>,<?php echo $sumdecd8 ?>]
                    },
                    {
                        name:'Membawa Barang-Barang Yang Tidak Dibenarkan',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand9 ?>, <?php echo $sumfebd9 ?>, <?php echo $summard9 ?>, <?php echo $sumapld9 ?>, <?php echo $summayd9 ?>, <?php echo $sumjund9 ?>, <?php echo $sumjuld9 ?>,<?php echo $sumaugd9 ?>,<?php echo $sumsepd9 ?>,<?php echo $sumoctd9 ?>,<?php echo $sumnovd9 ?>,<?php echo $sumdecd9 ?>]
                    },
                    {
                        name:'Tingkah Laku Yang Tidak Mementingkan Masa',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand10 ?>, <?php echo $sumfebd10 ?>, <?php echo $summard10 ?>, <?php echo $sumapld10 ?>, <?php echo $summayd10 ?>, <?php echo $sumjund10 ?>, <?php echo $sumjuld10 ?>,<?php echo $sumaugd10 ?>,<?php echo $sumsepd10 ?>,<?php echo $sumoctd10 ?>,<?php echo $sumnovd10 ?>,<?php echo $sumdecd10 ?>]
                    },
                    {
                        name:'Tingkah Laku Kurang Sopan',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand11 ?>, <?php echo $sumfebd11 ?>, <?php echo $summard11 ?>, <?php echo $sumapld11 ?>, <?php echo $summayd11 ?>, <?php echo $sumjund11 ?>, <?php echo $sumjuld11 ?>,<?php echo $sumaugd11 ?>,<?php echo $sumsepd11 ?>,<?php echo $sumoctd11 ?>,<?php echo $sumnovd11 ?>,<?php echo $sumdecd11 ?>]
                    },
                    {
                        name:'Tingkah Laku Musnah/Anti Sosia',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand12 ?>, <?php echo $sumfebd12 ?>, <?php echo $summard12 ?>, <?php echo $sumapld12 ?>, <?php echo $summayd12 ?>, <?php echo $sumjund12 ?>, <?php echo $sumjuld12 ?>,<?php echo $sumaugd12 ?>,<?php echo $sumsepd12 ?>,<?php echo $sumoctd12 ?>,<?php echo $sumnovd12 ?>,<?php echo $sumdecd12 ?>]
                    },
                    {
                        name:'Tingkah Laku Tidak Jujur/Menipu',
                        type:'bar',
                        stack: 'Demerit',
                        data:[<?php echo $sumjand13 ?>, <?php echo $sumfebd13 ?>, <?php echo $summard13 ?>, <?php echo $sumapld13 ?>, <?php echo $summayd13 ?>, <?php echo $sumjund13 ?>, <?php echo $sumjuld13 ?>,<?php echo $sumaugd13 ?>,<?php echo $sumsepd13 ?>,<?php echo $sumoctd13 ?>,<?php echo $sumnovd13 ?>,<?php echo $sumdecd13 ?>]
                    }
                ]
    };


                myChart.setOption(option);
                      </script>
                      <!-- end of user-activity-graph -->

                    </div>
                          </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->



        <!-- footer content -->
        <footer>
          <div class="pull-right">
            HMD System@2018/19 - WorkshopII | BITS | FTMK | UTeM
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
       <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>





  </body>
</html>
