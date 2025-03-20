<link rel="stylesheet" href="<?= base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>

<div class="arquivos123" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2 span12">
<form method="get" action="<?= current_url(); ?>">

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) { ?>
<a title="Adicionar OS" href="<?php echo base_url(); ?>index.php/arquivos/adicionar" class="button btn btn-mini btn-success tip-top" target="_blank" style="margin-bottom:10px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Adicionar Arquivo</span></a>
<?php } ?>

<div style="float:right">
<input style="margin-right:10px; max-width:180px" type="text" name="pesquisa" id="pesquisa" placeholder="Nome do Arquivo a Pesquisar" value="">

<input style="margin-right:10px; max-width:100px" type="text" name="data" autocomplete="off" id="data" placeholder="Data Inicial" class="datepicker" value="" />

<input style="margin-right:10px; max-width:100px" type="text" name="data2" autocomplete="off" id="data2" placeholder="Data Final" class="datepicker" value="">

<button class="button btn btn-mini btn-warning" style="margin-bottom:10px; max-width:80px"><span class="button_icon"><i class='fas fa-search'></i></span><span class="button_text">Pesquisar</span></button>

</div>
</form>
</div>

<div class="widget_box_2">
<div class="widget_title_2">
<h5>Arquivos</h5>
</div>
<table id="tabela" width="100%" class="table_w">
                <thead>
                	<tr>
                        <th width="5%">#</th>
                        <th width="12%">Miniatura</th>
                        <th>Nome</th>
                        <th width="8%">Data</th>
                        <th>Descrição</th>
                        <th width="8%">Tamanho</th>
                        <th width="5%">Extensão</th>
                        <th width="8%">Ações</th>
                    </tr>
            </thead>
                <tbody>
                <?php

                    if (!$results) {
                        echo '<tr>
                                <td colspan="8">Nenhum Arquivo Encontrado</td>
                            </tr>';
                    }
                    foreach ($results as $r) : ?>
                        <tr>
                            <td align="center"><?= $r->idDocumentos ?></td>
                            <td align="center">
            			<?php if (@getimagesize($r->path)): ?>
                            <a href="<?= $r->url ?>" target="_blank"> <img src="<?= $r->url ?> "></a>
            			<?php else: ?>
                            <span>
                            <a href="<?= $r->url ?>" target="_blank"><img src="../../../assets/img/document.png" width="96" height="96" /></a>
                            </span>
            			<?php endif ?>
                            </td>
                            <td><?= $r->documento ?></td>
                            <td align="center"><?= date('d/m/Y', strtotime($r->cadastro)) ?></td>
                            <td><?= $r->descricao ?></td>
                            <td align="center"><?= $r->tamanho ?> KB</td>
                            <td align="center"><?= $r->tipo ?></td>
                            <td align="center"><?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eArquivo')) : ?>
                                    <a href="<?= base_url() ?>index.php/arquivos/editar/<?= $r->idDocumentos ?>" class="btn-nwe3 tip-top" title="Editar"><i class="fas fa-edit"></i></a>
                			<?php endif ?>

                			<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dArquivo')) : ?>
                                    <a href="#modal-excluir" style="margin-right: 1%" role="button" data-toggle="modal" arquivo="<?= $r->idDocumentos ?>" class="btn-nwe4 tip-top" title="Excluir"><i class="fas fa-trash"></i></a>
                                    </a>
                			<?php endif ?>
                            </td>
                        </tr>
    			<?php endforeach ?>
            </tbody>
</table>







</div>
<div class="widget_pagination">
<?= $this->pagination->create_links() ?>
</div>
</div>

<!-- Modal Excluir -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?= base_url() ?>index.php/arquivos/excluir" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Excluir Arquivo</h5>
</div>
<div class="modal_body">
<input type="hidden" id="idDocumento" name="id" value="" />
<h4>Deseja realmente excluir este arquivo?</h4>
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
            var arquivo = $(this).attr('arquivo');
            $('#idDocumento').val(arquivo);
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>