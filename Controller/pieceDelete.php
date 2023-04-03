<?php

    $pieceData = new PieceController();
    $idPiece = $url[2];
    $piece = $pieceData->findById($idPiece);
    $pieceData->delPiece($idPiece);



?>