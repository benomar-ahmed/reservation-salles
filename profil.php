<?php

session_start();
require 'connect.php';

$msg= [];

if(isset($_POST['submit'])){

    $login = $_POST['new-login'];
    $new_password = $_POST['new-password'];
    $password = $_POST['password'];

    if($_POST['password'] == $_SESSION['password']){
        $resultat = mysqli_query($mysqli,"UPDATE utilisateurs SET login='$login',password = '$new_password' WHERE login='".$_SESSION['login']."'");

        if(isset($_SESSION['login'])){
            $msg[0]="Votre profil à été mis à jour ".$_SESSION['login']." --> ".$_POST['new-login'];
        }
    }

    else {
        $msg[1]="Votre mot de passe actuel est incorrect ";
    }

}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <?php require 'header.php' ?>

    <main>
        <form action="" method="post">
            
            <label for="login">Login actuel :</label>
            <input type="text" name="login" id="" value=<?php echo $_SESSION['login'] ?>>

            <label for="password">Votre mot de passe actuel :</label>
            <input type="password" name="password" id="" required="required">  

            <label for="new-login">Tapez votre nouveau login :</label>
            <input type="text" name="new-login" id="" required="required">

            <label for="new-password">Tapez votre nouveau mot de passe :</label>
            <input type="password" name="new-password" id="" required="required">

            <input type="submit" value="Modifier" name="submit">
        </form>

        <!--  Affichage message d'erreur avec PHP  -->
        <?php foreach($msg as $message):?>
            <div><?php echo ($message); ?></div>
        <?php endforeach; ?>

    </main>

    <?php require 'footer.php' ?>
</body>
</html>