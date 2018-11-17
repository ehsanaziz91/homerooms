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

    <title>HMDS Student Profile</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
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
                                            $stmt = $conn->prepare("SELECT * FROM student WHERE studentID = ?");
                                            $stmt->bind_param('s', $userid);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $row = $result->fetch_assoc();

                                            $studname = $row['studName'];
                                        }
              ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.JPG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Student</span>
                <h2><?php echo $studname;?></h2>
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
                   <li><a href="#"><i class="fa fa-users"></i>Students<span class="fa fa-chevron-down"></span></a>
                       <ul class="nav child_menu">
                      <li><a href="#">Merit & Demerit</a></li>
                      <li><a href="#">Demerit Stage</a></li>
                      <li><a href="#">Merit & Demerit Schedule</a></li>
                      </ul>
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
                    <img src="images/img.jpg" alt=""><?php echo $studname;?>
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
            <div class="page-title">
              <div class="title_left">
                <h3>My Profile</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="panel-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <tr>
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
                                            $studaddress = $row['studAddress'];
                                            $studno = $row['studContcNo'];
                                            $parents = $row['parentName'];
                                            $question = $row['recoQuestion'];
                                            $studanswer = $row['recoAnswer'];
                                            $studhr = $row['hrName'];

                                        }

                                        ?>
                                        <td>Student ID</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $userid;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Student Name</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $studname;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Student Address</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $studaddress;?>
                                        </td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Contact No</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $studno;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Parents' Name</td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                           
                                        </td>
                                        <td>:</td>
                                        <td><?php echo $parents;?></td>
                                    </tr><br><br>
                                    <tr>
                                        <td>Recovery Question</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>:</td>
                                        <td><?php echo $studanswer;?></td>
                                    </tr><br><br>
                                     <tr>
                                        <td>Homeroom Teacher</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td>:</td>
                                        <td><?php echo $studhr;?></td>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Staff ID</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="userid" class="form-control col-md-7 col-xs-12" value="<?php echo $userid;?>" readonly>
                                </div>
                              </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="staffName" class="form-control col-md-7 col-xs-12" value="<?php echo $name;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Position</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="position" class="form-control col-md-7 col-xs-12" value="<?php 
                                        $position;
                                        if($position == 01)
                                        {
                                            echo "Admin";
                                        }
                                        else if ($position == 02)
                                        {
                                             echo "Homeroom Teacher";
                                        }
                                    ?>" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contac No.</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="text" name="phoneNo" class="form-control col-md-7 col-xs-12" value="<?php echo $no;?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $email;?>">
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
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>