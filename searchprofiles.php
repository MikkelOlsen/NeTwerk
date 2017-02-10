<?php

    if ( isset( $_POST['searchtext']))
    {
        $searchtext = $_POST['searchtext'];
        $conn = new mysqli( 'localhost', 'root', '', 'mysocialnetwork' );
        $sqli = "SELECT * FROM users_table WHERE first_name LIKE '%$searchtext%' OR last_name LIKE '%$searchtext%' OR username LIKE '%$searchtext%'";
        $resultuser =  $conn->query( $sqli );

            echo "<div class='container'>";
            if( mysqli_num_rows($resultuser) <=0 || empty($searchtext))
            {
                echo 'No results found';
            }
            else {
        while( $tableuser = $resultuser->fetch_assoc() )
        {
            echo '<div class="row">';
            echo $tableuser['first_name'] . ' ' . $tableuser['last_name'] . '<br />' . '<a href="index.php?side=showprofile.php&userIDprofile=' . $tableuser['id'] . '">' . $tableuser['username'] . '</a>' . '<br /><br />';
            echo '</div>';
        }
            echo '</div>';
            }
    }

?>