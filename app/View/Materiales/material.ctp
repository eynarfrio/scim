<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class=" ico-package mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Material</h3></div>
</div>
<?php echo $this->Form->create('Materiale', array('action' => 'registra', 'data-parsley-validate')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id'); ?>
                <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el nombre del material')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Tipo</label>
                <?php echo $this->Form->text('tipo', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese el tipo')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Codigo</label>
                <?php echo $this->Form->text('codigo', array('class' => 'form-control', 'placeholder' => 'Ingrese el codigo del material')); ?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Categoria</label>
                <?php echo $this->Form->select('categoria_id', $categorias, array('class' => 'form-control', 'empty' => 'Seleccione la categoria', 'required')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Marca</label>
                <?php echo $this->Form->select('marca_id', $marcas, array('class' => 'form-control', 'required', 'empty' => 'Seleccione la categoria')); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Observacion</label>
                <?php echo $this->Form->textarea('observacion', array('class' => 'form-control', 'placeholder' => 'Ingrese la observacion')); ?>
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
