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
      <title>HMDS Admin Stud List</title>
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
      <!-- Custom Table Data Style -->
      <style>
         #badge1{
         background-color: forestgreen;
         }
         #badge2{
         background-color: dodgerblue;
         }
         #badge3{
         background-color: darkgoldenrod;
         }
         #badge4{
         background-color: orange;
         }
         #badge5{
         background-color: red;
         }
         #badge6{
         background-color: purple;
         }
         #badge7{
         background-color: grey;
         }
         #badge8{
         background-color: black;
         }
      </style>
   </head>
   <body class="nav-md" style="background-color:#674d3c">
      <div class="container body" style="background-color:#674d3c">
         <div class="main_container" style="background-color:#674d3c">
            <div class="col-md-3 left_col" style="background-color:#674d3c">
               <div class="left_col scroll-view" style="background-color:#674d3c">
                  <div class="nav" style="border: 0;"><a href="#" class="navbar-left"><img src="images/mrsm.png" style="max-width:130px; margin-top:20px; margin-left:40px; margin-bottom:20px;"></a></div>
                  <!--            <div class="navbar nav_title" style="border: 0;">
                     <a href="#" class="site_title"><i class="fa fa-university"></i> <span>HMD System</span></a>
                     </div>-->
                  <div class="clearfix"></div>
                  <br />
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                     <div class="menu_section">
                        <ul class="nav side-menu">
                           <li><a href="admin_index.php?userid=<?php echo $userid; ?>"><i class="fa fa-home"></i>Dashboard</a></li>
                        </ul>
                     </div>
                  </div>
                  <!-- sidebar menu -->
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                     <div class="menu_section">
                        <h3>Actions</h3>
                        <ul class="nav side-menu">
                           <li><a href="admin_studListPage.php?userid=<?php echo $userid; ?>"><i class="fa fa-tasks"></i>Merit & Demerit</a></li>
                           <li><a href="admin_demeritStagePage.php?userid=<?php echo $userid; ?>"><i class="fa fa-line-chart"></i>Demerit Class</a></li>
                           <li><a href="merit_schedule.php?userid=<?php echo $userid; ?>"><i class="fa fa-pencil-square-o"></i>Merit & Demerit Scheme</a></li>
                        </ul>
                     </div>
                     <div class="menu_section">
                        <h3>Users</h3>
                        <ul class="nav side-menu">
                           <li><a href="admin_viewTeachersPage.php?userid=<?php echo $userid; ?>"><i class="fa fa-user"></i>Teachers</a></li>
                           <li><a href="admin_studListPage.php?userid=<?php echo $userid; ?>"><i class="fa fa-users"></i>Students</a></li>
                        </ul>
                     </div>
                     <div class="menu_section">
                        <h3>Report</h3>
                        <ul class="nav side-menu">
                           <li><a href="admin_chartPage2.php?userid=<?php echo $userid; ?>"><i class="fa fa-edit"></i>Record Analysis</a></li>
                        </ul>
                     </div>
                  </div>
                  <!-- /sidebar menu -->
                  <!-- /menu footer buttons -->
                  <!--            <div class="sidebar-footer hidden-small">
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
                           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="background-color:#d9ad7c">
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
                  <div class="clearfix"></div>
                  <div class="row">
                     <form method="post" action="admin_studList.php">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="x_panel">
                              <div class="x_title">
                                 <h2>Homerooms Students</h2>
                                 <div class="content">
                                    <a class="pull-right"><span class="badge" id="badge8">&nbsp;.&nbsp;</span>&nbsp;Danger&nbsp;</a>
                                    <a class="pull-right"><span class="badge" id="badge7">&nbsp;.&nbsp;</span>&nbsp;Very Poor&nbsp;</a>
                                    <a class="pull-right"><span class="badge" id="badge6">&nbsp;.&nbsp;</span>&nbsp;Poor&nbsp;</a>
                                    <a class="pull-right"><span class="badge" id="badge5">&nbsp;.&nbsp;</span>&nbsp;Very Bad&nbsp;</a>
                                    <a class="pull-right"><span class="badge" id="badge4">&nbsp;.&nbsp;</span>&nbsp;Bad&nbsp;</a>
                                    <a class="pull-right"><span class="badge" id="badge3">&nbsp;.&nbsp;</span>&nbsp;Not Good&nbsp;</a>
                                    <a class="pull-right"><span class="badge" id="badge2">&nbsp;.&nbsp;</span>&nbsp;Fair&nbsp;</a>
                                    <a class="pull-right"><span class="badge" id="badge1">&nbsp;.&nbsp;</span>&nbsp;Good&nbsp;</a>
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
                                                           <td align="center">' . $mpoint . '</td>
                                                           <td align="center">' . $dpoint . '</td>'
                                                                                                           ;?>
                                       <td align="center">
                                          <?php 
                                             if($cpoint >0)
                                             {
                                                 echo "<p class='badge' id='badge1'> $cpoint</p>";
                                             }else if($cpoint >= -1 || $cpoint <= -49)
                                             {
                                                 echo"<p class='badge' id='badge2'> $cpoint</p>";
                                             }else if($cpoint >= -50 || $cpoint <= -99)
                                             {
                                                 echo"<p class='badge' id='badge3'> $cpoint</p>";
                                             }else if($cpoint >= -100 || $cpoint <= -119)
                                             {
                                                 echo"<p class='badge' id='badge4'> $cpoint</p>";
                                             }else if($cpoint >= -120 || $cpoint <= -149)
                                             {
                                                 echo"<p class='badge' id='badge5'> $cpoint</p>";
                                             }else if($cpoint >= -150 || $cpoint <= -179)
                                             {
                                                 echo"<p class='badge' id='badge6'> $cpoint</p>";
                                             }else if($cpoint >= -180 || $cpoint <= -199)
                                             {
                                                 echo"<p class='badge' id='badge7'> $cpoint</p>";
                                             }else if($cpoint >= -200)
                                             {
                                                 echo"<p class='badge' id='badge8'> $cpoint</p>";
                                             }
                                             ?>
                                       </td>
                                       <?php
                                          echo ' 
                                          <td>
                                             <form method="post" action="admin_studList.php?userid='.$userid.'&studid='.$studid.'">
                                          
                                             <input type="hidden" name="studid" value='.$studid.'></input>
                                          
                                             <a href="admin_studProfilePage.php?userid='.$userid.'&studid='.$studid.'" class="btn btn-primary">Details</a>
                                          
                                             <a href="admin_MDFormPage.php?userid='.$userid.'&studid='.$studid.'" class="btn btn-success">Merit / Demerit</a>
                                             
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