<?php
class PostsDB
{
    public static function create($newPost)
    {
        
    }
   public static function getPublishedPosts() {
        global $conn;

        $query = "SELECT * FROM posts WHERE published=trues";
         $db=$conn->prepare($query);
         $db->execute([]);  
        $list = new ArrayObject();
        $result = $db->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $key => $value) {
           $post = new Posts($value->id,$value->username, $value->title, $value->slug, $value->views, $value->image, $value->body, $value->published, $value->createdAt);
           $list->append($post);
        }
        return  $list;
        // use global $conn object in function
    
    }
   /* function getPostTopic($post_id){
        global $conn;
        $sql = "SELECT * FROM topics WHERE id=
                (SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $topic = mysqli_fetch_assoc($result);
        return $topic;
    }
    function getPublishedPostsByTopic($topic_id) {
        global $conn;
        $sql = "SELECT * FROM posts ps 
                WHERE ps.id IN 
                (SELECT pt.post_id FROM post_topic pt 
                    WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
                    HAVING COUNT(1) = 1)";
        $result = mysqli_query($conn, $sql);
    
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
        $final_posts = array();
        foreach ($posts as $post) {
            $post['topic'] = getPostTopic($post['id']); 
            array_push($final_posts, $post);
        }
        return $final_posts;
    }
    function getTopicNameById($id)
    {
        global $conn;
        $sql = "SELECT name FROM topics WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $topic = mysqli_fetch_assoc($result);
        return $topic['name'];
    }
    function getPost($slug){
        global $conn;
        // Get single post slug
        $post_slug = $_GET['post-slug'];
        $sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
        $result = mysqli_query($conn, $sql);
    
        // fetch query results as associative array.
        $post = mysqli_fetch_assoc($result);
        if ($post) {
            // get the topic to which this post belongs
            $post['topic'] = getPostTopic($post['id']);
        }
        return $post;
    }
    public static function  makeSlug($string){
        $string = strtolower($string);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }*/
}