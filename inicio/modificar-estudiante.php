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
		$noControl_2 = isset($_POST['No_control_2']) ? $_POST['No_control_2']: '';
  		$nombreEstudiante = isset($_POST['nombre_estudiante']) ? $_POST['nombre_estudiante']: '';
  		$apellido_p_Estudiante = isset($_POST['Apellido_Pestudiante']) ? $_POST['Apellido_Pestudiante']: '';
  		$apellido_m_Estudiante = isset($_POST['Apeliido_Mestudiante']) ? $_POST['Apeliido_Mestudiante']: '';
  		$semestre = isset($_POST['semestre']) ? $_POST['semestre']: '';
  		$carrera_clave = isset($_POST['carrera_clave']) ? $_POST['carrera_clave']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($noControl_2,$nombreEstudiante,$apellido_p_Estudiante,$apellido_m_Estudiante,$semestre,$carrera_clave, $noControl));
	  	header('Location: modificar-estudiante.php');
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
					<h2>Proyecto de actividades complementarias</h2>
					<hr>
					<?php 
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">
          							<input placeholder='<?php echo $rs_details['No_contro'] ?>' name='No_control_2' type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder='<?php echo $rs_details['nombre_estudiante'] ?>' name='nombre_estudiante' type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder="<?php echo $rs_details['Apellido_Pestudiante'] ?>" name="Apellido_Pestudiante" type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          						<input placeholder="<?php echo $rs_details['Apeliido_Mestudiante'] ?>" name="Apeliido_Mestudiante" type="text">
        						</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
    								<select name="semestre">
			      						<option value="" disabled selected>Elige el semestre</option>
			      						<option value="I">I</option>
			  							<option value="II">II</option>
			  							<option value="III">III</option>
			  							<option value="IV">IV</option>
			  							<option value="V">V</option>
			  							<option value="VI">VI</option>
			  							<option value="VII">VII</option>
			  							<option value="VIII">VIII</option>
			  							<option value="IX">IX</option>
			  							<option value="X">X</option>
			  							<option value="XI">XI</option>
			  							<option value="XII">XII</option>
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
  										<option value="<?php echo $rs['clave_carrera']?>"><?php echo $rs['nombre_carrera']?></option>
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
				    <h3>Estudiantes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>No Control</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Semestre</th>
				            <th>Carrera</th>
				            <th>Acción</th>
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
							<td><a class="btn waves-effect waves-light" href="modificar-estudiante.php?No_contro=<?php echo $rs2['No_contro']; ?>">Ver detalles</a></td>
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