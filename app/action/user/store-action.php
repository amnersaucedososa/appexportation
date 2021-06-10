<?php
	if(isset($_SESSION["user_id_fa"])){
		if(count($_POST)>0){
			$user = new UserData();
			$user->name = Database::cleanChain($_POST["name"]);
			$user->lastname = Database::cleanChain($_POST["lastname"]);
			$user->email = Database::cleanChain($_POST["email"]);
			$user->type = Database::cleanChain($_POST["type"]);
			$user->password = Database::cleanChain(sha1(md5($_POST['password'])));
			$user->add();
			Core::alert('success','¡Bien hecho!','Usuario agregado exitosamente!');
			Core::redir("user/create");
		}
	}
?>