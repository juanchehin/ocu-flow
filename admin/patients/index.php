<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Listado de Pacientes</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Nuevo Paciente</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <table class="table table-hover table-striped">
            <colgroup>
                <col width="5%">
                <col width="15%">
                <col width="30%">
                <col width="20%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Registro</th>
                    <th>Nombre Completo</th>
                    <th>Contacto</th>
                    <th>Seguro/Obra Social</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                $qry = $conn->query("SELECT *, concat(firstname,' ',lastname) as name FROM `customer_list` order by name asc ");
                while($row = $qry->fetch_assoc()):
                ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo date("Y-m-d",strtotime($row['date_created'])) ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td>
                            <small><b>Email:</b> <?php echo $row['email'] ?></small><br>
                            <small><b>Tel:</b> <?php echo $row['contact'] ?></small>
                        </td>
                        <td><?php echo isset($row['health_insurance']) ? $row['health_insurance'] : 'N/A' ?></td>
                        <td align="center">
                             <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Acción <span class="sr-only">Toggle Dropdown</span>
                             </button>
                             <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="<?php echo base_url."admin/?page=patients/view_history&id=".$row['id'] ?>"><span class="fa fa-eye text-dark"></span> Ver Historia</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Editar Datos</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Eliminar</a>
                             </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#create_new').click(function(){
			uni_modal("<i class='fa fa-plus'></i> Registrar Nuevo Paciente","patients/manage_patient.php","mid-large")
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Editar Datos de Paciente","patients/manage_patient.php?id="+$(this).attr('data-id'),"mid-large")
		})
		$('.delete_data').click(function(){
			_conf("¿Estás seguro de eliminar a este paciente de forma permanente?","delete_patient",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_patient($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_patient",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("Ocurrió un error","error");
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("Ocurrió un error","error");
					end_loader();
				}
			}
		})
	}
</script>