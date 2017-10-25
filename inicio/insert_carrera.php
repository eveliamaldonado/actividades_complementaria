<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	/*$sql_act = 'SELECT * FROM act_complementaria';
	$statement = $pdo->prepare($sql_act);
	$statement->execute();
	$results = $statement->fetchAll();*/
	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO carrera ( clave_carrera, nombre_carrera ) VALUES( ?, ? )';
  		$clave_carrera = isset($_POST['clave_carrera']) ? $_POST['clave_carrera']: '';
  		$nombreCarrera = isset($_POST['nombre_carrera']) ? $_POST['nombre_carrera']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($clave_carrera,$nombreCarrera));
	}
	$sql_status = 'SELECT * FROM carrera ORDER BY clave_carrera';
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
		<title><?php echo $title?></title>
		<link rel="stylesheet" href="../css/materialize.css">
	</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="../js/materialize.min.js"></script>
    	<div class="navbar-fixed">
	        <nav class="teal lighten-1">
	            <div class="nav-wrapper">
	                <a href="#" class="brand-logo right">CARRERAS</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar una nueva carrera</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="Clave carrera" name="clave_carrera" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s12">
        				<!--<i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Nombre carrera" name="nombre_carrera" type="text">
        				</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>CARRERAS</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave</th>
				          	<th>Nombre</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
				        	foreach($results_status as $rs) {
				        ?>
					    <tr>
					    	<td><?php echo $rs['clave_carrera']?></td>
							<td><?php echo $rs['nombre_carrera']?></td>	
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
		<!--  Scripts-->
    	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      	<script type="text/javascript" src="../js/materialize.min.js"></script>
      	<script>
      		$(document).ready(function() {
    		$('select').material_select();
  			});
      	</script>
	</body>
</html>