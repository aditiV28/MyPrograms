<?php

class NEWS{
    
    private $db;
    
    function __construct($conn){
        $this->db = $conn;
        
    }
    
    public function show_feed(){
            if(isset($_SESSION['user_session'])){   
        try{
            
            $stmt = $this->db->prepare("SELECT * FROM news ORDER BY timestamp DESC");
            $stmt->execute();
            $news_row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0){
                echo json_encode($news_row);
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    
    }
        else{
            echo 'Session timed out';
            return false;
            
            
        }
    }
    
    public function insert_feed($title,$description){
       
       try{
           
           $stmt = $this->db->prepare("INSERT INTO news(title,description) VALUES (:title,:description)");
           $result = $stmt->execute(array(
              ':title'=>$title,
               ':description'=>$description));
           
           if(!$result){
               return false;
           }
           else{
               return true;
           }
           
          }
        
       catch(PDOException $e){
           echo $e->getMessage();
       }
        
        
        
    }
    
    public function edit_feed($title,$description){
        try{
            $stmt = $this->db->prepare("UPDATE news SET description = :description WHERE title = :title");
            $stmt->execute(array(
                'title'=>$title,
                'description'=>$description));
            $updated_row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0){
                echo json_encode($updated_row);
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            $e->getMessage();
        }
        
    }
    
    public function delete_feed($title){
        try{
            $stmt = $this->db->prepare("DELETE FROM news WHERE title = :title");
            $stmt->bindParam(':title',$title);
            $result = $stmt->execute();
            if(!$result){
                return false;
            }
            else{
                return true;
            }
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }
}

?>