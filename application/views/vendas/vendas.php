<div class="vendas123" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aVenda')) { ?>
<div class="span4">
<a href="<?php echo base_url(); ?>index.php/vendas/adicionar" class="button btn btn-mini btn-success" style="margin-bottom:10px; max-width: 160px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Nova Venda</span></a>
</div>
<?php } ?>
</div>
</div>


<div class="widget_box_2">

<div class="widget_title_2">
<h5>Vendas</h5>
</div>

        <table id="tabela" width="100%" class="table_w">
            <thead>
                <tr>
                    <th width="7%">Nº</th>
                    <th width="10%">Data</th>
                    <th>Cliente</th>
                    <th width="8%">Faturado</th>
                    <th width="16%">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhuma Venda Cadastrada</td>
                            </tr>';
                    }
                    foreach ($results as $r) {
                        $dataVenda = date(('d/m/Y'), strtotime($r->dataVenda));
                        if ($r->faturado == 1) {
                            $faturado = 'Sim';
                        } else {
                            $faturado = 'Não';
                        }
                        echo '<tr>';
                        echo '<td align="center">' . $r->idVendas . '</td>';
                        echo '<td align="center">' . $dataVenda . '</td>';
                        echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '">' . $r->nomeCliente . '</a></td>';
                        echo '<td align="center">' . $faturado . '</td>';
                        echo '<td align="center">';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/visualizar/' . $r->idVendas . '" class="btn-nwe tip-top" title="Ver mais detalhes"><i class="fas fa-eye bx-xs"></i></a>';
						}
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/editar/' . $r->idVendas . '" class="btn-nwe3 tip-top" title="Editar venda"><i class="fas fa-edit bx-xs"></i></a>';
                        }
						if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/imprimir/' . $r->idVendas . '" target="_blank" class="btn-nwe6 tip-top" title="Imprimir A4"><i class="fas fa-print bx-xs"></i></a>';
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/imprimirTermica/' . $r->idVendas . '" target="_blank" class="btn-nwe6 tip-top" title="Imprimir Não Fiscal"><i class="fas fa-print bx-xs"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dVenda')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" venda="' . $r->idVendas . '" class="btn-nwe4 tip-top" title="Excluir Venda"><i class="fas fa-trash bx-xs"></i></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
</div>
<div class="widget_pagination">
<?= $this->pagination->create_links() ?>
</div>

</div>


<!-- Modal Excluir -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/produtos/excluir" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Excluir Serviço</h5>
</div>
<div class="modal_body">
<input type="hidden" id="idVenda" name="id" value="" />
<h4 style="text-align: center">Deseja realmente excluir esta Venda?</h4>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-danger"><span class="button_icon"><i class='fas fa-trash-alt'></i></span> <span class="button_text">Excluir</span></button>
</div>
</form>
</div>
<!-- Fim Modal Excluir -->



<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var servico = $(this).attr('servico');
            $('#idServico').val(servico);
        });
    });
</script>