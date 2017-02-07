<?php
if( isset( $_GET['deletemsgID']))
{
    $deletemsgID = $_GET['deletemsgID'];
    $sqli = "DELETE FROM messages WHERE id='$deletemsgID'";
    $conn->query( $sqli );
}
header( 'Location: index.php?side=showprofile.php' );
?>