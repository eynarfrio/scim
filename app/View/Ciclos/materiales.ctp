<!-- Page Header -->
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Ciclo <?= $ciclo['Ciclo']['nombre'] ?> <small><?= 'De ' . $ciclo['Ciclo']['fecha_ini'] . ' a ' . $ciclo['Ciclo']['fecha_fin'] ?></small></h4>
    </div>
</div>
<!-- Page Header -->

<!-- START row -->
<div class="row">
    <div class="col-md-12">
        <!-- START panel -->
        <div class="panel panel-inverse" id="lista-inventario">
            <!-- panel heading/header -->
            <div class="panel-heading">
                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Inventario</h3>
                <div class="panel-toolbar text-right">
                    <button class="btn btn-success" type="button" title="Adicionar Material" onclick="$('#lista-inventario').toggle(400);
                          $('#lista-materiales').toggle(400);">
                        <i class="ico-plus"></i>Add
                    </button>
                    <button class="btn btn-info" type="button" title="Nuevo Material" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Materiales', 'action' => 'material_ciclo', $idCiclo)); ?>')">Nuevo</button>
                </div>
            </div>
            <!--/ panel heading/header -->


            <!-- panel body with collapse capabale -->
            <div class="table-responsive panel-collapse pull out">
                <table class="table table-bordered table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Material</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materiales as $key => $ma): ?>
                          <tr>
                              <td><?php echo $key + 1 ?></td>
                              <td><?php echo $ma['Materiale']['nombre'] ?></td>
                              <td><?php echo $ma['Materiale']['tipo'] ?></td>
                              <td><?php echo $ma['Totale']['marca'] ?></td>
                              <td><?php echo $ma['Totale']['cantidad'] ?></td>
                              <td class="text-center">
                                  <a href="javascript:void(0);" class="btn btn-teal mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ingresar', $idCiclo, $ma['Materiale']['id'])); ?>');" title="Ingresar"><i class="ico-download3"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-inverse mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'sacar', $idCiclo, $ma['Materiale']['id'])); ?>');" title="Sacar"><i class="ico-upload3"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-success mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ingresos', $idCiclo, $ma['Materiale']['id'])); ?>');" title="Detalle de Ingresos"><i class="ico-th-list"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-warning mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'salidas', $idCiclo, $ma['Materiale']['id'])); ?>');" title="Detalle de Salidas"><i class="ico-align-justify"></i></a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br><br><br>
            </div>
            <!--/ panel body with collapse capabale -->
        </div>

        <div class="panel panel-success" id="lista-materiales" style="display: none;">
            <!-- panel heading/header -->
            <div class="panel-heading">
                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Listado de Materiles</h3>
                <div class="panel-toolbar text-right">
                    <button class="btn btn-inverse" type="button" title="Volver a inventario" onclick="$('#lista-materiales').toggle(400);
                          $('#lista-inventario').toggle(400);">
                        <i class="ico-undo2"></i>Inventario
                    </button>
                    <button class="btn btn-info" type="button" title="Nuevo Material" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Materiales', 'action' => 'material_ciclo', $idCiclo)); ?>')">Nuevo</button>
                </div>
            </div>
            <!--/ panel heading/header -->
            <div class="panel-body">
                <!-- panel body with collapse capabale -->
                <?php echo $this->Form->create('Ciclo', array('action' => 'add_material', 'data-parsley-validate', 'id' => 'f-add-material')); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label">Cantidad</label>
                            <?php echo $this->Form->text('Ingreso.cantidad', array('class' => 'form-control', 'placeholder' => 'Ingrese la cantidad', 'type' => 'number', 'min' => 1, 'required')); ?>
                        </div>
                        <div class="col-md-5">
                            <label class="control-label">Observacion</label>
                            <?php echo $this->Form->text('Ingreso.observacion', array('class' => 'form-control', 'placeholder' => 'Observacion del ingreso')); ?>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Departamento</label>
                            <?php echo $this->Form->select('Ingreso.departamento', $departamentos, array('class' => 'form-control', 'empty' => 'Seleccione Departamento')); ?>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->hidden('Ingreso.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?>
                <?php echo $this->Form->hidden('Ingreso.ciclo_id', array('value' => $idCiclo)) ?>
                <?php echo $this->Form->hidden('Ingreso.materiale_id', array('id' => 'idmaterial')) ?>
                <?php echo $this->Form->end(); ?>
                <div class="table-responsive panel-collapse pull out">
                    <table class="table table-bordered table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Material</th>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materiales_no as $key => $ma): ?>
                              <tr>
                                  <td><?php echo $key + 1 ?></td>
                                  <td><?php echo $ma['Materiale']['nombre'] ?></td>
                                  <td><?php echo $ma['Materiale']['tipo'] ?></td>
                                  <td><?php echo $ma['Marca']['nombre'] ?></td>
                                  <td class="text-center">
                                      <button class="btn btn-success mb5" type="button" title="Ingresar material" onclick="addmaterial(<?php echo $ma['Materiale']['id'] ?>);"><i class="ico-plus"></i></button>
                                  </td>
                              </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br><br><br><br>
                </div>
            </div>
            <!--/ panel body with collapse capabale -->
        </div>
    </div>
</div>
<!--/ END row -->


<div class="row">
    <div class="col-md-12">
        <!-- START panel -->
        <div class="panel panel-info" id="lista-inventario-c">
            <!-- panel heading/header -->
            <div class="panel-heading">
                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span>Combos</h3>
                <div class="panel-toolbar text-right">
                    <button class="btn btn-success" type="button" title="Adicionar Material" onclick="$('#lista-inventario-c').toggle(400);
                          $('#lista-materiales-c').toggle(400);">
                        <i class="ico-plus"></i>Add
                    </button>
                    <button class="btn btn-info" type="button" title="Nuevo Material" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Combos', 'action' => 'combo_ciclo', $idCiclo)); ?>')">Nuevo</button>
                </div>
            </div>
            <!--/ panel heading/header -->


            <!-- panel body with collapse capabale -->
            <div class="table-responsive panel-collapse pull out">
                <table class="table table-bordered table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Combo</th>
                            <th>Materiales</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($combos as $key => $co): ?>
                          <tr>
                              <td><?php echo $key + 1 ?></td>
                              <td><?php echo $co['Combo']['nombre'] ?></td>
                              <td>
                                  <table style="width: 100%;">
                                      <?php foreach ($co['Combo']['materiales'] as $ma): ?>
                                        <tr>
                                            <td align="center"><?= $ma['Materiale']['nombre'] ?></td>
                                            <td align="center"><?= $ma['MaterialesCombo']['cantidad'] * $co['Combototale']['cantidad'] ?></td>
                                        </tr>
                                      <?php endforeach; ?>
                                  </table>
                              </td>
                              <td><?php echo $co['Combototale']['cantidad'] ?></td>
                              <td class="text-center">
                                  <a href="javascript:void(0);" class="btn btn-teal mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Combos', 'action' => 'ingresar', $idCiclo, $co['Combo']['id'])); ?>');" title="Ingresar"><i class="ico-download3"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-inverse mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Combos', 'action' => 'sacar', $idCiclo, $co['Combo']['id'])); ?>');" title="Sacar"><i class="ico-upload3"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-success mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Combos', 'action' => 'ingresos', $idCiclo, $co['Combo']['id'])); ?>');" title="Detalle de Ingresos"><i class="ico-th-list"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-warning mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Combos', 'action' => 'salidas', $idCiclo, $co['Combo']['id'])); ?>');" title="Detalle de Salidas"><i class="ico-align-justify"></i></a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br><br><br>
            </div>
            <!--/ panel body with collapse capabale -->
        </div>

        <div class="panel panel-danger" id="lista-materiales-c" style="display: none;">
            <!-- panel heading/header -->
            <div class="panel-heading">
                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Listado de Combos</h3>
                <div class="panel-toolbar text-right">
                    <button class="btn btn-inverse" type="button" title="Volver a inventario" onclick="$('#lista-materiales-c').toggle(400);
                          $('#lista-inventario-c').toggle(400);">
                        <i class="ico-undo2"></i>Inventario
                    </button>
                    <button class="btn btn-info" type="button" title="Nuevo Material" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Combos', 'action' => 'combo_ciclo', $idCiclo)); ?>')">Nuevo</button>
                </div>
            </div>
            <!--/ panel heading/header -->
            <div class="panel-body">
                <!-- panel body with collapse capabale -->
                <?php echo $this->Form->create('Ciclo', array('action' => 'add_combo', 'data-parsley-validate', 'id' => 'f-add-combo')); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label">Cantidad</label>
                            <?php echo $this->Form->text('Comboingreso.cantidad', array('class' => 'form-control', 'placeholder' => 'Ingrese la cantidad', 'type' => 'number', 'min' => 1, 'required')); ?>
                        </div>
                        <div class="col-md-8">
                            <label class="control-label">Observacion</label>
                            <?php echo $this->Form->text('Comboingreso.observacion', array('class' => 'form-control', 'placeholder' => 'Observacion del ingreso')); ?>
                        </div>
                    </div>
                </div>
                <?php echo $this->Form->hidden('Comboingreso.user_id', array('value' => $this->Session->read('Auth.User.id'))) ?>
                <?php echo $this->Form->hidden('Comboingreso.ciclo_id', array('value' => $idCiclo)) ?>
                <?php echo $this->Form->hidden('Comboingreso.combo_id', array('id' => 'idcombo')) ?>
                <?php echo $this->Form->end(); ?>
                <div class="table-responsive panel-collapse pull out">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Combo</th>
                                <th>Materiales<th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($combos_no as $key => $co): ?>
                              <tr>
                                  <td><?php echo $key + 1 ?></td>
                                  <td><?php echo $co['Combo']['nombre'] ?></td>
                                  <td><?php echo $co['Combo']['materiales'] ?></td>
                                  <td class="text-center">
                                      <button class="btn btn-success mb5" type="button" title="Ingresar material" onclick="addcombo(<?php echo $co['Combo']['id'] ?>);"><i class="ico-plus"></i></button>
                                  </td>
                              </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br><br><br><br>
                </div>
            </div>
            <!--/ panel body with collapse capabale -->
        </div>
    </div>
</div>
<?php
echo $this->Html->script(array(
  '../plugins/parsley/js/parsley.js'
  ), array('block' => 'scriptadd'));
?>
<script>
  function addmaterial(idMaterial) {
      $('#idmaterial').val(idMaterial);
      $('#f-add-material').parsley().validate();
      $('#f-add-material').submit();
  }
</script>