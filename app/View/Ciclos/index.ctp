<!-- Page Header -->
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Ciclos</h4>
    </div>
</div>
<!-- Page Header -->

<!-- START row -->
<div class="row">
    <div class="col-md-12">
        <!-- START panel -->
        <div class="panel panel-info">
            <!-- panel heading/header -->
            <div class="panel-heading">
                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Listado de Ciclos</h3>

            </div>
            <!--/ panel heading/header -->


            <!-- panel body with collapse capabale -->
            <div class="table-responsive panel-collapse pull out">
                <table class="table table-bordered table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Desde</th>
                            <th>Hasta</th>
                            <th>Observacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ciclos as $key => $ci): ?>
                          <?php
                          $clase = 'class="danger"';
                          if ($ci['Ciclo']['estado'] == 'Activo') {
                            $clase = 'class="success"';
                          }
                          ?>
                          <tr <?= $clase ?>>
                              <td><?php echo $ci['Ciclo']['nombre']; ?></td>
                              <td><?php echo $ci['Ciclo']['fecha_ini']; ?></td>
                              <td><?php echo $ci['Ciclo']['fecha_fin']; ?></td>
                              <td><?php echo $ci['Ciclo']['observacion']; ?></td>
                              <td class="text-center">
                                  <a href="<?= $this->Html->url(array('action' => 'materiales',$ci['Ciclo']['id']));?>" title="Inventarios" class="btn btn-inverse mb5">
                                      <i class="ico-cube4"></i>
                                  </a>
                                  <a href="javascript:void(0);" class="btn btn-success mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'ciclo', $ci['Ciclo']['id'])); ?>');" title="Editar"><i class="ico-pencil"></i></a>
                                  <a href="javascript:" class="btn btn-danger mb5" title="Eliminar" type="button" onclick="confirma_url('<?php echo $this->Html->url(array('action' => 'eliminar', $ci['Ciclo']['id'])) ?>', '<?php echo 'Esta seguro de eliminar la marca ' . $ci['Ciclo']['nombre']; ?>');">
                                      <i class="ico-remove3"></i>
                                  </a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br><br><br>
            </div>
            <!--/ panel body with collapse capabale -->
        </div>
    </div>
</div>
<!--/ END row -->
