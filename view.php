<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Données de candidature</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Données de candidature</h1>
    <div class="container">
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

        // Récupérer les données d'inscription depuis la base de données
        $sql = "SELECT * FROM Candidature";
        $resultat = $connexion->query($sql);

        if ($resultat->num_rows > 0) {
            // Afficher les données dans un tableau
            echo "<table>";
            echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Téléphone</th><th>Sexe</th><th>CV</th><th>Lettre</th><th>Niveau d'étude</th></tr>";
            while ($row = $resultat->fetch_assoc()) {
                // Générer des liens de téléchargement pour le CV et la lettre
                $cv_link = "uploads/" . $row["cv"];
                $letter_link = "uploads/" . $row["letter"];
                
                echo "<tr>
                         <td>".$row["id"]."</td>
                         <td>".$row["nom"]."</td>
                         <td>".$row["email"]."</td>
                         <td>".$row["telephone"]."</td>
                         <td>".$row["sex"]."</td>
                         <td><a href='$cv_link' download>".$row["cv"]."</a></td>
                         <td><a href='$letter_link' download>".$row["letter"]."</a></td>
                         <td>".$row["level"]."</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Aucune donnée d'inscription trouvée.";
        }

        // Fermer la connexion
        $connexion->close();
        ?>
    </div><br><br>

    <button><a href="index.html">S'inscrire</a></button>

</body>
</html>
