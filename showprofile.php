<div class="container">

    <?php

    if( isset( $_GET['userIDprofile']))
    {
        $_SESSION['userIDprofile'] = $_GET['userIDprofile'];
    }

    if( isset( $_SESSION['userIDprofile']))
    {
        $sqli = "SELECT * FROM users_table WHERE id='" . $_SESSION['userIDprofile'] . "'";
        $resultuser = $conn->query( $sqli );
        $tableuser = $resultuser->fetch_assoc();
        echo '<h2>' . $tableuser['username'] . '</h2>' . '<br /><br />';
        echo 'Email: ' . $tableuser['email'] . '<br /><br />';
        echo 'Member Since: ' . $tableuser['membersince'] . '<br /><br />';

        $sqli = "SELECT * FROM messages WHERE userid='" . $_SESSION['userIDprofile']. "'";
        $resultmessage = $conn->query( $sqli );

        while( $tablemessage = $resultmessage->fetch_assoc() )
        {
            echo 'Title:' . $tablemessage['title'] . '<br />' . 'Message:' . $tablemessage['message'] . '<br />';
            $sqli = "SELECT * FROM users_table WHERE id='" . $tablemessage['useridsender'] . "'";
            $resultuser = $conn->query( $sqli );
            $tableuser = $resultuser->fetch_assoc();

            if( count ( $tableuser) > 0 )
            {
                $username = $tableuser['username'];
                echo 'Sender: <a href="index.php?side=showprofile.php&userIDprofile=' . $tableuser['id'] . '">' . $username . '</a>';
            }
            else 
            {
                echo 'Sender: Anonymous';
            }

            echo '<br /><br />';
        }
    }

    ?>

    <h4>Message:</h5>
    <form class="col s12" action="index.php?side=createmessage.php" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input type="text" name="title">
                <label for="title">Title</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="message">Message</label>
                <textarea class="col s12" name="message"></textarea>
            </div>
        </div>
        <input type="submit" class="waves-effect waves-light btn" value="Create Message" name="createmessage">
    </form>

</div>