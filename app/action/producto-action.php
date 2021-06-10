<?php
	/**
		* Creador: Amner Saucedo Sosa
		* Sitio web: http://abisoftgt.net
		* E-Mail: waptoing7@gmail.com
	**/
	
    class ProductoController{

        public function __construct()
        {
            $this->ControllerName = "producto";
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

    $ProductoController=new ProductoController();

    switch ($type) {
        case "index":
            $ProductoController->index();
            break;
        case "store":
            $ProductoController->store();
            break;
        case "update":
            $ProductoController->update($id);
            break;
        case "destroy":
            $ProductoController->destroy($id);
            break;              
    }

?>