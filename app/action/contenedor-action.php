<?php
	/**
		* Creador: Amner Saucedo Sosa
		* Sitio web: http://abisoftgt.net
		* E-Mail: waptoing7@gmail.com
	**/
	
    class ContenedorController{

        public function __construct()
        {
            $this->ControllerName = "contenedor";
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

    $ContenedorController=new ContenedorController();

    switch ($type) {
        case "index":
            $ContenedorController->index();
            break;
        case "store":
            $ContenedorController->store();
            break;
        case "update":
            $ContenedorController->update($id);
            break;
        case "destroy":
            $ContenedorController->destroy($id);
            break;              
    }

?>