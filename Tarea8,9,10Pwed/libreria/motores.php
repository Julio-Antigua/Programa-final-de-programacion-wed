<?php 

    session_start();

    function my_password($pwds){
        return md5("{$pwds}algomuydificildeadivinar, para que los dics de md5 se confundan con fundas");
    }

    function getUser($redirect = false){
        if(isset($_SESSION['camionUser'])){
            $tmp = unserialize($_SESSION['camionUser']);
            return $tmp;
        }else if($redirect){
            header("Location:login.php");
        }
        return false;
    }

    function setUser($usr){
        $_SESSION['camionUser'] = serialize($usr);
    }

    $script = $_SERVER['SCRIPT_NAME'];

    if(!isset($_SESSION['camionUser']) && strpos($script,'login.php') == 0 && strpos($script,'registro.php') == 0 ){
        header("Location:login.php");
    }

    require('plantilla.php');
    require('configuracion.php');
    require('conexion.php');
?>