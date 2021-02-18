<?php

require_once "NavBarView.html";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <form method="POST" action="/project/app/controllers/blogController.php">
            <div class="container">
                <label>Title</label><br>
                <input type="text" name="title"><br>
                <label>Content</label><br>
                <textarea name="content"></textarea><br>
                <label>Credentials</label><br>
                <input type="text" name="credentials"><br>
                <label>Date</label><br>
                <input type="date" max="300" name="date"><br>
                <button type="submit" class="btn btn-success">Click to modify</button>
            </div>
        </form>
    </body>
</html>