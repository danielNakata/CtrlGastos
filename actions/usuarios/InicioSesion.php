<?php

    include("../../db/Conexion.php");

    $txtLogin = $_GET["txtLogin"];
    $txtPassword = $_GET["txtPassword"];

    $sidusuario = "";
    $sulogin = "";
    $sunombre = "";
    $supaterno = "";
    $suemail = ""; 
    $sufechanac = "";
    $suestatus = "";

    if(isset($txtLogin)&&isset($txtPassword)){
        $conexion = new Conexion();

        //crea el objeto para la conexion
        $conex = $conexion->creaConexion();

        //busca si existe la combinacion de usuario y contraseña
        $sql = "select idusuario, ulogin, unombre, upaterno, uemail, ufechanac, uestatus from tusuarios where ulogin = '".$txtLogin."' and upass = password('".$txtPassword."') ";
        
        echo $sql."<br />";

        $resultado = $conex->query($sql);
        $existe = $resultado->num_rows;

        if ($existe > 1){
            echo "Si existe el usuario, ahora extraeremos sus demas datos y los subiremos a sesion, y crearemos un aleatorio para validar la sesion y evitar que regresen <br />";
            while($obj = $resultado->fetch_object()){
                $sidusuario = $obj->idusuario;
                $sulogin = $obj->ulogin;
                $sunombre = $obj->unombre;
                $supaterno = $obj->upaterno;
                $suemail = $obj->uemail;
                $sufechanac = $obj->ufechanac;
                $suestatus = $obj->uestatus;
            }
            
            echo $sidusuario."-".$sulogin."-".$sunombre."-".$supaterno."-".$suemail."-".$sufechanac."-".$suestatus."<br />";
            
        }else{
            $resultado->close();
            $conex->close();
            unset($resultado);
            unset($conex);
            unset($sql);
            header("Location: ../../index.php?msg=No existe el usuario y/o contraseña indicado");
        die();
        }
        
        $resultado->close();
        $conex->close();
        unset($resultado);
        unset($conex);
    }else{
        header("Location: ../../index.php?msg=No se recibieron los parametros");
        die();
    }
?>