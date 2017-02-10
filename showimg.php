<?php
$userID = $_SESSION['userIDprofile'];
$sqli = "SELECT * FROM files WHERE userid = $userID ORDER BY id DESC LIMIT 3";
$resultfiles = $conn->query($sqli);

if ($resultfiles)
{   
echo '<div class="overallimg">';
    while ( $rowfiles = $resultfiles->fetch_assoc() )
    {
        echo '<div class="imgcontainer">';
        echo '<img src="upload/' . $rowfiles['filename'] . '"width="200" />';
                if( $_SESSION['userIDloggedin'] == $rowfiles['userID'])
                {
        echo '<a class="waves-effect waves-light btn" href="index.php?side=deleteimg.php&deleteimgID=' . $rowfiles['id'] . '&img='.rawurlencode($rowfiles['filename']).'">Delete</a>';
                }
    echo '</div>';
    }
    echo '<br /><br />';
    echo '</div>';
}
?>