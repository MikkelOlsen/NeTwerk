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
        ?>

        <h4>Message:</h5>
    <form class="col s12" action="index.php?side=createmessage.php" method="post">
        <div class="row msg">
            <div class="input-field col s6">
                <input type="text" name="title">
                <label for="title">Title</label>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <label for="message">Message</label>
                <textarea class="col s12" name="message"></textarea>
            </div>
        </div>
        <input type="submit" class="waves-effect waves-light btn" value="Create Message" name="createmessage">
    </form>

        <?php

        while( $tablemessage = $resultmessage->fetch_assoc() )
        {
            echo '<div class="row">' . '<div class="col s12 m6">' . '<div class="card cyan darken-4">' . '<div class="card-content white-text">' . '<span class="card-title">' . $tablemessage['title'] . '</span>' . '<br />' . '<p>' . $tablemessage['message'] . '<br />' . '</p>' . '</div>';
            $sqli = "SELECT * FROM users_table WHERE id='" . $tablemessage['useridsender'] . "'";
            $resultuser = $conn->query( $sqli );
            $tableuser = $resultuser->fetch_assoc();

            if( count ( $tableuser) > 0 )
            {
                $username = $tableuser['username'];
                echo '<div class="card-action"><a href="index.php?side=showprofile.php&userIDprofile=' . $tableuser['id'] . '">' . $username . '</a>' . '</div>';
            }
            else 
            {
                echo '<div class="card-action">Anonymous' . '</div>';
            }
            // Ret / slet besked
            if( isset( $_SESSION['userIDloggedin']))
            {
                if( $_SESSION['userIDloggedin'] == $tablemessage['useridsender'])
                {
                    echo '<div class="card-action">';
                    echo '<a class="waves-effect waves-light btn" href="index.php?side=editmsg.php&editmsgID=' . $tablemessage['id'] . '">Edit</a>';
                    echo '<a class="waves-effect waves-light btn" href="index.php?side=deletemsg.php&deletemsgID=' . $tablemessage['id'] . '">Delete</a>';
                    echo '</div>';
                }
            }

            echo '</div>' . '</div>' . '</div>';
        }
    }

    ?>
    
</div>