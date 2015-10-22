<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class=" ico-users4 mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Cliente</h3></div>

</div>
<?php echo $this->Form->create('Cliente', array('action' => 'registra', 'data-parsley-validate')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id'); ?>
                <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el nombre del cliente')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Codigo</label>
                <?php echo $this->Form->text('codigo', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el codigo del cliente')); ?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Celular</label>
                <?php echo $this->Form->text('celular', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el celular del cliente')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre Negocio</label>
                <?php echo $this->Form->text('nombre_negocio', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el nombre del negocio')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Direccion Domicilio</label>
                <?php echo $this->Form->text('direccion_domicilio', array('class' => 'form-control', 'required', 'placeholder' => 'Direccion del domicilio')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Telefono Domicilio</label>
                <?php echo $this->Form->text('telefono_domicilio', array('class' => 'form-control', 'required', 'placeholder' => 'Telefono Direccion')); ?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Ruta</label>
                <?php echo $this->Form->select('ruta_id',$rutas, array('class' => 'form-control', 'empty' => 'Seleccione Ruta')); ?>
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
