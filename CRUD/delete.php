<?php
    include "conecta.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = " DELETE from `registros` where id=$id";
        $conn->query($sql);
    }
    header('location:/CRUD/index.php');
    exit;
?>