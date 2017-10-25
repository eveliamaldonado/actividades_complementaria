<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	$sql1 = 'SELECT * FROM instituto';
	$statement1 = $pdo->prepare($sql1);
	$statement1->execute();
	$results1 = $statement1->fetchAll();

	$sql2 = 'SELECT * FROM instructor';
	$statement2 = $pdo->prepare($sql2);
	$statement2->execute();
	$results2 = $statement2->fetchAll();

	$sql3 = 'SELECT * FROM estudiante';
	$statement3 = $pdo->prepare($sql3);
	$statement3->execute();
	$results3 = $statement3->fetchAll();

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO solicitud ( folio, asunto, fecha, lugar, instituto_clave, instructor_rfc, estudiante_No_contro) VALUES( ?, ?, ?, ?, ?, ?, ? )';
  		$folio = isset($_POST['folio']) ? $_POST['folio']: '';
  		$asunto = isset($_POST['asunto']) ? $_POST['asunto']: '';
  		$fecha = isset($_POST['fecha']) ? $_POST['fecha']: '';
  		$lugar = isset($_POST['lugar']) ? $_POST['lugar']: '';
  		$claveinstituto = isset($_POST['instituto_clave']) ? $_POST['instituto_clave']: '';
  		$claveinstructor = isset($_POST['instructor_rfc']) ? $_POST['instructor_rfc']: '';
  		$claveestudiante = isset($_POST['estudiante_No_contro']) ? $_POST['estudiante_No_contro']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($folio,$asunto,$fecha, $lugar, $claveinstituto,$claveinstructor, $claveestudiante));
	}
	$sql_status = 'SELECT solicitud.*, instituto.nombreinstituto, instructor.nombre_instructor, estudiante.nombre_estudiante FROM solicitud INNER JOIN instituto ON instituto.clave_instituto = solicitud.instituto_clave INNER JOIN instructor ON instructor.rfc_instructor = solicitud.instructor_rfc INNER JOIN estudiante ON estudiante.No_contro = solicitud.estudiante_No_contro ORDER BY folio';
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
	                <a href="#" class="brand-logo right">SOLICITUDES</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Crear nueva solicitud</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="Folio" name="folio" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
        				<!--<i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Asunto" name="asunto" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <!--<i class="material-icons prefix">account_circle</i>-->
          				<input placeholder="Fecha" name="fecha" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <!-- <i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Lugar" name="lugar" type="text">
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="instituto_clave">
                  			<option value="" disabled selected>Elige el instituto</option>
                  			<?php 
				        	foreach($results1 as $rs) {
				        	?>
  							<option value="<?php echo $rs['clave_instituto']?>"><?php echo $rs['nombreinstituto']?></option>
  							<?php 
				          	}
				        ?>
						</select>
						<label>Instituto</label>
						</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="instructor_rfc">
                  			<option value="" disabled selected>Elige un instructor</option>
                  			<?php 
				        	foreach($results2 as $rs) {
				        	?>
  							<option value="<?php echo $rs['rfc_instructor']?>"><?php echo $rs['nombre_instructor']?></option>
  							<?php 
				          	}
				        ?>
						</select>
						<label>Instructor</label>
						</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="estudiante_No_contro">
                  			<option value="" disabled selected>Elige el alumno</option>
                  			<?php 
				        	foreach($results3 as $rs) {
				        	?>
  							<option value="<?php echo $rs['No_contro']?>"><?php echo $rs['nombre_estudiante']?></option>
  							<?php 
				          	}
				        ?>
						</select>
						<label>Alumno</label>
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>Solicitudes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Folio</th>
				          	<th>Asunto</th>
				            <th>Fecha</th>
				            <th>Lugar</th>
				            <th>Instituto</th>
				            <th>Instructor</th>
				            <th>Estudiante</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['folio']?></td>
							<td><?php echo $rs2['asunto']?></td>
							<td><?php echo $rs2['fecha']?></td>
							<td><?php echo $rs2['lugar']?></td>
							<td><?php echo $rs2['instituto_clave']?></td>
							<td><?php echo $rs2['instructor_rfc']?></td>
							<td><?php echo $rs2['estudiante_No_contro']?></td>
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