<?php
    class Conexion{
        var $enlace;
        var $base = "a4589538_gastos";
        var $user = "a4589538_gastos";
        var $host = "mysql8.000webhost.com";
        var $pass = "S02006480d1";
        
        public function creaConexion(){
            $this->enlace = mysqli_connect($this->host, $this->user, $this->pass, $this->base);
            return $this->enlace;
        }
    }
?>