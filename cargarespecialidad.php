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
        <h1>Módulo de Especialidades</h1>
        <hr>
        <a href="guardarespecialidad.php">Crear Nuevo</a>
        <?php
            require_once 'conexion.php';
            $sql='select * from especialidad';
            $ps= $cn->prepare($sql);
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