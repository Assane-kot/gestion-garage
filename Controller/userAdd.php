<?php
include('UserController.php');
$userController = new UserController();
if (isset($_POST['ajouter'])) {
	$prenom = $_POST['preUser'];
	$nom = $_POST['nomUser'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$profil = $_POST['profil'];
	$user = new User($prenom, $nom, $email, $pwd, $profil);
	$userController->addUser($user);
}