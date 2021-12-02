<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link href="ArchivosWeb/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
        include 'ArchivosWeb/conexion.php';
        $sql="select * from usuarios";
        $resultado=mysqli_query($con,$sql);
    ?>
    <div>
        <a href="ArchivosWeb/agregar.php">Nuevo</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>USUARIO</th>
                    <th>EMAIL</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['usuario'] ?></td>
                    <td><?php echo $filas['email'] ?></td>
                    <td>
                        <a href = "ArchivosWeb/editar.php?id=<?php echo $filas['id'] ?>">Editar</a>
                        <a href = "ArchivosWeb/eliminar.php?id=<?php echo $filas['id'] ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>