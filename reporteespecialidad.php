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
        <h1>Especialidades por Escuela</h1>
        <hr>
        <?php
            require_once 'conexion.php';
            $idesc=$_GET['idesc'];
            $sql='select * from especialidad where idescuela=:idesc';
            $ps= $cn->prepare($sql);
            $ps->bindParam(':idesc', $idesc);
            $ps->execute();
            $filas= $ps->fetchAll();
        ?>
        <table border='1'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>IdEscuela</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($filas as $f){
                ?> 
                <tr>
                    <td><?=$f[0]?></td>
                    <td><?=$f[1]?></td>
                    <td><?=$f[2]?></td>
                </tr>
                <?php
                    }       
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

