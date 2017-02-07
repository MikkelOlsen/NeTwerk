<?php
    if( isset( $_GET['editmsgID']))
    {
        $_SESSION['editmsgID'] = $_GET['editmsgID'];
    }

    if( isset( $_POST['editmsg']))
    {
        $edittitle = $_POST['edit_title'];
        $editedmsg = $_POST['editedmsg'];
        $editmsgID = $_SESSION['editmsgID'];
        $sqli = "UPDATE messages SET title='$edittitle', message='$editedmsg' WHERE id='$editmsgID'";
        $conn->query( $sqli );
        header( 'Location: index.php?side=showprofile.php' );
    }
?>

    <div class="row">
    <form method="post" action="" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="edit_title" type="text" class="validate">
          <label for="edit_title">Title</label>
        </div>
        </div>
      <div class="row">
        <div class="col s6">
          <label for="editedmsg">Message</label>
          <textarea name="editedmsg"></textarea>
        </div>
      </div>
      <input class="waves-effect waves-light btn" type="submit" name="editmsg" value="Confirm Changes">
    </form>
  </div>
  