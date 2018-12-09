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

    <title>HMDS Admin</title>

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
                    <li><a href="demerit_stage.php?userid=<?php echo $userid; ?>"><i class="fa fa-users"></i>Students</a></li>
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
                <h3>Admin Dashboard</h3>
              </div>
            </div>

            <div class="clearfix"></div>
              
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                  <div class="x_title">
                    <h2>Admins' Activity</h2>
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

                        <!-- merit demerit element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h1>Merit & Demerit</h1>
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
                                <!--<a href="MDFormPageAdmin.php?userid=<?php //echo $userid; ?>" class="btn btn-success btn-block" role="button">View</a>-->
                                <a href="admin_studListPage.php?userid=<?php echo $userid; ?>" class="btn btn-warning btn-block" role="button"><i class="fa fa-eye"></i> View</a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- merit demerit element -->

                        <!-- stage element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h1>Demerit Stage</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i><strong>View Demerit Stage</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Reference for students and Parents</strong></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="admin_demeritStagePage.php?userid=<?php echo $userid; ?>" class="btn btn-danger btn-block" role="button"><i class="fa fa-eye"></i> View</a>
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
                            <div class="title">
                              <h1>Merit & Demerit Schedule</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> <strong>Schedule for Merit and Demerit</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>For Students and Parents Reference</strong>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="merit_schedule.php?userid=<?php echo $userid; ?>" class="btn btn-dark btn-block" role="button"><i class="fa fa-eye"></i> View</a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- schedule element -->
                          
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h1>Optional</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> <strong>Schedule for Merit and Demerit</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>For Students and Parents Reference</strong>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="#" class="btn btn-primary btn-block" role="button"><i class="fa fa-eye"></i> View</a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                          
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
                    <h2>Teachers Name</h2>
                        <div class="content">
                             <div class="col-md-4 col-sm-4 col-xs-8">
                                <?php

                                $position = "02";

                                $stmt = $conn->prepare("SELECT * FROM staff WHERE position = ?");
                                $stmt->bind_param('s',$position);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                ?>
                                <select id="filter_staff" name="filter_staff" class="form-control">
                                    <option value="" selected="selected">Select Teacher</option>
                                    <?php
                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){ 
                                            echo '<option value="'.$row['staffID'].'">'.$row['staffName'].'</option>';
                                        }
                                    }else{
                                        echo '<option value="">Teacher not found</option>';
                                    }
                                    ?>
                                </select>
                             </div><button type="submit" class="btn btn-success" name="filter">Filter</button>
                        </div>
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
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include('../Connections/connection.php');

                         if($stmt = $conn->prepare("SELECT student.studentID, student.studName, SUM(record.meritPoint) as meritPoint, SUM(record.demeritPoint) as demeritPoint, (SUM(meritPoint) + SUM(demeritPoint)), homeroom.staffID FROM student LEFT OUTER JOIN record ON record.studID = student.studID JOIN homeroom ON homeroom.hrID = student.hrID GROUP BY studentID")) 
                         {
                             $stmt -> execute();
                             $stmt -> bind_result($studid, $studname, $mpoint, $dpoint, $cpoint, $userID);
                             while($stmt->fetch()) 
                             {
                                 
                                 echo '<tr>
                                         <td>' . $studid . '</td>
                                         <td>' . $studname . '</td>
                                         <td>' . $mpoint . '</td>
                                         <td>' . $dpoint . '</td>'
                            ;?>
                                         
                                         <td>
                                             <?php 
                                                if($cpoint>0)
                                                {
                                                    echo "<p style='color:#00e600;'>$cpoint</p>";
                                                }else
                                                {
                                                    echo"<p style='color:#ff0000;'>$cpoint</p>";
                                                }
                                             ?>
                                        </td>
                                        
                        <?php
                                 echo ' <td><form method="post" action="admin_studList.php?userid='.$userid.'&studid='.$studid.'">

                                             <input type="hidden" name="studid" value='.$studid.'></input>

                                             <a href="admin_studProfilePage.php?userid='.$userid.'&studid='.$studid.'" class="btn btn-primary">Details</a>
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
      
<!--    <script>
    $(document).ready(function() {
        $("#filter_staff").change(function(){
            var val = $('#filter_staff option:selected').val();    
            $.ajax({
                url: "admin_studList.php",
                type: "POST",
                dataType: "HTML",
                data: {"staffID": val}
                async: false,
                success: function(data) {
                  // for textbox add id as price
                     $("#studid").val(data);// data will have the price echoed in somefilename.php          
                }
          }); 

        });
    });
    </script>-->

  </body>
</html>