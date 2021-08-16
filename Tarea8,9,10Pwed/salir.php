<?php 
require('libreria/motores.php'); 

session_destroy();

header('Location:login.php');