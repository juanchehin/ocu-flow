<?php
require_once('../../config.php');
$customer_id = $_GET['customer_id'];
?>
<div class="container-fluid">
    <form action="" id="history-form">
        <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>">
        <input type="hidden" name="doctor_id" value="<?php echo $_settings->userdata('id') ?>">
        
        <div class="row">
            <div class="col-md-6 border-right">
                <h6 class="text-primary font-weight-bold">OJO DERECHO (OD)</h6>
                <div class="row">
                    <div class="col-md-3"><label>Esfera</label><input type="text" name="od_esfera" class="form-control"></div>
                    <div class="col-md-3"><label>Cilindro</label><input type="text" name="od_cilindro" class="form-control"></div>
                    <div class="col-md-3"><label>Eje</label><input type="text" name="od_eje" class="form-control"></div>
                    <div class="col-md-3"><label>Adición</label><input type="text" name="od_adicion" class="form-control"></div>
                </div>
            </div>
            <div class="col-md-6">
                <h6 class="text-primary font-weight-bold">OJO IZQUIERDO (OI)</h6>
                <div class="row">
                    <div class="col-md-3"><label>Esfera</label><input type="text" name="oi_esfera" class="form-control"></div>
                    <div class="col-md-3"><label>Cilindro</label><input type="text" name="oi_cilindro" class="form-control"></div>
                    <div class="col-md-3"><label>Eje</label><input type="text" name="oi_eje" class="form-control"></div>
                    <div class="col-md-3"><label>Adición</label><input type="text" name="oi_adicion" class="form-control"></div>
                </div>
            </div>
        </div>
        
        <div class="form-group mt-3">
            <label>Diagnóstico / Hallazgos</label>
            <textarea name="diagnostico" rows="3" class="form-control" placeholder="Describa el estado de la retina, córnea, etc."></textarea>
        </div>
        <div class="form-group">
            <label>Indicaciones para la Receta</label>
            <textarea name="receta_indicaciones" rows="2" class="form-control" placeholder="Ej: Uso permanente, solo lectura, etc."></textarea>
        </div>
    </form>
</div>

<script>
    $(function(){
        $('#history-form').submit(function(e){
            e.preventDefault();
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_history",
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success:function(resp){
                    if(resp.status == 'success') location.reload();
                    else alert_toast("Error al guardar","error");
                    end_loader();
                }
            })
        })
    })
</script>