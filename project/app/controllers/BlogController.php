<?php

require_once dirname(dirname(__FILE__)) . "/model/repositoryModel.php";

class BlogController extends BlogRepository
{


    public function listAllBlogs()
    {
        $model = new BlogRepository();
        $blogs = $model->getAllBlogs();
        return $blogs;
    }

    public function CreateNewBlog()
    {
        if (!empty($_POST)) {
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["content"]) &&
                !empty($_POST["credentials"]) &&
                !empty($_POST["date"])
            ) {
                $repo = new BlogRepository();
                if (
                $repo->CreateBlog(
                    $_POST["title"],
                    $_POST["content"],
                    $_POST["credentials"],
                    $_POST["date"])
                ) {
                    header("Location: /project?action=listBlogs");
                } else {
                    echo "error value is not true";
                }
            } else {
                echo "Error";
            }
        }
    }

    public function viewBlogById($id)
    {
        $model = new BlogRepository();
        $result = $model->getBlogById($id);
        return $result;
    }

    public function modifyBlogById($id, $newTitle, $newContent, $newCredentials, $newDate)
    {
        $model = new BlogRepository();
        $result = $model->updateBlogById($id, $newTitle, $newContent, $newCredentials, $newDate);
        if ($result == true) {
            header("/localhost/project/");
        }
    }

}

print_r($_POST);
//
//$instanceForAllCreatedBlogs = new Controller();
//$instanceForAllCreatedBlogs->CreateBlog();

$blogs = new BlogController();
if (!empty ($_POST['title']) &&
    !empty ($_POST['content']) &&
    !empty ($_POST['credentials']) &&
    !empty ($_POST['date'])) {
    $blogs->CreateNewBlog();
}
//$AllBlogs = $blogs->listAllBlogs();

if (!empty ($_POST['id']) &&
    !empty ($_POST['newTitle']) &&
    !empty ($_POST['newContent']) &&
    !empty ($_POST['newCredentials']) &&
    !empty ($_POST['newDate'])) {
    $blogs->modifyBlogById(
        $_POST['id'],
        $_POST['newTitle'],
        $_POST['newContent'],
        $_POST['newCredentials'],
        $_POST['newDate']
    );
}
//$newblog = new DefaultController();
//$createNewBlog = $newblog->CreateBlog();


//$instanceForViewingBlogById = new BlogRepository();
//$instanceForViewingBlogById->viewBlogById();