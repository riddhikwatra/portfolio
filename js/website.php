<?php
// Create database connection
  ($db = mysqli_connect('localhost','root','','portfolio'))or die("connection failed");
if(isset($_POST['submit'])){
    // File upload configuration
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $intro=$_POST['intro'];
    $countEd=$_POST['countEd'];
    $countExp=$_POST['countExp'];
    $countPro=$_POST['countPro'];
    $fb=$_POST['fb'];
    $twitter=$_POST['twitter'];
    $insta=$_POST['insta'];
    $link=$_POST['link'];

   $insert = $db->query("INSERT INTO users(name,email,password,intro,facebook,twitter,instagram,linkedin)  VALUES ('$name','$email','$pass','$intro','$fb','$twitter','$insta','$link')");
   if(!$insert)
   echo "there was a problem";
   else{
     $query = $db->query("SELECT max(user_id) as id FROM users");
     $row = mysqli_fetch_array($query);
     $user_id=$row['id'];
     $baseName = basename($_FILES['profile']['name']);
     $path=pathinfo($baseName);
     $fileName=$path['filename'];
     $extension = $path['extension'];
     $file = $fileName.(string)$user_id.".".$extension;
     $update = $db->query("UPDATE users set profile='$file' where user_id =$user_id");
     if(!$update){
       echo "there was an issue";
     }
     $targetFilePath="uploads/".$file;
     if(isset($_FILES["profile"])){
     if(!move_uploaded_file($_FILES["profile"]["tmp_name"],$targetFilePath)){
       echo "never mind";
     }
    }
   }
    $targetDir = "uploads/";
    $allowTypes = array('jpg','png','jpeg','gif');
    $insertValuesSQL=$errorUpload=$errorUploadType=$statusMsg="";
    $fileNames = array_filter($_FILES['files']['name']);
    if(!empty($fileNames)){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $baseName = basename($_FILES['files']['name'][$key]);
            $path=pathinfo($baseName);
            $fileName=$path['filename'];
            $extension = $path['extension'];
            $file = $fileName.(string)$user_id.".".$extension;
              $targetFilePath = $targetDir.$fileName.(string)$user_id.".".$extension;

              // Check whether file type is valid
            if(in_array($extension, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$file."',$user_id),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].' | ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].' | ';
            }
          }
        }

        if(!empty($insertValuesSQL)){
            // Insert image file name into database
            $insertValuesSQL=trim($insertValuesSQL,',');
            $insert = $db->query("INSERT INTO images (file_name,user_id) VALUES $insertValuesSQL");
            if(!$insert){
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    else{
        $statusMsg = 'Please select a file to upload.';
    }

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
    while($countPro>0){
      $topic=$_POST["proH".(string)($countPro-1)];
      $desc=$_POST["pro".(string)($countPro-1)];
      $insert = $db->query("INSERT INTO project VALUES ('$topic','$desc',$user_id)");
      if(!$insert){
          $statusMsg = "Sorry, there was an error uploading your file.";
      }
      $countPro=$countPro-1;
    }
    if($statusMsg!="")
    echo $statusMsg;
}

if(isset($_POST['submit2'])){
  echo "string";
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $query = $db->query("SELECT user_id  as id FROM users where email='$email' and password='$pass'");
  $row = mysqli_fetch_array($query);
  $user_id=$row['id'];
}

?>
<?php
  $id=$user_id;
  ($db = mysqli_connect('localhost','root','','portfolio'))or die("connection failed");
  $query = $db->query("select * from users where user_id=$id");
  $row = mysqli_fetch_array($query);
  $name=$row["name"];
  $profile=$row["profile"];
  $intro=$row["intro"];
  $fb=$row["facebook"];
  $twitter=$row["twitter"];
  $insta=$row["instagram"];
  $link=$row["linkedin"];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php  echo"$name" ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
        <header class="main-header" id="header">
          <nav class=" main-header-nav" id="navbar">
                  <!--  <img class="logo" src="/me.jpg" alt="Riddhi Kwatra">-->
            <ul class="main-header-item-list collapse navbar-collapse ">
                <li class="main-header-item">
                    <a href="#introduction" class="smoothScroll">Introduction</a>
                </li>
                <li class="main-header-item">
                    <a href="#education" class="smoothScroll">Education</a>
                </li>
                <li class="main-header-item">
                    <a href="#experience" class="smoothScroll">Experience</a>
                </li>
  							<li class="main-header-item">
    								<a href="#projects" class="smoothScroll">Projects</a>
								</li>
								<li class="main-header-item">
  									<a href="#gallery" class="smoothScroll">Gallery</a>
  						  </li>
                <li class="main-header-item">
                    <a href="#contact" class="smoothScroll">Contact</a>
                </li>
            </ul>
          </nav>
        </header>
        <div class="introsec">
            <!--- Image Slider -->
        		<img src="uploads/<?php echo "$profile"; ?>" alt="" class="picture">
            <div class= "intro">
                    <h1 class="name">Hey!</h1>
        						<h1 id="name" class="name"></h1>
        						<p id="desc" class="font-18"><?php echo "$intro"; ?></p>
            </div>
        </div>
        <!--- Image Slider -->

    <div class="content">
    <section class="sec" id="education">
            <br>
            <br>
            <br>
            <h1>Education
                <i class="material-icons font-34">school</i>
            </h1>
            <hr>
            <?php
              $query = $db->query("SELECT * FROM education where user_id=$id");
              if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
             ?>
                  <h2><?php $c=$row["course"]; echo "$c"; ?>
                  </h2>
                  <h3><?php $i=$row['institute']; echo "$i"; ?></h3>
             <?php
                }
              }
            ?>
    </section>
    <section class="sec" id="experience">
            <br>
            <br>
            <br>
            <h1>Experience
                <i class="material-icons font-34">work</i>
            </h1>
            <hr>
            <ul>
              <?php
              $query = $db->query("SELECT job FROM experience where user_id=$id");
              if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
               ?>
                <li class="font-18"><?php $j=$row["job"]; echo "$j"; ?></li>
               <?php
               }
              }
             ?>
            </ul>
    </section>
    <section class="sec" id="projects">
            <br>
            <br>
            <h1>Projects
                <i class="material-icons font-34">work</i>
            </h1>
            <hr>
            <?php
              $query = $db->query("SELECT * FROM project where user_id=$id");
              if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
             ?>
                  <h2><?php $c=$row["project"]; echo "$c"; ?>
                  </h2>
                  <h3><?php $i=$row['description']; echo "$i"; ?></h3>
             <?php
                }
              }
            ?>
    </section>
    <section class="sec" id="gallery">
    <br>
    <br>
    <br>
    <h1>Gallery
    		<i class="material-icons font-34">collections</i>
    </h1>
    <hr>
    <div class="carousel slide carousel-fade slides" data-ride="carousel" data-interval="1500">
        <div class="carousel-inner">
          <?php
          $query = $db->query("SELECT file_name FROM images where user_id=$id ");
          $count = $query->num_rows;
          if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
          ?>
                  <div class="carousel-item <?php if($count==1) echo "active"; ?>">
          <?php

                      $imageURL = 'uploads/'.$row["file_name"];
          ?>
                      <img class="image" src="<?php echo $imageURL; ?>" alt="">
                      <div class="carousel-cap"></div>
                  </div>
          <?php
                $count=$count-1;
          }
        }
        else{
          echo "no photos found";
          }
           ?>
           <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    		 	 <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
    </section>
    <section class="sec" id="contact">
            <h1>Contact
                <i class="material-icons font-34">contact_mail</i>
            </h1>
            <hr>
    				<nav class="contact-nav-bar">
    					<ul class="contact-list">
    						<li class="contact-item">
    							<a href="<?php echo $fb ?>"><i class="fab fa-facebook-f contact-icon fa-5x"></i></a>
    						</li>
    						<li class="contact-item">
    							<a href="<?php echo $twitter ?>"><i class="fab fa-twitter contact-icon fa-5x"></i></a>
    						</li>
    						<li class="contact-item">
    							<a href="<?php echo $insta ?>"><i class="fab fa-instagram contact-icon fa-5x"></i></a>
    						</li>
    						<li class="contact-item">
    							<a href="<?php echo $link ?>"><i class="fab fa-linkedin-in contact-icon fa-5x"></i></a>
    						</li>
    					</ul>
    				</nav>

    </section>
    <a href="form.php">Hello! click here to make your own website like this</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(window).scroll(function(){
              $('.picture').css("opacity",1-$(window).scrollTop()/600)
          })
      })
      function hey(){
        if(i<txt.length){
          document.getElementById("name").innerHTML += txt.charAt(i);
          i++;
          setTimeout(hey, 100);
        }
      }
      var txt="I am ";
      var i=0;
      var name="<?php echo $name ?>";
      txt=txt.concat(name);
      hey();
      hey();
      var slideIndex = 1;
      var timer = null;
   showSlides(slideIndex);

   // Next/previous controls
   function plusSlides(n) {
      clearTimeout(timer);
     showSlides(slideIndex += n);
   }

   // Thumbnail image controls
   function currentSlide(n) {
      clearTimeout(timer);
     showSlides(slideIndex = n);
   }

   function showSlides(n) {
     var i;
     var slides = document.getElementsByClassName("carousel-item");
     if (n > slides.length) {slideIndex = 1}
     if (n < 1) {slideIndex = slides.length}
     for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";
     }

     slides[slideIndex-1].style.display = "block";
   }

    </script>

    </body>
    </html>
