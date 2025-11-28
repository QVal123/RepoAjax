<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h1>Generar Reporte de Especialidades</h1>
    <hr>
    <select name="cbxIdEsc" id="cbxIdEsc" onchange="generarreporte();">
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
    <div id="res">

    </div> 
</body>
</html>
<!--<script>
    function generarreporte(){
        idesc=document.getElementById('cbxIdEsc').value;
        window.location.href='reporteespecialidad.php?idesc='+idesc;
    }
</script>-->
<script>
    function generarreporte(){
        //PETICIÓN ASÍNCRONA
        idesc= $('#cbxIdEsc').val();
        console.log(idesc);
        param={'idesc':idesc};
        $.ajax({
            url:'reporteespecialidad.php',
            data: param,
            type:'get',
            success: function(res){
                $('#res').html(res); 
            }
    });
}
</script>