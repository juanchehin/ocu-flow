<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Agenda de Turnos Médicos</h3>
		<div class="card-tools">
			<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Nuevo Turno</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <table class="table table-bordered table-stripped">
            <colgroup>
                <col width="5%">
                <col width="20%">
                <col width="25%">
                <col width="25%">
                <col width="15%">
                <col width="10%">
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha/Hora</th>
                    <th>Paciente</th>
                    <th>Motivo</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                $qry = $conn->query("SELECT a.*, concat(c.firstname,' ',c.lastname) as patient FROM `appointment_list` a inner join customer_list c on a.customer_id = c.id order by unix_timestamp(a.appointment_date) desc ");
                while($row = $qry->fetch_assoc()):
                ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo date("Y-m-d H:i",strtotime($row['appointment_date'])) ?></td>
                        <td><?php echo $row['patient'] ?></td>
                        <td><p class="truncate-1 m-0"><?php echo $row['reason'] ?></p></td>
                        <td class="text-center">
                            <?php if($row['status'] == 0): ?>
                                <span class="badge badge-primary">Pendiente</span>
                            <?php elseif($row['status'] == 1): ?>
                                <span class="badge badge-warning">En Espera</span>
                            <?php elseif($row['status'] == 2): ?>
                                <span class="badge badge-success">Atendido</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Cancelado</span>
                            <?php endif; ?>
                        </td>
                        <td align="center">
                             <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                Acción <span class="sr-only">Toggle Dropdown</span>
                             </button>
                             <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Editar</a>
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
			uni_modal("<i class='fa fa-plus'></i> Agendar Nuevo Turno","appointments/manage_appointment.php","mid-large")
		})
		$('.edit_data').click(function(){
			uni_modal("<i class='fa fa-edit'></i> Editar Turno","appointments/manage_appointment.php?id="+$(this).attr('data-id'),"mid-large")
		})
		$('.table').dataTable();
	})
</script>