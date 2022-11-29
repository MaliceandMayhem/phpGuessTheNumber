<?php

session_start();

if (empty($_SESSION['nombresecret'])) {

    $_SESSION['nombresecret'] = rand(1, 20);
    $_SESSION['essais'] = 1;
}

$nombre = $_SESSION['nombresecret'];
$essai = $_SESSION['essais'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<form guessthenumber="index.php" method="post">
 <p>Devinez le nombre (entre 1 et 20) : <input type="text" name="nombre" /></p>
 <p><input type="submit" value="OK"></p>
</form>

<?php 
$nbuser = $_POST['nombre'];
if($essai >= 5){
    echo "Vous avez perdu.";
    session_destroy();
}

if($nbuser == $nombre){
    echo "Félicitations ! Vous avez devinez le nombre secret !";
    session_destroy();
}
elseif($nbuser > $nombre){
    echo "Votre nombre est plus grand que le nombre à deviner. ";
    $_SESSION['essais']= $essai+1;
    echo "Essai ".$essai." sur 5."; 
}
elseif($nbuser < $nombre){
    echo "Votre nombre est plus petit que le nombre à deviner. ";
    $_SESSION['essais']= $essai+1;
    echo "Essai ".$essai." sur 5.";
}
?>

    
</body>
</html>
