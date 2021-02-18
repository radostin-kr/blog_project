<?php
require_once "DbConnModel.php";

class BlogRepository extends Db
{
    public function CreateBlog($title = null, $content = null, $credentials = null, $date = null)
    {
        $prep = $this->connection->prepare('INSERT INTO blog_contents(title, content, credentials, date) 
                                                          VALUES(:title, :content, :credentials, :date)');
        $prep->bindParam(':title', $title);
        $prep->bindParam(':content', $content);
        $prep->bindParam(':credentials', $credentials);
        $prep->bindParam(':date', $date);
        #$prep->execute();
        return true;
    }

    public function getAllBlogs()
    {
        $sql = "SELECT * FROM blog_contents";
        $stmt = $this->connection->query($sql);
        $AllBlogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($AllBlogs)) {
            return $AllBlogs;
        } else {
            return [];
        }
    }

    public function viewBlogById($id)
    {

        $blog = $this->repo->viewBlogById($id);
        $blogInstance = new BlogRepository();
        $blogInstance->id = $blog["id"];
        $blogInstance->title = $blog["title"];
        $blogInstance->content = $blog["content"];
        $blogInstance->credentials = $blog["credentials"];
        $blogInstance->date = $blog["date"];
        return $blogInstance;
    }

}