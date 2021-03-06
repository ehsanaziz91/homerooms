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

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="icon" href="images/favicon.ico" type="image/ico" />-->

    <title>HMDS Teacher</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" style="background-color:#674d3c">
      <div class="container body" style="background-color:#674d3c">
         <div class="main_container" style="background-color:#674d3c">
            <div class="col-md-3 left_col" style="background-color:#674d3c">
               <div class="left_col scroll-view" style="background-color:#674d3c">
                  <div class="nav" style="border: 0;"><a href="#" class="navbar-left"><img src="images/mrsm.png" style="max-width:130px; margin-top:20px; margin-left:40px; margin-bottom:20px;"></a></div>

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

                                            $staffname = $row['staffName'];
                                        }
              ?>
            <!-- menu profile quick info -->
          <!--  <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.JPG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Teacher</span>
                <h2><?php //echo //$staffname;?></h2>
              </div>
            </div>-->
            <!-- /menu profile quick info -->

            <br />

              <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
               <div class="menu_section">
                <h3>Actions</h3>
                <ul class="nav side-menu">
                    <!--<li><a href="MDFormPageAdmin.php?userid=<?php //echo $userid; ?>"><i class="fa fa-home"></i>Merit & Demerit</a></li>-->
                    <li><a href="teacherDemerit_stage.php?userid=<?php echo $userid; ?>"><i class="fa fa-tasks"></i>Demerit Class</a></li>
                    <li><a href="tmerit_schedule.php?userid=<?php echo $userid; ?>"><i class="fa fa-line-chart"></i>Merit & Demerit Scheme</a></li>
                    <li><a href="teacher_studListPage.php?userid=<?php echo $userid;?>"><i class="fa fa-edit"></i>List of Students</a></li>
                </ul>
              </div>
           <!--   <div class="menu_section">
                <h3>Users</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-users"></i>Teacher<span class="fa fa-chevron-down"></span></a>
                       <ul class="nav child_menu">
                     <li><a href="teacher_studListPage.php?userid=<?php //echo $userid;?>">List of Students</a></li>
                           

                      </ul>
                  </li>
                </ul>
              </div>-->
              <div class="menu_section">
                <h3>Report</h3>
                <ul class="nav side-menu">
                  <li><a href="teacher_chartPage.php?userid=<?php echo $userid;?>"><i class="fa fa-bar-chart-o"></i>Demerit Record</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <!--<div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       <div class="top_nav" style="background-color:#d9ad7c">
               <div class="nav_menu" style="background-color:#d9ad7c">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <?php
                        include('../Connections/connection.php');

                        if (isset($_GET['userid']))
                        {
                            $stmt = $conn->prepare("SELECT * FROM staff WHERE staffID = ?");
                            $stmt->bind_param('s', $userid);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                            if($row['img'] == NULL)
                            {
                                echo '<div><img src="images/user.png">'.$row['staffName'].'  <span class=" fa fa-angle-down"></span></div>';
                            }
                            else
                            {
                                echo '<div><img src="data:images/JPG;base64,'.base64_encode( $row['img'] ).'"/>'.$row['staffName'].'  <span class=" fa fa-angle-down"></span></div>';
                            }
                        }
                    ?>
                    <!--<img src="images/user.png" alt=""><?php //echo $staffname;?>-->
                    <!--<span class=" fa fa-angle-down"></span>-->
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right" style="background-color:#d9ad7c">
                    <li><a href="teacher_profilePage.php?userid=<?php echo $userid; ?>"> Profile</a></li>
                    <!--<li><a href="testing.php?userid=<?php //echo $userid; ?>"> Testing</a></li>-->
                    <li><a href="recoveryPage.php?userid=<?php echo $userid; ?>"> Change Password</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <!--  <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>-->
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
                <h3>Teacher's Dashboard</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                  <div class="x_title">
                    <h2>Teacher's Activity</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">
                        <!-- stage element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title" style="background-color: #c9302c">
                              <h1>Demerit Class</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i><strong>View Demerit Class</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Reference for students and Parents</strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="teacherDemerit_stage.php?userid=<?php echo $userid; ?>" class="btn btn-danger btn-block" role="button"><i class="fa fa-eye"></i>View</a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- stage element -->

                        <!-- schedule element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title" style="background-color: #394D5F">
                              <h1>Merit & Demerit Scheme</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> <strong>Scheme for Merit and Demerit</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>For Students and Parents Reference</strong>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="tmerit_schedule.php?userid=<?php echo $userid; ?>" class="btn btn-dark btn-block" role="button"><i class="fa fa-eye"></i>View</a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- schedule element -->
                          <!-- list of students -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title" style="background-color: #ec971f">
                              <h1>List of Students</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> <strong>View Student's Merit Demerit Record</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>View Current and Past Record</strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="teacher_studListPage.php?userid=<?php echo $userid; ?>" class="btn btn-warning btn-block" role="button"><i class="fa fa-eye"></i>View</a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- list of students -->
                          <!-- optional -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h1>Analysis</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> <strong>View Student's Merit Demerit Graph</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>View Graph By Category</strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="teacher_chartPage.php?userid=<?php echo $userid; ?>" class="btn btn-success btn-block" role="button"><i class="fa fa-eye"></i>View</a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- merit demerit element -->
                          
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
