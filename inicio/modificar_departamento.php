<?php
	require_once('../conexion/conexion.php');
	$title = 'departamento';
	$title_menu = 'Departamento';

	// Consulta para mostrar los datos de la tabla "Carrera"
	$sql_carrera = 'SELECT * FROM trabajador';
	$statement = $pdo->prepare($sql_carrera);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE departamento SET Clave_depa = ?, nombre_departamento = ?, trabajador_rfc = ?  WHERE Clave_depa = ?';

		$clavedepa = isset($_GET['Clave_depa']) ? $_GET['Clave_depa']: '';
		$clavedepa_2 = isset($_POST['Clave_depa_2']) ? $_POST['Clave_depa_2']: '';
  		$nombredepa = isset($_POST['nombre_departamento']) ? $_POST['nombre_departamento']: '';
  		$rfc= isset($_POST['trabajador_rfc']) ? $_POST['trabajador_rfc']: '';
  		

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($clavedepa_2,$nombredepa,$rfc, $clavedepa));
	  	header('Location: modificar_departamento.php');
	}

	if(isset( $_GET['Clave_depa'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT departamento.*, trabajador.nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.rfc = departamento.trabajador_rfc WHERE Clave_depa = ?';
		$clave = isset( $_GET['Clave_depa']) ? $_GET['Clave_depa'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($clave));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT departamento.*, trabajador.nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.rfc= departamento.trabajador_rfc ORDER BY Clave_depa';
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
          							<input placeholder="<?php echo $rs_details["Clave_depa"]?>" name="Clave_depa_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder='<?php echo $rs_details['nombre_departamento'] ?>' name='nombre_departamento' type="text">
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
									<label>Carrera</label>
								</div>
        					</div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php } ?>
				    <h3>DEPARTAMENTO</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave</th>
				          	<th>Nombre</th>
				            <th>RFC</th>
				            <th colspan="2">Acción</th>
				            
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
							
							<td><a class="btn waves-effect waves-light" href="modificar_departamento.php?Clave_depa=<?php echo $rs2['Clave_depa']; ?>">Ver detalles</a></td>

							 <td><a class="btn waves-effect waves-light red" onclick="delete_departamento(<?php echo $rs2['Clave_depa']; ?>)" href="#">ELIMINAR</a>
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