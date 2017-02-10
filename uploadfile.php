<?php
if( !isset( $_SESSION['userIDloggedin']) || $_SESSION['userIDloggedin'] == "Anonymous")
{
    
    echo "You need to have a profile to upload pictures";
}
else 
$uname = $_SESSION['username'];
$userid = $_SESSION['userIDloggedin'];
{
?>
<div class="container">
<div class="row">
<form class="col s12" action="" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="file-field input-field col s3">
      <div class="btn">
        <span>File</span>
        <input type="file" name="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    <input id="uploadbtn" class="waves-effect waves-light btn" type="submit" name="submit" value="Upload File">
      </div>
</form>
</div>
</div>

<?php
}
if( isset($_POST['submit']))
{
    $filelocation = "upload";
    if ( file_exists( $filelocation .'/'. $userid .'_'. $_FILES['file']['name']))
    {
        $status = '<p>File already exist</p>';
        echo $status;
    }
    else 
    {
        if( $_FILES['file']['error'] == 0)
        {
            $file = $userid .'_'. $_FILES['file']['name'];
            move_uploaded_file( $_FILES['file']['tmp_name'], $filelocation . '/' . $file);
            $userid = $_SESSION['userIDloggedin'];
            $sqli = "INSERT INTO files (id, userID, filename) VALUES (NULL, '$userid', '{$file}')";
            $conn->query($sqli);
            echo '<p>File has been uploaded</p>';
        }
    }
}
?>