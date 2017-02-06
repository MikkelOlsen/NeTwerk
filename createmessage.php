<?php
if( isset( $_POST['createmessage']))
{
    $title = $_POST['title'];
    $message = $_POST['message'];
    $userIDprofile = $_SESSION['userIDprofile'];

    if( isset( $_SESSION['usernameloggedin']))
    {
        $sender = $_SESSION['userIDloggedin'];
    }
    else 
    {
        $sender = 0;
    }

    $sqli = "INSERT INTO messages VALUES ( '', '$userIDprofile', '$sender', '$title', '$message', NOW() )";
    $conn->query( $sqli );
    header( 'Location: index.php?side=showprofile.php' );
}
?>