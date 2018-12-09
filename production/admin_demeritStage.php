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

// add new
if (isset($_POST['add']))
{
    $userid = $_GET['userid'];
    $cpoint = $_POST['cPoint'];
    $desc = $_POST['desc'];

    $stmt = $conn->prepare("INSERT INTO `stage` (currentPoint, description) VALUES(?,?)");
    $stmt->bind_param('ss', $cpoint, $desc);
    $stmt->execute();
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Add New Demerit Stage !'),location.href='admin_demeritStagePage.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to Add New Demerit Stage !')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
};

//update demerit stage
if (isset($_POST['update']))
{
    $userid = $_GET['userid'];
    $stage = $_GET['stageid'];
    
	$stmt1 = $conn->prepare("UPDATE stage SET currentPoint=?, description=? WHERE stageID=?");
    $stmt1->bind_param('sss', $_POST['currentPoint'], $_POST['description'], $stage);
    $stmt1->execute();
    
    if($stmt1->execute())
    {
        print "<script type=\"text/javascript\">";
        print "alert('Record Update Successful'),location.href='admin_demeritStagePage.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Error Updating Record !')";
        print "</script>";
    }
    $stmt1->close();
    $conn->close();
};

//delete teacher
if (isset($_POST['del']))
{
    $stage = $_GET['stageid'];
    
    $stmt2 = $conn->prepare("DELETE FROM stage WHERE stageID = ?");
    $stmt2->bind_param('s', $stage);
    $stmt2->execute();
    
    if($stmt2)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='admin_demeritStagePage.php?userid=$userid'";
        echo "</script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Could not delete data !')";
        echo "</script>";
    }
    $stmt2->close();
    $conn->close();
}
?>