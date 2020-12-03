<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login.php</title>
</head>
<body style="text-align:center;border:solid 2px black;width:50%;height:150%;">
    <h2 style="background-color:purple;height:50px;">Formulaire</h2>
    <form method="post" action="exo2-1_connexions.php">
        <h3 style="color:blue;">Login</h3>
        <input type="text" name="username" id="username" placeholder="Utilisateur" required>
        <br />
        <h3 style="color: red;">Mot de passe</h3>
        <input type="text" name="password" id="password" placeholder="Mot de passe" required>
        <br /> <br /> <br />
        <input type="submit" name="send" value="Envoyer" style="background-color:aqua;border:solid 6px pink">
    </form>
</body>
</html>
<?php

$link = mysqli_connect('localhost', 'root', '', 'san100_exo_lvl2_sql');
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $login = htmlspecialchars($_POST["username"]);
    $before_pass = htmlspecialchars($_POST["password"]);
    $pass = password_hash($before_pass, PASSWORD_DEFAULT);
    $request = "INSERT INTO connexions (user, pass, hour)
    VALUES
    ('$login', '$pass', NOW() );";
    if (isset($_POST["send"])){
        mysqli_query($link, "$request");
        printf("La demande a bien été prise en compte !");
    }
}


/*
include_once ("Medoo.php");
use Medoo\Medoo;
$link = mysqli_connect('localhost', 'root', '', 'san100_exo_lvl2_sql');
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $login = htmlspecialchars($_POST["username"]);
    $before_pass = htmlspecialchars($_POST["password"]);
    $pass = password_hash($before_pass, PASSWORD_DEFAULT);
    $request = $san100_lvl2_sql->insert("connexions", [
        "email" => "$login",
        "pass" => "$pass",
        "hour" => NOW()
    ]);
    if (isset($_POST["send"])){
        mysqli_query($link, "$request");
        printf("La demande a bien été prise en compte !");
    }
}
*/
?>
