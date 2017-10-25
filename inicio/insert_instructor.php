<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	$sql_carrera = 'SELECT * FROM act_complementaria';
	$statement = $pdo->prepare($sql_carrera);
	$statement->execute();
	$results = $statement->fetchAll();
	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO instructor ( rfc_instructor, nombre_instructor, ApellidoP_instructor, ApellidoM_instructor, act_complementaria_clave_act ) VALUES( ?, ?, ?, ?, ? )';
  		$rfc = isset($_POST['rfc_instructor']) ? $_POST['rfc_instructor']: '';
  		$nombreInstructor = isset($_POST['nombre_instructor']) ? $_POST['nombre_instructor']: '';
  		$apellido_p_instructor = isset($_POST['ApellidoP_instructor']) ? $_POST['ApellidoP_instructor']: '';
  		$apellido_m_instructor = isset($_POST['ApellidoM_instructor']) ? $_POST['ApellidoM_instructor']: '';
  		$act_clave = isset($_POST['act_complementaria_clave_act']) ? $_POST['act_complementaria_clave_act']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($rfc,$nombreInstructor,$apellido_p_instructor, $apellido_m_instructor, $act_clave));
	}
	$sql_status = 'SELECT instructor.*, act_complementaria.nombre_actcomplementaria FROM instructor INNER JOIN act_complementaria ON act_complementaria.clave_act = instructor.act_complementaria_clave_act ORDER BY rfc_instructor';
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
	                <a href="#" class="brand-logo right">INSTRUCTOR</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar un nuevo instructor</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="RFC" name="rfc_instructor" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
        				<!--<i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Nombre" name="nombre_instructor" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <!--<i class="material-icons prefix">account_circle</i>-->
          				<input placeholder="Apellido Paterno" name="ApellidoP_instructor" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <!-- <i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Apellido Materno" name="ApellidoM_instructor" type="text">
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="act_complementaria_clave_act">
                  			<option value="" disabled selected>Elige la actividad complementaria</option>
                  			<?php 
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['clave_act']?>"><?php echo $rs['nombre_actcomplementaria']?></option>
  							<?php 
				          	}
				        ?>
						</select>
						<label>Carrera</label>
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>Instructores</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Actividad complementaria</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['rfc_instructor']?></td>
							<td><?php echo $rs2['nombre_instructor']?></td>
							<td><?php echo $rs2['ApellidoP_instructor']?></td>
							<td><?php echo $rs2['ApellidoM_instructor']?></td>
							<td><?php echo $rs2['act_complementaria_clave_act']?></td>
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