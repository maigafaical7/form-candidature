<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription à la candidature</title>
</head>
<body>

<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "init_php";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérification des données du formulaire
    $nom = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
    $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
    $cv= isset($_POST['cv']) ? $_POST['cv'] : '';
    $letter = isset($_POST['letter']) ? $_POST['letter'] : '';
    $level = isset($_POST['level']) ? $_POST['level'] : '';


    // Préparer et exécuter la requête d'insertion
    $sql = "INSERT INTO Candidature (nom, email, telephone, sex, cv, letter, level) 
            VALUES ('$nom', '$email', '$telephone', '$sex', '$cv', '$letter', '$level')";

    if ($connexion->query($sql) === TRUE) {
        echo "Inscription réussie !";
    } else {
        echo "Erreur : " . $sql . "<br>" . $connexion->error;
    }
}

// Fermer la connexion
$connexion->close();
?><br><br>
<!--<button><a href="view.php">Visualiser les donnees.</a></button>-->
<button><a href="index.html">S'inscrire</a></button>

</body>
</html>
