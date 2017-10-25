<?php
 require_once('../conexion/conexion.php');
 $noControl = isset($_GET['No_contro']) ? $_GET['No_contro'] : 0 ;
 $sql = 'DELETE FROM estudiante WHERE No_contro = ?';
 
 $statement = $pdo->prepare($sql);
 $statement->execute(array($noControl));
 
 $results = $statement->fetchAll();
 header('Location: modificar-estudiante.php');
 ?>


  				            <th>Apellido Materno</th>
  				            <th>Semestre</th>
  				            <th>Carrera</th>
 				            <th colspan="2">Acción</th>
  					    </tr>
  					  </thead>
  					  <tbody>

  							<td><?php echo $rs2['semestre']?></td>
  							<td><?php echo $rs2['nombre_carrera']?></td>
  							<td><a class="btn waves-effect waves-light" href="modificar-estudiante.php?No_contro=<?php echo $rs2['No_contro']; ?>">Ver detalles</a></td>
 						<td><a class="btn waves-effect waves-light red" onclick="delete_estudiante(<?php echo $rs2['No_contro']; ?>)" href="#">ELIMINAR</a>
  					    </tr>
