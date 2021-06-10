<?php
	/**
		* Creador: Amner Saucedo Sosa
		* Sitio web: http://abisoftgt.net
		* E-Mail: waptoing7@gmail.com
	**/
	
    class Proveedor_productoController{

        public function __construct()
        {
            $this->ControllerName = "proveedor_producto";
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

    $Proveedor_productoController=new Proveedor_productoController();

    switch ($type) {
        case "index":
            $Proveedor_productoController->index();
            break;
        case "store":
            $Proveedor_productoController->store();
            break;
        case "update":
            $Proveedor_productoController->update($id);
            break;
        case "destroy":
            $Proveedor_productoController->destroy($id);
            break;              
    }

?>