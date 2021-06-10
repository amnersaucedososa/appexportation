<?php

    class UserController{

        // public function UserController()
        public function __construct()
        {
            $this->ControllerName = "user";
        }
        public function index()
        {
            include $this->ControllerName."/"."index-action.php";
        }
        public function store()
        {
            include $this->ControllerName."/"."store-action.php";
        }
        public function update($id)
        {
            include $this->ControllerName."/"."update-action.php";
        }
        public function destroy($id)
        {
            include $this->ControllerName."/"."destroy-action.php";
        }
    }

    $type=(isset($_GET["type"])) ? $_GET["type"] : null ;
    $id=(isset($_GET["id"])) ? intval($_GET["id"]) : null ;

    $UserController=new UserController();

    switch ($type) {
        case "index":
            $UserController->index();
            break;
        case "store":
            $UserController->store();
            break;
        case "update":
            $UserController->update($id);
            break;
        case "destroy":
            $UserController->destroy($id);
            break;              
    }

?>