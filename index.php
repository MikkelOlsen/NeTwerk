<?php

session_start(); ob_start(); error_reporting( E_ALL ^E_NOTICE );
$conn = new mysqli( 'localhost', 'root', '', 'mysocialnetwork' );

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NeTwerk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script src="assets/js/nav.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <header>
    <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo"><h1>NeTwerk</h1></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php?side=createprofile.php">Create Profile</a></li>
        <li><a href="index.php?side=editprofile.php">Edit Profile</a></li>
        <li><a href="index.php?side=deleteprofile.php">Delete Profile</a></li>
        <li><a href="index.php?side=searchprofiles.php">Search Profiles</a></li>
        <li><a href="index.php?side=uploadfile.php">Upload File</a></li>
        <li><a href="index.php?side=login.php">Log In</a></li>
        <li><a href="index.php?side=logout.php">Log Out</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="index.php?side=createprofile.php">Create Profile</a></li>
        <li><a href="index.php?side=editprofile.php">Edit Profile</a></li>
        <li><a href="index.php?side=deleteprofile.php">Delete Profile</a></li>
        <li><a href="index.php?side=searchprofiles.php">Search Profiles</a></li>
        <li><a href="index.php?side=uploadfile.php">Upload File</a></li>
        <li><a href="index.php?side=login.php">Log In</a></li>
        <li><a href="index.php?side=logout.php">Log Out</a></li>
      </ul>
    </div>
  </nav>
    </header>

    <?php

    if( isset( $_SESSION['userIDloggedin']))
    {
        echo 'Logged in as: <a href="index.php?side=showprofile.php&userIDprofile=' . $_SESSION['userIDloggedin'] . '">' . $_SESSION['usernameloggedin'] . '</a>'; 
    }
    else
    {
        $_SESSION['usernameloggedin'] = 'Anonymous';
        echo '<h3> You are not logged in </h3>';
    }

    ?>

    <?php

    if( isset( $_GET['side']))
    {
        include ( $_GET['side']);
    }

    ?>

</body>
</html>