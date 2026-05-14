<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    // Si viene un ID, editamos un turno existente
    $qry = $conn->query("SELECT * from `appointment_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
    <form action="" id="appointment-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        
        <div class="form-group">
            <label for="customer_id" class="control-label">Seleccionar Paciente</label>
            <select name="customer_id" id="customer_id" class="form-control form-control-sm rounded-0 select2" required>
                <option value="" disabled <?php echo !isset($customer_id) ? "selected" : "" ?>></option>
                <?php 
                $customer = $conn->query("SELECT *, concat(firstname,' ',lastname) as name FROM customer_list order by name asc");
                while($row=$customer->fetch_assoc()):
                ?>
                <option value="<?php echo $row['id'] ?>" <?php echo isset($customer_id) && $customer_id == $row['id'] ? "selected" : "" ?>>
                    <?php echo $row['name'] ?>
                </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="appointment_date" class="control-label">Fecha y Hora</label>
                    <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control form-control-sm rounded-0" value="<?php echo isset($appointment_date) ? date("Y-m-d\TH:i",strtotime($appointment_date)) : "" ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status" class="control-label">Estado Inicial</label>
                    <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                        <option value="0" <?php echo isset($status) && $status == 0 ? "selected" : "" ?>>Pendiente</option>
                        <option value="1" <?php echo isset($status) && $status == 1 ? "selected" : "" ?>>En Espera (Llegó)</option>
                        <option value="2" <?php echo isset($status) && $status == 2 ? "selected" : "" ?>>Finalizado</option>
                        <option value="3" <?php echo isset($status) && $status == 3 ? "selected" : "" ?>>Cancelado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="reason" class="control-label">Motivo / Síntomas</label>
            <textarea name="reason" id="reason" rows="3" class="form-control form-control-sm rounded-0" placeholder="Ej: Control anual, irritación ocular, rotura de lentes..." required><?php echo isset($reason) ? $reason : "" ?></textarea>
        </div>
    </form>
</div>

<script>
    $(function(){
        // Inicializar Select2 para búsqueda rápida de pacientes
        $('.select2').select2({
            placeholder: "Buscar paciente...",
            width: '100%',
            dropdownParent: $('#uni_modal')
        });

        $('#appointment-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_appointment",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: err => {
                    console.log(err)
                    alert_toast("Ocurrió un error al procesar los datos","error");
                    end_loader();
                },
                success: function(resp){
                    if(typeof resp =='object' && resp.status == 'success'){
                        location.reload();
                    }else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body, .modal").animate({ scrollTop: 0 }, "fast");
                            end_loader();
                    }else{
                        alert_toast("Error desconocido","error");
                        end_loader();
                        console.log(resp)
                    }
                }
            })
        })
    })
</script>