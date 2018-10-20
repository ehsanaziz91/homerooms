<?php
include('../Connections/connection.php');

if(isset($_POST['login']))
{
    $userid = $_POST['userid'];
    $password = $_POST['pass']; //encrypt pass
    $stmt = $conn->prepare("SELECT staffID, password FROM staff WHERE staffID=? AND  password=? LIMIT 1");
    $stmt->bind_param('ss', $userid, $password);
    $stmt->execute();
    $stmt->bind_result($userid, $password);
    $stmt->store_result();
    
    if($stmt->num_rows == 1)  //To check if the row exists
    {
        while($stmt->fetch()) //fetching the contents of the row
        {
            session_start();
            $_SESSION['Logged'] = 1;
            $_SESSION['userid'] = $userid;
            header("Location: ../production/index.php?userid=$userid");
            //<script>$("#").load("Location: ../production/index.php?userid=$userid")</script>
            //echo 'Success!';
            exit();
        }

    }
    else 
    {
        //echo "Invalid user id / password!";
        //echo ("Invalid user id / password!". $stmt->error."<br>");
        print "<script type=\"text/javascript\">";
        print "alert('Invalid User ID / Password. Please Try Again !'),location.href='loginPage.php'";
        print "</script>";
        
    }
    $stmt->close();
}
else 
{   

}
$conn->close();
?>