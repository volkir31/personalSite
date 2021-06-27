<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="photos[]" multiple accept=".jpeg, .png, .gif, .jpg">
    <button type="submit">Send</button>
</form>
<form action="" method="post" class="about">
    <label for="name"> Name</label>
    <input type="text" name="name">
    <label for="about"> About me</label>
    <textarea name="about"></textarea>
    <button type="submit">Submit</button>
</form>
</body>
</html>
