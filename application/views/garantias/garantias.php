<div class="new122">
    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aGarantia')) { ?>
    <a href="<?php echo base_url(); ?>index.php/garantias/adicionar" class="button_mini btn btn-mini btn-success" style="max-width: 160px">
      <span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Termo Garantia</span></a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title"  style="margin: -20px 0 0">
        <span class="icon">
            <i class="fas fa-book"></i>
        </span>
        <h5>Termo de Garantia</h5>
    </div>
    <div class="widget_content nopadding tab-content">
        <table id="tabela" class="table table-bordered ">
            <thead>
                <tr style="backgroud-color: #2D335B">
                    <th>#</th>
                    <th>Data</th>
                    <th>Ref. Garantia</th>
                    <th>Termo de Garantia</th>
                    <th>Usuario</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!$results) {
                        echo '<tr>
                                <td colspan="6">Nenhum Termo de Garantia Cadastrada</td>
                                </tr>';
                    }
                    foreach ($results as $r) {
                        $dataGarantia = date(('d/m/Y'), strtotime($r->dataGarantia));
                        $textoGarantiaShort = mb_strimwidth(strip_tags($r->textoGarantia), 0, 50, "...");

                        echo '<tr>';
                        echo '<td>' . $r->idGarantias . '</td>';
                        echo '<td>' . $dataGarantia . '</td>';
                        echo '<td>' . $r->refGarantia . '</td>';
                        echo '<td>' . $textoGarantiaShort . '</td>';
                        echo '<td><a href="' . base_url() . 'index.php/usuarios/editar/' . $r->idUsuarios . '">' . $r->nome . '</a></td>';
                        echo '<td>';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vGarantia')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/garantias/visualizar/' . $r->idGarantias . '" class="btn-nwe" title="Ver mais detalhes"><i class="fas fa-eye bx-xs"></i></a>';
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/garantias/imprimir/' . $r->idGarantias . '" target="_blank" class="btn-nwe6" title="Imprimir"><i class="fas fa-print bx-xs"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eGarantia')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/garantias/editar/' . $r->idGarantias . '" class="btn-nwe3" title="Editar"><i class="fas fa-edit bx-xs"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dGarantia')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" garantia="' . $r->idGarantias . '" class="btn-nwe4" title="Excluir"><i class="fas fa-trash bx-xs"></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/garantias/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Termo de Garantia</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idGarantias" name="idGarantias" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este termo de garantia?</h5>
        </div>
        <div class="modal-footer" style="display:flex;justify-content: center">
          <button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
          <button class="button_mini btn btn-danger"><span class="button_icon"><i class='fas fa-trash-alt'></i></span> <span class="button_text">Excluir</span></button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var garantia = $(this).attr('garantia');
            $('#idGarantias').val(garantia);
        });
    });
</script>
