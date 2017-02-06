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
    <form method="post" action="" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="edit_first_name" type="text" class="validate">
          <label for="edit_first_name">First Name</label>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s6">
            <input type="text" name="edit_last_name" class="validate">
            <label for="edit_last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input type="text" name="edit_email" class="validate">
          <label for="edit_email">Email</label>
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