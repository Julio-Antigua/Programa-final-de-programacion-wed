<?php 
require('libreria/motores.php'); 
plantilla::aplicar("Registro de Usuarios...");

$mensaje = "";
if($_POST){
    extract($_POST);
    $password = my_password($password);
    $sql = "SELECT * FROM usuarios where Correo = '{$correo}' and Password = '{$password}'";
    $datos = dbx::consulta($sql);
    if($datos){
        setUser($datos[0]);
        header("location:index.php");
    }else{
        $mensaje = "Usuario o Clave incorrecta";
    }
}

?>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-dark my-4">Login</h3></div>
            <div class="card-body"> 
                <form action="login.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="correo" placeholder="nombre@example.com" >
                        <label for="inputEmail">Direccion de Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" >
                        <label for="inputPassword">Contraseña</label>
                    </div>
                    <div class="d-flex alisn-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        <div class="text-danger"><?= $mensaje; ?></div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <div class="small"><a href="registro.php">Crear Cuenta</a></div>
            </div>
        </div>
    </div>
</div>