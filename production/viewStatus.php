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

    <title>HMDS Student</title>

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
              <a href="#" class="site_title"><i class="fa fa-university"></i> <span>HMD System</span></a>
            </div>

            <div class="clearfix"></div>
   <?php
                                        include('../Connections/connection.php');

                                        if (isset($_GET['userid']))
                                        {
                                            $stmt = $conn->prepare("SELECT * FROM student WHERE studentID = ?");
                                            $stmt->bind_param('s', $userid);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $row = $result->fetch_assoc();

                                            $studname = $row['studName'];
                                        }
              ?>
            <!-- menu profile quick info -->
           <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.JPG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Student</span>
                <h2><?php echo $studname;?></h2>
              </div>
            </div>-->
            <!-- /menu profile quick info -->

            <br />
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
               <div class="menu_section">
                    <ul class="nav side-menu">
                    <li><a href="student_index.php?userid=<?php echo $userid; ?>"><i class="fa fa-home"></i>Dashboard</a></li>
                </ul>
                   </div>
                       </div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
               <div class="menu_section">
                <h3>Actions</h3>
                <ul class="nav side-menu">
                    <!--<li><a href="MDFormPageAdmin.php?userid=<?php //echo $userid; ?>"><i class="fa fa-home"></i>Merit & Demerit</a></li>-->
                    <li><a href="viewStatus.php?userid=<?php echo $userid;?>"><i class="fa fa-tasks"></i>Status Merit & Demerit </a></li>
                    <li><a href="sdemerit_stage.php?userid=<?php echo $userid; ?>"><i class="fa fa-line-chart"></i>Demerit Stage</a></li>
                    <li><a href="smerit_schedule.php?userid=<?php echo $userid; ?>"><i class="fa fa-edit"></i>Merit & Demerit Schedule</a></li>
                    
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
                  <li><a href="#"><i class="fa fa-bar-chart-o"></i>Demerit Record</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->


            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
             
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
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
                    <img src="images/user.png" alt=""><?php echo $studname;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="student_profilePage.php?userid=<?php echo $userid; ?>"> Profile</a></li>
                    <li><a href="recoveryPage.php?userid=<?php echo $userid; ?>"> Change Password</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                   <!-- <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>-->
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

            <!-- crrent page content -->
            <div class="right_col" role="main">
               <div class="">
                  <div class="clearfix"></div>
                  <div class="row">
                     <!--start of modal page-->
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                             
                           <div class="x_title">
                              
                              <h2>Current Merit & Demerit Record <?php echo $userid; ?></h2>
                              <!-- Button trigger modal -->
                              <div class="clearfix"></div>
                           </div>
                           <div class="x_content">
                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Student ID</th>
                                       <th>Student Name</th>
                                       <th>Merit Point</th>
                                       <th>Demerit Point</th>
                                       <th>Current Points</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       include('../Connections/connection.php');
                                         $stmt1 = $conn->prepare("SELECT student.studentID, student.studName, SUM(record.meritPoint) as meritPoint, SUM(record.demeritPoint) as demeritPoint, (SUM(meritPoint) + SUM(demeritPoint)) FROM student LEFT OUTER JOIN record ON record.studID = student.studID WHERE studentID = ?");
                                         $stmt1->bind_param('s', $userid);
                                         $stmt1->execute();
                                         $stmt1 -> bind_result($userid, $studname, $mpoint, $dpoint, $cpoint); 
                                         while($stmt1->fetch()) 
                                         {
                                              echo '<tr>
                                                     <td>' . $userid . '</td>
                                                     <td>' . $studname . '</td>
                                                     <td>' . $mpoint . '</td>
                                                     <td>' . $dpoint . '</td>
                                                     <td>' . $cpoint . '</td> 
                                                 </tr>';
                                         }
                                       
                                       ?>
                                 </tbody>
                              </table>
                           </div>
                          
                         </div>
            </div>
            <!-- /page content -->
                      
                        <!-- monthly page content -->
            <div class="right_col" role="main">
               <div class="">
                  <div class="clearfix"></div>
                  <div class="row">
                     <!--start of modal page-->
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                             
                           <div class="x_title">
                              
                              <h2>Monthly Merit & Demerit Record <?php echo ($userid); ?></h2>
                              <!-- Button trigger modal -->
                              <div class="clearfix"></div>
                               
                           </div>
                            <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Month</label>
                        <input type="submit" value="Search">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="merit" name="merit" class="form-control">
                            <option value="">-------------------      Select Month      -----------------</option>
                            <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                          </select>
                        </div>
                      </div>
                            <!--<div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                                
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <input type="submit" value="Search">
                            <div class='input-group date'>
                                
                               <input type='date' name="date" class="form-control" />
                                
                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                            </div>
                         </div>
                      </div>-->
                           <div class="x_content">
                              <table id="datatable-buttons" class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Student ID</th>
                                       <th>Student Name</th>
                                        <th>Date</th>
                                        <th>Merit Name</th>
                                        <th>Merit Point</th>
                                        <th>Demerit Name</th>
                                       <th>Demerit Point</th>
                                       <th>Monthly Points</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       include('../Connections/connection.php');
                                         $stmt1 = $conn->prepare("SELECT student.studentID, student.studName, record.date, record.meritPoint AS meritPoint, record.demeritName AS demeritName, record.demeritPoint AS demeritPoint, SUM(record.meritPoint) AS total FROM student LEFT OUTER JOIN record ON record.studID WHERE studentID = $userid AND DATE_FORMAT(record.date, "%m") = '11'");
                                    /* SELECT student.studentID, student.studName, record.date, record.meritPoint AS meritPoint, record.demeritName AS demeritName, record.demeritPoint AS demeritPoint, SUM(record.meritPoint) AS total FROM student LEFT OUTER JOIN record ON record.studID WHERE studentID = "ASP961803" AND DATE_FORMAT(record.date, "%m") = '11'*/
                                      /*$stmt1 = $conn->prepare("SELECT student.studentID, student.studName, record.meritPoint as meritPoint, record.demeritPoint as demeritPoint, (SUM(meritPoint) + SUM(demeritPoint)) FROM student LEFT OUTER JOIN record ON record.studID WHERE studentID = $userid AND WHERE date >= DATEADD(MONTH, -3, GETDATE())");*/
                                    /* SELECT student.studentID, student.studName, record.meritPoint as meritPoint, record.demeritPoint as demeritPoint, (SUM(meritPoint) + SUM(demeritPoint)) FROM student LEFT OUTER JOIN record ON record.studID WHERE studentID = $userid AND WHERE date >= DATEADD(MONTH, -3, GETDATE())*/
                                         $stmt1->execute();
                                         $stmt1 -> bind_result($userid, $studname, $date, $mname, $mpoint, $dname, $dpoint, $monthpoint);
                                         while($stmt1->fetch()) 
                                     
                                                   /*  if (!empty($_REQUEST['date'])) {
                                                      $search = $_GET['date'];


                                                    $sql = "SELECT student.studentID, student.studName, record.meritPoint as meritPoint, record.demeritPoint as demeritPoint, (SUM(meritPoint) + SUM(demeritPoint)) FROM student LEFT OUTER JOIN record ON record.studID WHERE studentID = ? AND record.date LIKE '%$search%'"; 
                                                    $r_query = mysqli_query($conn,$sql); 


                                                    while ($row = mysqli_fetch_array($r_query))*/
                                         {
                                              echo '<tr>
                                                     <td>' . $userid . '</td>
                                                     <td>' . $studname . '</td>
                                                     <td>' . $date . '</td>
                                                     <td>' . $mname . '</td>
                                                     <td>' . $mpoint . '</td>
                                                     <td>' . $dname . '</td>
                                                     <td>' . $dpoint . '</td>
                                                     <td>' . $monthpoint . '</td> 
                                                 </tr>';
                                                        
               /* echo '<tr>
					
					
				<td><input type="text" name="userid" value="'.$row['userid'].'" >'.$row['userid'].'</td>
				<td><input type="text" name="studname" value="'.$row['studname'].'" >'.$row['studname'].'</td>
				<td><input type="text" name="date" value="'.$row['date'].'" >'.$row['date'].'</td>
                <td><input type="text" name="mname" value="'.$row['mname'].'" >'.$row['mname'].'</td>
                <td><input type="text" name="mpoint" value="'.$row['mpoint'].'" >'.$row['mpoint'].'</td>
                <td><input type="text" name="dname" value="'.$row['dname'].'" >'.$row['dname'].'</td>
                <td><input type="text" name="dpoint" value="'.$row['dpoint'].'" >'.$row['dpoint'].'</td>
                <td><input type="text" name="monthpoint" value="'.$row['monthpoint'].'" >'.$row['monthpoint'].'</td>
				
				</tr>';*/
                                         }
                                       
                                       ?>
                                 </tbody>
                              </table>
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
