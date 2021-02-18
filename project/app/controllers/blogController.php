<?php

require_once dirname(dirname(__FILE__)) . "/model/repositoryModel.php";

class Controller {
    public function listAllBlogs() {
        $allBlogs = new BlogRepository();
        $blogs = $allBlogs->getAllBlogs();
        return $blogs;
    }

    public function CreateBlog() {
        if (!empty($_POST)) {
            if (
                !empty($_POST["title"]) &&
                !empty($_POST["content"]) &&
                !empty($_POST["credentials"]) &&
                !empty($_POST["date"])
            ) {
                $repo = new BlogRepository();
                if(
                $repo->CreateBlog(
                    $_POST["title"],
                    $_POST["content"],
                    $_POST["credentials"],
                    $_POST["date"])
                ) {
                    header ("Location: ../homepageView.php");
                } else {
                    echo "error value is ot true";
                }
            } else {
                echo "Error";
            }
        }
    }
}

$instanceForAllCreatedBlogs = new Controller();
$instanceForAllCreatedBlogs->CreateBlog();

$blogs = new Controller();
$AllBlogs = $blogs->listAllBlogs();


//$instanceForViewingBlogById = new BlogRepository();
//$instanceForViewingBlogById->viewBlogById();