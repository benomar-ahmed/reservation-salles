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
    <link rel="stylesheet" href="file.css">
    <title>Connexion</title>
</head>
<body>
    
    <?php require 'header.php' ?>

    <main id="main-connexion">
        
        <form action="" method="post" id="form-connexion">

            <label for="login" class="label-connexion">Login :</label>
            <input type="text" name="login" id="" required="required" class="element-connexion">

            <label for="password" class="label-connexion">Password :</label>
            <input type="password" name="password" id=""  required="required" class="element-connexion">

            <input type="submit" value="Se connecter" name="submit" id="submit-connexion">

            <!--  Affichage message d'erreur avec PHP  -->
            <?php foreach($msg as $message):?>
            <div id="msg-error" style="color:red;"><?php echo ($message); ?></div>
            <?php endforeach; ?>
            
        </form>
        <form action="" method="post" id="form-connnexion2">
            <button name="inscription" id="header-inscription">
                Créer un compte
            </button>
        </form>

        
    </main>

    <?php require 'footer.php' ?>
</body>
</html>