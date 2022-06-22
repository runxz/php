<?php 
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud_word') or die(mysqli_error($mysqli));

if (isset($_POST['simpan'])){
    $data = $_POST['data'];

    $mysqli->query("insert into crud_word (data, waktu) values ('$data',curtime())") or
        die($mysqli ->error);

    $_SESSION['message'] = "data tersimpan!";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
}


if(isset ($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli -> query("delete from crud_word where id=$id") or die($mysqli->error);

    $_SESSION['message'] = "data sudah dihapus";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}