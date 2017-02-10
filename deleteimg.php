<?php


if( isset( $_GET['deleteimgID']))
{
    $filename = $_GET['img'];
    $deleteimgID = $_GET['deleteimgID'];
    $sqli = "DELETE FROM files WHERE id='$deleteimgID'";
    $conn->query( $sqli );
    unlink('upload/' . $filename );

}
header( 'Location: index.php?side=showprofile.php' );
?>