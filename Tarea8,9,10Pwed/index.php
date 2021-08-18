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
            <th>-Acciones-</th>
        </tr>
    </thead>
    <tbody>
    <?php 

            $sql = "SELECT * FROM camiones WHERE Usuario_Id = '{$usr->Id}' ";
          
            $datos = dbx::consulta($sql);
        
            foreach($datos as $fila){
                
                $sqli = "SELECT COUNT(Id) as 'CantidadLavadoras' from lavadoras WHERE Camiones_Id = '{$fila->Id}'";
                $datosi= dbx::consulta($sqli);
                foreach($datosi as $filai){}

                $sqli2 = "SELECT sum(Valor) as 'Valor' from lavadoras WHERE Camiones_Id = '{$fila->Id}'";
                $datosv= dbx::consulta($sqli2);
                foreach($datosv as $filav){}

                $sqli3 = "SELECT sum(PesoLibras) as 'PesoLibras' from lavadoras WHERE Camiones_Id = '{$fila->Id}'";
                $datosp= dbx::consulta($sqli3);
                foreach($datosp as $filap){}


                echo <<<FILA
                    <tr>
                   
                        <td>{$fila->Id}</td>
                        <td>{$fila->Marca}</td>
                        <td>{$fila->Modelo}</td>
                        <td>{$fila->Color}</td>
                        <td>{$fila->Comentario}</td>
                        <td>{$filai->CantidadLavadoras}</td>
                        <td>{$filav->Valor}</td>
                        <td>{$filap->PesoLibras}</td>
                        <td>
                        <a href='EditarCamion.php?id={$fila->Id}' class="btn btn-primary"  ><i class="fas fa-pencil-alt"></i> Editar</a>
                        <a href='EliminarCamion.php?id={$fila->Id}' class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</a><br>
                        <a href='Lavadoras.php?id={$fila->Id}' class="btn btn-info" ><i class="fas fa-plus"></i> Lavadoras</a>
                        </td>
                    </tr>
            FILA;
            }
        ?>
    </tbody>
</table>

