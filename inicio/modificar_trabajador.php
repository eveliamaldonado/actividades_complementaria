<?php
	require_once('../conexion/conexion.php');
	$title = 'Trabajador';
	$title_menu = 'Trabajador';

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE trabajador SET rfc = ?, nombre_trabajador = ?, ApellidoP_trabajador = ?, ApellidoM_trabajador = ?, clave_presupuestal = ? WHERE rfc = ?';

		$rfc = isset($_GET['rfc']) ? $_GET['rfc']: '';
		$rfc2 = isset($_POST['rfc_trabajador_2']) ? $_POST['rfc_trabajador_2']: '';
  		$nombret = isset($_POST['nombre_trabajador']) ? $_POST['nombre_trabajador']: '';
  		$apellido_p = isset($_POST['ApellidoP_trabajador']) ? $_POST['ApellidoP_trabajador']: '';
  		$apellido_m = isset($_POST['ApellidoM_trabajador']) ? $_POST['ApellidoM_trabajador']: '';
  		$clave_presupuestal = isset($_POST['clave_presupuestal']) ? $_POST['clave_presupuestal']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($rfc2,$nombret,$apellido_p,$apellido_m,$clave_presupuestal, $rfc));
	  	header('Location: modificar_trabajador.php');
	}

	if(isset( $_GET['rfc'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM trabajador WHERE rfc = ?';
		$rfc = isset( $_GET['rfc']) ? $_GET['rfc'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($rfc));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT trabajador.* FROM trabajador';
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
          							<input placeholder='<?php echo $rs_details['rfc'] ?>' name='rfc_trabajador_2' type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder='<?php echo $rs_details['nombre_trabajador'] ?>' name='nombre_trabajador' type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder="<?php echo $rs_details['ApellidoP_trabajador'] ?>" name="ApellidoP_trabajador" type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          						<input placeholder="<?php echo $rs_details['ApellidoM_trabajador'] ?>" name="ApellidoM_trabajador" type="text">
        						</div>
        					</div>
        					<div class = "row">
        						<div class = "input-field col s12">
        							<input placeholder="<?php echo $rs_details['clave_presupuestal'] ?>" name = "clave_presupuestal" type = "text">
        						</div>
        					</div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php } ?>
				    <h3>TRABAJADOR</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC</th>
				          	<th>Nombre trabajador</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Clave presupuestal</th>
				              <th colspan="2">Acción</th>
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
							<td><a class="btn waves-effect waves-light" href="modificar_trabajador.php?rfc=<?php echo $rs2['rfc']; ?>">Ver detalles</a></td>

                             <td><a class="btn waves-effect waves-light red" onclick="delete_trabajador(<?php echo $rs2['rfc']; ?>)" href="#">ELIMINAR</a>

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
