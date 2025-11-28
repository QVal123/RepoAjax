<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <h1>Inserción de Escuelas</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Ingrese Nombre">
            <input type="text" name="txtDes" placeHolder="Ingrese Descripción">
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>

<?php
    require_once 'conexion.php';
    if($_POST){
        $nom=$_POST['txtNom'];
        $des=$_POST['txtDes'];
        $sql='insert into escuela (nombre, descripcion) values (:nom, :des)';
        $ps=$cn->prepare($sql);
        $ps->bindParam(':nom', $nom);
        $ps->bindParam(':des', $des);
        $ps->execute();
        header('Location: cargarescuela.php');
    }
?>