
<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class="ico-spinner3 mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Ciclo</h3></div>

</div>
<?php echo $this->Form->create('Combo', array('action' => 'registra_combo_c', 'data-parsley-validate')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id'); ?>
                <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el nombre del combo')); ?>
            </div>
        </div>
    </div>
    <div class="form-group" id="punt-0">
        <div class="row">
            <div class="col-sm-4">
                <label class="control-label">Cantidad Combos</label>
                <?php echo $this->Form->text('Comboingreso.cantidad', array('class' => 'form-control lmateriales-c', 'placeholder' => '0')); ?>
            </div>
            <div class="col-sm-4">
                <label class="control-label">&nbsp;</label>
                <button class="btn btn-success btn-block" type="button" onclick="addmaterial();" title="Adicionar marca">Add Material</button>
            </div>
            <div class="col-sm-4">
                <label class="control-label">&nbsp;</label>
                <button class="btn btn-danger btn-block" type="button" onclick="quitarmaterial();">Quitar</button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Observacion</label>
                <?php echo $this->Form->textarea('Comboingreso.observacion', array('class' => 'form-control', 'placeholder' => 'Ingrese una descripcion')); ?>
            </div>
        </div>
    </div>
    <div>
        <div class="form-group" id="d-materiales" style="display: none;">
            <div class="row">
                <div class="col-sm-8">
                    <label class="control-label milabel">Material</label>
                    <?php echo $this->Form->select('aux_material', $materiales, array('class' => 'form-control lmateriales', 'empty' => 'Seleccione el material')); ?>
                </div>
                <div class="col-sm-4">
                    <label class="control-label">Cantidad</label>
                    <?php echo $this->Form->text('aux_cantidad', array('class' => 'form-control lmateriales-c', 'placeholder' => '0.00')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Registrar</button>
</div>
<?php echo $this->Form->hidden('Comboingreso.user_id',array('value' => $this->Session->read('Auth.User.id'))); ?>
<?php echo $this->Form->hidden('Comboingreso.ciclo_id',array('value' => $idCiclo)); ?>
<?php echo $this->Form->end(); ?>

<?php
echo $this->Html->script(array(
  '../plugins/parsley/js/parsley.js'
));
?>

<script>
  var cantidad_l = 0;
  function addmaterial(valor) {
      cantidad_l++;
      $('#punt-' + (cantidad_l - 1)).after('<div class="form-group" id="punt-' + cantidad_l + '">' + $('#d-materiales').html() + '</div>');
      $('#punt-' + cantidad_l + ' .lmateriales').attr('name', 'data[Materiales][' + cantidad_l + '][materiale_id]');
      $('#punt-' + cantidad_l + ' .lmateriales-c').attr('name', 'data[Materiales][' + cantidad_l + '][cantidad]');
      $('#punt-' + cantidad_l + ' .form-group').attr('id', 'punt-' + cantidad_l);
      $('#punt-' + cantidad_l + ' .milabel').html('Marca ' + cantidad_l);
      if (valor != undefined) {
          $('#punt-' + cantidad_l + ' .lmateriales').val(valor);
      }
  }
  function quitarmaterial() {
      if ((cantidad_l) != 0) {
          $('#punt-' + cantidad_l).remove();
          cantidad_l--;
      }
  }

</script>
