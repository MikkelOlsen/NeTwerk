<div class="container">

<h2>Log In</h2>

<form action="" method="post" name="login" clas="col s12">
    <div class="row">
    <div class="input-field col s12">
          <input type="text" name="username" class="validate" id="username">
          <label for="username">Username</label>
    </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
    </div>
    </div>

    <input type="submit" name="login" value="login" class="waves-effect waves-light btn">
</form>

</div>

<?php

if( isset( $_POST['login']))
{
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $sqli = "SELECT * FROM users_table WHERE username='$myusername' AND password='$mypassword'";
    $resultuser = $conn->query($sqli);

    if( $resultuser->num_rows == 1)
    {
        $tableuser = $resultuser->fetch_assoc();

        $_SESSION['usernameloggedin'] = $tableuser['username'];
        $_SESSION['userIDloggedin'] = $tableuser['id'];
        header( 'Location: index.php' );
    }
    else
    {
        echo "Der er fejl i brugernavn eller kodeord";
    }

}

?>