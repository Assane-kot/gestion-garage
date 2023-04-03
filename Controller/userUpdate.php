<?php
include('UserController.php');
$userController = new UserController();
if (isset($_POST['modifier'])) {
	$prenom = $_POST['preUser'];
	$nom = $_POST['nomUser'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$profil = $_POST['profil'];
	$idUser = $_POST['idUser'];
	$user = new User($prenom, $nom, $email, $pwd, $profil);
	$userController->updateUser($user,$idUser);
}