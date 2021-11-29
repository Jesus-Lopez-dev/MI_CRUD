<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel = "stylesheet" TYPE = "text/css" HREF = "estilos.css" media = "screen">
</head>
<body>
    <?php
        include 'conexion.php';
        $sql="select * from usuarios";
        $resultado=mysqli_query($con,$sql);
    ?>
    <div>
        <a href="agregar.php">Nuevo</a>
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
                        <a href = "editar.php?id=<?php echo $filas['id'] ?>">Editar</a>
                        <a href = "eliminar.php?id=<?php echo $filas['id'] ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>