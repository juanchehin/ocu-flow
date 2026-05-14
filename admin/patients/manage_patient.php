<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `customer_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
    <form action="" id="patient-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname" class="control-label">Nombre</label>
                    <input type="text" name="firstname" class="form-control form-control-sm rounded-0" value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="lastname" class="control-label">Apellido</label>
                    <input type="text" name="lastname" class="form-control form-control-sm rounded-0" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="birthdate" class="control-label">Fecha de Nacimiento</label>
                    <input type="date" name="birthdate" class="form-control form-control-sm rounded-0" value="<?php echo isset($birthdate) ? $birthdate : '' ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact" class="control-label">Teléfono</label>
                    <input type="text" name="contact" class="form-control form-control-sm rounded-0" value="<?php echo isset($contact) ? $contact : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm rounded-0" value="<?php echo isset($email) ? $email : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="health_insurance" class="control-label">Obra Social / Seguro</label>
                    <input type="text" name="health_insurance" class="form-control form-control-sm rounded-0" value="<?php echo isset($health_insurance) ? $health_insurance : '' ?>" placeholder="Ej: OSDE, Swiss Medical...">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="control-label">Dirección</label>
            <textarea name="address" rows="2" class="form-control form-control-sm rounded-0"><?php echo isset($address) ? $address : '' ?></textarea>
        </div>
        <?php if(!isset($id)): ?>
        <div class="form-group">
            <label for="password" class="control-label">Contraseña Temporal (Para el portal)</label>
            <input type="password" name="password" class="form-control form-control-sm rounded-0" required>
        </div>
        <?php endif; ?>
    </form>
</div>
<script>
    $(function(){
        $('#patient-form').submit(function(e){
            e.preventDefault();
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_patient",
                data: new FormData($(this)[0]),
                cache: false, contentType: false, processData: false,
                method: 'POST', type: 'POST', dataType: 'json',
                success:function(resp){
                    if(resp.status == 'success') location.reload();
                    else alert_toast("Error al guardar","error");
                    end_loader();
                }
            })
        })
    })
</script>