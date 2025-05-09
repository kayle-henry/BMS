<?php
    include_once "controllers/ControllerAction.php";
    include_once "controllers/BlogControllers.php";
    include_once "models/BlogDAO.php"; //Name Check

    class FrontController { 
        private $controllers;
    

        public function __construct(){
            $this->showErrors(0);
            $this->controllers = $this->loadControllers();
        }

        public function run(){
            session_start();

            $method = $_SERVER['REQUEST_METHOD'];
            if($method==null){
                $method="GET";
            }
            $page = $_REQUEST['page'];
             if ($page==null){
                $page="home"; //Name check homeView.php?
            }
        
            //***** 2. Route the Request to the Controller Based on Method and Page *** */
            $controller = $this->controllers[$method.$page];
            
            //** 3. Check Security Access ***/
            $controller = $this->securityCheck($controller);

            //** 4. Execute the Controller */
            if($method=='GET'){
                $content=$controller->processGET();
            }
            if($method=='POST'){
                $controller->processPOST();
            }

            //**** 5. Render Page Template */
            include "template/template.php";
        }

        private function loadControllers(){
            //User based 
            $controllers["GET"."list"] = new ContactList();
            $controllers["GET"."add"] = new ContactAdd(); //create user
            $controllers["POST"."add"] = new ContactAdd();
            $controllers["GET"."delete"] = new ContactDelete();
            $controllers["POST"."delete"] = new ContactDelete();
            $controllers["GET"."login"] = new Login();
            $controllers["POST"."login"] = new Login();

            //Home page
            $controllers["GET"."home"] = new Home();

            //Topics

            //Article
            $controllers["GET"."about"] = new About();
            return $controllers;
        }

        private function securityCheck($controller){
        /******************************************************
         * Check Access restrictions for selected controller  *
         ******************************************************/
            if($controller->getAccess()=='PROTECTED'){
                if(!isset($_SESSION['loggedin'])){
                    //*** Not Logged In ****/
                    $controller = $this->controllers["GET"."login"];
                }
            }
            return $controller;
        }

        private function showErrors($debug){
            if($debug==1){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
            }
        }
    }

    $controller = new FrontController();
    $controller->run();
?>
