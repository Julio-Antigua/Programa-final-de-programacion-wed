<?php


class dbx{

    public $conexion = null;
    static $instancia = null;

    static function conectar(){
        if(self::$instancia == null){
            self::$instancia = new dbx(mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME));
        }
    }

    function __construct($conexion){
            $this->conexion = $conexion;
    }

    function __destruct(){
        mysqli_close($this->conexion);
    }

    static function insertar($sql,$params=[]){
        self::conectar();
        $rs = mysqli_query(self::$instancia->conexion, $sql);
        

    }

    static function consulta($sql,$params=[]){
        self::conectar();
        $rs = mysqli_query(self::$instancia->conexion, $sql);
        if(MODO_DEBUG && mysqli_error(self::$instancia->conexion)){
            echo mysqli_error(self::$instancia->conexion);
        }

        $final = [];

        while($fila = mysqli_fetch_object($rs)){
            $final[] = $fila;
        }
        return $final;

    }




}

?>