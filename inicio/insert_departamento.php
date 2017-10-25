<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	$sql_act = 'SELECT * FROM trabajador';
	$statement = $pdo->prepare($sql_act);
	$statement->execute();
	$results = $statement->fetchAll();
	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO departamento ( Clave_depa, nombre_departamento, trabajador_rfc ) VALUES( ?, ?, ? )';
  		$clavedepa = isset($_POST['Clave_depa']) ? $_POST['Clave_depa']: '';
  		$nombredepa = isset($_POST['nombre_departamento']) ? $_POST['nombre_departamento']: '';
  		$rfc = isset($_POST['trabajador_rfc']) ? $_POST['trabajador_rfc']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($clavedepa,$nombredepa, $rfc));
	}
	$sql_status = 'SELECT departamento.*, trabajador.nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.rfc = departamento.trabajador_rfc ORDER BY Clave_depa';
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
	                <a href="#" class="brand-logo right">DEPARTAMENTOS</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar un nuevo departamento</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="Clave departamento" name="Clave_depa" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s12">
        				<!--<i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Nombre departamento" name="nombre_departamento" type="text">
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="trabajador_rfc">
                  			<option value="" disabled selected>Elige el trabajador</option>
                  			<?php 
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['rfc']?>"><?php echo $rs['nombre_trabajador']?></option>
  							<?php 
				          	}
				        ?>
						</select>
						<label>DEPARTAMENTO</label>
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>Departamentos</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave</th>
				          	<th>Nombre</th>
				          	<th>RFC</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Clave_depa']?></td>
							<td><?php echo $rs2['nombre_departamento']?></td>
							<td><?php echo $rs2['trabajador_rfc']?></td>
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