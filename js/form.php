
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/form.css">
    <title>sign up/sign in</title>
</head>
<body>
  <div class="split left">
    <form class="form" action="website.php" method="post" enctype="multipart/form-data">
    <h1 style="color:white">Sign Up!!</h1>
      <div class="form-control">
          <label for="name">Name</label>
          <input type="text" id="name" name="name">
          <br>
          <label for="email">Email Address</label>
          <input type="text" name="email" placeholder="email">
          <br>
          <label for="password">Password</label>
          <input type="password" name="pass" placeholder="***">
          <br>
          <label for="profile">Profile Picture</label>
          <input type="file" name="profile" style="height:30px">
          <br>
          <label for="image">Images</label>
          <input type="file" name="files[]" multiple style="height:30px">
          <br>
          <label for="intro">Introduction</label>
          <textarea name="intro" rows="8" cols="80"></textarea>
          <br>
          <label for="education">Education</label>
          <div class="ed" id="id">
              <input type="text" name="edH0" placeholder="Course">
              <br>
              <input type="text" name="ed0" placeholder="Institution">
              <span id="responceEd"></span>
              <input class="btn" type="button" onclick="addInputEd()" style="background-color:grey;color:pink; height:35px" value="click to add more education details"/>
          </div>
          <label for="experience">Experience</label>
          <div class="ex" id="ex">
              <input type="text" name="exp0" placeholder="Job">
              <br>
              <span id="responceExp"></span>
              <input class="btn" type="button" onclick="addInputExp()" style="background-color:grey;color:pink; height:35px" value="click to add more experience details"/>
          </div>
          <label for="projects">Projects</label>
          <div class="pro" id="pro">
              <input type="text" name="proH0" placeholder="project name">
              <br>
              <textarea name="pro0" placeholder="Description" rows="4" cols="80"></textarea>
              <span id="responcePro"></span>
              <input class="btn" type="button" onclick="addInputPro()" style="background-color:grey;color:pink; height:35px" value="click to add more project details"/>
          </div>
          <input type="hidden" name="countEd" id="countEd" value="1">
          <input type="hidden" name="countExp" id="countExp" value="1">
          <input type="hidden" name="countPro" id="countPro" value="1">
          <label for="facebook">Link To Facebook Account</label>
          <input type="text" name="fb" id="fb">
          <br>
          <label for="twitter">Link To Twitter Account</label>
          <input type="text" name="twitter" id="twitter">
          <br>
          <label for="instagram">Link To Instagram Account</label>
          <input type="text" name="insta" id="insta">
          <br>
          <label for="linkedin">Link to Your LinkedIn Account</label>
          <input type="text" name="link" id="link">
          <br>
          <button class="btn" type="submit" name="submit">submit</button>
          <br>
          <br>
          <br>
        </div>
      </form>
  <div class="centered">
  </div>
</div>

<div class="split right">
  <div class="centered">
    <form class="form" action="website.php" method="post" enctype="multipart/form-data">
      <h1 style="color:white">Sign In!!</h1>
      <div class="form-control">
        <label for="email">Email Address</label>
        <input type="text" name="email" placeholder="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="pass" placeholder="***">
        <br>
        <button class="btn" type="submit" name="submit2">Sign In</button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
<script>
var countEds =1;
var countExps =1;
var countPros =1;
function addInputEd()
{
     var course= "edH"+countEds;
     var institute="ed"+countEds;
     document.getElementById('responceEd').innerHTML+='<br/><input type="text" placeholder="Course" id="'+course+'" name="'+course+'" /><br/><input type="text" placeholder="Institute" id="'+institute+'" name="'+institute+'" /><br/>';
     countEds += 1;
     document.getElementById('countEd').value=countEds;
}
function addInputExp()
{
     var job= "exp"+countExps;
     document.getElementById('responceExp').innerHTML+='<br/><input type="text" placeholder="Job" id="'+job+'" name="'+job+'" /><br/>';
     countExps += 1;
     document.getElementById('countExp').value=countExps;
}
function addInputPro()
{
     var topic= "proH"+countPros;
     var desc="pro"+countPros;
     document.getElementById('responcePro').innerHTML+='<br/><input type="text" placeholder="project name" id="'+topic+'" name="'+topic+'" /><br/><textarea name="'+desc+'" placeholder="Description" rows="4" cols="80"></textarea><br/>';
     countPros += 1;
     document.getElementById('countPro').value=countPros;
}
</script>
