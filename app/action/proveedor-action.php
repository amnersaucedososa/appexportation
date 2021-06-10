<?php
	/**
		* Creador: Amner Saucedo Sosa
		* Sitio web: http://abisoftgt.net
		* E-Mail: waptoing7@gmail.com
	**/
	
    class ProveedorController{

        public function __construct()
        {
            $this->ControllerName = "proveedor";
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

    $ProveedorController=new ProveedorController();

    switch ($type) {
        case "index":
            $ProveedorController->index();
            break;
        case "store":
            $ProveedorController->store();
            break;
        case "update":
            $ProveedorController->update($id);
            break;
        case "destroy":
            $ProveedorController->destroy($id);
            break;              
    }

?>