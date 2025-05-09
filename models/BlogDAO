<?php
    //include_once 'Contact.php';

    class BlogDAO {

        public function getConnection(){
            $mysqli = new mysqli("127.0.01","bloguser","blogpass","blogbd");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }
        
//Users      
        public function getUsers(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $user = new User();
                $user->load($row);
                $users[]=$user;
            }    
            $stmt->close();
            $connection->close();
            return $users;
        }
        public function addUser($user){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO users (username, lastname, firstname, password, email, role) VALUES (?, ?, ?, ? ,? ,?)");
            $stmt->bind_param("sss", $user->getUsername(), $user->getLastName(), $user->getFirstName(), $user->getPassword(), $user->getEmail(), $contact->getRole());
            $stmt->execute();
            $userID = $connection->insert_id;
            $stmt->close();
            $connection->close();
        }
        public function deleteUser($userid){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM users WHERE userID = ?");
            $stmt->bind_param("i", $userid);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }


//Topics
         public function getTopics(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM topics;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $topic = new Topic();
                $topic->load($row);
                $topics[]=$topic;
            }    
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $connection->error);
            }
            $stmt->close();
            $connection->close();
            return $topics;
        }
        public function addTopic($topic){
            $topicName = $topic->getTopicName();
            $topicDescription = $topic->getTopicDescription();

            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO topics (topicName, topicDescription) VALUES (?, ?)");
            $stmt->bind_param("ss",$topicName, $topicDescription);
            $stmt->execute();
            $topID = $connection->insert_id;
            $stmt->close();
            $connection->close();
            return $topicID;
        }
        public function deleteTopic($topID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM topics WHERE topID = ?");
            $stmt->bind_param("i", $topID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }
        public function updateTopic($topID, $topicName, $topicDescription){
            $connection=$this->getConnection();
            if ($connection) {
                $stmt = $connection->prepare("UPDATE topics SET name = ? WHERE topID = ?");
                $stmt = $connection->prepare("UPDATE topics SET description = ? WHERE topID = ?");
                $stmt->bind_param("ssi", $topicName, $topicDescription, $topID);
                $stmt->execute();
                $stmt->close();
                $connection->close();
            } else {
                throw new Exception("Database connection failed.");
            }
        }
        
//Articles
         public function getArticle(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $article = new Article();
                $article->load($row);
                $articles[]=$article;
            }    
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $connection->error);
            }
            $stmt->close();
            $connection->close();
            return $articles;
        }
        public function addArticle($article){
            $topID = $article->getTopID;
            $authorID = $article->getAuthorID;
            $catID = $article->getCatID;
            $title = $article->getTitle;
            $image = $article->getImage;
            $content = $article->getContent;

            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiisss", $topID, $authorID, $catID, $title, $image, $content);
            $stmt->execute();
            $artID = $connection->insert_id;
            $stmt->close();
            $connection->close();
            return $artID;
        }
        public function deleteArticle($artID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM articles WHERE artID = ?");
            $stmt->bind_param("i", $artID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }
        public function updateArticle($artID, $topID, $catID, $title, $image, $content){
            $connection=$this->getConnection();
            if ($connection) {
                $stmt = $connection->prepare("UPDATE articles SET topID = ? WHERE artID = ?");
                $stmt = $connection->prepare("UPDATE articles SET catID = ? WHERE artID = ?");
                $stmt = $connection->prepare("UPDATE articles SET title = ? WHERE artID = ?");
                $stmt = $connection->prepare("UPDATE articles SET image = ? WHERE artID = ?");
                $stmt = $connection->prepare("UPDATE articles SET content = ? WHERE artID = ?");
                
                $stmt->bind_param("iisssi", $topID, $catID, $title, $image, $content $artID);
                $stmt->execute();
                $stmt->close();
                $connection->close();
            } else {
                throw new Exception("Database connection failed.");
            }
        }

//Comments
         public function getComments(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM comments;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $comment = new Comment();
                $comment->load($row);
                $comments[]=$comment;
            }    
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . $connection->error);
            }
            $stmt->close();
            $connection->close();
            return $comments;
        }
        public function addComment($comment){
            $content = $comment->getContent();

            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO conmment (content) VALUES (?)");
            $stmt->bind_param("s", $content);
            $stmt->execute();
            $comID = $connection->insert_id;
            $stmt->close();
            $connection->close();
            return $comID;
        }

        public function deleteComment($comID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM comments WHERE comID = ?");
            $stmt->bind_param("i", $comID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function updateProduct($comID, $content){
            $connection=$this->getConnection();
            if ($connection) {
                $stmt = $connection->prepare("UPDATE comment SET content = ? WHERE comID = ?");
                $stmt->bind_param("si", $content, $comID);
                $stmt->execute();
                $stmt->close();
                $connection->close();
            } else {
                throw new Exception("Database connection failed.");
            }
        }
        
//Login
        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM contacts WHERE username = ? and passwd = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }


    }
?>
