<?php

session_start();
include 'connect.php';
$msg=[];    /*#######   Variable    ####### */

if(isset($_POST['submit'])){

    $login = $_POST['login'];    /*#######   Variable    ####### */
    $password = $_POST['password'];

    $resultat = mysqli_query($mysqli,"SELECT id,login,password FROM utilisateurs WHERE login='$login' and password='$password';");
    $row = $resultat->fetch_all();

    if($row == true) {  /*########  Si $row est vraie on créer des variables de sessions    #######*/
        $_SESSION['id'] = $row[0][0];   /*#######   Variable de Session pour l'id   #######*/
        $_SESSION['login'] = $_POST['login'];   /*#######   Variable de Session pour le login   #######*/
        $_SESSION['password'] = $_POST['password'];     /*#######   Variable de Session pour le password   #######*/
        $msg[0]="Bonjour ".$_SESSION['login'];      /*#######   Message enregistrer dans la variable $msg   #######*/
    }
    

    else {
        $msg[1]="Le login et/ou le mot de passe est incorrect !";       /*#######   Message d'erreur enregistrer dans la variable $msg   #######*/
    }
}

if(isset($_POST["inscription"])){
    header('Location: inscription.php');
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    
    <?php require 'header.php' ?>

    <main>
        <form action="" method="post">

            <label for="login">Login :</label>
            <input type="text" name="login" id="" required="required">

            <label for="password">Password :</label>
            <input type="password" name="password" id=""  required="required">

            <input type="submit" value="Se connecter" name="submit">
        </form>
        <form action="" method="post">
            <button name="inscription">
                Créer un compte
            </button>
        </form>

        <!--  Affichage message d'erreur avec PHP  -->
        <?php foreach($msg as $message):?>
           <div><?php echo ($message); ?></div>
         <?php endforeach; ?>
    </main>

    <?php require 'footer.php' ?>
</body>
</html>