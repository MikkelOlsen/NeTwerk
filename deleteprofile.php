<div class="container">
    <h2>Delete Profile</h2>

    <?php
    if( !isset( $_SESSION['userIDloggedin']) || $_SESSION['userIDloggedin'] == "Anonymous" )
    {
        echo "You need to be logged in to delete your profile!";
    }
    else 
    {
        ?>

        <div class="row">
            <form method="post">
                <input class="waves-effect waves-light btn" type="submit" name="deleteuser" value="Delete your profile">                
            </form>
        </div>
    
    <?php
    }
    if( isset( $_POST['deleteuser']))
    {
        $deleteuserID = $_SESSION['userIDloggedin'];
        $sqli = "DELETE FROM users_table WHERE id='$deleteuserID'";
        $conn->query( $sqli );
        $sqli = "DELETE FROM messages WHERE senderID='$deleteuserID'";
        $conn->query( $sqli );
        $sqli = "DELETE FROM messages WHERE userIDsender='$deleteuserID'";
        $conn->query( $sqli );
        unset( $_SESSION['usernameloggedin']);
        unset( $_SESSION['userIDloggedin']);
        header( 'Location: index.php' );
    }
    ?>
</div>