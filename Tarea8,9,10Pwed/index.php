<?php
require('libreria/motores.php'); 
require('NuevoCamion.php'); 
require('EliminarCamion.php'); 
 

plantilla::aplicar("Administracion de Camiones y Lavadoras...");

$usr = getUser(true);

?>

<div class="text-left">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crearCamion"><i class="fa fa-plus"></i> Registrar Camion</button>
</div>

<br>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Color</th>
            <th>Comentario</th>
            <th>Cantidad de Lavadoras</th>
            <th>Valor de la Carga</th>
            <th>Peso total de la carga</th>
        </tr>
    </thead>
    <tbody>
    <?php 

            $sql = "SELECT * FROM camiones WHERE Usuario_Id = '{$usr->Id}' ";
            
          
            $datos = dbx::consulta($sql);
          
           
        
            foreach($datos as $fila){
                

                echo <<<FILA
                    <tr>
                   
                        <td>{$fila->Id}</td>
                        <td>{$fila->Marca}</td>
                        <td>{$fila->Modelo}</td>
                        <td>{$fila->Color}</td>
                        <td>{$fila->Comentario}</td>
                        <td>{$fila->CantidadLavadoras}</td>
                        <td>{$fila->ValorCarga}</td>
                        <td>{$fila->PesoTotal}</td>
                        <td>
                        <a href='EditarCamion.php?id={$fila->Id}' class="btn btn-primary"  ><i class="fas fa-pencil-alt"></i> Editar</a>
                        <a href='EliminarCamion.php?id={$fila->Id}' class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</a>
                        <a href='Lavadoras.php?id={$fila->Id}' class="btn btn-success" ><i class="fas fa-plus"></i> Lavadoras</a>
                        </td>
                    </tr>
            FILA;
            }
        ?>
    </tbody>
</table>

