<?php
    include('database.php');

    session_start();// Starting Session
    // Storing Session
    $user_check=$_SESSION['login_user'];
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysqli_query($connection, "select * from user where Username='$user_check'");
    $row = mysqli_fetch_assoc($ses_sql);
    $id = $row['ID'];
    $login_session =$row['Username'];
    $login_session = ucfirst($login_session);
    if(!isset($login_session))
    {
        mysql_close($connection); // Closing Connection
        header('Location: index.php'); // Redirecting To Home Page
    }
?>