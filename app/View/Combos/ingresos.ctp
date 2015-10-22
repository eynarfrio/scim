<div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <div class="ico-th-list mb15 mt15" style="font-size:36px;"><h3 class="semibold modal-title text-info">Ingresos a <?= $combo['Combo']['nombre'] ?></h3></div>
</div>

<div class="modal-body">
    <div class="table-responsive panel-collapse pull out">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Materiales</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ingresos as $in): ?>
                  <tr>
                      <td><?= $in['Comboingreso']['created'] ?></td>
                      <td><?= $in['Comboingreso']['cantidad'] ?></td>
                      <td>
                          <table style="width: 100%">
                              <?php foreach ($materiales as $ma): ?>
                                <tr>
                                    <td align="center"><?= $ma['Materiale']['nombre'] ?></td>
                                    <td align="center"><?= ($ma['MaterialesCombo']['cantidad'] * $in['Comboingreso']['cantidad']) ?></td>
                                </tr>
                              <?php endforeach; ?>
                          </table>
                      </td>
                      <td>
                          <a href="javascript:" class="btn btn-danger mb5" title="Eliminar" type="button" onclick="confirma_url('<?php echo $this->Html->url(array('controller' => 'Combos','action' => 'eliminar_ingreso',$in['Comboingreso']['id'] )) ?>', '<?php echo 'Esta seguro de eliminar el ingreso '; ?>');">
                              <i class="ico-remove3"></i>
                          </a>
                      </td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>  
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
