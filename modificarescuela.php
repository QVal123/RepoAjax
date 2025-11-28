<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once 'conexion.php';
        $idesc=$_GET['idesc'];
        $sql='select * from escuela where idescuela=:idesc';
        $ps=$cn->prepare($sql);
        $ps->bindParam(':idesc', $idesc);
        $ps->execute();
        $fila=$ps->fetch();
    ?>
    <div>
        <h1>Modificación de Escuelas</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="txtId" value="<?=$fila[0]?>">
            <input type="text" name="txtNom" value="<?=$fila[1]?>">
            <input type="text" name="txtDes" value="<?=$fila[2]?>">
            <br>
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>

<?php
    if($_POST){
        $id=$_POST['txtId'];
        $nom=$_POST['txtNom'];
        $des=$_POST['txtDes'];
        $sql='update escuela set nombre=:nom, descripcion=:des where idescuela=:id';
        $ps=$cn->prepare($sql);
        $ps->bindParam(':nom', $nom);
        $ps->bindParam(':des', $des);
        $ps->bindParam(':id', $id);
        $ps->execute();
        header('Location: cargarescuela.php');
    }
?>