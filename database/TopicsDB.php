<?php
class TopicDB
{
    function getAllTopics() {

        global $conn;
        $errors = [];
        // the email and usernames should be unique
        $query = "SELECT * FROM topîcs";
         $db=$conn->prepare($query);
         $db->execute([]);  
        $list = new ArrayObject();
        $result = $db->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $key => $value) {
           $topic = new Topics($value->id, $value->name, $value->slug);
           $list->append($topic);
        }
        return  $list;

    }
    function createTopic($newTopic){
        global $conn;
        $query = "INSERT INTO topics (name, slug) 
        VALUES(:name, :slug,";
        $db=$conn->prepare($query);
        $db->execute([
        'name'=>$newTopic->getName(),
        'slug'=>$newTopic->getSlug()
        ]);  
    }
    /* * * * * * * * * * * * * * * * * * * * *
    * - Takes topic id as parameter
    * - Fetches the topic from database
    * - sets topic fields on form for editing
    * * * * * * * * * * * * * * * * * * * * * */
    function editTopic($topic_id) {
        global $conn, $topic_name, $isEditingTopic, $topic_id;
        $sql = "SELECT * FROM topics WHERE id=$topic_id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $topic = mysqli_fetch_assoc($result);
        // set form values ($topic_name) on the form to be updated
        $topic_name = $topic['name'];
    }
    function updateTopic($request_values) {
        global $conn, $errors, $topic_name, $topic_id;
        $topic_name = esc($request_values['topic_name']);
        $topic_id = esc($request_values['topic_id']);
        // create slug: if topic is "Life Advice", return "life-advice" as slug
        $topic_slug = makeSlug($topic_name);
        // validate form
        if (empty($topic_name)) { 
            array_push($errors, "Topic name required"); 
        }
        // register topic if there are no errors in the form
        if (count($errors) == 0) {
            $query = "UPDATE topics SET name='$topic_name', slug='$topic_slug' WHERE id=$topic_id";
            mysqli_query($conn, $query);
    
            $_SESSION['message'] = "Topic updated successfully";
            header('location: topics.php');
            exit(0);
        }
    }
    // delete topic 
    function deleteTopic($topic_id) {
        global $conn;
        $sql = "DELETE FROM topics WHERE id=$topic_id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = "Topic successfully deleted";
            header("location: topics.php");
            exit(0);
        }
    }  
     public static function  makeSlug($string){
        $string = strtolower($string);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }
}