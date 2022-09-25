<?php
	
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tabla="producto";
	$campos="*";
	$sWhere=" producto.nombre LIKE '%".$query."%'";
	$sWhere.=" order by producto.nombre";
	
	
	include 'pagination.php'; 
	
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); 
	$adjacents  = 4; 
	$offset = ($page - 1) * $per_page;
	
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tabla where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	
	$query = mysqli_query($con,"SELECT $campos FROM  $tabla where $sWhere LIMIT $offset,$per_page");
	
	


		
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Código</th>
						<th>Producto </th>
						<th>Categoría </th>
						<th class='text-center'>Stock</th>
						<th class='text-right'>Precio</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_Poducto=$row['id'];
							$codigo_Producto=$row['codigo'];
							$nombre_Producto=$row['nombre'];
							$categoria_Producto=$row['categoria'];
							$stock_Producto=$row['stock'];
							$precio=$row['precio'];						
							$finales++;
						?>	
						<tr>
							<td class='text-center'><?php echo $codigo_Producto;?></td>
							<td ><?php echo $nombre_Producto;?></td>
							<td ><?php echo $categoria_Producto;?></td>
							<td class='text-center' ><?php echo $stock_Producto;?></td>
							<td class='text-right'><?php echo number_format($precio,2);?></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-code='<?php echo $codigo_Producto;?>' data-name="<?php echo $nombre_Producto?>" data-category="<?php echo $categoria_Producto?>" data-stock="<?php echo $stock_Producto?>" data-price="<?php echo $precio;?>" data-id="<?php echo $id_Poducto; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id_Poducto;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          
		  
