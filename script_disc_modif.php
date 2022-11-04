<?php

	require "db.php";
	$db = ConnexionBase();

	$requete3 = $db -> prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id");
	$requete3 -> execute();
	$requete3 -> closeCursor();

	$id2 = (isset($_POST["id"]) && $_POST["id"] != "") ? $_POST["id"] : Null;
	$nom2 = (isset($_POST["artist_name"]) && $_POST["artist_name"] != "") ? $_POST["artist_name"] : Null;
	$url2 = (isset($_POST["artist_url"]) && $_POST["artist_url"] != "") ? $_POST["artist_url"] : Null;
	$title = (isset($_POST["disc_title"]) && $_POST["disc_title"] != "") ? $_POST["disc_title"] : Null;
	$year2 = (isset($_POST["disc_year"]) && $_POST["disc_year"] != "") ? $_POST["disc_year"] : Null;
	$genre2 = (isset($_POST["disc_genre"]) && $_POST["disc_genre"] != "") ? $_POST["disc_genre"] : Null;
	$label2 = (isset($_POST["disc_label"]) && $_POST["disc_label"] != "") ? $_POST["disc_label"] : Null;
	$price2 = (isset($_POST["disc_price"]) && $_POST["disc_price"] != "") ? $_POST["disc_price"] : Null;


if ($id2 == Null) {
	header("Location: disc.php");
}

elseif ($nom2 == Null || $url2 == Null) {
	header("Location: disc_detail.php?id=".$id2);
	exit;
}

try {
	$requete2 = $db -> prepare("UPDATE artist SET artist_name = :nom, artist_url = :url WHERE artist_id = :id;");
	$requete2 -> bindValue(":id", $id2, PDO::PARAM_INT);
	$requete2 -> bindValue(":nom", $nom2, PDO::PARAM_INT);
	$requete2 -> bindValue(":url", $url2, PDO::PARAM_INT);
	$requete2 -> bindValue(":title", $title2, PDO::PARAM_INT);
	$requete2 -> bindValue(":year", $year2, PDO::PARAM_INT);
	$requete2 -> bindValue(":genre", $genre2, PDO::PARAM_INT);
	$requete2 -> bindValue(":label", $label2, PDO::PARAM_INT);
	$requete2 -> bindValue(":price", $price2, PDO::PARAM_INT);

	$requete2 -> execute();
	$requete2 -> closeCursor();

}

catch (Exepeption $e) {
	echo "Erreur :" . $requete2 -> errorInfo()[2] . "<br>";
	die("Fin du script (script_disc_modif.php");
}

header("Location: disc_detail.php?id=" . $id2);
exit;


?>