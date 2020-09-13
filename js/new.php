<?php
  $id=$_POST['id'];
($db = mysqli_connect('localhost','root','','portfolio'))or die("connection failed");
$query = $db->query("select * from users where user_id=$id");
$row = mysqli_fetch_array($query);
$name=$row["name"];
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
            <img class="logo" src="../img/me.jpg" alt="<?php $name ?>">
            <ul class="main-header-item-list collapse navbar-collapse">
                    <li class="name">
                        <a href="#" class="smoothScroll"><?php echo"$name" ?></a>
                    </li>
            </ul>
            <ul class="main-header-item-list collapse navbar-collapse justify-content-end">
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
                        <a href="#contact" class="smoothScroll">Contact</a>
                    </li>
               </ul>
        </nav>
    </header>

    <div class="introsec">
        <!--- Image Slider -->
        <div class="carousel slide carousel-fade slides" data-ride="carousel" data-interval="1500">
            <div class="carousel-inner">
          <?php
          $query = $db->query("SELECT file_name FROM images where user_id=$id ORDER BY id DESC");
          if($query->num_rows > 0){
              while($row = $query->fetch_assoc()){
                echo "string";
                      $rows=$row["file_name"];
                      $imageURL = 'uploads/'.$row["file_name"];
            ?>
                      <img class="picture" src="<?php echo $imageURL; ?>" alt="" class="Slides">
                      <div class="carousel-cap"></div>
            <?php
              }
          }
          else{
            ?>
              <p>No image(s) found...</p>
          <?php
              } ?>

        <div class="intro">
            <section id="introduction">
                <h1>Hey there!</h1>
                <p>I am a post graduate student currently persuing MCA.</p>
            </section>
        </div>
    </div>


    <div class="content">
    <section class="sec" id="education">
            <h1>Education
                <i class="material-icons font-34">school</i>
            </h1>
            <hr>
            <h2>Masters in Computer Application(MCA)(2020-2022)</h2>
            <h3>Indira Gandhi Delhi Technical University</h3>
            <h2>BSc(H)Computer Science(2017-2020)</h2>
            <h3>Deen Dayal Upadhyaya College(Delhi University)</h3>
            <h3></h3>
    </section>
    <section class="sec" id="experience">
            <h1>Experience
                <i class="material-icons font-34">work</i>
            </h1>
            <hr>
            <ul>
                <li class="font-18">Vice Chair of ACM DDUC Student Chapter(2019-2020)</li>
                <li class="font-18">Head of Organization team of Algowls in Techmarathon(Annual Technical Fest of DDUC)(2020)</li>
                <li class="font-18">Volunteer in Algowls(2019) </li>
    			<li class="font-18">Vounteer in Technical-Treasure-Hunt(2018)</li>

            </ul>

    </section>
    <section class="sec" id="contact">
            <h1>Contact
                <i class="material-icons font-34">contact_mail</i>
            </h1>
            <hr>
    				<nav class="contact-nav-bar">
    					<ul class="contact-list">
    						<li class="contact-item">
    							<a href="https://www.facebook.com/riddhi.kwatra/"><i class="fab fa-facebook-f contact-icon fa-5x"></i></a>
    						</li>
    						<li class="contact-item">
    							<a href="https://twitter.com/KwatraRiddhi?s=09"><i class="fab fa-twitter contact-icon fa-5x"></i></a>
    						</li>
    						<li class="contact-item">
    							<a href="https://www.instagram.com/riddhi_kwatra/?hl=en"><i class="fab fa-instagram contact-icon fa-5x"></i></a>
    						</li>
    						<li class="contact-item">
    							<a href="https://www.linkedin.com/in/riddhi-kwatra-5aa1b4192"><i class="fab fa-linkedin-in contact-icon fa-5x"></i></a>
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
                $('.picture').css("opacity",1-$(window).scrollTop()/700)
            })
        })
    </script>

    </body>
    </html>
