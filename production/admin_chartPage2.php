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

    <title>HMDS Analysis</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

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
                    <li><a href="demerit_stage.php?userid=<?php echo $userid; ?>"><i class="fa fa-line-chart"></i>Demerit Class</a></li>
                    <li><a href="merit_schedule.php?userid=<?php echo $userid; ?>"><i class="fa fa-pencil-square-o"></i>Merit & Demerit Scheme</a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Users</h3>
                <ul class="nav side-menu">
                    <li><a href="admin_viewTeachersPage.php?userid=<?php echo $userid; ?>"><i class="fa fa-user"></i>Teachers</a></li>
                    <li><a href="demerit_stage.php?userid=<?php echo $userid; ?>"><i class="fa fa-users"></i>Students</a></li>
                </ul>
              </div>
<!--              <div class="menu_section">
                <h3>Users</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-users"></i>Admin<span class="fa fa-chevron-down"></span></a>
                       <ul class="nav child_menu">
                       <li><a href="MDFormPageAdmin.php?userid=<?php //echo $userid; ?>">Merit & Demerit</a></li>
                      <li><a href="demerit_stage.php?userid=<?php //echo $userid; ?>">Demerit Stage</a></li>
                      <li><a href="merit_schedule.php?userid=<?php //echo $userid; ?>">Merit & Demerit Schedule</a></li>
                      <li><a href="#">Assign Students</a></li> kalau sempat, buat form utk assign student
                      </ul>
                  </li>
                </ul>
              </div>-->
              <div class="menu_section">
                <h3>Report</h3>
                <ul class="nav side-menu">
                  <li><a href="admin_chartPage.php?<?php echo $userid; ?>"><i class="fa fa-edit"></i>Record Analysis</a></li>
                  <li><a href="admin_chartPage2.php?<?php echo $userid; ?>"><i class="fa fa-edit"></i>Record Analysis 2</a></li>
                </ul>
              </div>

            </div>
            <!-- sidebar menu -->

            <!-- menu footer buttons -->
            <div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- menu footer buttons -->
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
        <!-- top navigation -->
          <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Analysis</h3>
              </div>
            </div>

        <!-- page content -->
        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Students' Analysis by Merit Demerit</h2>
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
              <div class="x_content">
                <?php

                $janm = "SELECT * FROM record WHERE MONTH(date) = 1 AND YEAR(date) = 2018  ";
                  $resultjanm = $conn->query($janm);
                  $sumjanm = 0;
                  $sumjand = 0;
                  if($resultjanm == true){
                  while($rjanm = $resultjanm->fetch_assoc()) {
                  $sumjanm = $sumjanm+$rjanm['meritPoint'];
                  $sumjand = $sumjand+$rjanm['demeritPoint'];
                }
              }

                $febm = "SELECT * FROM record WHERE MONTH(date) = 2 AND YEAR(date) = 2018  ";
                $resultfebm = $conn->query($febm);
                $sumfebm = 0;
                $sumfebd = 0;
                if($resultfebm == true){
                while($rfebm = $resultfebm->fetch_assoc()) {
                $sumfebm = $sumfebm+$rfebm['meritPoint'];
                $sumfebd = $sumfebd+$rfebm['demeritPoint'];
              }}

                $marm = "SELECT * FROM record WHERE MONTH(date) = 3 AND YEAR(date) = 2018  ";
                $resultmarm = $conn->query($marm);
                $summarm = 0;
                $summard = 0;
                if($resultmarm == true){
                while($rmarm = $resultmarm->fetch_assoc()) {
                $summarm = $summarm+$rmarm['meritPoint'];
                $summard = $summard+$rmarm['demeritPoint'];
                }
              }

                $aplm = "SELECT * FROM record WHERE MONTH(date) = 4 AND YEAR(date) = 2018  ";
                $resultaplm = $conn->query($aplm);
                $sumaplm = 0;
                $sumapld = 0;
                if($resultaplm == true){
                while($raplm = $resultaplm->fetch_assoc()) {
                $sumaplm = $sumaplm+$raplm['meritPoint'];
                $sumapld = $sumapld+$raplm['demeritPoint'];
              }}

                $maym = "SELECT * FROM record WHERE MONTH(date) = 5 AND YEAR(date) = 2018  ";
                $resultmaym = $conn->query($maym);
                $summaym = 0;
                $summayd = 0;
                if($resultmaym == true){
                while($rmaym = $resultmaym->fetch_assoc()) {
                $summaym = $summaym+$rmaym['meritPoint'];
                $summayd = $summayd+$rmaym['demeritPoint'];
              }}

                $junm = "SELECT * FROM record WHERE MONTH(date) = 6 AND YEAR(date) = 2018  ";
                $resultjunm = $conn->query($junm);
                $sumjunm = 0;
                $sumjund = 0;
                if($resultjunm == true){
                while($rjunm = $resultjunm->fetch_assoc()) {
                $sumjunm = $sumjunm+$rjunm['meritPoint'];
                $sumjund = $sumjund+$rjunm['demeritPoint'];
              }}

                $julm = "SELECT * FROM record WHERE MONTH(date) = 7 AND YEAR(date) = 2018  ";
                $resultjulm = $conn->query($julm);
                $sumjulm = 0;
                $sumjuld = 0;
                if($resultjulm == true){
                while($rjulm = $resultjulm->fetch_assoc()) {
                $sumjulm = $sumjulm+$rjulm['meritPoint'];
                $sumjuld = $sumjuld+$rjulm['demeritPoint'];
              }}

                $augm = "SELECT * FROM record WHERE MONTH(date) = 8 AND YEAR(date) = 2018  ";
                $resultaugm = $conn->query($augm);
                $sumaugm = 0;
                $sumaugd = 0;
                if($resultaugm == true){
                while($raugm = $resultaugm->fetch_assoc()) {
                $sumaugm = $sumaugm+$raugm['meritPoint'];
                $sumaugd = $sumaugd+$raugm['demeritPoint'];
              }}

                $sepm = "SELECT * FROM record WHERE MONTH(date) = 9 AND YEAR(date) = 2018  ";
                $resultsepm = $conn->query($sepm);
                $sumsepm = 0;
                $sumsepd = 0;
                if($resultsepm == true){
                while($rsepm = $resultsepm->fetch_assoc()) {
                $sumsepm = $sumsepm+$rsepm['meritPoint'];
                $sumsepd = $sumsepd+$rsepm['demeritPoint'];
              }}

                $octm = "SELECT * FROM record WHERE MONTH(date) = 10 AND YEAR(date) = 2018  ";
                $resultoctm = $conn->query($octm);
                $sumoctm = 0;
                $sumoctd = 0;
                if($resultoctm == true){
                while($roctm = $resultoctm->fetch_assoc()) {
                $sumoctm = $sumoctm+$roctm['meritPoint'];
                $sumoctd = $sumoctd+$roctm['demeritPoint'];
              }}

                $novm = "SELECT * FROM record WHERE MONTH(date) = 11 AND YEAR(date) = 2018  ";
                $resultnovm = $conn->query($novm);
                $sumnovm = 0;
                $sumnovd = 0;
                if($resultnovm == true){
                while($rnovm = $resultnovm->fetch_assoc()) {
                $sumnovm = $sumnovm+$rnovm['meritPoint'];
                $sumnovd = $sumnovd+$rnovm['demeritPoint'];
              }}

                $decm = "SELECT * FROM record WHERE MONTH(date) = 12 AND YEAR(date) = 2018  ";
                $resultdecm = $conn->query($decm);
                $sumdecm = 0;
                $sumdecd = 0;
                if($resultdecm == true){
                while($rdecm = $resultdecm->fetch_assoc()) {
                $sumdecm = $sumdecm+$rdecm['meritPoint'];
                $sumdecd = $sumdecd+$rdecm['demeritPoint'];
              }}
                 ?>

                <div id="main" style="height:350px;"></div>
                <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts.min.js"></script>
                <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-gl/echarts-gl.min.js"></script>
                <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"></script>
                <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
                <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
                <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
                <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
                <script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/simplex.js"></script>
                <script>
          // based on prepared DOM, initialize echarts instance
          var myChart = echarts.init(document.getElementById('main'));

          // specify chart configuration item and data
          var option = {
  title : {
      text: 'All Student Merit',
  },
  tooltip : {
      trigger: 'axis'
  },
  legend: {
      data:['Merit','Demerit']
  },
  toolbox: {
      show : true,
      feature : {
          dataView : {show: true, readOnly: false},
          magicType : {show: true, type: ['line', 'bar']},
          restore : {show: true},
          saveAsImage : {show: true}
      }
  },
  calculable : true,
  xAxis : [
      {
          type : 'category',
          data : ['January','Febuary','March','April','May','Juna','July','August','September','October','November','December']
      }
  ],
  yAxis : [
      {
          type : 'value'
      }
  ],
  series : [
      {
          name:'Merit',
          type:'bar',
          data:[<?php echo $sumjanm  ?>, <?php echo $sumfebm  ?>, <?php echo $summarm  ?>, <?php echo $sumaplm  ?>, <?php echo $summaym  ?>, <?php echo $sumjunm  ?>, <?php echo $sumjulm  ?>, <?php echo $sumaugm  ?>, <?php echo $sumsepm  ?>, <?php echo $sumoctm  ?>, <?php echo $sumnovm  ?>, <?php echo $sumdecm  ?>],
          markPoint : {
              data : [
                  {type : 'max', name: 'Maximum'},
                  {type : 'min', name: 'Minimum'}
              ]
          },
          markLine : {
              data : [
                  {type : 'average', name: 'Average'}
              ]
          }
      },
      {
          name:'Demerit',
          type:'bar',
          data:[<?php echo $sumjand*(-1)  ?>, <?php echo $sumfebd*(-1)  ?>, <?php echo $summard*(-1)  ?>, <?php echo $sumapld*(-1)  ?>, <?php echo $summayd*(-1)  ?>, <?php echo $sumjund*(-1)  ?>, <?php echo $sumjuld*(-1)  ?>, <?php echo $sumaugd*(-1)  ?>, <?php echo $sumsepd*(-1)  ?>, <?php echo $sumoctd*(-1)  ?>, <?php echo $sumnovd*(-1)  ?>, <?php echo $sumdecd*(-1)  ?>],
          markPoint : {
              data : [
                {type : 'max', name: 'Maximum'},
                {type : 'min', name: 'Minimum'}
              ]
          },
          markLine : {
              data : [
                  {type : 'average', name : 'Average'}
              ]
          }
      }
  ]
};


          myChart.setOption(option);
                </script>

              </div>
            </div>
          </div>


          <div class="col-md-10 col-sm-6 col-xs-12" >
            <div class="x_panel">
              <div class="x_title">
                <h2>Merit Comparison</h2>
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
              <div class="x_content">
                <?php


                $merit1 = "SELECT * FROM record WHERE categoryID = 14  ";
                $resultmerit1 = $conn->query($merit1);
                $summ1 = 0;
                if($resultmerit1 == true){
                while($rm1 = $resultmerit1->fetch_assoc()) {
                $summ1= $summ1+1;
              }}

                $merit2 = "SELECT * FROM record WHERE categoryID = 15  ";
                $resultmerit2 = $conn->query($merit2);
                $summ2 = 0;
                if($resultmerit2 == true){
                while($rm2 = $resultmerit2->fetch_assoc()) {
                $summ2 = $summ2+1;
              }}

                $merit3 = "SELECT * FROM record WHERE categoryID = 16  ";
                $resultmerit3 = $conn->query($merit3);
                $summ3 = 0;
                if($resultmerit3 == true){
                while($rm3 = $resultmerit3->fetch_assoc()) {
                $summ3 = $summ3+1;
              }}

                $merit4 = "SELECT * FROM record WHERE categoryID = 17  ";
                $resultmerit4 = $conn->query($merit4);
                $summ4 = 0;
                if($resultmerit4 == true){
                while($rm4 = $resultmerit4->fetch_assoc()) {
                $summ4 = $summ4+1;
              }}
                 ?>

                <div id="radar" style="width:900px;height:460px;"></div>
                <script type="text/javascript">
         var dom = document.getElementById("radar");
         var myChart = echarts.init(dom);
         var app = {};
         option = null;
         option = {
             title: {
                 text: 'Merit by Category'
             },
             tooltip: {},
             legend: {
                 data: ['2018', '2017']
             },
             radar: {
                 // shape: 'circle',
                 name: {
                     textStyle: {
                         color: '#fff',
                         backgroundColor: '#999',
                         borderRadius: 3,
                         padding: [3, 5]
                    }
                 },
                 indicator: [
                    { name: 'Pengawas/Pusat Sumber/Koperasi/PRS', max: 50},
                    { name: 'Unit Beruniform/Persatuan/Kelab/Rumah Sukan', max: 50},
                    { name: 'Pertandingan/Penyertaan', max: 50},
                    { name: 'Tindakan Sahsiah', max: 50},
                 ]
             },
             series: [{
                 name: '2018 vs 2017',
                 type: 'radar',
                 // areaStyle: {normal: {}},
                 data : [
                     {
                         value : [<?php echo $summ1 ?>, <?php echo $summ2 ?>, <?php echo $summ3 ?>, <?php echo $summ4 ?>],
                         name : '2018'
                     },
                      {
                         value : [5, 4, 6, 0],
                         name : '2017'
                     }
                 ]
             }]
         };;
         if (option && typeof option === "object") {
             myChart.setOption(option, true);
         }
                </script>

              </div>
            </div>
          </div>

          <div class="col-md-10 col-sm-6 col-xs-12" >
            <div class="x_panel">
              <div class="x_title">
                <h2>Demerit Comparison</h2>
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
                <div class="clearfix" ></div>
              </div>
              <div class="x_content">
                <?php


                $demerit1 = "SELECT * FROM record WHERE categoryID = 1  ";
                $resultdemerit1 = $conn->query($demerit1);
                $sumdm1 = 0;
                if($resultdemerit1 == true){
                while($rdm1 = $resultdemerit1->fetch_assoc()) {
                $sumdm1= $sumdm1+1;
              }}

              $demerit2 = "SELECT * FROM record WHERE categoryID = 2  ";
              $resultdemerit2 = $conn->query($demerit2);
              $sumdm2 = 0;
              if($resultdemerit2 == true){
              while($rdm2 = $resultdemerit2->fetch_assoc()) {
              $sumdm2= $sumdm2+1;
            }}
            $demerit3 = "SELECT * FROM record WHERE categoryID = 3  ";
            $resultdemerit3 = $conn->query($demerit3);
            $sumdm3 = 0;
            if($resultdemerit3 == true){
            while($rdm3 = $resultdemerit3->fetch_assoc()) {
            $sumdm3= $sumdm3+1;
          }}
          $demerit4 = "SELECT * FROM record WHERE categoryID = 4  ";
          $resultdemerit4 = $conn->query($demerit4);
          $sumdm4 = 0;
          if($resultdemerit4 == true){
          while($rdm4 = $resultdemerit4->fetch_assoc()) {
          $sumdm4= $sumdm4+1;
        }}
        $demerit5 = "SELECT * FROM record WHERE categoryID = 5  ";
        $resultdemerit5 = $conn->query($demerit5);
        $sumdm5 = 0;
        if($resultdemerit5 == true){
        while($rdm5 = $resultdemerit5->fetch_assoc()) {
        $sumdm5= $sumdm5+1;
      }}
      $demerit6 = "SELECT * FROM record WHERE categoryID = 6  ";
      $resultdemerit6 = $conn->query($demerit6);
      $sumdm6 = 0;
      if($resultdemerit6 == true){
      while($rdm1 = $resultdemerit6->fetch_assoc()) {
      $sumdm6= $sumdm6+1;
    }}
    $demerit7 = "SELECT * FROM record WHERE categoryID = 7  ";
    $resultdemerit7 = $conn->query($demerit7);
    $sumdm7 = 0;
    if($resultdemerit7 == true){
    while($rdm7 = $resultdemerit7->fetch_assoc()) {
    $sumdm7= $sumdm7+1;
  }}
  $demerit8 = "SELECT * FROM record WHERE categoryID = 8  ";
  $resultdemerit8 = $conn->query($demerit8);
  $sumdm8 = 0;
  if($resultdemerit8 == true){
  while($rdm8 = $resultdemerit8->fetch_assoc()) {
  $sumdm8= $sumdm8+1;
}}
$demerit9 = "SELECT * FROM record WHERE categoryID = 9  ";
$resultdemerit9 = $conn->query($demerit9);
$sumdm9 = 0;
if($resultdemerit9 == true){
while($rdm9 = $resultdemerit9->fetch_assoc()) {
$sumdm9= $sumdm9+1;
}}
$demerit10 = "SELECT * FROM record WHERE categoryID = 10  ";
$resultdemerit10 = $conn->query($demerit10);
$sumdm10 = 0;
if($resultdemerit10 == true){
while($rdm10 = $resultdemerit10->fetch_assoc()) {
$sumdm10= $sumdm10+1;
}}
$demerit11 = "SELECT * FROM record WHERE categoryID = 11  ";
$resultdemerit11 = $conn->query($demerit11);
$sumdm11 = 0;
if($resultdemerit11 == true){
while($rdm11 = $resultdemerit11->fetch_assoc()) {
$sumdm11= $sumdm11+1;
}}
$demerit12 = "SELECT * FROM record WHERE categoryID = 12  ";
$resultdemerit12 = $conn->query($demerit12);
$sumdm12 = 0;
if($resultdemerit12 == true){
while($rdm12 = $resultdemerit12->fetch_assoc()) {
$sumdm12= $sumdm12+1;
}}
$demerit13 = "SELECT * FROM record WHERE categoryID = 13  ";
$resultdemerit13 = $conn->query($demerit13);
$sumdm13 = 0;
if($resultdemerit13 == true){
while($rdm13 = $resultdemerit13->fetch_assoc()) {
$sumdm13= $sumdm13+1;
}}
                 ?>

                <div id="radar1" style="width:900px;height:460px;"></div>
                <script type="text/javascript">
          var dom = document.getElementById("radar1");
          var myChart = echarts.init(dom);
          var app = {};
          option = null;
          option = {
             title: {
                 text: 'Demerit by Category'
             },
             tooltip: {},
             legend: {
                 data: ['2018', '2017']
             },
             radar: {
                 // shape: 'circle',
                 name: {
                     textStyle: {
                         color: '#fff',
                         backgroundColor: '#999',
                         borderRadius: 3,
                         padding: [3, 5]
                    }
                 },
                 indicator: [
                    { name: 'Tingkah Laku Jenayah', max: 20},
                    { name: 'Melanggar Peraturan Peperiksaan', max: 20},
                    { name: 'Ponteng', max: 20},
                    { name: 'Tingkah Laku Mencemar Alam Sekitar', max: 20},
                    { name: 'Tingkah Laku/Tabiat Buruk', max: 20},
                    { name: 'Tingkah Laku Lucah/Tidak Senonoh', max: 20},
                    { name: 'Tingkah Laku Kekemasan Diri', max: 20},
                    { name: 'Memakai Barang Perhiasan/Menghiaskan Diri', max: 20},
                    { name: 'Bercakap semasa peperiksaan', max: 20},
                    { name: 'Membawa Barang-Barang Yang Tidak Dibenarkan', max: 20},
                    { name: 'Tingkah Laku Yang Tidak Mementingkan Masa', max: 20},
                    { name: 'Tingkah Laku Kurang Sopan', max: 20},
                    { name: 'Tingkah Laku Musnah/Anti Sosial', max: 20},
                    { name: 'Tingkah Laku Tidak Jujur/Menipu', max: 20},
                 ]
             },
             series: [{
                 name: '2018 vs 2017',
                 type: 'radar',
                 // areaStyle: {normal: {}},
                 data : [
                     {
                         value : [<?php echo $sumdm1 ?>, <?php echo $sumdm2 ?>, <?php echo $sumdm3 ?>, <?php echo $sumdm4 ?>,<?php echo $sumdm5  ?>,<?php echo $sumdm6 ?>,<?php echo $sumdm7 ?>,<?php echo $sumdm8 ?>,<?php echo $sumdm9 ?>,<?php echo $sumdm10 ?>,<?php echo $sumdm11 ?>,<?php echo $sumdm12 ?>,<?php echo $sumdm13 ?>],
                         name : '2018'
                     },
                      {
                         value : [5, 4, 6, 0, 1 , 2 , 7 , 5 , , 40 ,0 ,15],
                         name : '2017'
                     }
                 ]
             }]
          };;
          if (option && typeof option === "object") {
             myChart.setOption(option, true);
          }
                </script>

              </div>
            </div>
          </div>
 <!-- footer content -->
        <footer>
          <div class="pull-right">
            HMD System@2018/19 - WorkshopII | BITS | FTMK | UTeM
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
