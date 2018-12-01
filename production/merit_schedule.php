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
    <!--<meta http-equiv="REFRESH" content="10; url=http://localhost/homerooms/production/admin_index.php"> <!--loading page in every 10 second-->
	<!--<link rel="icon" href="images/favicon.ico" type="image/ico" />-->

    <title>HMDS Admin</title>

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

                                            $staffname = $row['staffName'];
                                        }
              ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.JPG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Admin</span>
                <h2><?php echo $staffname;?></h2>
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
                  <li><a href="#"><i class="fa fa-users"></i>Admin<span class="fa fa-chevron-down"></span></a>
                       <ul class="nav child_menu">
                      <li><a href="#">Merit & Demerit</a></li>
                      <li><a href="#">Demerit Stage</a></li>
                      <li><a href="#">Merit & Demerit Schedule</a></li>
                      <li><a href="#">Assign Students</a></li>
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
                    <img src="images/img.JPG" alt=""><?php echo $staffname;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="admin_profilePage.php?userid=<?php echo $userid; ?>"> Profile</a></li>
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
                <h3>Merit & Demerit Schedule</h3>
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
                <div class="x_panel" style="height:1000px;">
                  <div class="x_title">
                    <h2>Merit Schedule</h2>
                      <!-- Button trigger modal -->
                              <div class="content">
                                 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modalmerit">
                                 Add New Merit
                                 </button>
                              </div>
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
                           <div class="x_content">
                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Category Code</th>
                                       <th>Merit Code</th>
                                       <th>Merit Name</th>
                                        <th>Merit Point</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       include('../Connections/connection.php');
                                       
                                         if($stmt = $conn->prepare("SELECT categoryCode, meritCode, meritName, meritPoint FROM merit")) 
                                         {
                                             $stmt -> execute();
                                             $stmt -> bind_result($categoryCode, $meritCode, $meritName, $meritPoint);
                                             while($stmt->fetch()) 
                                             {
                                                 echo '<tr>
                                                         <td>' . $categoryCode . '</td>
                                                         <td>' . $meritCode . '</td>
                                                         <td>' . $meritName . '</td>
                                                         <td>' . $meritPoint . '</td>
                                                     </tr>';
                                             }
                                              $stmt->close();
                                       $conn->close();
                                         }
                                      /* $stmt->close();
                                       $conn->close();*/
                                       ?>
                                 </tbody>
                              </table>
                           </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
                  
                                  <div class="x_panel" style="height:3500px;">
                  <div class="x_title">
                    <h2>Demerit Schedule</h2>
                      <!-- Button trigger modal -->
                              <div class="content">
                                 <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#Modaldemerit">
                                 Add New Demerit
                                 </button>
                              </div>
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
                                      <!--modal-->
              <div class="modal fade" id="Modalmerit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title" id="exampleModalLabel">Add New Merit</h4>
                                    </div>
                                    <div class="modal-body">
                                       <form method="post" action="merit_schedule.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merit Code</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="studid" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Merit Name</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="studname" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Merit Point</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="studadd" id="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status Merit</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <select name="question" class="form-control">
                                                   <option>--- Status Merit ---</option>
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category Code</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="answer" id="middle-name" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary" name="addmerits" id="addmerits">Add New Merit</button>
                                          </div>
                                           <!-- <input type="hidden" name="categoryid" id="middle-name" class="form-control col-md-7 col-xs-12" value="<?php echo $categoryID;?>">-->
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                                      <?php
include('../Connections/connection.php');

if (isset($_POST['addmerits']))
{
    $userid = $_GET['userid'];
    $meritCode = $_POST['meritCode'];
    $meritName = $_POST['meritName'];
    $meritPoint = $_POST['meritPoint'];
    $statusMerit = $_POST['statusMerit'];
    $categoryCode = $_POST['categoryCode'];
    $categoryID = $_POST['categoryID'];

   /* $stmt = $conn->prepare("INSERT INTO `merit` (meritCode, meritName, meritPoint, statusMerit, categoryID, categoryCode WHERE categoryCode =?) 
   */
    $stmt = $conn->prepare("INSERT INTO `merit` (meritCode, meritName, meritPoint, statusMerit, categoryID, categoryCode WHERE merit.categoryID=category.categoryID) 
    VALUES(?,?,?,?,?,?)");
    $stmt->bind_param('ssssss', $meritCode, $meritName, $meritPoint, $statusMerit,  $categoryID, $categoryCode);
    $stmt->execute();
	//header('location:teacher_studListPage.php');
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Registered New Merit!'),location.href='merit_schedule.php?userid=$userid'";
        /*href="merit_schedule.php?userid=<?php echo $userid; ?>"*/
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to register new Merit!')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
};
                                      ?>
                                      <!--modaldemerit-->
                                                    <div class="modal fade" id="Modaldemerit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h4 class="modal-title" id="exampleModalLabel">Add New Demerit</h4>
                                    </div>
                                    <div class="modal-body">
                                       <form method="post" action="merit_schedule.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Demerit Code</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="studid" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Demerit Name</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="studname" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Demerit Point</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="studadd" id="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Demerit Status</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <select name="question" class="form-control">
                                                   <option>--- Demerit Status ---</option>
                                                   <option value="0">0</option>
                                                   <option value="1">1</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Category Code</label>
                                             <div class="col-md-8 col-sm-6 col-xs-12">
                                                <input type="text" name="answer" id="middle-name" class="form-control col-md-7 col-xs-12">
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary" name="adddemerit" id="adddemerit">Add New Demerit</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                                       <?php
include('../Connections/connection.php');

if (isset($_POST['adddemerit']))
{
    //$userid = $_GET['userid'];
    $demeritCode = $_POST['demeritCode'];
    $demeritName = $_POST['demeritName'];
    $demeritPoint = $_POST['demeritPoint'];
    $statusDemerit = $_POST['statusDemerit'];
    $categoryCode = $_POST['categoryCode'];

    $stmt = $conn->prepare("INSERT INTO `demerit` (demeritCode, demeritName, demeritPoint, statusDemerit, categoryCode) VALUES(?,?,?,?,?)");
    $stmt->bind_param('sssss', $demeritCode, $demeritName, $demeritPoint, $statusDemerit, $categoryCode);
    $stmt->execute();
	//header('location:teacher_studListPage.php');
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Registered New Demerit!'),location.href='merit_schedule.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to register new Demerit!')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
};
                                      ?>
                                    
                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">
                           <div class="x_content">
                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Category Code</th>
                                       <th>Demerit Code</th>
                                       <th>Demerit Name</th>
                                        <th>Demerit Point</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       include('../Connections/connection.php');
                                       
                                         if($stmt = $conn->prepare("SELECT categoryCode, demeritCode, demeritName, demeritPoint FROM demerit")) 
                                         {
                                             $stmt -> execute();
                                             $stmt -> bind_result($categoryCode, $demeritCode, $demeritName, $demeritPoint);
                                             while($stmt->fetch()) 
                                             {
                                                 echo '<tr>
                                                         <td>' . $categoryCode . '</td>
                                                         <td>' . $demeritCode . '</td>
                                                         <td>' . $demeritName . '</td>
                                                         <td>' . $demeritPoint . '</td>
                                                     </tr>';
                                             }
                                              $stmt->close();
                                              $conn->close();
                                         }
                                 /*      $stmt->close();
                                       $conn->close();*/
                                       ?>
                                 </tbody>
                              </table>
                           </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
                  
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


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
