<?php

    class DataModel {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function getAll(){
            $query = $this->db->query("SELECT * FROM posts");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getDataId($id){
            $query = $this->db->query("SELECT * FROM posts WHERE id = $id");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        public function postData($requestData) {
            $title = $requestData['title'];
            $body = $requestData['body'];
            $author = $requestData['author'];
       
            $statement = $this->db->prepare("INSERT INTO posts (title, body, author) VALUES (?, ?, ?)");
            $query = $statement->execute([$title, $body, $author]);
            if ($query) {return true;} else {return false;}
        }

        public function updatedData($id, $updatedData) {

            if(isset($updatedData['title'])){
                $query = $this->db->prepare("UPDATE posts SET title = ?, updated_at = NOW() WHERE id = ?");
                $result = $query->execute([$updatedData['title'], $id]);
            }
            if(isset($updatedData['body'])){
                $query = $this->db->prepare("UPDATE posts SET body = ?,  updated_at = NOW() WHERE id = ?");
                $result = $query->execute([$updatedData['body'], $id]);
            }
            if(isset($updatedData['author'])){
                $query = $this->db->prepare("UPDATE posts SET author = ?,  updated_at = NOW() WHERE id = ?");
                $result = $query->execute([$updatedData['author'], $id]);
            }
            return $result;
        }

        public function deleteData($id) {   
            $query = $this->db->prepare("DELETE FROM posts WHERE id = ?");
            $query->execute([$id]);
            $rowCount = $query->rowCount();
            return $rowCount > 0;
        }
    }

?>