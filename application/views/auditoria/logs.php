<div class="new122" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">

<a href="#modal-excluir" role="button" data-toggle="modal" class="button_mini btn btn-danger tip-top" style="margin-bottom:10px; margin-right:10px; max-width: 300px" title="Excluir Logs">
  <span class="button_icon"><i class='fas fa-trash'></i></span> <span class="button_text">Remover Logs - 30 dias ou mais</span></a>
</div>
</div>

<div class="widget_box_2">

<div class="widget_title_2">
<h5>Logs</h5>
</div>

<table id="tabela" width="100%" class="table_w">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>IP</th>
                    <th>Tarefa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $r) {
    echo '<tr>';
    echo '<td align="center">' . $r->usuario . '</td>';
    echo '<td align="center">' . date('d/m/Y', strtotime($r->data)) . '</td>';
    echo '<td align="center">' . $r->hora . '</td>';
    echo '<td align="center">' . $r->ip . '</td>';
    echo '<td align="center">' . $r->tarefa . '</td>';
    echo '</tr>';
} ?>
                <?php if (!$results) { ?>
                    <tr>
                        <td colspan="5">Nenhum registro encontrado.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

</div>

<div class="widget_pagination">
<?= $this->pagination->create_links() ?>
</div>

</div>


<!-- Modal Excluir -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo site_url('auditoria/clean') ?>" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Limpeza de Logs</h5>
</div>
<div class="modal_body">
<input type="hidden" id="idProduto" class="idProduto" name="id" value="" />
<h4 style="text-align: center">Deseja realmente remover os logs mais antigos?</h4>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-danger"><span class="button_icon"><i class='fas fa-trash-alt'></i></span> <span class="button_text">Excluir</span></button>
</div>
</form>
</div>
<!-- Fim Modal Excluir -->
