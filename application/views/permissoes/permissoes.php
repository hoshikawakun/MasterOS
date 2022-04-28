<div class="new122" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cPermissao')) { ?>
<div class="span4">
<a href="<?php echo base_url(); ?>index.php/permissoes/adicionar" class="button_mini btn btn-mini btn-success" style="margin-bottom:10px; max-width: 170px" target="new">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar</span></a>
</div>
<?php } ?>
</div>
</div>


<div class="widget_box_2">

<div class="widget_title_2">
<h5>Permissões</h5>
</div>

<table id="tabela" width="100%" class="table_w">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Data de Criação</th>
                    <th>Situação</th>
                    <th width="8%">Ações</th>
                </tr>
            </thead>
                <tbody>
                <?php

                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhuma Permissão foi cadastrada</td>
                                </tr>';
                    }
                    foreach ($results as $r) {
                        if ($r->situacao == 1) {
                            $situacao = 'Ativo';
                        } else {
                            $situacao = 'Inativo';
                        }
                        echo '<tr>';
                        echo '<td align="center">' . $r->idPermissao . '</td>';
                        echo '<td align="center">' . $r->nome . '</td>';
                        echo '<td align="center">' . date('d/m/Y', strtotime($r->data)) . '</td>';
                        echo '<td align="center">' . $situacao . '</td>';
						echo '<td align="center">';
						if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cPermissao')) {
                                echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/permissoes/editar/' . $r->idPermissao . '" target="new" class="btn-nwe3 tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
								echo '<a href="#modal-excluir" role="button" data-toggle="modal" permissao="' . $r->idPermissao . '" class="btn-nwe4" title="Desativar Permissão"><i class="fas fa-trash" ></i></a>';
                            }
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
<form action="<?php echo base_url() ?>index.php/permissoes/desativar" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Excluir Permissão</h5>
</div>
<div class="modal_body">
<input type="hidden" id="idOs" name="id" value="" />
<h4 style="text-align: center">Deseja realmente Excluir esta permissão?</h4>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-danger"><span class="button_icon"><i class='fas fa-trash-alt'></i></span> <span class="button_text">Excluir</span></button>
</div>
</form>
</div>
<!-- Fim Modal Excluir -->