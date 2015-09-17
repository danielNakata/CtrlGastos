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

        $resultado = $conex->query($sql);
        $existe = $resultado->num_rows;

        if ($existe > 0){
            while($obj = $resultado->fetch_object()){
                $sidusuario = $obj->idusuario;
                $sulogin = $obj->ulogin;
                $sunombre = $obj->unombre;
                $supaterno = $obj->upaterno;
                $suemail = $obj->uemail;
                $sufechanac = $obj->ufechanac;
                $suestatus = $obj->uestatus;
            }
            
            $rand = range(10000000,20000000);
            shuffle($rand);
            
            //subir a sesion los datos
            $_SESSION["idusuario"] = $sidusuario;
            $_SESSION["ulogin"] = $sulogin;
            $_SESSION["unombre"] = $sunombre;
            $_SESSION["upaterno"] = $supaterno;
            $_SESSION["uemail"] = $suemail;
            $_SESSION["ufechanac"] = $sufechanac;
            $_SESSION["suestatus"] = $suestatus;
            $_SESSION["idsesion"] = $sidusuario.'-'.$rand[0];
            
            echo $_SESSION["idsesion"]."<br />";
            
            $resultado->close();
            $conex->close();
            unset($resultado);
            unset($conex); 
            unset($sql);
            unset($rand);
            //header("Location: ../../menuPrincipal.php");
            
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