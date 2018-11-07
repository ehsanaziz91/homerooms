<?php
	include('connection.php');

	if (isset($_POST['submit'])) {
   	$matricno = $_POST["matric_no"];
   	$pwd = $_POST["password"];

   	$login = pg_query($connection, "SELECT * FROM tbl_student WHERE matric_no = '$matricno' AND password = '$pwd'");
   	$row_array = pg_fetch_assoc($login);
		$row = pg_num_rows($login);

		if($row){
   	if (pg_num_rows($login) > 0){
			if ($row_array['course_id'] == 'BITD'){
	      if ($row_array['position'] == 'president'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As President BITD");';
	         echo 'window.location.href="../presidentbitd/dashboard.php"';
	         echo '</script>';
	      }

	      else if ($row_array['position'] == 'student'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As Student BITD");';
	         echo 'window.location.href="../studentbitd/dashboard.php"';
	         echo '</script>';
	      }
	      else{
	      echo 'Username or Password is invalid';
	      }
			}else if ($row_array['course_id'] == 'BITS'){
				if ($row_array['position'] == 'president'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As President BITS");';
	         echo 'window.location.href="../presidentbits/dashboard.php"';
	         echo '</script>';
	      }

	      else if ($row_array['position'] == 'student'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As Student BITS");';
	         echo 'window.location.href="../studentbits/dashboard.php"';
	         echo '</script>';
	      }
	      else{
	      echo 'Username or Password is invalid';
	      }
			}
   	}else{
      echo'<script language="javascript">';
      echo 'alert("Please Insert Value");';
      echo 'window.location.href="../public/index.php";';
      echo '</script>';
   	}
	}else{
		$logon = pg_query($connection, "SELECT * FROM tbl_staff WHERE staff_id = '$matricno' AND password = '$pwd'");
   	$row_arrays = pg_fetch_assoc($logon);

		if (pg_num_rows($logon) > 0){
			if ($row_arrays['club_id'] == 'BITD'){
	      if ($row_arrays['position'] == 'advisor'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As Advisor BITD");';
	         echo 'window.location.href="../advisorbitd/dashboard.php"';
	         echo '</script>';
	      }

	      else if ($row_arrays['position'] == 'topmanagement'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As Top Management");';
	         echo 'window.location.href="../topmanagement/dashboard.php"';
	         echo '</script>';
	      }
	      else{
	      echo 'Username or Password is invalid';
	      }
			}else if ($row_arrays['club_id'] == 'BITS'){
				if ($row_arrays['position'] == 'advisor'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As Advisor BITS");';
	         echo 'window.location.href="../advisorbits/dashboard.php"';
	         echo '</script>';
	      }

	      else if ($row_arrays['position'] == 'topmanagement'){
	         session_start();
	         $_SESSION['userid'] = $matricno;
	         session_write_close();
	         echo'<script language="javascript">';
	         echo 'alert("Login Success As Top Management");';
	         echo 'window.location.href="../topmanagement/dashboard.php"';
	         echo '</script>';
	      }
	      else{
	      echo 'Username or Password is invalid';
	      }
			}
   	}else{
      echo'<script language="javascript">';
      echo 'alert("Please Try Again");';
      echo 'window.location.href="../public/index.php";';
      echo '</script>';
   	}
	}
      pg_close($connection);
   	}

?>

<?php

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    if ($username!='' && $password!='')

    {
        include ('db_connect.php');
        $query = ("SELECT * FROM planner WHERE username ='$username' and password ='$password'"); 

        $result = mysqli_query($conn,$query);

        $row = mysqli_fetch_row($result);


        if ($row)
        {
            session_start();

            $_SESSION['log_id'] = true;
            $_SESSION['planner']="planner";
            $_SESSION['username']= $username;

            mysqli_close($conn);

            echo '<script language =  "javascript">';
            echo 'alert ("Successful Login To Planner");';
            echo 'window.location.href = "customer_booking.php?username=$username"';
            echo '</script>';

            /echo "<script>window.location.href='customer_booking.php?username=$username';</script>";/
        } 

        else
        {
            include ('db_connect.php');

            $bot = mysqli_query($conn, "SELECT * FROM staff WHERE username ='$username' and password ='$password'"); 

            $table = mysqli_fetch_assoc($bot);

            /$lies = mysqli_fetch_row($table);/

            /if ($lies  1)/
            /{/
                if ($table['staff_role'] == 'admin') {

                    session_start();
                    /*$_SESSION['log_id'] = true;
                    $_SESSION['user']="admin";*/
                    $_SESSION['username']=$username;
                    /session_write_close();/
                    mysqli_close($conn);

                    echo "<script>window.location.href='admin/index.php?username=$username';</script>";

                }

                else if ($table['staff_role'] == 'staff') {

                    session_start();
                    $_SESSION['log_id'] = true;
                    $_SESSION['user']="staff";

                    $_SESSION['username']=$username;
                    session_write_close();
                    mysqli_close($conn);


                    echo "<script>window.location.href='staff/index.php?username=$username';</script>";

                    /echo "<script>window.location.href='admin/index.php';</script>";/
                }	
            /*} else {
                echo "<script>window.location.href='customer_booking.php';</script>";
            } */
        }

    }
    else{
        echo '<script language =  "javascript">';
        echo 'alert ("Wrong input");';
        echo 'window.location.href = "index.php"';
        echo '</script>';
    }

}


?>