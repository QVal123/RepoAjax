<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <h1>Inserción de Especialidades</h1>
        <hr>
        <form action="" method="post">
            <input type="text" name="txtNom" placeHolder="Ingrese Nombre">
            <select name="cbxIdEsc">
                <option value="0">Seleccione Escuela</option>
                <?php
                    require_once 'conexion.php';
                    $sql='select * from escuela';
                    $ps= $cn->prepare($sql);
                    $ps->execute();
                    $filas= $ps->fetchAll();
                    foreach($filas as $f){
                ?>
                <option value="<?=$f[0]?>"><?=$f[1]?></option>
                <!--          id a guardar   texto a mostrar-->
                <?php
                    }
                ?>
            </select>
            <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>

<?php
    if($_POST){
        $nom=$_POST['txtNom'];
        $idesc=$_POST['cbxIdEsc'];
        $sql='insert into especialidad (nombre, idescuela) values (:nom, :idesc)';
        $ps=$cn->prepare($sql);
        $ps->bindParam(':nom', $nom);
        $ps->bindParam(':idesc', $idesc);
        $ps->execute();
        header('Location: cargarespecialidad.php');
    }
?>