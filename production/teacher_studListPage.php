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

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.JPG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Headmaster</span>
                <h2>Muhd Ehsan</h2>
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
                  <li><a href="#"><i class="fa fa-user"></i>Admin</a>
                  </li>
                  <li><a href="#"><i class="fa fa-users"></i>Teachers</a>
                  </li>
                  <li><a href="#"><i class="fa fa-users"></i>Students</a>
                  </li>
                  <li><a href="#"><i class="fa fa-users"></i>Parents</a>
                  </li>
                  <li><a href="#"><i class="fa fa-user"></i>Technical Administrator</a>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Class</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-edit"></i>Assign Students To Class</a>
                  </li>
                  <li><a href="#"><i class="fa fa-star-o"></i>Upgrade Class</a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Others</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-edit"></i>Merits | Demerits</a>
                  </li>
                  <li><a href="#"><i class="fa fa-edit"></i>Punishments</a>
                  </li>
                  <li><a href="#"><i class="fa fa-edit"></i>Consultations</a>
                  </li>
                  <li><a href="#"><i class="fa fa-edit"></i>Commitments</a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Report</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-edit"></i>Audits</a>
                  </li>
                  <li><a href="#"><i class="fa fa-edit"></i>Reports</a>
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
                    <img src="images/img.jpg" alt="">Muhd Ehsan
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="javascript:;"> Change Password</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Student</h2>
                    <!-- Button trigger modal -->
                    <div class="content">
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                    Add New Student
                    </button>
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
                          
/*                            $userid = "ASP961801";
                            //$userid = $_POST['userid'];
                          
                            $stmt = $conn->prepare("SELECT studentID, studName, studContcNo, hrName, recoAnswer FROM student WHERE studentID = ?");
                            $stmt->bind_param("s", $userid);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc())
                            {
                                echo '<tr>
                                        <td>'.$row['studentID'].'</td>
                                        <td>'.$row['studName'].'</td>
                                        <td>'.$row['studContcNo'].'</td>
                                        <td>'.$row['hrName'].'</td>
                                        <td>'.$row['recoAnswer'].'</td>
                                    </tr>';
                            }*/
                          
                            if($stmt = $conn->prepare("SELECT studentID, studName, studContcNo, hrName, recoAnswer FROM student")) 
                            {
                                $stmt -> execute();
                                $stmt -> bind_result($userid, $studname, $studno, $studhr, $studanswer);
                                while($stmt->fetch()) 
                                {
                                    echo '<tr>
                                            <td>' . $userid . '</td>
                                            <td>' . $studname . '</td>
                                            <td>' . $studno . '</td>
                                            <td>' . $studhr . '</td>
                                            <td>' . $studanswer . '</td>
                                            <td>
                                                <form method="post" action="teacher_studList.php">
                                                    
                                                    <input type="hidden" name="studentID" value='.$userid.'></input>

                                                    <button class="btn btn-primary" name="details" id="details" onclick="document.submit();">Details</button>

                                                    <button class="btn btn-danger" name="del" onclick="document.submit();">Delete</button>
                                                    <button class="btn btn-danger" name="del" onclick="document.submit();">Merit</button>
                                                    <button class="btn btn-danger" name="del" onclick="document.submit();">Demerit</button>
                                                </form>
                                            </td>
                                        </tr>';
                                }
                            }
                          $stmt->close();
                          $conn->close();
                        ?>
                      </tbody>
                    </table>
                  </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Add New Student</h4>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="teacher_studList.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student ID</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="studid" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Student Name</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="studname" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Student Address</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="studadd" id="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contac No.</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="contc" id="middle-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Name</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="parent" id="parent" required="required" class="form-control col-md-7 col-xs-12" placeholder="Father / Mother">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="password" name="password" id="password" class="date-picker form-control col-md-7 col-xs-12" required="required"  placeholder="Ex:skrs18ip0012">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Recovery Question</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <select name="question" class="form-control">
                                    <option>--- Security Question ---</option>
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
                                  <input type="text" name="answer" id="middle-name" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Teacher Names</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <select name="hrname" class="form-control">
                                    <option>--- Teacher Names ---</option>
                                    <option value="0">Muhammad Ehsan Bin Aziz (Java)</option>
                                    <option value="1">Wirda Amira Binti Mohd Asri (ASP.Net)</option>
                                    <option value="2">Muhammad Nabil Bin Zakaria (Fortran)</option>
                                    <option value="3">Nur Hazirah Binti Mohd Sabri (Scala)</option>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add New Student</button>
                              </div>
                            </form>
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