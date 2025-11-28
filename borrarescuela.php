<?php
    require_once 'conexion.php';
    $idesc=$_GET['idesc'];
    $sql='delete from escuela where idescuela=:idesc';
    $ps=$cn->prepare($sql);
    $ps->bindParam(':idesc', $idesc);
    $ps->execute();
    header('Location: cargarescuela.php');
?>