<?php
 require_once('../conexion/conexion.php');
 $clave_instituto = isset($_GET['clave_instituto']) ? $_GET['clave_instituto'] : 0 ;
 $sql = 'DELETE FROM instituto WHERE clave_instituto = ?';
 
 $statement = $pdo->prepare($sql);
 $statement->execute(array($clave_instituto));
 
 $results = $statement->fetchAll();
 header('Location: modificar_instituto.php');
 ?>


  				            <th>Clave instituto</th>
  				            <th>Nombre instituto</th>
  				           
 				            <th colspan="2">Acción</th>
  					    </tr>
  					  </thead>
  					  <tbody>

  							<td><?php echo $rs2['clave_instituto']?></td>
  							<td><?php echo $rs2['nombreinstituto']?></td>
  							<td><a class="btn waves-effect waves-light" href="modificar_instituto.php?clave_instituto=<?php echo $rs2['clave_instituto']; ?>">Ver detalles</a></td>
 						<td><a class="btn waves-effect waves-light red" onclick="delete_instituto(<?php echo $rs2['clave_instituto']; ?>)" href="#">ELIMINAR</a>
  					    </tr>