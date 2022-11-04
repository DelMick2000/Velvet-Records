<?php
echo var_dump($_POST);

if(isset($_POST["title"]) && $_POST["title"] != "") {
    $title = $_POST["title"];
}

else {
    $title = Null;
}

$artist = (isset($_POST["artist"]) && $_POST["artist"] != "") ? $_POST["artist"] : Null;
$year = (isset($_POST["year"]) && $_POST["year"] != "") ? $_POST["year"] : Null;
$genre = (isset($_POST["genre"]) && $_POST["genre"] != "") ? $_POST["genre"] : Null;
$label = (isset($_POST["label"]) && $_POST["label"] != "") ? $_POST["label"] : Null;
$price = (isset($_POST["price"]) && $_POST["price"] != "") ? $_POST["price"] : Null;

if ($title == Null || $artist == Null || $year == Null || $genre == Null || $label == Null || $price == Null ) {
    header("location: discs_new.php");
}

require "db.php";
$db = ConnexionBase();

try {
    $requete = $db -> prepare("INSERT INTO disc (disc_title, artist_id, disc_year, disc_label, disc_genre, disc_price, disc_picture) VALUES (:title,2, :year, :label,:genre, :price, null);");

    $requete -> bindvalue(":title", $title, PDO::PARAM_STR);
    $requete -> bindvalue(":year", $year, PDO::PARAM_STR);
    $requete -> bindvalue(":genre", $genre, PDO::PARAM_STR);
    $requete -> bindvalue(":label", $label, PDO::PARAM_STR);
    $requete -> bindvalue(":price", $price, PDO::PARAM_STR);

    $requete -> execute();

    $requete -> closeCursor();
    echo "ok";
}

catch (Exeption $e) {
    var_dump($requete -> queryString);
    var_dump($requete -> errorInfo());

    echo "Erreur : " . $requete -> errorInfo()[2] . "<br>";
    echo "Erreur 2 :" . $e -> getmessage();
}
?>