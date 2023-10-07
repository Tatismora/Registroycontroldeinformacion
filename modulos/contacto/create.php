<?php 

if($_POST){

    $nombre=(isset($_POST['nombre_completo'])?$_POST['nombre_completo']:"");
    $correo=(isset($_POST['correo'])?$_POST['correo']:"");
    $usuario=(isset($_POST['usuario'])?$_POST['usuario']:"");
    $contrasena=(isset($_POST['contrasena'])?$_POST['contrasena']:"");
    
    $stm=$conexion->prepare("INSERT INTO contactos(id,nombre_completo,correo,usuario,contrasena)
    VALUES(NULL,:nombre_completo,:correo,:usuario,:contrasena)");

    $stm->bindParam(":nombre_completo",$nombre);
    $stm->bindParam(":correo",$correo);
    $stm->bindParam(":usuario",$usuario);
    $stm->bindParam(":contrasena",$contrasena);

    $stm->execute();

    header("location:index.php");

}

?>
<!-- Modal CREARRE -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Nombre completo</label>
        <input type="text" class="form-control" name= "nombre_completo" value="" placeholder="Ingresar nombre">

        <label for="">Correo elecronico</label>
        <input type="text" class="form-control" name= "correo" value="" placeholder="Ingresar Correo electronico">

        <label for="">Usuario</label>
        <input type="text" class="form-control" name= "usuario" value="" placeholder="Ingresar un usuario">

        <label for="">Contraseña</label>
        <input type="password" class="form-control" name= "contrasena" value="" placeholder="Ingresar contraseña">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div>