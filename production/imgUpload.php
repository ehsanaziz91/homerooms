<?php
include('../Connections/connection.php');

if(isset($_POST["upload"]))
{
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== NULL)
    {
        $userid = $_POST['userid'];
        echo $userid;
        
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        
        $stmt = $conn->prepare("UPDATE staff SET img=? WHERE staffID=?");
        $stmt->bind_param('bs', $imgContent, $userid);
        $stmt->execute();
        
/*        $stmt = $conn->prepare("INSERT INTO `staff` (img) VALUES(?) WHERE staffID= ? ");
        $stmt->bind_param('bs', $imgContent, $userid);
        $stmt->execute();*/

        if ($stmt)
        {
            print "<script type=\"text/javascript\">";
            print "alert('Image uploaded successfully !'),location.href='testing.php?userid=$userid'";
            print "</script>";
        }
        else
        {
            print "<script type=\"text/javascript\">";
            print "alert('Image upload failed, please try again !')";
            print "</script>";
        }
        $stmt->close();
        $conn->close();

    }
    else
    {
        print "<script type=\"text/javascript\">";
        print "alert('Please select an image file to upload !')";
        print "</script>";
    }
}
?>

<?php
      include "include/connection.php";

if(isset($_POST['btn-update']))
{
    extract($_POST);
$name1=$_FILES['att_user_photo']['name'];
$size=$_FILES['att_user_photo']['size'];
$type=$_FILES['att_user_photo']['type'];

$temp=$_FILES['att_user_photo']['tmp_name'];

if($name1)
        {
                    $upload_dir = 'images/';
                    $imgExt = strtolower(pathinfo($name1,PATHINFO_EXTENSION)); // get image extension
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    $att_user_photo = rand(1000,1000000).".".$imgExt;
                    unlink($upload_dir.$row['att_user_photo']);
                    move_uploaded_file($temp,$upload_dir.$att_user_photo);
        }
        else
        {

                    $att_user_photo=$row['att_user_photo'];            
        }



$upquery= 'update  att_add_user set 
                         
      att_user_name="'.$_POST['att_user_name'].'" ,
      att_user_gender="'.$_POST['att_user_gender'].'",
      att_user_mobileno="'.$_POST['att_user_mobileno'].'" ,
      att_user_address="'.$_POST['att_user_address'].'" ,
      att_user_photo="'.$att_user_photo.'",
      att_user_dob="'.$_POST['att_user_dob'].'" ,
      att_user_jd="'.$_POST['att_user_jd'].'" ,
      att_user_ld="'.$_POST['att_user_ld'].'" ,
      att_user_post="'.$_POST['att_user_post'].'" ,
      att_user_department="'.$_POST['att_user_department'].'" ,
      att_user_fe="'.$_POST['att_user_fe'].'" ,
      att_user_se="'.$_POST['att_user_se'].'" ,
      att_user_te="'.$_POST['att_user_te'].'" ,
      att_user_be="'.$_POST['att_user_be'].'" ,                           
      att_user_email="'.$_POST['att_user_email'].'" ,
      att_user_password="'.$_POST['att_user_password'].'" ,
      att_user_cpassword="'.$_POST['att_user_cpassword'].'" 



      where att_user_id="'.$_GET['att_user_id'].'" ' ;
      $upresult = mysqli_query($con,$upquery); 
      if($upresult)
      {
         echo '<script type="text/javascript">';
         echo " alert('User Data Updated Successfully!');";
         echo 'window.location.href = "userinformation.php";'; 
         echo '</script>';

      }
     else
     {
           die(mysqli_error($con));
           //echo $cQry;

     }
    


}

?>