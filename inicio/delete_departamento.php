<?php
 require_once('../conexion/conexion.php');
 $clavedepa = isset($_GET['Clave_depa']) ? $_GET['Clave_depa'] : 0 ;
 $sql = 'DELETE FROM departamento WHERE Clave_depa = ?';
 
 $statement = $pdo->prepare($sql);
 $statement->execute(array($clavedepa));
 
 $results = $statement->fetchAll();
 header('Location: modificar_departamento.php');
 ?>


  				            <th>Clave </th>
  				            <th>Nombre </th>
                      <th>RFC </th>
  				           
 				            <th colspan="2">Acción</th>
  					    </tr>
  					  </thead>
  					  <tbody>

  							<td><?php echo $rs2['Clave_depa']?></td>
  							<td><?php echo $rs2['nombre_departamento']?></td>
                <td><?php echo $rs2['trabajador_rfc']?></td>
  							<td><a class="btn waves-effect waves-light" href="modificar_departamento.php?Clave_depa=<?php echo $rs2['Clave_depa']; ?>">Ver detalles</a></td>
 						<td><a class="btn waves-effect waves-light red" onclick="delete_departamento(<?php echo $rs2['Clave_depa']; ?>)" href="#">ELIMINAR</a>
  					    </tr>