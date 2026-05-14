<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT *, concat(firstname,' ',lastname) as name FROM `customer_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="content py-3">
    <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header">
            <h3 class="card-title">Expediente Médico: <b><?php echo isset($name) ? $name : '' ?></b></h3>
            <div class="card-tools">
                <button class="btn btn-sm btn-flat btn-primary" type="button" id="add_history"><i class="fa fa-plus"></i> Nueva Consulta</button>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="callout callout-info">
                            <dl>
                                <dt>DNI / Seguro:</dt>
                                <dd><?php echo $insurance_number ?></dd>
                                <dt>Edad:</dt>
                                <dd><?php echo (date_diff(date_create($birthdate), date_create('today'))->y) ?> años</dd>
                                <dt>Contacto:</dt>
                                <dd><?php echo $contact ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Historial de Consultas</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="bg-navy">
                            <th>Fecha</th>
                            <th>Doctor</th>
                            <th>O.D. (Esf/Cil/Eje)</th>
                            <th>O.I. (Esf/Cil/Eje)</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $history = $conn->query("SELECT h.*, u.username as doctor FROM `history_list` h inner join users u on h.doctor_id = u.id where h.customer_id = '{$id}' order by h.date_created desc");
                        while($row = $history->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?php echo date("d-m-Y H:i", strtotime($row['date_created'])) ?></td>
                            <td><?php echo $row['doctor'] ?></td>
                            <td><?php echo "{$row['od_esfera']} / {$row['od_cilindro']} / {$row['od_eje']}" ?></td>
                            <td><?php echo "{$row['oi_esfera']} / {$row['oi_cilindro']} / {$row['oi_eje']}" ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-flat btn-default btn-sm view_data" data-id="<?php echo $row['id'] ?>"><i class="fa fa-eye"></i> Ver receta</button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#add_history').click(function(){
            uni_modal("<i class='fa fa-plus'></i> Nueva Consulta Médica","patients/manage_history.php?customer_id=<?php echo $id ?>","large")
        })
    })
</script>