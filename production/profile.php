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

<?php
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        require_once "db.php";
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        
        $sql = "INSERT INTO output_images(imageType ,imageData)
	VALUES('{$imageProperties['mime']}', '{$imgData}')";
        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        if (isset($current_id)) {
            header("Location: listImages.php");
        }
    }
}
?>

<?php
/* Upload an image to mysql database.*/

// Check for post data.
if ($_POST && !empty($_FILES)) 
{
    $formOk = true;

    //Assign Variables
    $path = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];

    if ($_FILES['image']['error'] || !is_uploaded_file($path)) 
    {
        $formOk = false;
        echo "Error: Error in uploading file. Please try again.";
    }

    //check file extension
     if ($formOk && !in_array($type, array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif'))) {
     $formOk = false;
     echo "Error: Unsupported file extension. Supported extensions are JPG / PNG.";
     }
     // check for file size.
     if ($formOk && filesize($path) > 500000) {
     $formOk = false;
     echo "Error: File size must be less than 500 KB.";
     }

    if ($formOk) {
     // read file contents
     $content = file_get_contents($path);

    //connect to mysql database
     if ($conn = mysqli_connect('localhost', 'root', '', 'imageupload')) {
     $content = mysqli_real_escape_string($conn, $content);
     $sql = "insert into images (name, size, type, content) values ('{$name}', '{$size}', '{$type}', '{$content}')";

    if (mysqli_query($conn, $sql)) {
     $uploadOk = true;
     $imageId = mysqli_insert_id($conn);
     echo "image is successfully uploaded";
     } else {
     echo "Error: Could not save the data to mysql database. Please try again.";
     }

    mysqli_close($conn);
     }

     else {
     echo "Error: Could not connect to mysql database. Please try again."; }
     }
}
?>