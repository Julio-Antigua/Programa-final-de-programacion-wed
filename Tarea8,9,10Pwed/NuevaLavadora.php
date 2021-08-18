<?php
include_once('libreria/motores.php');

if(isset($_GET['id'])){
    $idc = $_GET['id'];
    $query2 = "SELECT * FROM camiones WHERE id = $id2";

    $result = dbx::insertar($query2); ;
    $datos = dbx::consulta($query2);
   
}

if(isset($_POST['lavadora'])){
    extract($_POST);
    $idc = $_GET['id'];
    $codigo = $_POST['Codigo'];
    $marca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];
    $valor = $_POST['Valor'];
    $peso = $_POST['PesoLibras']; 

    $sqli = "INSERT INTO lavadoras (Codigo, Marca, Modelo, Valor, PesoLibras, Camiones_Id) 
    VALUES ('{$codigo}','{$marca}','{$modelo}','{$valor}','{$peso}','{$idc}')";
    dbx::insertar($sqli);
    $id = mysqli_insert_id(dbx::$instancia->conexion);
    
    exit;
}


?>


<form action="" method="post">
<div class="modal fade" id="crearLavadora" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Creacion de lavadora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
            <div class="form-group">
            <label for="">Codigo:</label>
            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo Lavadora" autofocus>
            </div><br>
            <div class="form-group">
            <label for="">Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca Lavadora" >
            </div><br>
            <div class="form-group">
            <label for="">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo Lavadora" >
            </div><br>
            <div class="form-group">
            <label for="">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" placeholder="Valor Lavadora" >
            </div><br>
            <div class="form-group">
            <label for="">Peso en libras:</label>
            <input type="text" name="peso" id="peso" class="form-control" placeholder="Peso en libras" >
            </div><br>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="lavadora" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>