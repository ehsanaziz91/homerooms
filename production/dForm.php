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

if(!empty($_POST["categoryID"])){
    $stmt = $conn->prepare("SELECT * FROM demerit WHERE categoryID = ".$_POST['categoryID']." ");
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0){
        echo '<option value="">Select Demerit</option>';
        while($row = $result->fetch_assoc()){ 
            echo '<option value="'.$row['demeritID'].'">'.$row['demeritName'].'</option>';
        }
    }else{
        echo '<option value="">Category not available</option>';
    }
};

if (isset($_POST['adddemerit']))
{
    //$userid = $_GET['userid'];
    $studid = $_POST['studid'];
    $category = $_POST['category'];
    $dmerit = $_POST['demerit'];
    $date = $_POST['date'];
    $date = date("Y-m-d",$date);
    
    $stmt1 = $conn->prepare("SELECT categoryType FROM category WHERE categoryID = ? ");
    $stmt1->bind_param('s',$category);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
    
    $catType = $row1["categoryType"];
    
    
    $stmt2 = $conn->prepare("SELECT demeritName, demeritPoint FROM demerit WHERE categoryID = ? ");
    $stmt2->bind_param('s',$category);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();
    
    $dName = $row2["demeritName"];
    $dPoint = $row2["demeritPoint"];
    
    $stmt = $conn->prepare("INSERT INTO `record` (studentID, demeritName, demeritPoint, date, categoryType) VALUES(?,?,?,?,?)");
    $stmt->bind_param('sssss', $studid, $dName, $dPoint, $date, $catType);
    $stmt->execute();
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Added Demerit !'),location.href='teacher_studListPageTest.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to add demerit !')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
}
?>