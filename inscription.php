<?php

/*#######   Connexion à la base de donnée en incluant le fichier connect.php    #######*/

require  'connect.php';
$msg= [];

if(isset($_POST['submit'])){

    /*#######   Variables    #######*/

    $login = $_POST['login'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify-password'];

    /*#######   Conditions gestions d'erreurs   #######*/

    if($password == $verify_password){      /*#######   Si le password est le même que le verify-password on entre dans la boucle   #######*/
        $requete = mysqli_query($mysqli,"SELECT login FROM utilisateurs WHERE login='$login'");     /*#######   Requête pour savoir s'il existe déjà un utilisateur du même nom     #######*/
        $row = $requete->fetch_all();

        if(empty($row)){    /*#######   Si $row n'affiche rien on rajoute l'utilisateur à la base de donnée sinon on affichera une erreur    #######*/
            $requete1 = mysqli_query($mysqli,"INSERT INTO utilisateurs VALUES(NULL,'$login','$password')"); /*#######       Requête qui créer l'utilisateur dans la base de donnée      #######*/
            header('Location: connexion.php');  /*#######   Redirection connexion.php   #######*/
        }

        else {
            $msg[0]="L'utilisateur existe déjà";
        }
    }

    else {
        $msg[1]="Les mots de passe sont incorrects !";
    }


}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="file.css">
    <title>Inscription</title>
</head>
<body>
    <?php require 'header.php' ?>

    <main id="main-inscription">
        <form action="" method="post" id="form-inscription">

            <label for="login" class="label-inscription">Login :</label>
            <input type="text" name="login"required="required" class="element-inscription">

            <label for="password" class="label-inscription">Password :</label>
            <input type="password" name="password"required="required" class="element-inscription">

            <label for="verify-password" class="label-inscription">Retapez le password :</label>
            <input type="password" name="verify-password" required="required" class="element-inscription">

            <input type="submit" value="S'inscrire" name="submit" id="submit-inscription">

        </form>

        <!--  Affichage message d'erreur avec PHP  -->
        <?php foreach($msg as $message):?>
           <div style="color:red;"><?php echo ($message); ?></div>
        <?php endforeach; ?>

    </main>

    <?php require 'footer.php' ?>
</body>
</html>