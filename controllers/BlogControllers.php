<?php

require_once '../models/BlogDAO.php';

//Users

    class ListUsers implements ControllerAction{
        function processGET(){ 
            $blogDAO = new BlogDAO();
            $users = $blogDAO->getUsers();
            $_REQUEST['users']=$users;
            return "views/admin/manageUsers.php";
        }
        function processPOST(){
            return;
        }
        function getAccess(){
            return "PROTECTED";
        }
    }

    class UserAdd implements ControllerAction{
        function processGET(){
            return "views/createUser.php";
        }
        function processPOST(){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($passwd);
            $blogDAO = new BlogDAO();
            $blogDAO->addUser($user);
            header("Location: controller.php?page=home"); //change?
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }      
    }
    class UserDelete implements ControllerAction{ //admin use only
        function processGET(){
            $userid = $_GET['userID'];
            return 'views/deleteUser.php'; //check
        }
        function processPOST(){
            $userid=$_POST['userID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $blogDAO = new BlogDAO();
                $blogDAO->deleteUser($userid);
            }
            header("Location: controller.php?page=home"); //check
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }
    }


//Login
    class Login implements ControllerAction{
        function processGET(){
            return "views/login.php";
        }
        function processPOST(){
            $username=$_POST['username'];
            $passwd=$_POST['passwd'];
            $userDAO = new BlogDAO();
            $found=$userDAO->authenticate($username,$passwd);
            if($found==null){
                $nextView="Location: controller.php?page=login";
            }else{
                $nextView="Location: controller.php?page=list";
                $_SESSION['loggedin']='TRUE';
            }
            header($nextView);
            exit;       
        }
        function getAccess(){
            return "PUBLIC";
        }
    }


//Home Page
    class Home implements ControllerAction{
        function processGET(){
            return "views/home.php";
        }
        function processPOST(){
            return;
        }
        function getAccess(){
            return "PUBLIC";
        }
    }

//Topics
     class ListTopics implements ControllerAction{
        function processGET(){ 
            $blogDAO = new BlogDAO();
            $users = $blogDAO->getTopics();
            $_REQUEST['topics']=$topics;
            return "views/admin/manageTopics.php";
        }
        function processPOST(){
            return;
        }
        function getAccess(){
            return "PROTECTED";
        }
    }
    class TopicAdd implements ControllerAction{ //Signed in user & admin
        function processGET(){
            return "views/addTopic.php";
        }
        function processPOST(){
            $name=$_POST['name'];
            $description=$_POST['description'];
            
            $topic = new Topic();
            $topic->setName($name);
            $topic->setDescription($description);
            
            $blogDAO = new BlogDAO();
            $blogDAO->addTopic($topic);
            header("Location: controller.php?page=home"); //change?
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }      
    } 
    class TopicDelete implements ControllerAction{ //Signed in user & admin
        function processGET(){
            $artid = $_GET['topID'];
            return 'views/deleteTopic.php'; //check
        }
        function processPOST(){
            $topID=$_POST['topID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $blogDAO = new BlogDAO();
                $blogDAO->deleteTopic($topID);
            }
            header("Location: controller.php?page=home"); //check
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }
    }
    
    class TopicUpdate implements ControllerAction{ //Signed in user & admin
     function processGET(){
            include "views/updateTopic.php";
        }
        function processPOST(){
            $topID=$_POST['topID'];
            $name=$_POST['name'];
            $description=$_POST['decription'];
            
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $blogDAO = new BlogDAO();
                $blogDAO->updateTopic($topID,$name,$description);
            }
            header("Location: controller.php?page=home");
            exit;
        }
                function getAccess(){
            return "PROTECTED";
        }  
    }
        

//Articles
    class ArticleView implements ControllerAction{
        function processGET(){
            return "views/article.php";
        }
        function processPOST(){
            return;
        }
        function getAccess(){
            return "PUBLIC";
        }
    }
    class ArticleAdd implements ControllerAction{ //Signed in user & admin
        function processGET(){
            return "views/createArticle.php";
        }
        function processPOST(){
            $title=$_POST['title'];
            $image=$_POST['image'];
            $content=$_POST['content'];
            
            $article = new Article();
            $article->setTitle($title);
            //$article->setImage($image);
            $article->setContent($content);
            
            $blogDAO = new BlogDAO();
            $blogDAO->addArticle($article);
            header("Location: controller.php?page=home"); //change?
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }      
    }
    class ArticleDelete implements ControllerAction{ //admin use only
        function processGET(){
            $artid = $_GET['artID'];
            return 'views/deleteArticle.php'; //check
        }
        function processPOST(){
            $artid=$_POST['artID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $blogDAO = new BlogDAO();
                $blogDAO->deleteArticle($artid);
            }
            header("Location: controller.php?page=home"); //check
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }
    }
    class ArticleUpdate implements ControllerAction{ //Signed in user & admin
     function processGET(){
            include "views/updateArticle.php";
        }
        function processPOST(){
            $artID=$_POST['artID'];
            $title=$_POST['title'];
            $image=$_POST['image'];
            $content=$_POST['content'];
            
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $blogDAO = new BlogDAO();
               // $blogDAO->updateArticle($artID,$title,$image,$content);
            }
            header("Location: controller.php?page=home");
            exit;
        }
                function getAccess(){
            return "PROTECTED";
        }  
    }


//Comments
    class ListComments implements ControllerAction{
        function processGET(){
            return "views/manageComments.php";
        }
        function processPOST(){
            return;
        }
        function getAccess(){
            return "PUBLIC";
        }
    }
    class CommentAdd implements ControllerAction{ //Signed in user & admin
        function processGET(){
            return "views/addComment.php";
        }
        function processPOST(){
            $content=$_POST['content'];
            
            $comment = new Comment();
            $comment->setContent($content);
            
            $blogDAO = new BlogDAO();
            $blogDAO->addComment($comment);
            header("Location: controller.php?page=home"); //change?
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }      
    }
    class CommentDelete implements ControllerAction{ //admin use only
        function processGET(){
            $comid = $_GET['comID'];
            return 'views/deleteComment.php'; //check
        }
        function processPOST(){
            $comid=$_POST['comID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $blogDAO = new BlogDAO();
                $blogDAO->deleteComment($comid);
            }
            header("Location: controller.php?page=home"); //check
            exit;
        }
        function getAccess(){
            return "PROTECTED";
        }
    }
    class CommentUpdate implements ControllerAction{ //Signed in user & admin
     function processGET(){
            include "views/updateComment.php";
        }
        function processPOST(){
            $comID=$_POST['comID'];
            $content=$_POST['content'];
            
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $blogDAO = new BlogDAO();
                //$blogDAO->updateComment($artID, $content);
            }
            header("Location: controller.php?page=home");
            exit;
        }
                function getAccess(){
            return "PROTECTED";
        }  
    }
?>
