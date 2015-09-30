<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class=" ico-user7 mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Usuario</h3></div>
    
</div>
<?php echo $this->Form->create('User',array('action' => 'guardarusuario','data-parsley-validate'));?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id');?>
                <?php echo $this->Form->text('nombre',array('class' => 'form-control','required','placeholder' => 'Ingrese el nombre del usuario'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Usuario</label>
                <?php echo $this->Form->text('username',array('class' => 'form-control','placeholder' => 'Ingrese el Usuario','required'));?>
            </div>
            <?php 
            $requerido_p = "";
            if(empty($this->request->data['User']['id'])){
              $requerido_p = "required";
            }
            ?>
            <div class="col-sm-6">
                <label class="control-label">Password</label>
                <?php echo $this->Form->password('password2',array('class' => 'form-control','placeholder' => 'Ingrese un password',$requerido_p,'value' => ''));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Tipo</label>
                <?php echo $this->Form->select('role',array('Administrador' => 'Administrador','Empleado' => 'Empleado'),array('class' => 'form-control','required'));?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Registrar</button>
</div>
<?php echo $this->Form->end();?>

<?php echo $this->Html->script(array(
    '../plugins/parsley/js/parsley.js'
    )); ?>