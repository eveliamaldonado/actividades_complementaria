<?php
 require_once('../conexion/conexion.php');
 $clave_carrera = isset($_GET['clave_carrera']) ? $_GET['clave_carrera'] : 0 ;
 $sql = 'DELETE FROM carrera WHERE clave_carrera = ?';
 
 $statement = $pdo->prepare($sql);
 $statement->execute(array($clave_carrera));
 
 $results = $statement->fetchAll();
 header('Location: modificar_carrera.php');
 ?>


  				            <th>Clave Carrera</th>
  				            <th>Nombre Carrera</th>
  				           
 				            <th colspan="2">Acción</th>
  					    </tr>
  					  </thead>
  					  <tbody>

  							<td><?php echo $rs2['clave_carrera']?></td>
  							<td><?php echo $rs2['nombre_carrera']?></td>
  							<td><a class="btn waves-effect waves-light" href="modificar_carrera.php?clave_carrera=<?php echo $rs2['clave_carrera']; ?>">Ver detalles</a></td>
 						<td><a class="btn waves-effect waves-light red" onclick="delete_carrera(<?php echo $rs2['clave_carrera']; ?>)" href="#">ELIMINAR</a>
  					    </tr>
