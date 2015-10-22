<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class=" ico-download3 mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Ingreso a <?= $combo['Combo']['nombre']?></h3></div>
</div>
<?php echo $this->Form->create('Combo', array('data-parsley-validate')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Cantidad</label>
                <?php echo $this->Form->hidden('Comboingreso.combo_id',array('value' => $idCombo))?>
                <?php echo $this->Form->hidden('Comboingreso.ciclo_id',array('value' => $idCiclo))?>
                <?php echo $this->Form->hidden('Comboingreso.user_id',array('value' => $this->Session->read('Auth.User.id')))?>
                <?php echo $this->Form->text('Comboingreso.cantidad', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la cantidad','type' => 'number','min' => 0)); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Observacion del Ingreso</label>
                <?php echo $this->Form->textarea('Comboingreso.observacion', array('class' => 'form-control', 'placeholder' => 'Ingrese la observacion del Ingreso')); ?>
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
