<?php

// Conectando, seleccionando la base de datos
$link = mysql_connect('HOST_MYSQL', 'USER_MYSQL', 'CLAVE_MYSQL') or die('No se pudo conectar: ' . mysql_error());
// echo 'Conexion exitosa';
mysql_select_db('BD_MYSQL') or die('No se pudo seleccionar la base de datos mysql');

?>