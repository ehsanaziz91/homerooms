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

    <title>HMDS Teacher Profile</title>

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

 <body class="nav-md" style="background-color:#674d3c">
      <div class="container body" style="background-color:#674d3c">
         <div class="main_container" style="background-color:#674d3c">
            <div class="col-md-3 left_col" style="background-color:#674d3c">
               <div class="left_col scroll-view" style="background-color:#674d3c">
                  <div class="nav" style="border: 0;"><a href="#" class="navbar-left"><img src="images/mrsm.png" style="max-width:130px; margin-top:20px; margin-left:40px; margin-bottom:20px;"></a></div>
            

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
          <!--  <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.JPG" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Headmaster</span>
                <h2>Muhd Ehsan</h2>
              </div>
            </div>-->
            <!-- /menu profile quick info -->

            <br />
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
               <div class="menu_section">
                    <ul class="nav side-menu">
                    <li><a href="teacher_index.php?userid=<?php echo $userid; ?>"><i class="fa fa-home"></i>Dashboard</a></li>
                </ul>
                   </div>
                       </div>
   <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
               <div class="menu_section">
                <h3>Actions</h3>
                <ul class="nav side-menu">
                    <li><a href="teacherDemerit_stage.php?userid=<?php echo $userid; ?>"><i class="fa fa-home"></i>Demerit Stage</a></li>
                    <li><a href="tmerit_schedule.php?userid=<?php echo $userid; ?>"><i class="fa fa-home"></i>Merit & Demerit Schedule</a></li>
                    <li><a href="teacher_studListPage.php?userid=<?php echo $userid;?>"><i class="fa fa-home"></i>List of Students</a></li>
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
                  <li><a href="teacher_chartPage.php?userid=<?php echo $userid;?>"><i class="fa fa-edit"></i>Demerit Record</a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
          <!--  <div class="sidebar-footer hidden-small">
             
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>-->
            <!-- /menu footer buttons -->
          </div>
        </div>
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
                    <img src="images/user.png" alt=""><?php echo $staffname;?>
                    <span class=" fa fa-angle-down"></span>
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
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-7 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Profile</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="form-horizontal form-label-left input_mask">
                    <!--<form class="form-horizontal form-label-left input_mask" method="post">-->
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
                            $position = $row['position'];
                            $no = $row['phoneNo'];
                            $email = $row['email'];
                            $question = $row['recoQuestion'];
                            $answer = $row['recoAnswer'];
                            $img = $row['img'];

                        }

                        ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
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
                                        echo '<div><img src="images/user.png" class="img-rounded" width="160" height="140"></div>';
                                    }
                                    else
                                    {
                                        echo '<div><img src="data:images/JPG;base64,'.base64_encode( $row['img'] ).'" class="img-rounded" width="160" height="140"/></div>';
                                    }
                                }
                            ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Staff ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $userid;?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $name;?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Position</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" value="<?php 
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contac No.</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $no;?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $email;?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Recovery Question</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" value=" <?php 
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
                            ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Recovery Answer</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" value="<?php echo $answer;?>" readonly>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <!-- Button trigger modal -->
                          <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                          Update Profile
                          </button>
                        <!--  <button type="submit" class="btn btn-success">Update Profile</button>-->
                          <button type="button" class="btn btn-default">Delete Account</button>
                        </div>
                      </div>
                    </div>
                    <!--</form>-->
                  </div>
                </div>

              </div>


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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Profile Image</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <input type="file" name="img" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Staff ID</label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
<!--                          <input type="text" name="userid" class="form-control col-md-7 col-xs-12" value="<?php// echo $userid;?>" readonly>-->
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