<?php
include_once('libreria/motores.php');
plantilla::aplicar("Actualizacion de Camiones...");


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query2 = "SELECT * FROM camiones WHERE id = $id";

    $result = dbx::insertar($query2); ;
    $datos = dbx::consulta($query2);
   
}

if(isset($_POST['update'])){
    extract($_POST);
    $id = $_GET['id'];
    $marca = $_POST['Marca'];
    $modelo = $_POST['Modelo'];
    $color = $_POST['Color'];
    $comentario = $_POST['Comentario'];
    $cantidad = $_POST['CantidadLavadoras'];
    $valor = $_POST['ValorCarga'];
    $peso = $_POST['PesoTotal'];



    $query = "UPDATE `camiones` SET `Marca`='{$marca}',`Modelo`='{$modelo}',`Color`='{$color}'
    ,`Comentario`='{$comentario}',`CantidadLavadoras`='{$cantidad}',`ValorCarga`='{$valor}',`PesoTotal`='{$peso}'  WHERE id = '{$id}'";
     dbx::insertar($query); 

        


    
     echo "
     <script>
         alert('Datos Actualizados del camion');
         window.location = 'index.php';
     </script>
     ";
    exit;
}    
function asgInput($id, $label, $placeholder, $valor, $extra=[]){
    $type = 'text';

    extract($extra);
    
    $input = "<input type='{$type}' placeholder='{$placeholder}' class='form-control' name='{$id}' id='{$id}'/> ";

    if($type == 'textarea'){
        $input = "<textarea  placeholder='{$placeholder}' class='form-control' name='{$id}' id='{$id}'></textarea>";
    }

   
  

    echo <<<INPUT
        <div>
            <label>{$label}</label>
            {$input}
        </div>

    INPUT;
}

?>


                    
                  
<form action="" method="post" enctype="multipart/form-data">

<?php 
    foreach($datos as $fila){

        echo <<<FILA
        <table class="table">
        <br>
        <h5>Datos Actuales</h5>
        <thead>
        <tr>
            <th>ID: </th>
            <th>Marca: </th>
            <th>Modelo: </th>
            <th>Color: </th>
            <th>Comentario: </th>
            <th>Cantidad: </th>
            <th>Valor: </th>
            <th>Peso: </th>
        </tr>
    </thead>
    <tbody>
        <td>{$fila->Id}</td>
        <td>{$fila->Marca}</td>
        <td>{$fila->Modelo}</td>
        <td>{$fila->Color}</td>
        <td>{$fila->Comentario}</td>
        <td>{$fila->CantidadLavadoras}</td>
        <td>{$fila->ValorCarga}</td>
        <td>{$fila->PesoTotal}</td>
    </tbody>
        </table>
        <hr>
       
           
    FILA;
    }
    
    asgInput('Marca','Marca','Marca del Camion','');
    asgInput('Modelo','Modelo','Modelo del Camion','');
    asgInput('Color','Color','Color del Camion','');
    asgInput('Comentario','Comentario','Comentario','',['type'=>'textarea']);
    asgInput('CantidadLavadoras','CantidadLavadoras','Cantidad de Lavadoras','');
    asgInput('ValorCarga','ValorCarga','Valor de la Carga','');
    asgInput('PesoTotal','PesoTotal','Peso total de la Carga ','');

?>
<br>
<div class="text-center">
<a href="index.php" type="submit"  class="btn btn-secondary" >Cerrar</a>
    <button type="submit" name="update" class="btn btn-primary">Modificar</button>
    
</div>
<br>
</form>
