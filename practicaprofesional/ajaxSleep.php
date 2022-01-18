<?php
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    sleep(4);//simulamos tiempo de espera de algunos segundos
    echo ("Tus datos: " . $nombre . " - " .     $apellido . " - " . $telefono);
?> 