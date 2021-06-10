<?php 
	#codigo para eliminar
	if (isset($_REQUEST["id"])){
		$id=$_REQUEST["id"];
		$id=intval($id);

		$delete = ProductoData::getById($id);
		
			$del = $delete->del();
			//print_r($del);
			if($del[0]==1){
				$aviso="Bien hecho!";
				$msj="Datos eliminados satisfactoriamente.";
				$classM="alert alert-success";
				$times="&times;";
			}else{
				$aviso="Aviso!";
				$msj="Error al eliminar los datos.";
				$classM="alert alert-danger";
				$times="&times;";
			}
		
	}
?>
<?php
	$query = Database::cleanChain($_REQUEST['query']);
	
	$sWhere=" nombre LIKE '%".$query."%' ";
	$sWhere.=" order by nombre asc";

	include "app/pagination.php"; //incluyo el archivo de paginación

	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;

	$count_query=ProductoData::countQuery($sWhere);
	$numrows = $count_query->numrows;
	$total_pages = ceil($numrows/$per_page);
	$reload = "producto/index";

	$query=ProductoData::query($sWhere, $offset,$per_page);
?>
<?php 
	if (isset($_REQUEST["id"])){
?>
	<div class="<?php echo $classM;?>">
		<button type="button" class="close" data-dismiss="alert"><?php echo $times;?></button>
		<strong><?php echo $aviso?> </strong>
		<?php echo $msj;?>
	</div>	
<?php 
	}
	// si hay registro
	if(count($query)>0){ 
?>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<th>Foto</th>
			<th>Nombre</th>
			<th>SKU</th>
			<th>Presentacion</th>
			<th>Volumen</th>
			<th>Unidades por caja</th>
			
			<th>Añadido</th>
			<th class="oculto-impresion"></th>
		</thead>
		<tbody>
			<?php
			 	$finales=0;
			 	foreach($query as $cat){

			 	$created_at=$cat->created_at;
	            list($date,$time)=explode(" ",$created_at);
	            list($Y,$m,$d)=explode("-",$date);
	            $date=$d."/".$m."/".$Y;

				$finales++;
			?>
			<tr>
				<td>
					<?php if($cat->fotografia!=""){ ?>
				
<a type="producto/index#"  data-toggle="modal" data-target="#exampleModal-<?php echo $cat->idproducto ?>">
  <img width="50" height="50" src="res/storage/productos/<?php echo $cat->fotografia; ?>" alt="<?php echo $cat->nombre; ?>">
</a>
					

<!-- Modal -->
<div class="modal fade" id="exampleModal-<?php echo $cat->idproducto ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img width="100%" src="res/storage/productos/<?php echo $cat->fotografia; ?>" alt="<?php echo $cat->nombre; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>


				<?php }else{ ?>
					Sin foto
					<?php } ?>
				</td>
				<td><?php echo $cat->nombre; ?></td>
				<td><?php echo $cat->sku; ?></td>
				<td><?php echo $cat->presentacion; ?></td>
				<td><?php echo $cat->volumen; ?></td>
				<td><?php echo $cat->unidades_caja; ?></td>
				
				<td><?php echo $date." ".$time; ?></td>
				<td class="text-right oculto-impresion">
					<!-- <a href="producto/show/<?php echo $cat->idproducto;?>" class="btn btn-info">Detalles</a> -->
					<a href="producto/edit/<?php echo $cat->idproducto;?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Editar</a>
	                <button type="button" class="btn btn-danger btn-xs" onclick="eliminar('<?php echo $cat->idproducto;?>')"><i class="fa fa-trash-o"></i> Eliminar</button>
	            </td>
			</tr>
			<?php } ?>
		</tbody>
		<tfoot class="oculto-impresion">
	        <tr>
				<td colspan='10'> 
					<?php 
						$inicios=$offset+1;
						$finales+=$inicios -1;
						echo "Mostrando $inicios al $finales de $numrows registros";
						echo paginate($reload, $page, $total_pages, $adjacents);
					?>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
<?php
	}else{
?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<strong>Sin Resultados!</strong> No se encontraron resultados en la base de datos!.
	</div>
<?php
	}
?>