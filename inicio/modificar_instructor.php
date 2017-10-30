<?php
	require_once('../conexion/conexion.php');
	$title = 'Instructor';
	$title_menu = 'Instructor';

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE instructor SET rfc_instructor = ?, nombre_instructor = ?, ApellidoP_instructor = ?, ApellidoM_instructor = ?, act_complementaria_clave_act = ?,  WHERE rfc_instructor= ?';

	  	$rfc_instructor = isset($_GET['rfc_instructor']) ? $_GET['rfc_instructor']: '';
		$rfc_instructor_2 = isset($_POST['rfc_instructor_2']) ? $_POST['rfc_instructor_2']: '';
  		$nombre_instructor = isset($_POST['nombre_instructor']) ? $_POST['nombre_instructor']: '';
  		$apellido_p = isset($_POST['ApellidoP_instructor']) ? $_POST['ApellidoP_instructor']: '';
  		$apellido_m = isset($_POST['ApellidoM_instructor']) ? $_POST['ApellidoM_instructor']: '';
  		$act_complementaria_clave_act = isset($_POST['act_complementaria_clave_act']) ? $_POST['act_complementaria_clave_act']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($rfc_instructor_2,$nombre_instructor,$apellido_p,$apellido_m,$act_complementaria_clave_act));
	  	header('Location: modificar_instructor.php');
	}

	if(isset( $_GET['rfc_instructor'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM instructor WHERE rfc_instructor = ?';
		$rfc_instructor = isset( $_GET['rfc_instructor']) ? $_GET['rfc_instructor'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($rfc_instructor));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT instructor.* FROM instructor';
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
          							<input value='<?php echo $rs_details['rfc_instructor'] ?>' name='rfc_instructor_2' type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value='<?php echo $rs_details['nombre_instructor'] ?>' name='nombre_instructor' type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value="<?php echo $rs_details['ApellidoP_instructor'] ?>" name="ApellidoP_instructor" type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          						<input value="<?php echo $rs_details['ApellidoM_instructor'] ?>" name="ApellidoM_instructor" type="text">
        						</div>
        					</div>
        					<div class = "row">
        						<div class = "input-field col s12">
        							<input value="<?php echo $rs_details['act_complementaria_clave_act'] ?>" name = "act_complementaria_clave_act" type = "text">
        						</div>
        					</div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php } ?>
				    <h3>INSTRUCTOR</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC</th>
				          	<th>Nombre instructor</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Clave actividad</th>
				            <th colspan="2">Acción</th>
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
							<td><a class="btn waves-effect waves-light" href="modificar_instructor.php?rfc_instructor=<?php echo $rs2['rfc_instructor']; ?>">Ver detalles</a></td>

							<td><a class="btn waves-effect waves-light red" onclick="delete_instructor(<?php echo $rs2['rfc_instructor']; ?>)" href="#">ELIMINAR</a>
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
