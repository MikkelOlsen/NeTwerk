<?php


if( isset( $_POST['send']))
{
    $uname = $_POST['username'];
    $passw = $_POST['password'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $conn = new mysqli( 'localhost', 'root', '', 'mysocialnetwork' );
    $sqli = "INSERT INTO users_table (username, password, first_name, last_name, email, membersince) VALUES ('$uname', '$passw', '$fname', '$lname', '$email', NOW() )";
    $conn->query($sqli);
    header( 'Location: index.php' );
}

?>
<div class="container">
<h2>Create Profile</h2>

<div class="row">
    <form method="post" action="" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="first_name" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
            <input type="text" name="last_name" id="last_name" class="validate">
            <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input type="text" name="username" class="validate" id="username">
          <label for="username">Username</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="email" class="validate" id="email">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="repeat">
          <label for="password">Repeat Password</label>
        </div>
      </div>
      <input class="waves-effect waves-light btn" type="submit" name="send" value="Register">
    </form>
  </div>
  </div>