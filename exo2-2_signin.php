<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin.php</title>
    </head>
    <body>
        <h1>Formulaire d'inscription</h1>
        <form method="post">
            
            <h3>Nom</h3>
            <input type="text" name="nom" placeholder="Saisissez votre nom" />
            <h3>Prénom</h3>
            <input type="text" name="prenom" placeholder="Saisissez votre prénom" />
            <h3>Mail</h3>
            <input type="text" name="mail" placeholder="Saisissez votre addresse mail" />
            <h3>Mot de passe</h3>
            <input type="password" name="mdp" placeholder="Saisissez votre mot de passe" />
            <h3>Vous êtes un</h3>
            <div>
                <input type="radio" name="radio" id="particulier" value="0" checked />
                <label for="particulier">Particulier</label>
                <input type="radio" name="radio" id="professionnel" value="1" />
                <label for="professionnel">Professionnel</label> 
            </div>
            <br /> <br />
            <div>
                <input type="checkbox" name="ok" id="checkbox" />
                <label for="checkbox">Je reconnais avoir pris connaissance des conditions d'utilisations et y adhère totalement !</label>
            </div>
            <br /> <br />
            <input type="submit" name="send" value="Valider" />
            
        
        </form>
    </body>
</html>


<?php
$link=mysqli_connect('localhost', 'root', '', 'san100_exo_lvl2_sql');
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($link,"utf8");
//faire les tests
if (count($_POST) > 0) {
    $mail = htmlspecialchars($_POST["mail"]) ;
    $nom = htmlspecialchars($_POST["nom"]) ;
    $prenom = htmlspecialchars($_POST["prenom"]) ;
    $radio = htmlspecialchars($_POST["radio"]) ;
    $mdp = htmlspecialchars($_POST["mdp"]) ;

    if  (! isset($_POST["nom"]) || empty($_POST["nom"])) {
        echo "Vous devez saisir un nom !" ;
    } else if (! isset($_POST["prenom"]) || empty($_POST["prenom"])) {
        echo "Vous devez saisir un prénom !" ;
    } else if (! isset($_POST["mail"]) || empty($_POST["mail"])) {
        echo "Vous devez saisir un email !" ;
    } else if (! isset($_POST["mdp"]) || empty($_POST["mdp"])) {
        echo "Vous devez saisir un mot de passe !" ;
    } else if (! isset($_POST["ok"]) || empty($_POST["ok"])) {
        echo "Vous devez accepter les conditions d'utilisations !" ;
    } else {
        $pass = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (nom, prenom, mail, pass, valeur)
        VALUES 
        ('$nom','$prenom', '$mail', '$pass', '$radio');";
        if (isset($_POST["send"])) {
            mysqli_query($link,$sql);
            printf("La demande a bien été prise en compte !");
        }
    }
}
?>