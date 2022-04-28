<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aPagamento')) { ?>
    <a href="<?php echo base_url(); ?>index.php/pagamentos/adicionar" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Credencial de Pagamento</a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-book"></i>
        </span>
        <h5>Pagamentos</h5>
    </div>
    <div class="widget_content nopadding">
        <table id="tabela" width="100%" class="table_p">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Client ID</th>
                    <th>Client Secret</th>
                    <th>Public Key</th>
                    <th>Access Token</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!$results) {
                        echo '<tr>
                                <td colspan="7">Nenhum Pagamento Cadastrado</td>
                                </tr>';
                    }
                    foreach ($results as $r) {
                        $textoAccessTokenShort = mb_strimwidth(strip_tags($r->access_token), 0, 10, "...");
                        $textoPublicKeyShort = mb_strimwidth(strip_tags($r->public_key), 0, 10, "...");
                        $textoClientIdShort = mb_strimwidth(strip_tags($r->client_id), 0, 10, "...");
                        $textoClientSecretShort = mb_strimwidth(strip_tags($r->client_secret), 0, 10, "...");
                        

                        echo '<tr>';
                        echo '<td align="center">' . $r->idPag . '</td>';
                        echo '<td align="center">' . $r->nome . '</td>';
                        echo '<td align="center">' . $textoClientIdShort . '</td>';
                        echo '<td align="center">' . $textoClientSecretShort . '</td>';
                        echo '<td align="center">' . $textoPublicKeyShort . '</td>';
                        echo '<td align="center">' . $textoAccessTokenShort . '</td>';
                        echo '<td align="center">';
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vPagamento')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/pagamentos/visualizar/' . $r->idPag . '" class="btn tip-top" title="Visualizar mais detalhes"><i class="fas fa-eye"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'ePagamento')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/pagamentos/editar/' . $r->idPag . '" class="btn btn-info tip-top" title="Editar"><i class="fas fa-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dPagamento')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" pagamento="' . $r->idPag. '" class="btn btn-danger tip-top" title="Excluir"><i class="fas fa-trash"></i></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/pagamentos/excluir" method="post">
        <div class="modal_header_anexos">
            <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Excluir Credencial de Pagamento</h3>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idPag" name="idPag" value="" />
            <h5 style="text-align: center">Deseja realmente excluir esta Credencial de Pagamento?</h5>

            <p style="text-align: center; margin-top: 4em;"><i><?php echo $r->nome ?></i></p>
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
            var pagamento = $(this).attr('pagamento');
            $('#idPag').val(pagamento);
        });
    });
</script>
