<?php
require_once dirname(dirname(__FILE__)) . "/model/repositoryModel.php";

class DefaultController extends BlogController {

    function __construct() {
        parent::__construct();
    }

    public function navigator() {
        switch ($_GET['action']) {
            case "createBlog":
                $this->CreateBlogView();
                break;
            case "listBlogs":
            case "loadView":
                $this->loadView();
                break;
            default:
                echo "error, page doesn't exist";
        }
    }

    public function getData() {

        $defaultModel = new DefaultModel();
        $data = $defaultModel->getData();

        include VIEW_PATH . 'DefaultView.php';
    }

    public function listBlogs() {
        $allBlogs = new BlogRepository();
        $blogs = $allBlogs->getAllBlogs();
        include VIEW_PATH . 'homepageView.php';
        return $blogs;
    }

    public function CreateBlogView() {
        if(!empty($_POST)) {
            $title = $_POST['title'];
            if (mb_strlen($title) <= 2) {
                $errors[] = "error, title is too short";
            }
            $content = $_POST['content'];
            if (mb_strlen($content) <= 2) {
                $errors[] = "error, content is too short";
            }
            $credentials = $_POST['credentials'];
            if (mb_strlen($credentials) <= 2) {
                $errors[] = "error, credentials is too short";
            }
            $date = $_POST['date'];

            if (!strtotime($date)) {
                $errors[] = "error, date is not correct";
            }

            if (empty($errors)) {

                $createNewBlog = new BlogRepository();
                $prep = $createNewBlog->CreateBlog($title, $content, $credentials, $date);

                if ($prep) {
                    header("Location: /project?action=listBlogs");
                } else {
                    echo 'error, something went wrong';
                }
            }
        }

        include VIEW_PATH . 'createBlogView.php';
        return true ;
    }

    public function loadView () {
        $allBlogs = new BlogRepository();
        $blogs = $allBlogs->getAllBlogs();
        include VIEW_PATH . 'NavBarView.html';
        include VIEW_PATH . 'homepageView.php';
    }

}

