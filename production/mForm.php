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
    $stmt = $conn->prepare("SELECT * FROM merit WHERE categoryID = ".$_POST['categoryID']." ");
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0){
        echo '<option value="">Select Merit</option>';
        while($row = $result->fetch_assoc()){ 
            echo '<option value="'.$row['meritID'].'">'.$row['meritName'].'</option>';
        }
    }else{
        echo '<option value="">Category not available</option>';
    }
};

if (isset($_POST['addmerit']))
{
    //$userid = $_GET['userid'];
    $studid = $_POST['studid'];
    $category = $_POST['category'];
    $merit = $_POST['merit'];
    $date = $_POST['date'];
    
    $stmt1 = $conn->prepare("SELECT * FROM category WHERE categoryID = ? ");
    $stmt1->bind_param('s',$category);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
    
    $catid = $row1["categoryID"];
    //$catType = $row1["categoryType"];
    
    $stmt2 = $conn->prepare("SELECT meritID, meritName, meritPoint FROM merit WHERE meritID = ? ");
    $stmt2->bind_param('s',$merit);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();
    
    $meritid = $row2['meritID'];
    $mName = $row2["meritName"];
    $mPoint = $row2["meritPoint"];
    
    $stmt = $conn->prepare("INSERT INTO `record`(`studID`, `meritID`, `meritName`, `meritPoint`, `date`) VALUES (?,?,?,?,?)");
    $stmt->bind_param('sssss', $studid, $meritid, $mName, $mPoint, $date);
    $stmt->execute();
    
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Added Merit !'),location.href='teacher_studListPage.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to add merit !')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
}
?>