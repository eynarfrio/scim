<!-- Page Header -->
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Materiales</h4>
    </div>
</div>
<!-- Page Header -->

<!-- START row -->
<div class="row">
    <div class="col-md-12">
        <!-- START panel -->
        <div class="panel panel-success">
            <!-- panel heading/header -->
            <div class="panel-heading">
                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Listado de Materiales</h3>

            </div>
            <!--/ panel heading/header -->


            <!-- panel body with collapse capabale -->
            <div class="table-responsive panel-collapse pull out">
                <table class="table table-bordered table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Categiria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materiales as $key => $ma): ?>
                          <tr>
                              <td><?php echo $key + 1 ?></td>
                              <td><?php echo $ma['Materiale']['codigo'] ?></td>
                              <td><?php echo $ma['Materiale']['nombre'] ?></td>
                              <td><?php echo $ma['Marca']['nombre'] ?></td>
                              <td><?php echo $ma['Categoria']['nombre'] ?></td>
                              <td class="text-center">
                                  <a href="javascript:void(0);" class="btn btn-teal mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'material', $ma['Materiale']['id'])); ?>');" title="Ingresar"><i class="ico-download3"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-inverse mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'material', $ma['Materiale']['id'])); ?>');" title="Sacar"><i class="ico-upload3"></i></a>
                                  <a href="javascript:void(0);" class="btn btn-success mb5" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'material', $ma['Materiale']['id'])); ?>');" title="Editar"><i class="ico-pencil"></i></a>
                                  <a href="javascript:" class="btn btn-danger mb5" title="Eliminar" type="button" onclick="confirma_url('<?php echo $this->Html->url(array('action' => 'eliminar', $ma['Materiale']['id'])) ?>', '<?php echo 'Esta seguro de eliminar el material ' . $ma['Materiale']['nombre']; ?>');">
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
