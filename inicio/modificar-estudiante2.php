<?php
	require_once('../conexion/conexion.php');
	$title = 'Estudiantes';
	$title_menu = 'Estudiantes';

	// Consulta para mostrar los datos de la tabla "Carrera"
	$sql_carrera = 'SELECT * FROM carrera';
	$statement = $pdo->prepare($sql_carrera);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE estudiante SET No_contro = ?, nombre_estudiante = ?, Apellido_Pestudiante = ?, Apeliido_Mestudiante = ?, semestre = ?, carrera_clave = ? WHERE No_contro = ?';

		$noControl = isset($_GET['No_contro']) ? $_GET['No_contro']: '';
		$noControl_2 = isset($_POST['No_control_2']) ? $_POST['No_Control_2']: '';
  		$nombreEstudiante = isset($_POST['nombre_estudiante']) ? $_POST['nombre_estudiante']: '';
  		$apellido_p_Estudiante = isset($_POST['Apellido_Pestudiante']) ? $_POST['Apellido_Pestudiante']: '';
  		$apellido_m_Estudiante = isset($_POST['Apeliido_Mestudiante']) ? $_POST['Apeilido_Mestudiante']: '';
  		$semestre = isset($_POST['semestre']) ? $_POST['semestre']: '';
  		$carrera_clave = isset($_POST['carrera_clave']) ? $_POST['carrera_clave']: '';
  		
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($noControl_2,$nombreEstudiante,$apellido_p_Estudiante,$apellido_m_Estudiante,$semestre,$carrera_clave, $noControl));
	  	header('Location: modificar-estudiante2.php');
	}

	if(isset( $_GET['No_contro'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT estudiante.*, carrera.nombre_carrera FROM estudiante INNER JOIN carrera ON carrera.clave_carrera = estudiante.carrera_clave WHERE No_contro = ?';
		$noControl = isset( $_GET['No_contro']) ? $_GET['No_contro'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($noControl));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT estudiante.*, carrera.nombre_carrera FROM estudiante INNER JOIN carrera ON carrera.clave_carrera = estudiante.carrera_clave';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();
?>
<?php
	include('../extend/header.php');
?>

		<div class="container">
			<div class="row">
				<div class="col s12">
					<h4>Proyecto de actividades complementarias</h4>
					<hr>
					<?php 
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['No_contro'] ?>" name="No_control_2" type="text" value="<?php echo $rs_details['No_contro'] ?>">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
          							<input value="<?php echo $rs_details['nombre_estudiante'] ?>" name="nombre_estudiante" type="text" value="<?php echo $rs_details['nombre_estudiante'] ?>">
        						</div>
        						<div class="input-field col s4">
        							
          							<input value="<?php echo $rs_details['Apellido_Pestudiante'] ?>" name="Apellido_Pestudiante" type="text" value="<?php echo $rs_details['Apellido_Pestudiante'] ?>">
        						</div>
        						<div class="input-field col s4">
        					 		
          						<input value="<?php echo $rs_details['Apeliido_Mestudiante'] ?>" name="Apeliido_Mestudiante" type="text" value="<?php echo $rs_details['Apeliido_Mestudiante'] ?>">
        						</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
    								<select name="semestre">
			      						<option value="" disabled>Elige el semestre</option>
			      						<option value="I" <?php $selected = ($rs_details['semestre'] == 'I') ? "SELECTED" : ""; echo $selected ?>>I</option>
			  							<option value="II" <?php $selected = ($rs_details['semestre'] == 'II') ? "SELECTED" : ""; echo $selected ?>>II</option>
			  							<option value="III" <?php $selected = ($rs_details['semestre'] == 'III') ? "SELECTED" : ""; echo $selected ?>>III</option>
			  							<option value="IV" <?php $selected = ($rs_details['semestre'] == 'IV') ? "SELECTED" : ""; echo $selected ?>>IV</option>
			  							<option value="V" <?php $selected = ($rs_details['semestre'] == 'V') ? "SELECTED" : ""; echo $selected ?>>V</option>
			  							<option value="VI" <?php $selected = ($rs_details['semestre'] == 'VI') ? "SELECTED" : ""; echo $selected ?>>VI</option>
			  							<option value="VII" <?php $selected = ($rs_details['semestre'] == 'VII') ? "SELECTED" : ""; echo $selected ?>>VII</option>
			  							<option value="VIII" <?php $selected = ($rs_details['semestre'] == 'VIII') ? "SELECTED" : ""; echo $selected ?>>VIII</option>
			  							<option value="IX" <?php $selected = ($rs_details['semestre'] == 'IX') ? "SELECTED" : ""; echo $selected ?>>IX</option>
			  							<option value="X" <?php $selected = ($rs_details['semestre'] == 'X') ? "SELECTED" : ""; echo $selected ?>>X</option>
			  							<option value="XI" <?php $selected = ($rs_details['semestre'] == 'XI') ? "SELECTED" : ""; echo $selected ?>>XI</option>
			  							<option value="XII" <?php $selected = ($rs_details['semestre'] == 'XII') ? "SELECTED" : ""; echo $selected ?>>XII</option>
    								</select>
    								<label>Semestre</label>
  								</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
                  					<select name="carrera_clave">
                  						<option value="" disabled selected>Elige la carrera</option>
                  						<?php 
				        					foreach($results as $rs) {
				        				?>
  										<option value="<?php echo $rs['clave_carrera']?>" <?php $selected = ($rs_details['nombre_carrera'] == $rs['nombre_carrera']) ? "SELECTED" : ""; echo $selected ?>><?php echo $rs['nombre_carrera']?></option>
  										<?php 
				          					}
				        				?>
									</select>
									<label>Carrera</label>
								</div>
        					</div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h5>Estudiantes</h5>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>No Control</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Semestre</th>
				            <th>Carrera</th>
				            <th colspan="2">Acción</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['No_contro']?></td>
							<td><?php echo $rs2['nombre_estudiante']?></td>
							<td><?php echo $rs2['Apellido_Pestudiante']?></td>
							<td><?php echo $rs2['Apeliido_Mestudiante']?></td>
							<td><?php echo $rs2['semestre']?></td>
							<td><?php echo $rs2['nombre_carrera']?></td>
							<td><a class="btn waves-effect waves-light" href="modificar-estudiante2.php?No_contro=<?php echo $rs2['No_contro']; ?>">Ver detalles</a></td>
							<td><a class="btn waves-effect waves-light red" onclick="delete_estudiante(<?php echo $rs2['No_contro']; ?>)" href="#">ELIMINAR</a>
					    </tr>
					    <?php 
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
			<?php
				include('../extend/footer.php');
			?>