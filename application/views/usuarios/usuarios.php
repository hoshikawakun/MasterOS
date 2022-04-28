<div class="new122" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cUsuario')) { ?>
<div class="span4">
<a href="<?php echo base_url(); ?>index.php/usuarios/adicionar" class="button_mini btn btn-mini btn-success" style="margin-bottom:10px; max-width: 170px" target="new">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar Usuário</span></a>
</div>
<?php } ?>
</div>
</div>


<div class="widget_box_2">

<div class="widget_title_2">
<h5>Usuários</h5>
</div>

<table id="tabela" width="100%" class="table_w">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Nível</th>
                    <th>Validade</th>
                    <th>Ações</th>
                </tr>
            </thead>
                <tbody>
                <?php
                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhum Usuário Cadastrado</td>
                            </tr>';
                    }
                    foreach ($results as $r) {
                        echo '<tr>';
                        echo '<td align="center">' . $r->idUsuarios . '</td>';
                        echo '<td align="center">' . $r->nome . '</td>';
                        echo '<td align="center">' . $r->cpf . '</td>';
                        echo '<td align="center">' . $r->telefone . '</td>';
                        echo '<td align="center">' . $r->permissao . '</td>';
                        echo '<td align="center">' . $r->dataExpiracao . '</td>';
                        echo '<td align="center">
						      <a style="margin-right: 1%" href="' . base_url() . 'index.php/usuarios/editar/' . $r->idUsuarios . '" target="new" class="btn-nwe3 tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                        echo '</tr>';
                    } ?>
                </tbody>
</table>

</div>
<div class="widget_painel_2">
<?= $this->pagination->create_links() ?>
</div>

</div>