<?php
include('../Connections/connection.php');

if (isset($_POST['update']))
{
    $userid = $_POST['userid'];
/*    $staffname = $_POST['staffName'];
    $num = $_POST['phoneNo'];
    $email = $_POST['email'];
    $question = $_POST['recoQuestion'];
    $answer = $_POST['recoAnswer'];
    
	$stmt = $conn->prepare("UPDATE staff SET staffName=?, phoneNo=?, email=?, recoQuestion=?, recoAnswer=? WHERE staffID=?");
    $stmt->bind_param('ssssss', $staffname, $num, $email, $question, $answer, $userid);
    $stmt->execute();*/
    
    
	$stmt = $conn->prepare("UPDATE staff SET staffName=?, phoneNo=?, email=?, recoQuestion=?, recoAnswer=? WHERE staffID=?");
    $stmt->bind_param('ssssss', $_POST['staffName'], $_POST['phoneNo'], $_POST['email'], $_POST['recoQuestion'], $_POST['recoAnswer'], $_POST['userid']);
    $stmt->execute();
    
    if($stmt->execute())
    {
        print "<script type=\"text/javascript\">";
        print "alert('Record Update Successful'),location.href='admin_profilePage.php?userid=$userid'";
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
};

if(isset($_POST['upload']))
{		
    echo $userid = $_POST['userid'];
    echo $product_image = $_FILES['image']['name'];
    echo $product_image_tmp = $_FILES['image']['tmp_name'];
    
    $stmt1 = $conn->prepare("UPDATE staff SET img=? WHERE staffID=?");
    $stmt1->bind_param('bs', $product_image, $userid);
    $stmt1->execute();
    
    if($stmt1->execute())
    {
        move_uploaded_file($product_image_tmp,"homerooms/production/images/$product_image");
        print "<script type=\"text/javascript\">";
        print "alert('Record Update Successful'),location.href='admin_profilePage.php?userid=$userid'";
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
