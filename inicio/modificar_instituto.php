<?php
	require_once('../conexion/conexion.php');
	$title = 'Instituto';
	$title_menu = 'Instituto';
	// Consulta para mostrar los datos de la tabla "Carrera"
	
	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE instituto SET clave_instituto = ?, nombreinstituto = ? WHERE clave_instituto = ?';
		  $clave_instituto = isset($_GET['clave_instituto']) ? $_GET['clave_instituto']: '';
		  echo $clave_instituto;
		  $clave_instituto_2 = isset($_POST['clave_instituto_2']) ? $_POST['clave_instituto_2']: '';
		  echo $clave_instituto_2;
		   $nombreinst = isset($_POST['nombreinstituto']) ? $_POST['nombreinstituto']: '';
		   echo $nombreinst;
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($clave_instituto, $nombreinst,$clave_instituto_2));
	  	header('Location: modificar_instituto.php');
	}
	if(isset( $_GET['clave_instituto'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM instituto WHERE clave_instituto = ?';
		$clave_instituto = isset( $_GET['clave_instituto']) ? $_GET['clave_instituto'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($clave_instituto));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT * FROM instituto ORDER BY clave_instituto';
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
          							<input value="<?php echo $rs_details['clave_instituto'] ?>" name="clave_instituto_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value="<?php echo $rs_details['nombreinstituto'] ?>" name="nombreinstituto" type="text">
        						</div>
        						</div>

        					
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>INSTITUTO</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave instituto</th>
				          	<th>Nombre instituto</th>
				          	  <th colspan="2">Acción</th>
				            
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['clave_instituto']?></td>
							<td><?php echo $rs2['nombreinstituto']?></td>
						
							<td><a class="btn waves-effect waves-light" href="modificar_instituto.php?clave_instituto=<?php echo $rs2['clave_instituto']; ?>">Ver detalles</a></td>

							<td><a class="btn waves-effect waves-light red" onclick="delete_instituto(<?php echo $rs2['clave_instituto']; ?>)" href="#">ELIMINAR</a>
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
