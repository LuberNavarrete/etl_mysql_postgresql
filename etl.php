<?php 

require_once("con_mysql.php");
require_once("con_postgres.php");

// Realizar una consulta MySQL
$query_mysql = 'SELECT * FROM TABLA_MYSQL';
$result_mysql = mysql_query($query_mysql) or die('Consulta Mysql fallida: ' . mysql_error());

// Recorro los valores MYSQL
if($result_mysql!=NULL){
	if(mysql_num_rows($result_mysql)>0){
		while($row_mysql = mysql_fetch_array($result_mysql)){
			print "CAMPO_MYSQL_1: ".$row_mysql['VALOR_MYSQL_1']." CAMPO_MYSQL_2: ".$row_mysql['VALOR_MYSQL_2']." CAMPO_MYSQL_3: ".$row_mysql['VALOR_MYSQL_3'];
			print "<br>";

			// Con los datos de la primera consulta (MYSQL) consulto la BD Postgresql
			$query_postgres = "SELECT * FROM TABLA_POSTGRES WHERE CAMPO_POSTGRES_BUSQUEDA = ".$row_mysql['VALOR_MYSQL_1'];
			$result_postgres = pg_query($query_postgres) or die('La consulta Postgres fallo: ' . pg_last_error());
			
			if($result_postgres!=NULL){
				while ($row_postgres = pg_fetch_row($result_postgres)){
  					print "CAMPO_POSTGRES_1: ".$row_postgres[8]." CAMPO_POSTGRES_2: ".$row_postgres[3];
  					print "<br><hr>";
				}
			}else{print "Valores vacios Postgres";}
		} //Fin valores mysql
	}else{print "Valores vacios Mysql";}
}

//Liberó espacio en Mysql
mysql_free_result($result_mysql);

// Cerrar la conexión
mysql_close($link);
?>