<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class=" ico-download3 mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Ingeso</h3></div>
</div>
<?php echo $this->Form->create('Ciclo', array('data-parsley-validate')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Cantidad</label>
                <?php echo $this->Form->hidden('Ingreso.materiale_id',array('value' => $idMaterial))?>
                <?php echo $this->Form->hidden('Ingreso.ciclo_id',array('value' => $idCiclo))?>
                <?php echo $this->Form->hidden('Ingreso.user_id',array('value' => $this->Session->read('Auth.User.id')))?>
                <?php echo $this->Form->text('Ingreso.cantidad', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la cantidad','type' => 'number','min' => 0)); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Departamento</label>
                <?php echo $this->Form->select('Ingreso.departamento', $departamentos,array('class' => 'form-control', 'empty' => 'Seleccione departamento')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Observacion del Ingreso</label>
                <?php echo $this->Form->textarea('Ingreso.observacion', array('class' => 'form-control', 'placeholder' => 'Ingrese la observacion del Ingreso')); ?>
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
