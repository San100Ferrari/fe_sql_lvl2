
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1</title>
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

$connectTo = mysqli_connect('localhost', 'root', '', 'san100_exo_sql_lvl2');
/*if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}*/
/*mysqli_set_charset($connectTo, "utf8");*/

if (isset($_POST["username"]) && isset($_POST["password"])) {
    echo "test";
    $login = $_POST["username"];
    $pass = $_POST["password"];
    $sql="INSERT INTO connexions (user, pass, hour) VALUES ($login, $pass, NOW());";
    mysqli_query($connectTo,$sql); }

/*$table = "CREATE TABLE connexions (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user VARCHAR(100),
    pass VARCHAR(100),
    hour DATETIME
)";*/
/*if (mysqli_query($connectTo, "CREATE TABLE connexions (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user VARCHAR(100),
    pass VARCHAR(100),
    hour DATETIME
)") === TRUE) {
    printf("Table myCity créée avec succès.\n");
}*/

/*if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["submit"])) {
    if (mysqli_query($connectTo, "INSERT INTO connexions (user, pass, hour)
    VALUES
    ($login, $pass, DATE(NOW())") === TRUE) {
        printf("Votre formulaire a bien été expédié !");
    }
}*/

/*if (isset($_POST["submit"])) {
    if (isset($login) && isset($pass)) {
        if (mysqli_query($connectTo, "INSERT INTO connexions (user, pass, hour)
        VALUES
        ($login, $pass, DATE(NOW())") === TRUE) {
        printf("Votre formulaire a bien été expédié !");
        }
    }
}*/

/*if (isset($_POST["submit"])) {
    $login=htmlspecialchars($_POST["login"]);
    $trueLogin = !empty($login);
    $pass=htmlspecialchars($_POST["pass"]);
    $truePass = !empty($pass);
    $connectTo = mysqli_connect('localhost','root','','san100_exo_sql_lvl2');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    if ($trueLogin == true && $truePass == true) {
        
    }
}*/
?>