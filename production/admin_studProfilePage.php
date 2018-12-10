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
    <!--<meta http-equiv="REFRESH" content="10; url=http://localhost/homerooms/production/teacher_studListPage.php"> <!--loading page in every 10 second-->

    <title>HMDS Student Details</title>

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

            <br />
              
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Actions</h3>
                <ul class="nav side-menu">
                    <li><a href="admin_studListPage.php?userid=<?php echo $userid; ?>"><i class="fa fa-tasks"></i>Merit & Demerit</a></li>
                    <li><a href="admin_demeritStagePage.php?userid=<?php echo $userid; ?>"><i class="fa fa-line-chart"></i>Demerit Stage</a></li>
                    <li><a href="merit_schedule.php?userid=<?php echo $userid; ?>"><i class="fa fa-pencil-square-o"></i>Merit & Demerit Schedule</a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Users</h3>
                <ul class="nav side-menu">
                    <li><a href="admin_viewTeachersPage.php?userid=<?php echo $userid; ?>"><i class="fa fa-user"></i>Teachers</a></li>
                    <li><a href="#"><i class="fa fa-users"></i>Students</a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Report</h3>
                <ul class="nav side-menu">
                  <li><a href="admin_chartPage.php?<?php echo $userid; ?>"><i class="fa fa-edit"></i>Record Analysis</a></li>
                  <li><a href="admin_echartPage.php?<?php echo $userid; ?>"><i class="fa fa-edit"></i>Record Analysis 2</a></li>
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
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="admin_profilePage.php?userid=<?php echo $userid; ?>"> Profile</a></li>
                    <li><a href="recoveryPage.php?userid=<?php echo $userid; ?>"> Change Password</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

<!--                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                </li>-->
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
                        <?php
                            include('../Connections/connection.php');

                            if (isset($_GET['studid']))
                            {
                                $studid = $_GET['studid'];
                                /*$stmt = $conn->prepare("SELECT * FROM student WHERE studentID = ?");*/
                                $stmt = $conn->prepare("SELECT student.*, homeroom.className FROM student JOIN homeroom ON homeroom.hrID = student.hrID WHERE student.studentID = ?");
                                $stmt->bind_param('s', $studid);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $row = $result->fetch_assoc();

                               /* while*/ 
                                //$studID = $row['studID'];
                                $studid = $row['studentID'];
                                $studname = $row['studName'];
                                $studAddr = $row['studAddress'];
                                $studno = $row['studContcNo'];
                                $parent = $row['parentName'];
                                $email = $row['parentEmail'];
                                $question = $row['recoQuestion'];
                                //$answer = $row['recoAnswer'];
                                $hr = $row['className'];

                            }

                            ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <tr>
                                    <td>Student ID</td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        &nbsp;
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
                                        &nbsp;
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
                                                echo "What is your father ic number?";
                                            }
                                            else if ($question == 1)
                                            {
                                                 echo "Where is your birth place?";
                                            }
                                            else if ($question == 2)
                                            {
                                                 echo "What is your mother ic number?";
                                            }
                                        ?>
                                    </td>
                                </tr><br><br>
<!--                                <tr>
                                    <td>Recovery Answer</td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td>:</td>
                                    <td type="password"><?php //echo $answer;?></td>
                                </tr><br><br>-->
                                <tr>
                                    <!--<button type="submit" class="btn btn-primary" name="update">Update Profile</button>-->
                                    <button type="submit" class="btn btn-danger" name="del">Delete Account</button>
                                </tr>
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
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <div id="graph_bar" style="width:100%; height:280px;"></div>
                      <!-- end of user-activity-graph -->

                    </div>
                          </div>
                  </div>
                </div>
              </div>
            </div>
              
            <div class="row">
            <form method="post" action="admin_studList.php">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php
                    include('../Connections/connection.php');
                    if(isset($_GET['studid']))
                    {
                        $stmt = $conn->prepare("SELECT studID  FROM `student` WHERE studentID=?");
                        $stmt->bind_param('s', $studid);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();

                        $studentid = $row['studID'];

                        $stmt1 = $conn->prepare("SELECT record.meritName, record.meritPoint, record.date, record.demeritName, record.demeritPoint, student.studentID, homeroom.staffID FROM record JOIN student ON student.studID = record.studID LEFT OUTER JOIN homeroom ON homeroom.hrID = student.hrID WHERE student.studID = ?");
                        $stmt1->bind_param('s', $studentid);
                        $stmt1->execute();
                        $stmt1 -> bind_result($mName, $mPoint, $date, $dName, $dPoint, $studid, $userid);
                        $stmt1->fetch();
                    }
                    ?>
                    <h2>View History (Teacher ID : <?php echo $userid;?>)</h2>
                      <div class="content">
                         <a href="admin_MDFormPage.php?userid=<?php echo $userid;?>&studid=<?php echo $studid;?>" class="btn btn-success pull-right">Merit / Demerit</a>
                         <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#exampleModalsms">SMS</button>
                         <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#exampleModalEmail">Email</button>
                      </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Merit Name</th>
                          <th>Merit Point</th>
                          <th>Demerit Name</th>
                          <th>Demerit Point</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include('../Connections/connection.php');
                        if(isset($_GET['studid']))
                        {
                            $stmt = $conn->prepare("SELECT studID  FROM `student` WHERE studentID=?");
                            $stmt->bind_param('s', $studid);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();

                            $studentid = $row['studID'];

                            $stmt1 = $conn->prepare("SELECT record.meritName, record.meritPoint, record.date, record.demeritName, record.demeritPoint, student.studentID FROM record JOIN student ON student.studID = record.studID LEFT OUTER JOIN homeroom ON homeroom.hrID = student.hrID WHERE student.studID = ?");
                            $stmt1->bind_param('s', $studentid);
                            $stmt1->execute();
                            $stmt1 -> bind_result($mName, $mPoint, $date, $dName, $dPoint, $studid);
                            while($stmt1->fetch()) 
                            {
                              echo '<tr>
                                     <td>' . $date . '</td>
                                     <td>' . $mName . '</td>
                                     <td>' . $mPoint . '</td>
                                     <td>' . $dName . '</td>
                                     <td>' . $dPoint . '</td>
                                     <td>
                                         <form method="post" action="teacher_studList.php?userid='.$userid.'&studid='.$studid.'">

                                             <input type="hidden" name="studid" value='.$studid.'></input>

                                             <button class="btn btn-danger" name="del" onclick="document.submit();">Delete</button>
                                         </form>
                                     </td>
                                 </tr>';
                            }
                            $stmt->close();
                            $conn->close();
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             </form>
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
      
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>
      
    <script type="text/javascript">
        $(document).ready(function () {

            $.getJSON("admin_studProfileChart.php", function (result) {

                var chart = new CanvasJS.Chart("graph_bar", {
                    title: {
                        text: "Demerit Record - 2019"
                    },
                    data: [
                        {
                            dataPoints: result,
                            type:"graph_bar",
                            yValueFormatString: "#,##0.##",
                            indexLabel: "({y})",
                        }
                    ]
                });

                chart.render();
            });
        });
    </script>
      
  </body>
</html>