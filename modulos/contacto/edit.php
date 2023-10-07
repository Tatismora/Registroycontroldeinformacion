
<?php
include('../../conexion_be.php');

if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("SELECT * FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $nombre=$registro['nombre_completo'];
    $correo=$registro['correo'];
    $usuario=$registro['usuario'];
    $contrasena=$registro['contrasena'];
    
}

if($_POST){
    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $nombre=(isset($_POST['nombre_completo'])?$_POST['nombre_completo']:"");
    $correo=(isset($_POST['correo'])?$_POST['correo']:"");
    $usuario=(isset($_POST['usuario'])?$_POST['usuario']:"");
    $contrasena=(isset($_POST['contrasena'])?$_POST['contrasena']:"");
    
    $stm=$conexion->prepare("UPDATE contactos SET nombre_completo=:nombre_completo,correo=:correo,usuario=:usuario,contrasena=:contrasena WHERE id=:txtid");

    $stm->bindParam(":txtid",$txtid);
    $stm->bindParam(":nombre_completo",$nombre);
    $stm->bindParam(":correo",$correo);
    $stm->bindParam(":usuario",$usuario);
    $stm->bindParam(":contrasena",$contrasena);

    $stm->execute();

    header("location:index.php");

}


?>

<?php include ('../../template/header.php'); ?>

<form action="" method="post">
      
        <input type="hidden" class="form-control" name= "txtid" value="<?php echo $txtid; ?>" placeholder="Ingresar nombre">

        <label for="">Nombre completo</label>
        <input type="text" class="form-control" name= "nombre_completo" value="<?php echo $nombre; ?>" placeholder="Ingresar nombre">

        <label for="">Correo elecronico</label>
        <input type="text" class="form-control" name= "correo" value="<?php echo $correo; ?>" placeholder="Ingresar Correo electronico">

        <label for="">Usuario</label>
        <input type="text" class="form-control" name= "usuario" value="<?php echo $usuario; ?>" placeholder="Ingresar un usuario">

        <label for="">Contraseña</label>
        <input type="password" class="form-control" name= "contrasena" value="<?php echo $contrasena; ?>" placeholder="Ingresar contraseña">

      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">cancelar</a>
        <button type="submit" class="btn btn-success">Actualizar</button>
      </div>
      </form>

      <?php include ('../../template/footer.php'); ?>