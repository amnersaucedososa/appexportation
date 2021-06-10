<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$user = UserData::getById($id);
			$user->name = Database::cleanChain($_POST["name"]);
			$user->lastname = Database::cleanChain($_POST["lastname"]);
			$user->email = Database::cleanChain($_POST["email"]);
			$user->type = Database::cleanChain($_POST["type"]);
			$user->update();
			if($_POST["password"]!=""){
				$user->password = Database::cleanChain(sha1(md5($_POST['password'])));
				$user->update_passwd();
				Core::alert('success','¡Bien hecho!','Se ha actualizado la contraseña!');
			}
			Core::alert('success','¡Bien hecho!','Usuario actualizado con exitó!');
			Core::redir("user/edit/$id");
		}
	}
?>