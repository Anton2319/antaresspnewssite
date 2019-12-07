<?php
$header = $_GET['header'];
$introtext = $_GET['introtext'];
$text = $_GET['text'];
$author = $_GET['author'];
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
function publish($header, $introtext, $text, $author, $db) {
    $id = countdb($db) + 1;
    $responce = mysqli_query($db, "INSERT INTO `articles`(`Header`, `Introtext`, `Text`, `Author`, `id`) VALUES ('".$header."','".$introtext."','".$text."','".$author."',".$id.")");
    if($responce) {
        header("Location http://antaresnews.tk/admin");
    }
}
publish($header, $introtext, $text, $author, $db);
$dblenght = countdb($db);
?>