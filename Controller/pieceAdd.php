<?php

$pieceController = new PieceController();
if (isset($_POST['ajouter'])) {
	$nomPiece = $_POST['nomPiece'];
	$refPiece = $_POST['refPiece'];
	$nbPiece = $_POST['nbPiece'];
	//instance de classe User
	$piece = new Piece($nomPiece, $refPiece, $nbPiece);
     
	$pieceController->addPiece($piece);
}