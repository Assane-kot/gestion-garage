<?php
    $userData = new UserController();
    $idUser = $url[2];
    $user = $userData->findById($idUser);
    $userData->delUser($idUser);
?>