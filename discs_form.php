<?php
    require "db.php";
    $db = ConnexionBase();

// print_r($_GET["id"]);
// die();

    $requete2 = $db -> prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id = :id");
    $requete2 -> bindValue(":id", $_GET["id"], PDO::PARAM_STR);
    $requete2 -> execute();
    $myArtist = $requete2 -> fetch(PDO::FETCH_OBJ);
    $requete2 -> closeCursor();

    $requete = $db -> prepare("SELECT * FROM artist WHERE artist_id=?");
    $requete -> execute(array($_GET["id"]));
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
	<title>Modifier un vinyle</title>

 <form action="script_disc_modif.php" method="post">
    <fieldset>
</head>
<body>
<h1>Modifier un vinyle</h1>
<br>

  <div class="form-group">
    <h6 for="formGroupExampleInput">Title</h6>
    <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter title" value="<?php echo $myArtist -> disc_title ?>">
  </div><br>

  <div class="form-group">
    <h6 for="exampleFormControlSelect1">Artist</h6>
    <select name="artist" class="form-control" id="exampleFormControlSelect1" value="<?php echo $myArtist -> artist_name ?>">
    </select>
  </div><br>

  <div class="form-group">
    <h6 for="formGroupExampleInput">Year</h6>
    <input name="year" type="text" class="form-control" placeholder="Enter year" value="<?php echo $myArtist -> disc_year ?>">
  </div><br>

  <div class="form-group">
    <h6 for="formGroupExampleInput">Genre</h6>
    <input name="genre" type="text" class="form-control" placeholder="Enter genre (Rock, Pop, Prog...)" value="<?php echo $myArtist -> disc_genre ?>">
  </div><br>

  <div class="form-group">
    <h6 for="formGroupExampleInput">Label</h6>
    <input name="label" type="text" class="form-control" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale...)" value="<?php echo $myArtist -> disc_label ?>">
  </div><br>

  <div class="form-group">
    <h6 for="formGroupExampleInput">Price</h6>
    <input name="price" type="text" class="form-control" value="<?php echo $myArtist -> disc_price ?>">
  </div><br>

  <div class="form-group">
    <h6 for="exampleFormControlFile1">Picture</h6><br><br>
    <input name="picture" type="file" class="form-control-file" value="<?php echo $myArtist -> disc_picture ?>">
  </div><br>

  <a href=""><button name="ajouter" type="button" class="btn btn-primary">Modifier</button>
  <a href="discs.php"><button name="retour" type="button" class="btn btn-primary">Retour</button>
    </fieldset>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
crossorigin="anonymous"></script>
</body>
</html>