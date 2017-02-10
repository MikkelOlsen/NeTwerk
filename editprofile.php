<div class="container">

    <h2>Edit Profile</h2>

    <?php 
    
    if ( !isset( $_SESSION['userIDloggedin']) || $_SESSION['userIDloggedin'] == "Anonymous")
    {
        echo "You need to be registered to edit your profile!";
    }
    else {
        ?>

        
<div class="row">
    <form id="edituser" method="post" action="" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="edit_first_name" name="edit_first_name" type="text" class="validate">
          <label id="edit_label_fname" for="edit_first_name">First Name</label>
          <p class="hide" id="invalid_edit_fname">Invalid first name!</p>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
            <input id="edit_last_name" type="text" name="edit_last_name" class="validate">
            <label id="edit_label_lname" for="edit_last_name">Last Name</label>
            <p class="hide" id="invalid_edit_lname">Invalid last name!</p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="edit_email" type="text" name="edit_email" class="validate">
          <label id="edit_label_email" for="edit_email">Email</label>
          <p class="hide" id="invalid_edit_email">Invalid Email!</p>
        </div>
      </div>
      <input class="waves-effect waves-light btn" type="submit" name="edituser" value="Confirm Change">
    </form>
  </div>

    <?php
    }

    if( isset( $_POST['edituser']))
    {
        $editfirstname = $_POST['edit_first_name'];
        $editlastname = $_POST['edit_last_name'];
        $editemail = $_POST['edit_email'];
        $edituserID = $_SESSION['userIDloggedin'];
        $sqli = "UPDATE users_table SET first_name='$editfirstname', last_name='$editlastname', email='$editemail' WHERE id='$edituserID'";
        $conn->query( $sqli );
        header( 'Location: index.php' );
    }

    ?>

</div>

<script type="text/javascript">
    $ ( '#edituser').submit( function()
    {
      var error = 0;

      
      if (/^[a-zA-Z]{3,16}$/.test( $( '#edit_first_name').val() ) )
      {
        $('#edit_first_name').css({"border-bottom": ""});
        $('#edit_label_fname').css({"color": ""});
        $('#invalid_edit_fname').removeClass('display').addClass('hide');
      }
      else
      {
        error += 1;
        $('#edit_first_name').css({"border-bottom": "2px solid red"});
        $('#edit_label_fname').css({"color": "red"});
        $('#invalid_edit_fname').removeClass('hide').addClass('display');
      }



      if (/^[a-zA-Z\s]{3,16}$/.test( $( '#edit_last_name').val() ) )
      {
        $('#edit_last_name').css({"border-bottom": ""});
        $('#edit_label_lname').css({"color": ""});
        $('#invalid_edit_lname').removeClass('display').addClass('hide');
      }
      else
      {
        error += 1;
        $('#edit_last_name').css({"border-bottom": "2px solid red"});
        $('#edit_label_lname').css({"color": "red"});
        $('#invalid_edit_lname').removeClass('hide').addClass('display');
      }





      if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/.test( $( '#edit_email').val() ) )
      {
        $('#edit_email').css({"border-bottom": ""});
        $('#edit_label_email').css({"color": ""});
        $('#invalid_edit_email').removeClass('display').addClass('hide');
      }
      else
      {
        error += 1;
        $('#edit_email').css({"border-bottom": "2px solid red"});
        $('#edit_label_email').css({"color": "red"});
        $('#invalid_edit_email').removeClass('hide').addClass('display');
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