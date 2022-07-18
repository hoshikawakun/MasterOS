<style>
    /* Hiding the checkbox, but allowing it to be focused */
    .badgebox {
        opacity: 0;
    }

    .badgebox + .badge {
        /* Move the check mark away when unchecked */
        text-indent: -999999px;
        /* Makes the badge's width stay the same checked and unchecked */
        width: 27px;
    }

    .badgebox:focus + .badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */
        /* Adding a light border */
        box-shadow: inset 0px 0px 0px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked + .badge {
        /* Move the check mark back when checked */
        text-indent: 0;
    }
</style>

<div class="servicos123" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aServico')) { ?>
<div class="span4">
<a href="<?php echo base_url() ?>index.php/servicos/adicionar" class="button btn btn-mini btn-success" target="new" style="margin-bottom:10px; max-width: 170px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Add. Serviços</span></a>
</div>
<?php } ?>
</div>
</div>


<div class="widget_box_2">

<div class="widget_title_2">
<h5>Serviços</h5>
</div>

        <table id="tabela" width="100%" class="table_w">
            <thead>
                <tr>
                    <th width="8%">Cod. Serviço</th>
                    <th>Nome</th>
                    <th width="10%">Preço</th>
                    <th>Descrição</th>
                    <th width="8%">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhum Serviço Cadastrado</td>
                              </tr>';
                    }
                    foreach ($results as $r) {
                        echo '<tr>';
                        echo '<td align="center">' . $r->idServicos . '</td>';
                        echo '<td>' . $r->nome . '</td>';
                        echo '<td align="center"><b>R$: </b>' . number_format($r->preco, 2, ',', '.') . '</td>';
                        echo '<td>' . $r->descricao . '</td>';
                        echo '<td align="center">';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eServico')) {
                            echo '<a target="new" style="margin-right: 1%" href="' . base_url() . 'index.php/servicos/editar/' . $r->idServicos . '" class="btn-nwe3 tip-top" title="Editar Serviço"><i class="fas fa-edit bx-xs"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dServico')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" servico="' . $r->idServicos . '" class="btn-nwe4 tip-top" title="Excluir Serviço"><i class="fas fa-trash bx-xs"></i></a>  ';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
</div>
<div class="widget_painel_2">
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
<input type="hidden" id="idServico" name="id" value="" />
<h4 style="text-align: center">Deseja realmente excluir este serviço?</h4>
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