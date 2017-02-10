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
}

?>
<div class="container">
<h2>Create Profile</h2>

<div class="row">
    <form id="createProfile" method="post" action="" class="col s12">
      <div class="row">
        <div class="input-field col s5">
          <input id="first_name" name="first_name" type="text" class="validate">
          <label id="label_fname" for="first_name">First Name</label>
          <p class="hide" id="invalid_fname">Invalid first name</p>
        </div>
        <div class="input-field last col s5">
            <input type="text" name="last_name" id="last_name" class="validate">
            <label id="label_lname" for="last_name">Last Name</label>
            <p id="invalid_lname" class="hide">Invalid last name</p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s5">
          <input type="text" name="username" class="validate" id="username">
          <label id="label_username" for="username">Username</label>
          <p id="invalid_username" class="hide">Invalid username</p>
        </div>
        <div class="input-field last col s5">
          <input type="text" name="email" class="validate" id="email">
          <label id="label_email" for="email">Email</label>
          <p id="invalid_email" class="hide">Invalid email!</p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s5">
          <input id="password" type="password" class="validate" name="password">
          <label id="label_password" for="password">Password</label>
          <p id="invalid_password" class="hide">Invalid Password!</p>
        </div>
        <div class="input-field last col s5">
          <input id="passwordRepeat" type="password" class="validate" name="repeat">
          <label id="label_passwordRepeat" for="repeat">Repeat Password</label>
          <p id="invalid_passwordRepeat" class="hide">Password must be the same!</p>
        </div>
      </div>
      <input class="waves-effect waves-light btn" type="submit" name="send" value="Register">
    </form>
  </div>
  </div>

  <script type="text/javascript">
    $ ( '#createProfile').submit( function()
    {
      var error = 0;

      if (/^[a-zA-Z]{3,16}$/.test( $( '#first_name').val() ) )
      {
        $('#first_name').css({"border-bottom": ""});
        $('#label_fname').css({"color": ""});
        $('#invalid_fname').removeClass('display').addClass('hide');
      }
      else
      {
        error += 1;
        $('#first_name').css({"border-bottom": "2px solid red"});
        $('#label_fname').css({"color": "red"});
        $('#invalid_fname').removeClass('hide').addClass('display');
      }

      if (/^[a-zA-Z\s]{3,16}$/.test( $( '#last_name').val() ) )
      {
        $('#last_name').css({"border-bottom": ""});
        $('#label_lname').css({"color": ""});
        $('#invalid_lname').removeClass('display').addClass('hide');
      }
      else
      {
        error += 1;
        $('#last_name').css({"border-bottom": "2px solid red"});
        $('#label_lname').css({"color": "red"});
        $('#invalid_lname').removeClass('hide').addClass('display');
      }

      if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/.test( $( '#email').val() ) )
      {
        $('#email').css({"border-bottom": ""});
        $('#label_email').css({"color": ""});
        $('#invalid_email').removeClass('display').addClass('hide');
      }
      else
      {
        error += 1;
        $('#email').css({"border-bottom": "2px solid red"});
        $('#label_email').css({"color": "red"});
        $('#invalid_email').removeClass('hide').addClass('display');
      }

      if (/^[a-zA-Z0-9._-]{3,16}$/.test( $( '#username').val() ) )
      {
        $('#username').css({"border-bottom": ""});
        $('#label_username').css({"color": ""});
        $('#invalid_username').removeClass('display').addClass('hide');
      }
      else 
      {
        error += 1;
        $('#username').css({"border-bottom": "2px solid red"});
        $('#label_username').css({"color": "red"});
        $('#invalid_username').removeClass('hide').addClass('display');
      }

      if (/^[A-Za-z0-9!@#$%^&*()_]{6,16}$/.test( $( '#password').val() ) )
      {
        $('#password').css({"border-bottom": ""});
        $('#label_password').css({"color": ""});
        $('#invalid_password').removeClass('display').addClass('hide');
      }
      else 
      {
        error += 1;
        $('#password').css({"border-bottom": "2px solid red"});
        $('#label_password').css({"color": "red"});
        $('#invalid_password').removeClass('hide').addClass('display');
      }

      if( $( '#password' ).val() === $( '#passwordRepeat' ).val())
      {
        $('#passwordRepeat').css({"border-bottom": ""});
        $('#label_passwordRepeat').css({"color": ""});
        $('#invalid_passwordRepeat').removeClass('display').addClass('hide');
      }
      else 
      {
        error += 1;
        $('#passwordRepeat').css({"border-bottom": "2px solid red"});
        $('#label_passwordRepeat').css({"color": "red"});
        $('#invalid_passwordRepeat').removeClass('hide').addClass('display');
      }

      if( error == 0 )
      {
        return true;
      }
      else
      {
        return false;
      }
    })
  </script>