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

//delete student
if (isset($_POST['del']))
{
    $studID = $_REQUEST['studID'];
    $userid = $_REQUEST['userid'];
    
    $stmt = $conn->prepare("DELETE FROM student WHERE studID = ?");
    $stmt->bind_param('s', $studID);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='admin_studListPage.php?userid=$userid'";
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
};

//delete record
if (isset($_POST['delrecord']))
{
    $recordid = $_GET['recordid'];
    $userid = $_GET['userid'];
    
    $stmt = $conn->prepare("DELETE FROM record WHERE recordID  = ?");
    $stmt->bind_param('s', $recordid);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='admin_studProfilePage.php?userid=$userid'";
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