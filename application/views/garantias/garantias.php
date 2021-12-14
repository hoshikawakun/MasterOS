<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aGarantia')) { ?>
    <a href="<?php echo base_url(); ?>index.php/garantias/adicionar" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Termo Garantia</a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-book"></i>
        </span>
        <h5>Termo de Garantia</h5>
    </div>
    <div class="widget_box_Painel2">
        <table id="tabela" class="table table-bordered">
            <thead>
                <tr>
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
                        echo '<td><div align="center">' . $r->idGarantias . '</td>';
                        echo '<td><div align="center">' . $dataGarantia . '</td>';
                        echo '<td><div align="center">' . $r->refGarantia . '</td>';
                        echo '<td>' . $textoGarantiaShort . '</td>';
                        echo '<td><a href="' . base_url() . 'index.php/usuarios/editar/' . $r->idUsuarios . '">' . $r->nome . '</a></td>';
                        echo '<td><div align="center">';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vGarantia')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/garantias/visualizar/' . $r->idGarantias . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/garantias/imprimir/' . $r->idGarantias . '" target="_blank" class="btn btn-inverse tip-top" title="Imprimir"><i class="fas fa-print"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eGarantia')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/garantias/editar/' . $r->idGarantias . '" class="btn btn-info tip-top" title="Editar"><i class="fas fa-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dGarantia')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" garantia="' . $r->idGarantias . '" class="btn btn-danger tip-top" title="Excluir"><i class="fas fa-trash-alt"></i></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/garantias/excluir" method="post">
        <div class="modal_header_anexos">
            <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Excluir Termo de Garantia</h3>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idGarantias" name="idGarantias" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este termo de garantia?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
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
