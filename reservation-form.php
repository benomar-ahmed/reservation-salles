<?php

session_start();
require 'connect.php';


if(isset($_POST['submit'])){

    $titre = $_POST['titre'];       /*#######   Variables   #######*/
    $heure_debut = $_POST['heure-debut'];
    $heure_fin = $_POST['heure-fin'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    
    if($heure_debut <= $heure_fin and $heure_debut != $heure_fin){
        $requete = mysqli_query($mysqli,"INSERT INTO `reservations` (`titre`,`description`,`debut`,`fin`,`id_utilisateur`) VALUES ('$titre','$description','$date' '.$heure_debut','$date' '.$heure_fin','".$_SESSION['id']."')");
        echo "Requete effectuer";
    }
    
    else {
        echo "Requête non effectué ";
    }
    $requete2 = mysqli_query($mysqli,"SELECT * FROM reservations");
    $row = $requete2->fetch_all();
    var_dump($row);

}





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
</head>
<body>
    <?php require 'header.php' ?>
    <?= '<p>Utilisateur : '.$_SESSION['login'].'</p>' ?>
    <main>
        <form action="" method="post">

            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="">

            <label for="description">Description :</label>
            <input type="text" name="description" id="">

            <label for="Heure-debut">Heure du début :</label>
            <select name="heure-debut" id="">
                <option value="8">8h</option>
                <option value="9">9h</option>
                <option value="10">10h</option>
                <option value="11">11h</option>
                <option value="12">12h</option>
                <option value="13">13h</option>
                <option value="14">14h</option>
                <option value="15">15h</option>
                <option value="16">16h</option>
                <option value="17">17h</option>
                <option value="18">18h</option>
                <option value="19">19h</option>
            </select>

            <label for="Heure-fin">Heure de fin :</label>
            <select name="heure-fin" id="">
                <option value="9">9h</option>
                <option value="10">10h</option>
                <option value="11">11h</option>
                <option value="12">12h</option>
                <option value="13">13h</option>
                <option value="14">14h</option>
                <option value="15">15h</option>
                <option value="16">16h</option>
                <option value="17">17h</option>
                <option value="18">18h</option>
                <option value="19">19h</option>
            </select>

            <label for="date">Date :</label>
            <input type="date" name="date">

            <input type="submit" value="Réserver" name="submit">
        </form>
    </main>

    <?php require 'footer.php' ?>
</body>
</html>