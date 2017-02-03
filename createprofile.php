<?php

if( isset( $_POST['send']))
{
    $uname = $_POST['username'];
    $passw = $_POST['password'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $sqli = "INSERT INTO users_table (username, password, firstname, lastname, email, membersite) VALUES ('$uname', '$passw', '$fname', '$lname', '$email', NOW() )";
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
          <input name="firstname" id="firstnamee" type="text" class="validate">
          <label for="firstname">First Name</label>
        </div>
        <div class="input-field col s6">
            <input type="text" name="lastname" id="lastname" class="validate">
            <label for="lastname">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s16">

        </div>
      </div>
      <div class="row">
        <div class="col s6">
        
        </div>
      </div>
    </form>
  </div>
  </div>