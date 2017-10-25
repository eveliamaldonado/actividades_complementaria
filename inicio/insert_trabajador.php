<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO trabajador ( rfc, nombre_trabajador, ApellidoP_trabajador, ApellidoM_trabajador, clave_presupuestal ) VALUES( ?, ?, ?, ?, ? )';
  		$rfc = isset($_POST['rfc']) ? $_POST['rfc']: '';
  		$nombre_trabajador = isset($_POST['nombre_trabajador']) ? $_POST['nombre_trabajador']: '';
  		$apellido_p_trabajador = isset($_POST['ApellidoP_trabajador']) ? $_POST['ApellidoP_trabajador']: '';
  		$apellido_m_trabajador = isset($_POST['ApellidoM_trabajador']) ? $_POST['ApellidoM_trabajador']: '';
  		$clave_presupuestal = isset($_POST['clave_presupuestal']) ? $_POST['clave_presupuestal']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($rfc,$nombre_trabajador,$apellido_p_trabajador, $apellido_m_trabajador, $clave_presupuestal));
	}
	$sql_status = 'SELECT * FROM trabajador ORDER BY rfc';
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
	                <a href="#" class="brand-logo right">TRABAJADORES</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar un nuevo trabajador</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="RFC" name="rfc" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
        				<!--<i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Nombre" name="nombre_trabajador" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <!--<i class="material-icons prefix">account_circle</i>-->
          				<input placeholder="Apellido Paterno" name="ApellidoP_trabajador" type="text">
        				</div>
        				<div class="input-field col s4">
        					 <!-- <i class="material-icons prefix">account_circle</i> -->
          				<input placeholder="Apellido Materno" name="ApellidoM_trabajador" type="text">
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  			<input placeholder = "Clave presupuestal" name="clave_presupuestal" type="text">
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>Trabajadores</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Clave presupuestal</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['rfc']?></td>
							<td><?php echo $rs2['nombre_trabajador']?></td>
							<td><?php echo $rs2['ApellidoP_trabajador']?></td>
							<td><?php echo $rs2['ApellidoM_trabajador']?></td>
							<td><?php echo $rs2['clave_presupuestal']?></td>
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