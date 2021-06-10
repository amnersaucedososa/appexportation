<?php
	/**
	* @author abisoft-gt
	*  Proceso de Recuperación de contraseña
	**/
	if(!empty($_POST)){
		if(!isset($_SESSION["user_id_fa"])){
			if($_POST["email"]!=""){
				$email = Database::cleanChain($_POST['email']);
				$user = UserData::getResetPassword($email);
				if($user!=null){
					$password = CryptoHelper::decrypt($user->password);
					#echo $password,"<br>";

					Core::alert('success','¡Bien hecho!','Te hemos enviado un correo con los pasos para recuperar tu cuenta');
					Core::redir("?view=password_reset");
					#echo $_SESSION['data']['alert'];
				}else{
					Core::alert('danger','¡Error!','El correo introducido no existe en nuestra base de datos!');
					Core::redir("?view=password_reset");
				}
			}else{
				Core::alert('warning','¡Aviso!','Campo Vacio');
				Core::redir("?view=password_reset");
			}
		}else{
			Core::redir("home");	
		}	
	}

?>
