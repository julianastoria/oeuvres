<?php

define("TABLE_AUTEURS", "auteurs");

function auteurExists($nom) {
	global $pdo;
    $q = "SELECT id FROM `".TABLE_AUTEURS."` WHERE nom=:nom";
    $q = $pdo->prepare($q);
    $q->bindValue(":nom", $nom, PDO::PARAM_STR);
    $q->execute();
    return $q->fetch(PDO::FETCH_OBJ) ? true : false;
}

function addAuteur($params=[]) {
    global $pdo, $default_users_roles;
    $login      = isset($params['login']) ? $params['login'] : null;
    $password   = isset($params['password']) ? $params['password'] : null;
    $firstname  = isset($params['firstname']) ? $params['firstname'] : null;
    $lastname   = isset($params['lastname']) ? $params['lastname'] : null;
    $gender     = isset($params['gender']) ? $params['gender'] : null;
    $birthday   = isset($params['birthday']) ? $params['birthday'] : null;

    $q = "INSERT INTO `".TABLE_USERS."` (`firstname`,`lastname`,`roles`,`email`,`password`,`genre`,`birthday`,`signup_datetime`) VALUES (:firstname, :lastname, :roles, :email, :password, :gender, :birthday, NOW())";
    $q = $pdo->prepare($q);
    $q->bindValue(":firstname", $firstname, PDO::PARAM_STR);
    $q->bindValue(":lastname", $lastname, PDO::PARAM_STR);
    $q->bindValue(":roles", implode(ROLES_GLUE, $default_users_roles), PDO::PARAM_STR);
    $q->bindValue(":email", $login, PDO::PARAM_STR);
    $q->bindValue(":password", $password, PDO::PARAM_STR);
    $q->bindValue(":gender", $gender, PDO::PARAM_STR);
    $q->bindValue(":birthday", $birthday, PDO::PARAM_STR);
    $q->execute();
    $q->closeCursor();

    return $pdo->lastInsertId();
}