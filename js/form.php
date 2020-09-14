
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/form.css">
    <title>form</title>
</head>
<body>
    <form class="form" action="website.php" method="post" enctype="multipart/form-data">
    <div class="form-control">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="image">Image</label>
        <input type="file" name="files[]" multiple>
        <br>
        <label for="intro">Introduction</label>
        <textarea name="intro" rows="8" cols="80"></textarea>
        <br>
        <label for="education">Education</label>
        <div class="ed" id="id">
            <input type="text" name="edH0" value="Course">
            <br>
            <input type="text" name="ed0" value="Institution">
            <span id="responceEd"></span>
            <input class="btn" type="button" onclick="addInputEd()" value="click to add more education details"/>
        </div>
        <input type="hidden" name="countEd" id="count">
        <label for="experience">Experience</label>
        <div class="ex" id="ex">
            <input type="text" name="exp0" value="job">
            <br>
            <span id="responceExp"></span>
            <input class="btn" type="button" onclick="addInputExp()" value="click to add more experience details"/>
        </div>
        <input type="hidden" name="countEd" id="countEd" value="1">
        <input type="hidden" name="countExp" id="countExp" value="1">
        <label for="facebook">link to facebook profile</label>
        <input type="text" name="fb" id="fb">
        <br>
        <label for="twitter">link to twitter account</label>
        <input type="text" name="twitter" id="twitter">
        <br>
        <label for="instagram">link to instaram account</label>
        <input type="text" name="insta" id="insta">
        <br>
        <label for="linkedin">link to your linkedIn account</label>
        <input type="text" name="link" id="link">
        <br>
        <button class="btn" type="submit" name="submit">submit</button>
      </div>
    </form>
</body>
</html>
<script>
var countEds =1;
var countExps =1;
function addInputEd()
{
     var course= "edH"+countEds;
     var institute="ed"+countEds;
     document.getElementById('responceEd').innerHTML+='<br/><input type="text" value="Course" id="'+course+'" name="'+course+'" /><br/><input type="text" value="Institute" id="'+institute+'" name="'+institute+'" /><br/>';
     countEds += 1;
     document.getElementById('countEd').value=countEds;
}
function addInputExp()
{
     var job= "exp"+countExps;
     document.getElementById('responceExp').innerHTML+='<br/><input type="text" value="Job" id="'+job+'" name="'+job+'" /><br/>';
     countExps += 1;
     document.getElementById('countExp').value=countExps;
}
</script>
