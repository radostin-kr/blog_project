<?php
require_once dirname(dirname(__FILE__)) . "/controllers/BlogController.php";
require_once "NavBarView.html";

if (!empty($_POST["modify"])) {
    $blogInstance = new BlogController();
    $blogByIdResults = $blogInstance->viewBlogById($_POST['modify']);
}
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Title</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
        </head>
        <body>
            <form method="POST" action="?action/listBlogs">
                <div class="container">
                    <label>Title</label><br>
                    <input type="text" name="newTitle" value="<?php echo $blogByIdResults[0]["title"]; ?>"><br>
                    <label>Content</label><br>
                    <textarea name="newContent"><?php echo $blogByIdResults[0]["content"]; ?></textarea><br>
                    <label>Credentials</label><br>
                    <input type="text" name="newCredentials" value="<?php echo $blogByIdResults[0]["credentials"]; ?>"><br>
                    <label>Date</label><br>
                    <input type="date" max="300" name="newDate" value="<?php echo $blogByIdResults[0]["date"]; ?>"><br>
                    <button type="submit" class="btn btn-success">Click to modify</button>
                </div>
            </form>
        </body>
    </html>

