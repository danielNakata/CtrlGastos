<?php

    include("../../db/Conexion.php");

    $txtLogin = $_GET["txtLogin"];
    $txtPassword = $_GET["txtPassword"];

    echo $txtLogin."-".$txtPassword."<br />"; 

    $conexion = new Conexion();

    $conex = $conexion->creaConexion();
    $sql = "select * from tusuarios where ulogin = '".$txtLogin."' and password('".$txtPassword."') ";

    echo $sql."<br />";
 
    $resultado = $conex->query($sql);

    echo "numero de resultados: ".$resultado->num_rows."<br />";
?>