<?php
require('libreria/motores.php'); 

if($_POST){
        extract($_POST);
        $password = my_password($password);
        $sql = "insert into usuarios (correo, password) values ('{$email}', '{$password}')";
        dbx::insertar($sql);
        echo "
        <script>
            alert('Usuario creado');
            window.location = 'index.php';
        </script>
        ";
        exit();
}




plantilla::aplicar("Registro...");
?>
    <div  class="row justify-content-center">
        <div  class="col-lg-5">
            <div  class="card shadow-lg border-0 rounded-lg mt-3">
            <div class="card-body"> 
                <form action="" method="POST">
                        <div  class="card-header">
                            <h3  class="text-center font-weight-light my-4">Creacion de cuenta</h3>
                        </div>
                        <div  class="form-floating mb-3 mb-md-0">
                            <label class="small mb-1" for="inputEmail">Email</label>
                            <input class="form-control py-4" required name="email" placeholder="Ingrese su correo" type="email">
                        </div>
                        
                        <div  class="row mb-3">
                            <div  class="col-md-12">
                                <div  class="form-floating mb-3 mb-md-0">
                                    <label  class="small mb-1" for="inputPassword">Password</label>
                                    <input  class="form-control py-4" required name="password" placeholder="Enter password" type="password">
                                </div>
                            </div>
                            <div  class="form-floating mb-3 mb-md-0">
                            </div>
                        </div>
                    <div  class="mt-4 mb-0">
                        <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Registrar</button></div>
                    </div>
                </form>
            </div>
                </div>
                <div  class="card-footer text-center">
                    <div  class="small">
                       <div class="small"><a href="login.php">Tienes cuenta? Inicia Seccion</a></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
