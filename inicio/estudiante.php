<?php
require_once('../conexion/conexion.php');
?>
<?php
	$sql = "select * from estudiante order by semestre";

	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

	$sql_status  = 'select estudiante.*, carrera.nombre_carrera from estudiante inner join carrera on carrera.clave_carrera = estudiante.carrera_clave';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>PHP & SQL</title>
		<link rel="stylesheet" href="../css/materialize.min.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Usuarios</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Ejecución de una sentencia SQL</h2>
					<hr>
					<h3>Datos SQL</h3>
					<pre>
						<?php
							/*foreach($pdo->query($sql) as $rs) {
								var_dump($rs);
							}*/	
						?>
					</pre>
				    <h3>Estudiantes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					      <th>No control</th>
					      <th>Nombre</th>
					      <th>Apellido paterno</th>
					      <th>Apellido materno</th>
					      <th>Semestre</th>
					      <th>Clave carrera</th>
					  </thead>
					  <tbody>
					    <?php
						foreach ($results as $rs) {
							
					    ?>
					    <tr>
					    	<td><?php echo $rs['No_contro']?></td>
					    	<td><?php echo $rs['nombre_estudiante']?></td>
					    	<td><?php echo $rs['Apellido_Pestudiante']?></td>
					    	<td><?php echo $rs['Apeliido_Mestudiante']?></td>
					    	<td><?php echo $rs['semestre']?></td>
					    	<td><?php echo $rs['carrera_clave']?></td>
					    </tr>
					     <?php
						}
					    ?>
					    </tbody>
					    </table>
				</div>
			</div>
			<div class="col s12">
                <footer class="page-footer teal lighten-2">
                    <div class="footer-copyright">
                        <div class="container">
                            &copy; 2017 Evelia Maldonado Miranda
                        </div>
                    </div>
                </footer>
            </div>
		</div>
	</body>
</html>
