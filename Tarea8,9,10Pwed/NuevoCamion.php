<?php

$usr = getUser(true);

if($_POST){
    extract($_POST);


    $sql = "INSERT INTO camiones(Marca, Modelo, Color, Comentario, CantidadLavadoras,  ValorCarga, PesoTotal, Usuario_Id) 
    VALUES ('{$marca}','{$modelo}','{$color}','{$comentario}','{$cantidad}','{$valor}','{$peso}','{$usr->Id}')";
    dbx::insertar($sql);
    $id = mysqli_insert_id(dbx::$instancia->conexion);
    echo "
    <script>
        alert('Datos del camion Guardado');
        window.location = 'index.php';
    </script>
    ";
    
    exit;
}


?>

<form action="" method="post">
<div class="modal fade" id="crearCamion" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Creacion de Camion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
            <div class="form-group">
            <label for="">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control"  placeholder="Marca del camion" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo del camion" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Color:</label>
            <input type="text" name="color" id="color" class="form-control" placeholder="Color del camion" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Comentario:</label>
            <textarea class='form-control' name="comentario" id="comentario" placeholder="Comentario"  cols="5" rows="3"></textarea>
            </div><br>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>
