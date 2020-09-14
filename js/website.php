<?php
// Create database connection
  ($db = mysqli_connect('localhost','root','','portfolio'))or die("connection failed");
if(isset($_POST['submit'])){
    // File upload configuration
    $name=$_POST['name'];
    $intro=$_POST['intro'];
    $countEd=$_POST['countEd'];
    $countExp=$_POST['countExp'];
    $fb=$_POST['fb'];
    $twitter=$_POST['twitter'];
    $insta=$_POST['insta'];
    $link=$_POST['link'];
    echo "$countEd";
    echo "$countExp";
   $insert = $db->query("INSERT INTO users(name,intro,facebook,twitter,instagram,linkedin)  VALUES ('$name','$intro','$fb','$twitter','$insta','$link')");
   if(!$insert)
   echo "there was a problem";
   else{
     $query = $db->query("SELECT max(user_id) as id FROM users");
     $row = mysqli_fetch_array($query);
     $user_id=$row['id'];
  }
    $targetDir = "uploads/";
    $allowTypes = array('jpg','png','jpeg','gif');
    $insertValuesSQL=$errorUpload=$errorUploadType="";
    $fileNames = array_filter($_FILES['files']['name']);
    if(!empty($fileNames)){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."', NOW(),$user_id),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].' | ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].' | ';
            }
        }

        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database
            $insert = $db->query("INSERT INTO images (file_name, uploaded_on,user_id) VALUES $insertValuesSQL");
            if($insert){
                $statusMsg = "Files are uploaded successfully.";
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }

    // Display status message
    while($countEd>0){
      $course=$_POST["edH".(string)($countEd-1)];
      $institute=$_POST["ed".(string)($countEd-1)];
      $insert = $db->query("INSERT INTO education VALUES ('$course','$institute',$user_id)");
      if(!$insert){
          $statusMsg = "Sorry, there was an error uploading your file.";
      }
      $countEd=$countEd-1;
    }
    while($countExp>0){
      $job=$_POST["exp".(string)($countExp-1)];
      $insert = $db->query("INSERT INTO experience VALUES ('$job',$user_id)");
      if(!$insert){
          $statusMsg = "Sorry, there was an error uploading your file.";
      }
      $countExp=$countExp-1;
    }
    echo $statusMsg;

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="../css/form.css">
  </head>
  <body>
    <form class="form" action="new.php" method="post">
        <div class="form-control">
          <input type="hidden" name="id" value="<?php echo $user_id ?>">
            <button class="btn" type="submit" name="submit">submit</button>
         </div>
    </form>
  </body>
</html>
