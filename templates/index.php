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
<div class="about">
    <?php
    foreach ($abouts as $about) {
        ?>
        <h1><?=$about['name']?></h1>
        <h2><?=$about['about']?></h2>
        <?php
    }
    ?>
</div>
<div class="gallery">
    <?php
    foreach ($photos as $photo) {
        $path = '\\..' . str_replace('/', '\\', $photo['path']) . $photo['name'];
        ?>
        <img src="<?= $path ?>" alt="">
        <?php
    }
    ?>
</div>
<div class="guestbook">
    <ul>
        <?php
        foreach ($records as $record) {
            $path = '\\..' . str_replace('/', '\\', $photo['path']) . $photo['name'];
            ?>
            <li>
                <p><?=$record['id']?></p>
                <h1><?= $record['author'] ?></h1>
                <h2><?= $record['text'] ?></h2>
            </li>
            <?php
        }
        ?>
    </ul>
    <form action="" method="post">
        <h5>Author</h5>
        <input type="text" name="author">
        <h5>Text</h5>
        <textarea name="text" cols="30" rows="10"></textarea>
        <button type="submit">Send</button>
    </form>
</div>
</body>
</html>
