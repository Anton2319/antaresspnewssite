<?php
session_start();
if($_SESSION['Type']!="admin") {
    echo("<img src='accessdenited.jpg' height='100%'/>");
    exit(0);
}
if(!$db) {
    $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    if(!$db) {
        $db = mysqli_connect("localhost", "id11638235_admin", "open2319", "id11638235_maindb");
    }
}
$id = $_POST['id'];
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
function remove($db, $id) {
    $responce = mysqli_query($db, "DELETE FROM `articles` WHERE id = ".$id);
}
//Бекапим данные
$backup = getfromdb($db, $id);
file_put_contents("backups/backup-article".$id.".txt", $backup['Header'], FILE_APPEND);
file_put_contents("backups/backup-article".$id.".txt", $backup['Introtext'], FILE_APPEND);
file_put_contents("backups/backup-article".$id.".txt", $backup['Text'], FILE_APPEND);
file_put_contents("backups/backup-article".$id.".txt", $backup['Author'], FILE_APPEND);
//Удаляем
remove($db, $id);
header("Location: //antaresnews.tk/admin");
?>
