<?php
include_once('libreria/motores.php'); 



if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
    

    $query = "DELETE FROM camiones  WHERE id = '{$id}'";
     dbx::insertar($query); 

   
    
     echo "
     <script>
         alert('Datos eliminados del camion');
         window.location = 'index.php';
     </script>
     ";
    exit();
      
}