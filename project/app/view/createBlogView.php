<?php require_once 'NavBarView.html'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
    <div>
        <?php
            if (!empty($errors)) {
                foreach ($errors as $err) {
                    echo $err."<br>";
                }
            }
        ?>
    </div>
        <form method="POST" action="">
            <div class="container">
                <label>Title</label><br>
                <input type="text" name="title" value="<?php if (!empty($title)) echo $title; ?>"><br>
                <label>Content</label><br>
                <textarea name="content"><?php if (!empty($content)) echo $content; ?></textarea><br>
                <label>Credentials</label><br>
                <input type="text" name="credentials" value=""><br>
                <label>Date</label><br>
                <input type="date" max="300" name="date" value="<?php if (!empty($date)) echo $date; ?>"><br>
                <button type="submit" class="btn btn-success">Add Blog</button>
            </div>
        </form>
    </body>
</html>