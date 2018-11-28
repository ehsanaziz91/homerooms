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
      <!-- bootstrap-datetimepicker -->
      <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
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
                     <!--start of modal page-->
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                           <div class="x_title">
                               <?php   
                                $stmt1 = $conn->prepare("SELECT student.studentID, student.studName, homeroom.className, staff.staffID FROM homeroom JOIN student ON student.hrID = homeroom.hrID JOIN staff ON staff.employeeID = homeroom.employeeID AND staff.staffID = ?");
                                $stmt1->bind_param('s', $userid);
                                $stmt1->execute();
                                $stmt1 -> bind_result($studid, $studname, $class, $userid);
                                $stmt1->fetch(); 
                               ?>
                              <h2>List of Student Class  <?php echo $class; ?></h2>
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
                                     
                                        /*SELECT student.studentID, student.studName, homeroom.className, staff.staffID
                                        FROM homeroom
                                        JOIN student
                                        ON student.hrID = homeroom.hrID
                                        JOIN staff
                                        ON staff.staffID = homeroom.staffID
                                        AND staff.staffID = 'A02001'*/
                                       
                                         //$userid = "ASP961801";
                                         //$studentID = $_GET['studentID'];
                                         $stmt1 = $conn->prepare("SELECT student.studentID, student.studName, homeroom.className, staff.staffID FROM homeroom JOIN student ON student.hrID = homeroom.hrID JOIN staff ON staff.employeeID = homeroom.employeeID AND staff.staffID = ?");
                                         $stmt1->bind_param('s', $userid);
                                         $stmt1->execute();
                                         $stmt1 -> bind_result($studid, $studname, $class, $userid);
                                         while($stmt1->fetch()) 
                                         {
                                              echo '<tr>
                                                     <td>' . $studid . '</td>
                                                     <td>' . $studname . '</td>
                                                     <td>' . $class . '</td>
                                                     <td>' . $userid . '</td>
                                                     <td>' . $userid . '</td>
                                                     <td>
                                                         <form method="post" action="teacher_studList.php">

                                                             <input type="hidden" name="studentID" value='.$studid.'></input>

                                                             <a href="teacher_studProfilePage.php?userid='.$userid.'&studid='.$studid.'" class="btn btn-primary">Details</a>

                                                             <button class="btn btn-danger" name="del" onclick="document.submit();">Delete</button>

                                                             <a href="MDFormPage.php?userid='.$userid.'&studid='.$studid.'" class="btn btn-success">Merit / Demerit</a>
                                                         </form>
                                                     </td>
                                                 </tr>';
                                         }
                                       
/*                                         $stmt = $conn->prepare("SELECT student.studentID, student.studName, homeroom.className, staff.staffID FROM homeroom JOIN student ON student.hrID = homeroom.hrID JOIN staff ON staff.staffID = homeroom.staffID AND staff.staffID = ?");
                                         $stmt->bind_param('s', $userid);
                                         $stmt->execute();
                                         $result = $stmt->get_result();
                                       
                                         while ($row = $result->fetch_assoc())
                                         {
                                             //$studid[] = $row['studentID'];
                                             echo '<tr>
                                                     <td>'.$studid = $row['studentID']. '</td>
                                                     <td>'.$row['studName'].'</td>
                                                     <td>'.$row['className'].'</td>
                                                     <td>'.$row['staffID'].'</td>
                                                 </tr>';
                                         }
                                       
                                         if($stmt = $conn->prepare("SELECT studentID, studName, studContcNo, hrID, recoAnswer FROM student")) 
                                         {
                                             $stmt -> execute();
                                             $stmt -> bind_result($studid, $studname, $studno, $studhr, $studanswer);
                                             while($stmt->fetch()) 
                                             {
                                                 echo '<tr>
                                                         <td>' . $studid . '</td>
                                                         <td>' . $studname . '</td>
                                                         <td>' . $studno . '</td>
                                                         <td>' . $studhr . '</td>
                                                         <td>' . $studanswer . '</td>
                                                         <td>
                                                             <form method="post" action="teacher_studList.php">
                                                                 
                                                                 <input type="hidden" name="studentID" value='.$studid.'></input>
                                                                 
                                                                 <a href="teacher_studProfilePage.php?userid='.$userid.'&studid='.$studid.'" class="btn btn-primary">Details</a>
                                       
                                                                 <button class="btn btn-danger" name="del" onclick="document.submit();">Delete</button>
                                                                 
                                                                 <a href="MDFormPage.php?userid='.$userid.'&studid='.$studid.'" class="btn btn-success">Merit / Demerit</a>
                                                             </form>
                                                         </td>
                                                     </tr>';
                                             }
                                               $stmt->close();
                                               $conn->close();
                                         }*/
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
                                             <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contact No.</label>
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
                                                   <option value="0">What is your father ic number?</option>
                                                   <option value="1">Where is your birth place?</option>
                                                   <option value="2">What is your mother ic number?</option>
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
                                                <select name="hrid" class="form-control">
                                                   <option>--- Teacher Names ---</option>
                                                   <option value="0">Nur Maisarah Bt Abdul Ghani (ASP.Net)</option>
                                                   <option value="1">Hazirah Bt Mohd Shabri (CakePHP)</option>
                                                   <option value="2">Hapsah binti Jusoh (Elixir)</option>
                                                   <option value="3">Mahmod bin Ali (Fortran)</option>
                                                   <option value="4">Azlina binti Anuar (Java)</option>
                                                   <option value="5">Shamsul bin Husin (Visual)</option>
                                                   <option value="6">Zubir bin Mohd (Json)</option>
                                                   <option value="7">Aminah binti Zakaria (Modula)</option>
                                                   <option value="8">Maimunah binti Mahadi (Perl)</option>
                                                   <option value="9">Syukri Yahya bin Kasim (Python)</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary" name="addstudent" id="addstudent">Add New Student</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--end of modal page-->         
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
      <!-- bootstrap-daterangepicker -->
      <script src="../vendors/moment/min/moment.min.js"></script>
      <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
      <!-- bootstrap-datetimepicker -->    
      <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
      <!-- Initialize datetimepicker -->
      <script>
         $('#myDatepicker').datetimepicker();
      </script>
      <script>
         $('#myDatepicker2').datetimepicker();
      </script>
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
      <!-- bootstrap-datetimepicker -->    
      <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
      <!-- Custom Theme Scripts -->
      <script src="../build/js/custom.min.js"></script>
      <script>
          $(function()
          {
            $('#groups').on('change', function(){
                var val = $(this).val();
                var sub = $('#sub_groups');
                $('option', sub).filter(function(){
                    if (
                         $(this).attr('data-group') === val 
                      || $(this).attr('data-group') === 'SHOW'
                    ) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            $('#groups').trigger('change');
        });
      </script>
   </body>
</html>