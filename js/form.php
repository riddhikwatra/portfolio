
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
        <label for="education"></label>
        <input type="text" name="ed1" value="ed1">


        <button class="btn" type="submit" name="submit">submit</button>
    </div>
    </form>
</body>
</html>
