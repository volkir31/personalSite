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
<div class="load__photos">
    <h5>Load photos</h5>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="photos[]" multiple accept=".jpeg, .png, .gif, .jpg">
        <button type="submit">Send</button>
    </form>
</div>
<div class="about__update">
    <h5>Update about me info</h5>
    <form action="" method="post" class="about">
        <label for="name"> Name</label>
        <input type="text" name="name">
        <label for="about"> About me</label>
        <textarea name="about"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>
<div class="remove__record">
    <ul>
        <?php
        foreach ($records as $record) {
            ?>
            <li>
                <p><?= $record['id'] ?></p>
                <h1><?= $record['author'] ?></h1>
                <h2><?= $record['text'] ?></h2>
            </li>
            <?php
        }
        ?>
    </ul>
    <form action="" method="post">
        <input type="text" name="id">
        <button type="submit">Delete</button>
    </form>
</div>
</body>
</html>
