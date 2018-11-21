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

if(!empty($_POST["categoryCode"])){
    //$query = $db->query("SELECT * FROM states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY state_name ASC");
    $stmt = $conn->prepare("SELECT * FROM merit WHERE categoryCode = ".$_POST['categoryCode']." ");
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows>0){
        echo '<option value="">Select Merit</option>';
        while($row = $result->fetch_assoc()){ 
            echo '<option value="'.$row['meritCode'].'">'.$row['meritName'].'</option>';
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

    $stmt = $conn->prepare("INSERT INTO `record` (studentID, meritName, date, categoryType) VALUES(?,?,?,?)");
    $stmt->bind_param('ssss', $studid, $merit, $date, $category);
    $stmt->execute();
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Added Merit !'),location.href='teacher_studListPageTest.php?userid=$userid'";
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