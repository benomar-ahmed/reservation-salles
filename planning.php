<?php

require 'connect.php';
// $i=12;

// date("D d M  Y",mktime(0,0,0,12,12,2022));

$jour = ["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Planning</title>
</head>
<body>
    <main>
        <table>
        <thead>
            <tr>
                <?php for ($i = 0; $i <7 ; $i++):?>
                    <?= $jour[$i]?>
                    <?php for ($j = 8; $j < 20; $j++): ?>
                    
                        <td><?= $j  ?></td>

                    
                    <?php endfor ?>
                    </tr>
                    <?php endfor ?>



            
        </thead>
            
        </table>
    </main>
</body>
</html>