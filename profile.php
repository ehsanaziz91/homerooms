<?php
include('../Connections/connection.php');
session_start();

if (isset($_GET['userid']))
{
    $userid = $_GET['staffID'];
    
	$stmt = $conn->prepare("UPDATE staff SET staffName=?, phoneNo=?, email=?, recoQuestion=?, recoAnswer=? WHERE staffID=?");
    $stmt->bind_param('ssssss', $_POST['staffName'], $_POST['phoneNo'], $_POST['email'], $_POST['recoQuestion'], $_POST['recoAnswer'], $_POST['staffID']);
    $stmt->execute();
    if($stmt->execute())
    {
        print "<script type=\"text/javascript\">";
        print "alert('Record Update Successful'),location.href='teacher_profilePage.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Error Updating Record !')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
}

?>