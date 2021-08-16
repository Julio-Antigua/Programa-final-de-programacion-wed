<?php
require('libreria/motores.php'); 

$usr = getUser(true);

if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $query = "SELECT * FROM camiones WHERE Id = '{$id}'";

    $result = dbx::insertar($query); ;
    if( $result == 1 ){
        $row = mysqli_fetch_array($result);
        $marca = $row['Marca'];
        $modelo = $row['Modelo'];
        $color = $row['Color'];
        $comentario = $row['Comentario'];
        $cantidad = $row['CantidadLavadoras'];
        $valor = $row['ValorCarga'];
        $peso = $row['PesoTotal'];
        
    }
}

if(isset($_POST['update'])){
    extract($_POST);
    $id = $_GET['Id'];
    $marca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];
    $color = $_POST['Color'];
    $comentario = $_POST['Comentario'];
    $cantidad = $_POST['CantidadLavadoras'];
    $valor = $_POST['ValorCarga'];
    $peso = $_POST['PesoTotal'];
    



    $query = "UPDATE `camiones` SET `Marca`='{$marca}',`Modelo`='{$modelo}',`Color`='{$color}'
    ,`Comentario`='{$comentario}',`CantidadLavadoras`='{$cantidad}',`ValorCarga`='{$valor}',`PesoTotal`='{$peso}'  WHERE Id = '{$id}'";
     dbx::insertar($query); 

        


    
    echo "
    <div class='alert alert-primary alert-dismissible fade show text-center' role='alert'>
    <strong>Datos del camion guardados!</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>
    ";
    exit;
}    


?>

<form action="id=<?php echo $_GET['Id']; ?>" method="post">
<div class="modal fade" id="editarCamion" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Actualizacion de Camion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
            <div class="form-group">
            <label for="">Marca:</label>
            <input type="text" name="marca" id="marca" value="<?php echo $marca; ?>" class="form-control" placeholder="Marca del camion" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Modelo:</label>
            <input type="text" name="modelo" id="modelo" value="<?php echo $modelo; ?>" class="form-control" placeholder="Modelo del camion" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Color:</label>
            <input type="text" name="color" id="color" value="<?php echo $color; ?>" class="form-control" placeholder="Color del camion" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Comentario:</label>
            <textarea class='form-control' name="comentario" id="comentario"  placeholder="Comentario"  cols="5" rows="3"><?php echo $comentario; ?></textarea>
            </div><br>
            <div class="form-group">
            <label for="">Cantidad de Lavadoras:</label>
            <input type="text" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Cantidad" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Valor de la Carga:</label>
            <input type="text" name="valor" id="valor" value="<?php echo $valor; ?>" class="form-control" placeholder="Valor carga" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Peso total de la Carga:</label>
            <input type="text" name="peso" id="peso" value="<?php echo $peso; ?>" class="form-control" placeholder="Peso total" autofocus>
            </div><br>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="update" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>
