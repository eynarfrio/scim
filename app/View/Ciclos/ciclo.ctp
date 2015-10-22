<?php
echo $this->Html->css(array(
  '../plugins/jquery-ui/css/jquery-ui'
));
?>
<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class="ico-spinner3 mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Ciclo</h3></div>

</div>
<?php echo $this->Form->create('Ciclo', array('action' => 'registra', 'data-parsley-validate')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id'); ?>
                <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el nombre de la marca')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Desde</label>
                <?php echo $this->Form->text('fecha_ini', array('class' => 'form-control', 'placeholder' => 'Fecha Inicial', 'id' => 'fecha_p_1')); ?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Hasta</label>
                <?php echo $this->Form->text('fecha_fin', array('class' => 'form-control', 'placeholder' => 'Fecha Final', 'id' => 'fecha_p_2')); ?>
            </div>
        </div>
    </div>
    <div class="form-group" id="punt-0">
        <div class="row">
            <div class="col-sm-8">
                <label class="control-label">Estado</label>
                <?php echo $this->Form->select('estado', array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'), array('class' => 'form-control', 'empty' => 'Seleccione estado', 'required')); ?>
            </div>
            <div class="col-sm-2">
                <label class="control-label">&nbsp;</label>
                <button class="btn btn-success btn-block" type="button" onclick="addmarca();" title="Adicionar marca">Marca</button>
            </div>
            <div class="col-sm-2">
                <label class="control-label">&nbsp;</label>
                <button class="btn btn-danger btn-block" type="button" onclick="quitarmarca();">Quitar</button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Observacion</label>
                <?php echo $this->Form->textarea('observacion', array('class' => 'form-control', 'placeholder' => 'Ingrese una descripcion')); ?>
            </div>
        </div>
    </div>
    <div>
        <div class="form-group" id="d-marcas" style="display: none;">
            <div class="row">
                <div class="col-sm-12">
                    <label class="control-label">Marca</label>
                    <?php echo $this->Form->select('aux_marca', $marcas, array('class' => 'form-control lmarcas', 'empty' => 'Seleccione la marca')); ?>
                </div>
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
  '../plugins/jquery-ui/js/jquery-ui',
  '../plugins/parsley/js/parsley.js'
));
?>

<script>
  var cantidad_l = 0;
  function addmarca(valor) {
      cantidad_l++;
      $('#punt-' + (cantidad_l - 1)).after('<div class="form-group" id="punt-' + cantidad_l + '">' + $('#d-marcas').html() + '</div>');
      $('#punt-' + cantidad_l + ' .lmarcas').attr('name', 'data[Marcas][' + cantidad_l + '][marca_id]');
      $('#punt-' + cantidad_l + ' .form-group').attr('id', 'punt-' + cantidad_l);
      $('#punt-' + cantidad_l + ' .control-label').html('Marca ' + cantidad_l);
      if (valor != undefined) {
          $('#punt-' + cantidad_l + ' .lmarcas').val(valor);
      }
  }
  function quitarmarca() {
      if ((cantidad_l) != 0) {
          $('#punt-' + cantidad_l).remove();
          cantidad_l--;
      }
  }

<?php foreach ($marcas_r as $ma): ?>
    addmarca(<?= $ma['CiclosMarca']['marca_id']; ?>);
<?php endforeach; ?>

</script>

<script>
  //------------ CAMBIA EL IDIOMA AL DATEPICKER ------------
  $(function ($) {
      $.datepicker.regional['es'] = {
          closeText: 'Cerrar',
          prevText: '<Ant',
          nextText: 'Sig>',
          currentText: 'Hoy',
          monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
          dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
          dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
          dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
          weekHeader: 'Sm',
          dateFormat: 'dd/mm/yy',
          firstDay: 1,
          isRTL: false,
          showMonthAfterYear: false,
          yearSuffix: ''
      };
      $.datepicker.setDefaults($.datepicker.regional['es']);
  });
  //----------------- TERMINA CAMBIO DE IDIOMA ---------------
  $('#fecha_p_1').datepicker({dateFormat: 'yy-mm-dd'});
  $('#fecha_p_2').datepicker({dateFormat: 'yy-mm-dd'});
</script>
