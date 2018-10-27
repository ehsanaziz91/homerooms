<?php
include('../Connections/connection.php');
session_start();

if (isset($_POST['userid']) && isset($_POST['pass'])) {

    //Checking is user existing in the database or not
    $query = "SELECT staffID, password FROM staff WHERE staffID=? AND  password=?";

    //use prepared statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $_POST['userid'], $_POST['pass']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows !== 0) 
    {

        //fetch user from database.
        $user = $result->fetch_assoc();

        //check if user is an admin.
        if($user['account'] === "01") {
            $_SESSION['userid'] = $userid;
            header("Location: index.html"); //admin's page
        }

        //check if user is a normal user.
        if($user['account'] === "02") {
            $_SESSION['userid'] = $userid;
            header("Location: form.html"); //user's page
        }

    } else {
        echo '<div class="alert">Username/password is incorrect. Click <a href="loginPage.php">here</a> to log-in.</div>';
    }
    //free memory used by the prepared statement.
    $stmt->close();
} else { 
    //username and password not provided.
}
?>