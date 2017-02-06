
<div class="container">
<h2>Search Profiles</h2>

<div class="col s6">
<form action="index.php?side=searchprofiles.php" method="post">
    <input type="text" name="searchtext">
    <input type="submit" class="waves-effect waves-light btn" value="Search">
</form>
</div>
</div>

<?php

    if ( isset( $_POST['searchtext']))
    {
        $searchtext = $_POST['searchtext'];
        $conn = new mysqli( 'localhost', 'root', '', 'mysocialnetwork' );
        $sqli = "SELECT * FROM users_table WHERE first_name LIKE '%$searchtext%' OR last_name LIKE '%$searchtext%' OR username LIKE '%$searchtext%'";
        $resultuser =  $conn->query( $sqli );

        while( $tableuser = $resultuser->fetch_assoc() )
        {
            echo "<div class='container'>";
            echo $tableuser['first_name'] . ' ' . $tableuser['last_name'] . '<br />' . '<a href="index.php?side=showprofile.php&userIDprofile=' . $tableuser['id'] . '">' . $tableuser['username'] . '</a>' . '<br /><br />';
            echo '</div>';
        }
    }

?>