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

    <title>HMDS M & D View Status</title>

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
<!--            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
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
                    <li><a href="viewStatus2.php?userid=<?php echo $userid;?>"><i class="fa fa-tasks"></i>Status Merit & Demerit </a></li>
                    <li><a href="sdemerit_stage.php?userid=<?php echo $userid; ?>"><i class="fa fa-line-chart"></i>Demerit Class</a></li>
                    <li><a href="smerit_schedule.php?userid=<?php echo $userid; ?>"><i class="fa fa-edit"></i>Merit & Demerit Scheme</a></li>
                    
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

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Status Merit & Demerit</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Collected Merit & Demerit Point</h2>
                        <div class="content">
                            <!--<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addMerit">Add New Merit</button>-->
                        </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered">
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
            </div>
              
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Current Merit & Demerit Point</h2>
                        <div class="content">
                            <!--<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addMerit">Add New Merit</button>-->
                        </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         <th>Student ID</th>
                                       
                                       <th>Student Name</th>
                                        <th>Date</th>
                                        <th>Merit Name</th>
                                       <th>Merit Point</th>
                                        <th>Demerit Name</th>
                                       <th>Demerit Point</th>

                        </tr>
                      </thead>

                      <tbody>
                        <?php
                                       include('../Connections/connection.php');
                                         $stmt1 = $conn->prepare("SELECT student.studentID, student.studName, record.date, record.meritName AS meritName, record.meritPoint AS meritPoint, record.demeritName AS demeritName, record.demeritPoint AS demeritPoint FROM student LEFT OUTER JOIN record ON record.studID WHERE studentID = ? AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");

                                         $stmt1->bind_param('s', $userid);
                                         $stmt1->execute();
                                          $stmt1 -> bind_result($userid, $studname, $date, $mname, $mpoint, $dname, $dpoint);

                                         while($stmt1->fetch()) 
                                         {
                                              echo '<tr>
                                                      <td>' . $userid . '</td>
                                                     <td>' . $studname . '</td>
                                                     <td>' . $date . '</td>
                                                     <td>' . $mname . '</td>
                                                     <td>' . $mpoint . '</td>
                                                     <td>' . $dname . '</td>
                                                     <td>' . $dpoint . '</td>
 
                                                 </tr>';
                                         }
                                       
                                       ?>


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              
            <!-- Modal -->
            
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