<?php
    include '../Archivos Web/conexion.php';
    $id=$_GET['id'];
    $sql="select * from usuarios where id='".$id."'";
    $resultado=mysqli_query($con,$sql);
        while($fila=mysqli_fetch_assoc($resultado)){
?>
<div>
    <form>
        <input type="hidden" name="txtid" value="<?php echo $fila['id'] ?>">
        <label>Usuario:</label><br>
        <input type="text" name="txtuser" value="<?php echo $fila['usuario'] ?>"><br>
        <label>Email:</label><br>
        <input type="text" name="txtemail" value="<?php echo $fila['email'] ?>"><br><br>
        <input type="submit" name="" value="Actualizar">
    </form>
    <?php } ?>
</div>
<?php
    $idu=$_GET['txtid'] ??"";
    $user=$_GET['txtuser'] ??"";
    $email=$_GET['txtemail'] ??"";
    if($user!=null || $email!=null){
        $sql2="update usuarios set usuario='".$user."', email='".$email."' where id='".$idu."'";
        mysqli_query($con,$sql2);
        if($user=1){
            header("location:../index.php");
        }
    }

?>