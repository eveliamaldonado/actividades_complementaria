<?php

$dsn = 'mysql:dbname=itca;host=localhost';
$user = 'Evelia';
$password = 'quiero_18carros';

try{

	$pdo = new PDO(	$dsn,
					$user, 
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>
