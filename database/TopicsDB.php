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

        global $conn;
        $query = "SELECT * FROM topics WHERE id=:id";
        $db=$conn->prepare($query);
        $db->execute(['id'=>$topic_id]);  
	    $result = $db->fetch(PDO::FETCH_OBJ);
        if ($result)
            return new Topics($result->id,$result->name,$result->slug);
        else
            return false;
    }
    function updateTopic($topic) {


        global $conn;
        $query = "UPDATE  topics set name=:name, slug=:slug WHERE id=:id";
		 $db=$conn->prepare($query);
         $db->execute([
            'name'=>$topic->getName(),
            'slug'=>$topic->getSlug(),
            'id'=>$topic->getId()
        ]);  

    }
    // delete topic 
    function deleteTopic($topic_id) {
        global $conn;
        $sql = "DELETE FROM topics WHERE id=:id";
        $db=$conn->prepare($sql);
        $db->execute(['id'=>$topic_id]);     
    }  
     public static function  makeSlug($string){
        $string = strtolower($string);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
    }
}