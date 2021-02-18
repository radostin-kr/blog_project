<?php
require_once dirname(dirname(__FILE__)) . "/model/repositoryModel.php";

class DefaultController extends BaseController {


//    protected $crm;

    function __construct() {
        parent::__construct();
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
    }

    public function createBlog() {
        $createNewBlog =  new BlogRepository();
        $newblog = $createNewBlog->CreateBlog();
        include VIEW_PATH . 'CreateBlogView.php';
    }



}
