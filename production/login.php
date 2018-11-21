<?php
include('../Connections/connection.php');

if(isset($_POST['login']))
{
    $userid = $_POST['userid'];
    $password = $_POST['pass']; //encrypt pass
    $position = "";
    
    $stmt = $conn->prepare("SELECT staffID, password, position FROM staff WHERE staffID=? AND password=? ");
    $stmt->bind_param('ss', $userid, $password);
    $stmt->execute();
    $stmt->bind_result($userid, $password, $position);
    $stmt->store_result();

    if($stmt->num_rows == 1)  //To check if the row exists
    {
        if($stmt->fetch()) //fetching the contents of the row
        {
            if($position == '01')
            {
                session_start();
                $_SESSION['Logged'] = 0;
                $_SESSION['userid'] = $userid;
                echo "<script type=\"text/javascript\">";
                echo "alert('Login Success As Admin !'),location.href='admin_index.php?userid=$userid'";
                echo "</script>";
            }
            else if ($position == '02')
            {
                session_start();
                $_SESSION['Logged'] = 1;
                $_SESSION['userid'] = $userid;
                echo "<script type=\"text/javascript\">";
                echo "alert('Login Success As Teacher !'),location.href='teacher_index.php?userid=$userid'";
                echo "</script>";
            }
            else
            {
                echo 'Invalid User ID / Password. Please Try Again !';
            }

        }

    }
    else 
    {
        $stmts = $conn->prepare("SELECT studentID, password FROM student WHERE studentID=? AND password=? ");
        $stmts->bind_param('ss', $userid, $password);
        $stmts->execute();
        $stmts->bind_result($userid, $password);
        $stmts->store_result();
        
        if($stmts->num_rows == 1)  //To check if the row exists
        {
            if($stmts->fetch()) //fetching the contents of the row
            {
                if($password == '123456')
                {
                    session_start();
                    $_SESSION['Logged'] = 1;
                    $_SESSION['userid'] = $userid;
                    echo "<script type=\"text/javascript\">";
                    echo "alert('Login Success For The First Time, Please Change Your Password !'),location.href='recoveryPage.php?userid=$userid'";
                    echo "</script>";
                }
                else 
                {
                    session_start();
                    $_SESSION['Logged'] = 1;
                    $_SESSION['userid'] = $userid;
                    echo "<script type=\"text/javascript\">";
                    echo "alert('Login Success As Student !'),location.href='student_index.php?userid=$userid'";
                    echo "</script>";
                }
            }

        }
        else 
        {
            echo "<script type=\"text/javascript\">";
            echo "alert('Invalid User ID / Password. Please Try Again !'),location.href='loginPage.php'";
            echo "</script>";

        }
        $stmts->close();
        $conn->close();
        
    }
    $stmt->close();
    $conn->close();
}

?>