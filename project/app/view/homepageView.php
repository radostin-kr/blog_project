<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
    <?php require_once 'NavBarView.html'; ?>
        <table class ='table table-bordered text text-center table-hover'>
            <thead class="thead-dark">
                <tr class="active">
                    <th>Title</th>
                    <th>Content</th>
                    <th>Credentials</th>
                    <th>Date</th>
                    <th> </th>
                </tr>
            </thead>
            <?php foreach ($blogs as $blog) { ?>
                <tr class='active'>
                    <th><?php echo $blog['title'];?></th>
                    <th><?php echo $blog['content'];?></th>
                    <th><?php echo $blog['credentials'];?></th>
                    <th><?php echo $blog['date'];?></th>
                        <td>
                            <form method='POST' action='/project/app/view/modifyBlogView.php'>
                                <button class='btn btn-link' type='submit' name='modify' value='<?php echo $blog["id"]; ?>'>Modify text...</button>
                            </form>
                        </td>
                    </th>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>