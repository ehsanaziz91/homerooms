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

if (isset($_POST['addstudent']))
{
    //$userid = $_GET['userid'];
    $studid = $_POST['studid'];
    $studname = $_POST['studname'];
    $studadd = $_POST['studadd'];
    $studno = $_POST['contc'];
    $parent = $_POST['parent'];
    $pass = $_POST['password'];
    $questions = $_POST['question'];
    $answers = $_POST['answer'];
    $hrname = $_POST['hrname'];

    $stmt = $conn->prepare("INSERT INTO `student` (studentID, studName, studAddress, studContcNo, parentName, password, recoQuestion, recoAnswer, hrName) VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssssss', $studid, $studname, $studadd, $studno, $parent, $pass, $questions, $answers, $hrname);
    $stmt->execute();
	//header('location:teacher_studListPage.php');
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Registered New Student!'),location.href='teacher_studListPage.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to register new Student!')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();
};

if (isset($_POST['details']))
{
    $studid = $_POST['studentID'];
    
    $stmt = $conn->prepare("SELECT studentID FROM student WHERE studentID = ?");
    $stmt->bind_param('s', $studid);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('View data successfully'),location.href='teacher_studProfilePage.php?userid=$userid&studid=$studid'";
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

//delete student
/*if (isset($_POST['del']))
{
    $userid = $_GET['studentID'];
    
    $stmt = $conn->prepare("DELETE FROM `student` WHERE studentID = ?");
    $stmt->bind_param('s', $userid);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('Deleted data successfully'),location.href='teacher_studListPage.php'";
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
}*/

if (isset($_POST['addmerit']))
{
    //$userid = $_GET['userid'];
    //$studid = $_POST['studid'];
    $category = $_POST['category'];
    $merit = $_POST['merit'];
    
    echo $category;
    echo $merit;
    
    //SELECT * FROM `merit` WHERE meritName = "Ketua Pengawas/Pusat Sumber/Koperasi/PRS"
        
        
        

/*    $stmt = $conn->prepare("INSERT INTO `record` (studentID, studName, studAddress, studContcNo, parentName, password, recoQuestion, recoAnswer, hrName) VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssssss', $studid, $studname, $studadd, $studno, $parent, $pass, $questions, $answers, $hrname);
    $stmt->execute();
	//header('location:teacher_studListPage.php');
    if($stmt)
    {
        print "<script type=\"text/javascript\">";
        print "alert('Successfully Registered New Student!'),location.href='teacher_studListPage.php?userid=$userid'";
        print "</script>";
    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Failure to register new Student!')";
        print "</script>";
    }
    $stmt->close();
    $conn->close();*/
}

?>

<!--<?php
/*include('../Connections/connection.php');
session_start();

if (isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
}else
{
    header ('location:../production/loginPage.php');
};

if (isset($_POST['details']))
{
    $studid = $_POST['studentID'];
    
    $stmt = $conn->prepare("SELECT studentID FROM student WHERE studentID = ?");
    $stmt->bind_param('s', $studid);
    $stmt->execute();
    
    if($stmt)
    {
        echo "<script type=\"text/javascript\">";
        echo "alert('View data successfully'),location.href='teacher_studProfilePage.php?userid=$userid&studid=$studid'";
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
}*/
?>-->