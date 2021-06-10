<?php
if (!isset($_SESSION['user_id_fa'])){
	Core::redir("./");//Redirecciona 
	exit;
}
	if (empty($_POST['email'])) {
           $errors[] = "Correo Electrónico vacío";
        }else if (empty($_POST['name'])) {
           $errors[] = "Nombre vacío";
        }else if (
        	!empty($_POST['email'])
			&& !empty($_POST['name'])
		){

    	$con = Database::getCon();
		$id=$_SESSION['user_id_fa'];
		$user_data = UserData::getById($id);
		$user_data->name = Database::cleanChain($_POST["name"]);
		$user_data->lastname = Database::cleanChain($_POST["lastname"]);
		$user_data->email = Database::cleanChain($_POST["email"]);
		$query_update=$user_data->updateProfile();

		if(!empty($_POST['password'])){ 
			$user_data->password=Database::cleanChain(CryptoHelper::encrypt($_POST['password']));
			$user_data->update_passwd();
		}

		// if ($query_update){
			$messages[] = "Tu perfil ha sido actualizado satisfactoriamente.";
		// } else{
			// $errors []= "Lo siento algo ha salido mal intenta nuevamente.";
		// }
	} else {
		$errors []= "Error desconocido.";
	}
	if (isset($errors)){
			
?>
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Error!</strong> 
	<?php
		foreach ($errors as $error) {
			echo $error;
		}
	?>
</div>
<?php
	}
	if (isset($messages)){
?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Bien hecho!</strong>
		<?php
			foreach ($messages as $message) {
				echo $message;
			}
		?>
	</div>
<?php
	}
?>