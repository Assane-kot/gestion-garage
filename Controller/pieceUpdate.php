<?php

$pieceController = new PieceController();
if (isset($_POST['modifier'])) {
	$nomPiece = $_POST['nomPiece'];
	$reference = $_POST['reference'];
	$quantite = $_POST['quantite'];
	$idPiece = $_POST['idPiece'];
	$piece = new Piece($nomPiece, $reference, $quantite);
	$pieceController->updatePiece($piece,$idPiece);
}