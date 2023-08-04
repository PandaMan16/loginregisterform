<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=online_forma_pro', 'root', 'XXXXXX');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->exec("SET NAMES 'utf8';");

    // echo "ok";
}
catch(Exception $e)
{
        echo 'Erreur : '.$e->getMessage();
}

$register = $bdd->prepare('INSERT INTO loginform (name, email, password) VALUES (?,?,?)');
$login = $bdd->prepare('SELECT * FROM loginform WHERE email LIKE ?');