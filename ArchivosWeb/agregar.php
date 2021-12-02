<div>
    <form>
        <label>Usuario:</label><br>
        <input type="text" name="txtuser"><br>
        <label>Email:</label><br>
        <input type="text" name="txtemail"><br><br>
        <input type="submit" name="" value="Agregar">
        <a href="index.php">Regresar</a>
    </form>
</div>
<?php
    include '../ArchivosWeb/conexion.php';
    $user=$_GET['txtuser'] ??"";
    $email=$_GET['txtemail'] ??"";
    if($user!=null || $email!=null){
        $sql="insert into usuarios(usuario, email) values('".$user."', '".$email."')";
        mysqli_query($con,$sql);
        if ($user=1){
            header("location:../index.php");
        }
    }
?>