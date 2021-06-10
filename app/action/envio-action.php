<?php
	/**
		* Creador: Amner Saucedo Sosa
		* Sitio web: http://abisoftgt.net
		* E-Mail: waptoing7@gmail.com
	**/
	
    class EnvioController{

        public function __construct()
        {
            $this->ControllerName = "envio";
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

    $EnvioController=new EnvioController();

    switch ($type) {
        case "index":
            $EnvioController->index();
            break;
        case "store":
            $EnvioController->store();
            break;
        case "update":
            $EnvioController->update($id);
            break;
        case "destroy":
            $EnvioController->destroy($id);
            break;              
    }

?>