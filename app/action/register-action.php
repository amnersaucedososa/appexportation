<?php
	if(count($_POST)>0){
		$user = new UserData();
		$user->name = Database::cleanChain($_POST["name"]);
		$user->lastname = Database::cleanChain($_POST["lastname"]);
		$user->email = Database::cleanChain($_POST["email"]);
		$user->password = Database::cleanChain(CryptoHelper::encrypt($_POST["password"]));
		$user->add();
		Core::alert('success','¡Bien hecho!','Registrado exitosamente!');
		Core::redir("index");
	}
?>