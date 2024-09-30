<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription a la candidature</title>
   
</head>
<body>
<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_données = "db_candidature";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_données);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$sex=$_POST['sex'];
$cv=$_POST['cv'];
$letter=$_POST['letter'];
$level=$_POST['level'];

// Préparer et exécuter la requête d'insertion
$sql = "INSERT INTO Candidature (nom, email, telephone, sex, cv, letter, level) VALUES ('$nom', '$email', '$telephone','$sex','$cv','$letter','$level')";
if ($connexion->query($sql) === TRUE) {
    echo "Candidature réussie !";
} else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
}

// Fermer la connexion
$connexion->close();
?>

<h2><a href="index.html"></a> </h2>
<h2><a href="view.php"></a> </h2>
   </body>
</html>
