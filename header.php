<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <title>Header</title>
</head>
<body id="body-header">
    <header>
        <nav>
            <ul>
                <?php if(isset($_SESSION['login']) == true): ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="planning.php">Planning</a></li>
                <li><a href="">Reservation</a></li>
                <li><a href="reservation-form.php">Reservation-form</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
                <?php else: ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>   
                <li><a href="planning.php">Planning</a></li>
                <?php endif ?>
                
            </ul>
        </nav>
    </header>
</body>
</html>
