<?php
include('../Connections/connection.php');

if (isset($_POST['submit']))
{
    $newpass = md5($_POST["newpass"]);
    $confrmpass = md5($_POST["confrmpass"]);
    $userid = $_POST["userid"];

    if($newpass != $confrmpass)
    {
        print "<script type=\"text/javascript\">";
        print "alert('The new passwords must match and must not be empty.')";
        print "</script>";
    }

    else 
    {
        $stmt = $conn->prepare("UPDATE staff SET password = ? WHERE staffID = ?");
        $stmt->bind_param('ss',$confrmpass, $userid);
        $stmt->execute();
        if($stmt)
        {
            print "<script type=\"text/javascript\">";
            print "alert('Update Successful !'),location.href='loginPage.php'";
            print "</script>";

        }
        $stmt->close();
        $conn->close();
    }
}
?>