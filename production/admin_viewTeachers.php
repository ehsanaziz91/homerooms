<?php
include('../Connections/connection.php');
session_start();

if (isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
}else
{
    header ('location:../production/loginPage.php');
};

//delete teacher
if (isset($_POST['del']))
{
    $userID = $_GET['userID'];
    
    $stmt = $conn->prepare("DELETE FROM staff LEFT JOIN homeroom ON staff.staffID = homeroom.staffID WHERE staffID = ?");
    $stmt->bind_param('s', $userID);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='admin_viewTeachersPage.php?userid=$userid'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Could not delete data !')";
        echo "</script>";
    }
    $stmt->close();
    $conn->close();
}
?>