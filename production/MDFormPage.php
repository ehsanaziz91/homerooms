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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Merit Form</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" action="MDForm.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <?php 
                        
                        $studid = $_GET["studid"];  
                                       
                        $stmt2 = $conn->prepare("SELECT studentID, studName, studContcNo FROM student WHERE studentID = ?");
                        $stmt2->bind_param("s", $studid);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        $row2 = $result2->fetch_assoc();
                        $studentID = $row2["studentID"];  
                        $studName =  $row2["studName"];
                        $studContcNo =  $row2 ["studContcNo"];
                            
                        ?>    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="studid" name="studid" class="form-control col-md-7 col-xs-12" value=" <?php echo $studid; ?> " readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            include('../Connections/connection.php');

                            $stmt = $conn->prepare("SELECT * FROM category WHERE categoryStage = 'Good'");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            ?>
                            <select id="catM" name="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){ 
                                        echo '<option value="'.$row['categoryCode'].'">'.$row['categoryType'].'</option>';
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
                            <div class='input-group date' id='myDatepicker'>
                               <input type='text' name="date" class="form-control" />
                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="hidden" name="studName" value="<?php echo $studName ?>">
                          <input type="hidden" name="studContcNo" value="<?php echo $studContcNo ?>">
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Demerit</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date' id='myDatepicker2'>
                               <input type='text' name="date" class="form-control" />
                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button class="btn btn-primary" type="button">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Merit Form</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Merit</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                         <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date' id='myDatepicker'>
                               <input type='text' class="form-control" />
                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Demerit Form</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Demerit</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control">
                            <option>Choose option</option>
                            <option>Option one</option>
                            <option>Option two</option>
                            <option>Option three</option>
                            <option>Option four</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                         <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date' id='myDatepicker'>
                               <input type='text' class="form-control" />
                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                               </span>
                            </div>
                         </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-primary">Cancel</button>
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
     $('#myDatepicker').datetimepicker();
    </script>
    <script>
     $('#myDatepicker2').datetimepicker();
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
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
      
    <script type="text/javascript">
    $(document).ready(function(){
        $('#catM').on('change',function(){
            var catID = $(this).val();
            if(catID){
                $.ajax({
                    type:'POST',
                    url:'MDForm.php',
                    data:'categoryCode='+catID,
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
                    url:'MDForm.php',
                    data:'meritCode='+meritID,
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
