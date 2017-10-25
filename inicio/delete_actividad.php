<?php
 require_once('../conexion/conexion.php');
 $clave_act = isset($_GET['clave_act']) ? $_GET['clave_act'] : 0 ;
 $sql = 'DELETE FROM act_complementaria WHERE clave_act = ?';
 
 $statement = $pdo->prepare($sql);
 $statement->execute(array($clave_act));
 
 $results = $statement->fetchAll();
 header('Location: modificar_actividad.php');
 ?>


  				            <th>Numero de actividad</th>
  				            <th>Nombre actividad</th>
  				           
 				            <th colspan="2">Acción</th>
  					    </tr>
  					  </thead>
  					  <tbody>

  							<td><?php echo $rs2['clave_act']?></td>
  							<td><?php echo $rs2['nombre_actcomplementaria']?></td>
  							<td><a class="btn waves-effect waves-light" href="modificar_actividad.php?clave_act=<?php echo $rs2['clave_act']; ?>">Ver detalles</a></td>
 						<td><a class="btn waves-effect waves-light red" onclick="delete_actividad(<?php echo $rs2['clave_act']; ?>)" href="#">ELIMINAR</a>
  					    </tr>