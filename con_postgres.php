<?php

$user = 'USER_POSTGRES';
$passwd = 'CLAVE_POSTGRES';
$db = 'BD_POSTGRES';
$port = 5432;
$host = 'HOST_POSTGRES';

$strCnx = "host = $host port = $port dbname = $db user = $user password = $passwd";
$cnx = pg_connect($strCnx) or die ("Error de conexion postgres con el servidor $host ". pg_last_error());
?>