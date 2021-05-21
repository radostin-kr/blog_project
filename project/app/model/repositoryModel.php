<?php
require_once "DbConnModel.php";

class BlogRepository extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function CreateBlog($title, $content, $credentials, $date)
    {
        try {
            $prep = $this->connection->prepare('INSERT INTO blog_contents(title, content, credentials, date) 
                                                          VALUES(:title, :content, :credentials, :date)');
            $prep->bindParam(':title', $title);
            $prep->bindParam(':content', $content);
            $prep->bindParam(':credentials', $credentials);
            $prep->bindParam(':date', $date);
            $prep->execute();

            return true;
        }catch (Exception $e){
            return false;
        }
    }

    public function getAllBlogs()
    {
        $sql = "SELECT * 
                FROM blog_contents
                ORDER BY date DESC";
        $stmt = $this->connection->query($sql);
        $AllBlogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($AllBlogs)) {
            return $AllBlogs;
        } else {
            return [];
        }
    }

    public function getBlogById($id)
    {
        $sql = "SELECT * 
                FROM blog_contents
                WHERE id = ".$id;
        $stmt = $this->connection->query($sql);
        $blogById = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($blogById)) {
            return $blogById;
        } else {
            return [];
        }
    }

    public function updateBlogById($id, $newTitle, $newContent, $newCredentials, $newDate){
        try {
            $prep = $this->connection->prepare('UPDATE INTO blog_contents(title, content, credentials, date) 
                                                          VALUES(:title, :content, :credentials, :date)');
            $prep->bindParam(':title', $title);
            $prep->bindParam(':content', $content);
            $prep->bindParam(':credentials', $credentials);
            $prep->bindParam(':date', $date);
            $prep->execute();
            return true;
        }catch (Exception $e){
            return false;
        }    }

}