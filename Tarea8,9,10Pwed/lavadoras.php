<?php
include_once('libreria/motores.php');
plantilla::aplicar("Administracion de Lavadoras...");

if(isset($_GET['id'])){
    $idc = $_GET['id'];
    
   
}

if(isset($_POST['lavadora'])){
    extract($_POST);
    $idc = $_GET['id']; 

    $sqli = "INSERT INTO lavadoras (Codigo, Marca, Modelo, Valor, PesoLibras, Camiones_Id) 
    VALUES ('{$codigo}','{$marca}','{$modelo}','{$valor}','{$peso}','{$idc}')";
    dbx::insertar($sqli);
    $id = mysqli_insert_id(dbx::$instancia->conexion);
    echo "
    <script>
        alert('Lavadora Guardada');
        window.location = 'index.php';
    </script>
    ";
    exit;
}


?>


<form action="" method="post">

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

</form>