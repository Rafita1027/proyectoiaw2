<?php
    $mysqli = new mysqli("localhost","root","","laliga");
    if($mysqli->connect_errno){
        echo "Falló al conectar a MySQL: (",$mysqli->connect_errno, ") , ", $mysqli->connect_error;
    }
?>