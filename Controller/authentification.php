<?php 
@session_start();

	$UserController = new UserController();

	if(isset($_POST['cnx'])){
		$mail = htmlspecialchars($_POST['mail']);
		$pwd = htmlspecialchars($_POST['pwd']);
		$result = $UserController->authentification($mail,$pwd);
		if(!empty($result)){
			
			$_SESSION['idlog']=$result['iduser'];
			$_SESSION['nomlog']=$result['nom'];
			$_SESSION['prenomlog']=$result['prenom'];
			$_SESSION['profillog']=$result['profil'];
			$_SESSION['login']=$result['mail'];
			header("location:dashbord");
		}
		else{
			header("location:index.php");
		}
	}
?>