<?php
session_start();
if(isset($_SESSION['Type'])) {
    if($_SESSION['Type']!="admin") {
        echo("<img src='accessdenited.jpg' height='100%'/>");
        exit(0);
    }
}
else {
    exit(0);
}
$header = $_POST['header'];
$introtext = $_POST['introtext'];
$text = $_POST['text'];
$author = $_POST['author'];
$id = $_POST['id'];
$db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
if(!$db) {
    $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    if(!$db) {
        $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    }
}
function countdb($db) {
    $responce = mysqli_query($db, "SELECT COUNT(1) FROM `articles`");
    $result = mysqli_fetch_array($responce);
    return $result[0];
}
function getfromdb($db, $id) {
    $responce = mysqli_query($db, "SELECT * FROM `articles` WHERE id = ".$id);
    $result = mysqli_fetch_assoc($responce);
    return $result;
}
function publish($header, $introtext, $text, $author, $id, $db) {
    $responce = mysqli_query($db, "UPDATE `articles` SET `Header` = '".$header."' WHERE `articles`.`id` = ".$id);
    $responce = mysqli_query($db, "UPDATE `articles` SET `Introtext` = '".$introtext."' WHERE `articles`.`id` = ".$id);
    $responce = mysqli_query($db, "UPDATE `articles` SET `Text` = '".$text."' WHERE `articles`.`id` = ".$id);
    $responce = mysqli_query($db, "UPDATE `articles` SET `Author` = '".$author."' WHERE `articles`.`id` = ".$id);
}
publish($header, $introtext, $text, $author, $id, $db);
header("Location http://antaresnews.tk/admin");
?>