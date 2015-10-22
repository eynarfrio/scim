<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class=" ico-user7 mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Usuario</h3></div>
</div>
<?php echo $this->Form->create('User', array('action' => 'guardarusuario', 'data-parsley-validate')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id'); ?>
                <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el nombre del usuario')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">C.I.</label>
                <?php echo $this->Form->text('ci', array('class' => 'form-control', 'placeholder' => 'Documento de Indentidad')); ?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Telefono</label>
                <?php echo $this->Form->text('telefono', array('class' => 'form-control', 'placeholder' => 'Telefono(s)/celular')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Tipo</label>
                <?php echo $this->Form->select('role', $roles, array('class' => 'form-control', 'required','id' => 'idsucursal')); ?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Codigo</label>
                <?php echo $this->Form->text('codigo', array('class' => 'form-control', 'placeholder' => 'Ingresar el codigo')); ?>
            </div>
        </div>
    </div>
    <?php
    $requerido_u = '';
    $requerido_p = '';
    $display_g = 'style="display: none;"';
    if (!empty($this->request->data['User']['role']) && $this->request->data['User']['role'] == 'Administrador') {
      $requerido_u = 'required';
      $requerido_p = 'required';
      $display_g = '';
    }
    ?>
    <div class="form-group div-usuario" <?php echo $display_g; ?>>
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Usuario</label>
                <?php echo $this->Form->text('username', array('class' => 'form-control usuario', 'placeholder' => 'Ingrese el Usuario', $requerido_u)); ?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Password</label>
                <?php echo $this->Form->password('password2', array('class' => 'form-control usuario', 'placeholder' => 'Ingrese un password', $requerido_p, 'value' => '')); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Registrar</button>
</div>
<?php echo $this->Form->end(); ?>

<?php
echo $this->Html->script(array(
  '../plugins/parsley/js/parsley.js'
));
?>

<script>
$('#idsucursal').change(function(){
  //alert($('#idsucursal').val());
  if($('#idsucursal').val() == 'Administrador'){
    $('.div-usuario').show(400);
    $('.usuario').attr('required',true);
  }else{
    $('.div-usuario').hide(400);
    $('.usuario').attr('required',false);
  }
});
</script>