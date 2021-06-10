<?php
	/**
	* @author abisoft-gt
	*  Proceso de Login
	**/
	if(!empty($_POST)){
		if(!isset($_SESSION["user_id_fa"])){
			if($_POST["email"]!=""&&$_POST["password"]!=""){
				$email = Database::cleanChain($_POST['email']);
				// $password = Database::cleanChain(CryptoHelper::encrypt($_POST['password']));
				$password = Database::cleanChain(sha1(md5($_POST['password'])));
				$user = UserData::getLogin($email,$password);
				if($user!=null){
					$_SESSION["user_id_fa"]=$user->iduser;

					if($user->type==1){
						$_SESSION['type'] = 1;
					}else if($user->type==2){
						$_SESSION['type'] = 2;
					}

					print "Cargando ... $email";
					Core::redir("profile");
				}else{
					Core::alert('warning','¡Aviso!','Usuario y/o contraseña incorrecto!');
					Core::redir("index");
				}
			}else{
				Core::alert('warning','¡Aviso!','Campos Vacios');
				Core::redir("index");
			}
		}else{
			Core::redir("profile");	
		}	
	}

?>
