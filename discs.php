<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $pdo = connexionBase();

$query = "select
        * 
    from disc d
    join artist a where a.artist_id = d.artist_id";

    $stmt = $pdo->query($query);
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>PDO - Liste</title>
</head>
<body>
    <table>
        <h1>Liste des disques (15)<div class=button><a href="discs_new.php"><button type="button" class="btn btn-primary">Ajouter</button></h1></div>
        <br>
        <tr>
            <!-- Ici, on ajoute une colonne pour insérer un lien -->
            <th></th>
        </tr>
        <?php foreach ($tableau as $ligne): ?>
            <tr>
                <td>
                    <?php
                        $path = "./src/img/";
                        $file = $ligne["disc_picture"];
                        $src = $path . $file;
                    ?>
                        <img src = "<?= $src; ?> "height="300" width="300">
                    </td>
                    <td>
                        <b><?= $ligne["disc_title"]; ?> </b>
                        <div>
                        <b><?= $ligne["artist_name"]; ?></b>
                        <div>
                        <b>Label: </b>
                        <b><?= $ligne["disc_label"]; ?></b>
                        <div>
                        <b>Year: </b>
                        <b><?= $ligne["disc_year"]; ?></b>
                        <div>
                        <b>Genre: </b>
                        <b><?= $ligne["disc_genre"]; ?></b>
                        <div><br>
                        <a href="discs_detail.php?id=<?= $ligne["disc_id"]; ?>"><button type="button" class="btn btn-primary">Détails</button>
                </td>    
            </tr>
        <?php endforeach;?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
crossorigin="anonymous"></script>
</body>
</html>



