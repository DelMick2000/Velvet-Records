<?php

require "db.php";
$db = connexionBase();

$id = $_GET["id"];

$sql = "SELECT *
       FROM disc
       JOIN artist ON artist.artist_id = disc.artist_id

       where disc_id = :id;";

$requete1 = $db -> prepare($sql);
$requete1 -> bindvalue(":id", $id, PDO::PARAM_STR);
$requete1 -> execute();
$myArtist = $requete1 -> fetch(PDO::FETCH_OBJ);
$requete1 -> closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
	<title>Formulaire Details</title>

</head>
<body>
<h1>Details<h1>
<br>
  <form>
  <div class="row">
    <div class="col">
	<h6 for="formGroupExampleInput">Title</h6>
      <input type="text" class="form-control" value="<?php echo $myArtist -> disc_title ?>">
      
    </div>
    <div class="col">
	<h6 for="formGroupExampleInput">Artist</h6>
      <input type="text" class="form-control" value="<?php echo $myArtist -> artist_name ?>">
    </div>
  </div>
<br>
<div class="row">
    <div class="col">
	<h6 for="formGroupExampleInput">Year</h6>
      <input type="text" class="form-control" value="<?php echo $myArtist -> disc_year ?>">
    </div>
    <div class="col">
	<h6 for="formGroupExampleInput">Genre</h6>
      <input type="text" class="form-control" value="<?php echo $myArtist -> disc_genre ?>">
    </div>
  </div>
<br>
<div class="row">
    <div class="col">
	<h6 for="formGroupExampleInput">Label</h6>
      <input type="text" class="form-control" value="<?php echo $myArtist -> disc_label ?>">
    </div>
    <div class="col">
	<h6 for="formGroupExampleInput">Price</h6>
      <input type="text" class="form-control"value="<?php echo $myArtist -> disc_price ?>">
    </div>
</div>
<form>
<br>
<div class="col">
	<h6 for="formGroupExampleInput">Picture</h6>
    <img src= "<?php echo $myArtist -> disc_picture ?>">
</form><br><br><br>
<a href="discs_form.php?id"><button type="button" class="btn btn-primary">Modifier</button>
<a href=" "><button type="button" class="btn btn-primary">Supprimer</button>
<a href="discs.php"><button type="button" class="btn btn-primary">Retour</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
crossorigin="anonymous"></script>
</body>
</html>