<?php
 require_once('../conexion/conexion.php');
 $rfc_instructor = isset($_GET['rfc_instructor']) ? $_GET['rfc_instructor'] : 0 ;
 $sql = 'DELETE FROM instructor WHERE rfc_instructor = ?';
 
 $statement = $pdo->prepare($sql);
 $statement->execute(array($rfc_instructor));
 
 $results = $statement->fetchAll();
 header('Location: modificar_instructor.php');
 ?>


  				            <th>RFC</th>
  				            <th>Nombre instructor</th>
  				           <th>Apellido Paterno</th>
                     <th>Apellido Materno</th>
                     <th>Clave actividad</th>
 				            <th colspan="2">Acción</th>
  					    </tr>
  					  </thead>
  					  <tbody>

  							<td><?php echo $rs2['rfc_instructor']?></td>
  							<td><?php echo $rs2['nombre_instructor']?></td>
                <td><?php echo $rs2['ApellidoP_instructor']?></td>
                 <td><?php echo $rs2['ApellidoM_instructor']?></td>
                 <td><?php echo $rs2['act_complementaria_clave_act']?></td>
  							<td><a class="btn waves-effect waves-light" href="modificar_instructor.php?rfc_instructor=<?php echo $rs2['rfc_instructor']; ?>">Ver detalles</a></td>
 						<td><a class="btn waves-effect waves-light red" onclick="delete_instructor(<?php echo $rs2['rfc_instructor']; ?>)" href="#">ELIMINAR</a>
  					    </tr>