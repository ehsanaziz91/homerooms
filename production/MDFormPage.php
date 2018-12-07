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
	  
    <title>HMDS Merit Demerit Form</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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
                        <span>Teacher</span>
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
                  <li><a href="#"><i class="fa fa-users"></i>Teacher<span class="fa fa-chevron-down"></span></a>
                       
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="loginPage.php">
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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Merit Form</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" action="mForm.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <?php 
                        
                        $studentID = $_GET["studid"];  
                                       
                        $stmt2 = $conn->prepare("SELECT studID, studName FROM student WHERE studentID = ?");
                        $stmt2->bind_param("s", $studentID);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        $row2 = $result2->fetch_assoc();
                        $studID = $row2["studID"];  
                        $studName =  $row2["studName"];
                            
                        ?>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="studentid" class="form-control col-md-7 col-xs-12" value="<?php echo $studentID ; ?>" readonly>
                          <input type="hidden" name="studid" value="<?php echo $studID ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            
                            $status = "1";

                            $stmt = $conn->prepare("SELECT * FROM category WHERE status = ?");
                            $stmt->bind_param('s',$status);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            ?>
                            <select id="catM" name="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){ 
                                        echo '<option value="'.$row['categoryID'].'">'.$row['categoryType'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Category not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Merit</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="merit" name="merit" class="form-control">
                            <option value="">Select Merit</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date'>
                               <input type='date' name="date" class="form-control" />
<!--                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>-->
                            </div>
                         </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="studName" value="<?php echo $studName ?>">
                          <button type="submit" class="btn btn-success" name="addmerit">Submit</button>
                          <button class="btn btn-primary" type="button">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Demerit Form</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" action="dForm.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="studentid" class="form-control col-md-7 col-xs-12" value="<?php echo $studentID; ?>" readonly>
                          <input type="hidden" name="studid" value="<?php echo $studID ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            include('../Connections/connection.php');
                            
                            $status = "2";

                            $stmt = $conn->prepare("SELECT * FROM category WHERE status = ?");
                            $stmt->bind_param('s',$status);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            ?>
                            <select id="catD" name="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){ 
                                        echo '<option value="'.$row['categoryID'].'">'.$row['categoryType'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Category not available</option>';
                                }
                                ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Demerit</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="demerit" name="demerit" class="form-control">
                            <option value="">Select Demerit</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date'>
                               <input type='date' name="date" class="form-control" />
<!--                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>-->
                            </div>
                         </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="adddemerit">Submit</button>
                          <button class="btn btn-primary" type="button">Cancel</button>
                        </div>
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Initialize datetimepicker -->
    <script>
     //$('#myDatepicker').datetimepicker();
        $('#myDatepicker').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    </script>
    <script>
     $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    </script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
      
    <script type="text/javascript">
    $(document).ready(function(){
        $('#catM').on('change',function(){
            var catID = $(this).val();
            if(catID){
                $.ajax({
                    type:'POST',
                    url:'mForm.php',
                    data:'categoryID='+catID,
                    success:function(html){
                        $('#merit').html(html);
                    }
                }); 
            }else{
                $('#merit').html('<option value="">Select Category first</option>');
            }
        });

        $('#merit').on('change',function(){
            var meritID = $(this).val();
            if(meritID){
                $.ajax({
                    type:'POST',
                    url:'mForm.php',
                    data:'meritID='+meritID,
                    success:function(html){
                        //$('#city').html(html);
                    }
                }); 
            }
        });
    });
    </script>
    
    <script type="text/javascript">
    $(document).ready(function(){
        $('#catD').on('change',function(){
            var cateID = $(this).val();
            if(cateID){
                $.ajax({
                    type:'POST',
                    url:'dForm.php',
                    data:'categoryID='+cateID,
                    success:function(html){
                        $('#demerit').html(html);
                    }
                }); 
            }else{
                $('#demerit').html('<option value="">Select Category first</option>');
            }
        });

        $('#demerit').on('change',function(){
            var demeritID = $(this).val();
            if(demeritID){
                $.ajax({
                    type:'POST',
                    url:'dForm.php',
                    data:'demeritID='+demeritID,
                    success:function(html){
                        //$('#city').html(html);
                    }
                }); 
            }
        });
    });
    </script>
	
  </body>
</html>
