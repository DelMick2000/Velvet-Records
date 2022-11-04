<?php
    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $pdo = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $query = "select
        a.artist_name,
        a.artist_url 
    from artist a";

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
    <title>Formulaire Ajout</title>
  
  <form enctype="multipart/form-data" action="script_disc_ajout.php" method="post">
    <fieldset>
</head>
<body>
<h1>Ajouter un vinyle</h1>
<br>

  <div class="form-group">
    <label for="formGroupExampleInput">Title</label>
    <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter title">
  </div><br>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Artist</label>
    <select name="artist" class="form-control" id="exampleFormControlSelect1">
      <?php foreach ($tableau as $ligne): ?>
        <option><b><?= $ligne["artist_name"]; ?></b></option>
      <?php endforeach;?>
    </select>
  </div><br>

  <div class="form-group">
    <label for="formGroupExampleInput">Year</label>
    <input name="year" type="text" class="form-control" placeholder="Enter year">
  </div><br>

  <div class="form-group">
    <label for="formGroupExampleInput">Genre</label>
    <input name="genre" type="text" class="form-control" placeholder="Enter genre (Rock, Pop, Prog...)">
  </div><br>

  <div class="form-group">
    <label for="formGroupExampleInput">Label</label>
    <input name="label" type="text" class="form-control" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale...)">
  </div><br>

  <div class="form-group">
    <label for="formGroupExampleInput">Price</label>
    <input name="price" type="text" class="form-control">
  </div><br>

  <div class="form-group">
    <label for="exampleFormControlFile1">Picture</label><br><br>
    <input name="picture" type="file" class="form-control-file">
  </div><br>

  <a href="script_disc_ajout.php"><button name="ajouter" type="button" class="btn btn-primary">Ajouter</button>
  <a href="discs.php"><button name="retour" type="button" class="btn btn-primary">Retour</button>
    </fieldset>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
crossorigin="anonymous"></script>
</body>
</html>