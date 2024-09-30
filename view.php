<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données de candidature</title>

</head>
<body>
    <h1>Données de candidature</h1>
    <div class="container">
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

        // Récupérer les données d'inscription depuis la base de données
        $sql = "SELECT * FROM Candidature";
        $resultat = $connexion->query($sql);

        if ($resultat->num_rows > 0) {
            // Afficher les données dans un tableau
            echo "<table>";
            echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Telephone</th><th>Sex</th><th>CV</th><th>Letter</th><th>Level></th></tr>";
            while ($row = $resultat->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["nom"]."</td><td>".$row["email"]."</td><td>".$row["telephone"].$row["sex"].$row["cv"].$row["letter"].$row["level"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Aucune donnée d'inscription trouvée.";
        }

        // Fermer la connexion
        $connexion->close();
        ?>
    </div>
    <h2><a href="connexion.php">Se connecter</a></h2>
    <h2><a href="view.php">Se connecter</a></h2>
</body>
</html>
