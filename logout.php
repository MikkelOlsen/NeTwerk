<h2>Log Out</h2>

<?php

if( !isset( $_SESSION['userIDloggedin']) || $_SESSION['userIDloggedin'] == 'Anonymous')
{
    echo "Du skal først være oprettet for at kunne logge ud!";
}
else 
{
    ?>
    <form action="" name="login" method="post">
        <input type="submit" name="logout" id="logout" class="waves-effect waves-light btn" value="Logout">
    </form>
    <?php
}
if( isset ($_POST['logout']))
{
    unset( $_SESSION['usernameloggedin']);
    unset( $_SESSION['userIDloggedin']);
    header( 'Location: index.php' );
}


?>