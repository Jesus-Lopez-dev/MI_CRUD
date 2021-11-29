<?php
    include 'conexion.php';
    $id=$_GET['id'];
    $sql="delete from usuarios where id='".$id."'";
    mysqli_query($con,$sql);
    header('location:index.php');
?>