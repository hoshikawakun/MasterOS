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

<div class="new122" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12">
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aProduto')) { ?>
<a href="<?php echo base_url(); ?>index.php/produtos/adicionar" class="button btn btn-mini btn-success" target="new" style="margin-bottom:10px; margin-right:10px; max-width: 160px">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Add. Produtos</span></a>
<?php } ?>

<a href="#modal-etiquetas" role="button" data-toggle="modal" class="button btn btn-mini btn-warning" style="margin-bottom:10px; margin-right:10px; max-width: 300px">
<span class="button_icon"><i class='fas fa-barcode' ></i></span><span class="button_text">Gerar Etiquetas Cod. Barra</span></a>

<a href="#modal-etiquetas_sku" role="button" data-toggle="modal" class="button btn btn-mini btn-warning" style="margin-bottom:10px; margin-right:10px; max-width: 300px">
<span class="button_icon"><i class='fas fa-barcode' ></i></span><span class="button_text">Gerar Etiquetas Cod. Produto</span></a>

<a href="#modal-etiquetas-qr" role="button" data-toggle="modal" class="button btn btn-mini btn-warning" style="margin-bottom:10px; margin-right:10px; max-width: 300px">
<span class="button_icon"><i class='fas fa-barcode' ></i></span><span class="button_text">Gerar Etiquetas Cod. QR</span></a>
</div>
</div>


<div class="widget_box_2">

<div class="widget_title_2">
<h5>Produtos</h5>
</div>

<table id="tabela" width="100%" class="table_w">
                <thead>
                    <tr>
                    <th width="9%">Cod. Produto</th>
                    <th width="12%">Cod. de Barra</th>
                    <th>Nome</th>
                    <th width="8%">Estoque</th>
                    <th width="10%">Preço</th>
                    <th width="13%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    
                    if (!$results) {
                        echo '<tr>
                                <td colspan="6">Nenhum Cliente Cadastrado</td>
                                </tr>';
                    }
                    foreach ($results as $r) {
                        $NomeClienteShort = mb_strimwidth(strip_tags($r->nomeCliente), 0, 33, "...");
                        
				echo '<tr>';
				echo '<td align="center">' . $r->idProdutos . '</td>';
				echo '<td align="center">' . $r->codDeBarra . '</td>';
				echo '<td>' . $r->descricao . '</td>';
				echo '<td align="center">' . $r->estoque . '</td>';
				echo '<td align="center"><b>RS: </b>' . number_format($r->precoVenda, 2, ',', '.') . '</td>';
				echo '<td align="center">';
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) {
				echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/produtos/visualizar/' . $r->idProdutos . '" target="new" class="btn-nwe tip-top" title="Visualizar Produto"><i class="fas fa-eye bx-xs"></i></a>  ';}
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) {
				echo '<a target="new" style="margin-right: 1%" href="' . base_url() . 'index.php/produtos/editar/' . $r->idProdutos . '" class="btn-nwe3 tip-top" title="Editar Produto"><i class="fas fa-edit bx-xs"></i></a>';}
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto')) {
				echo '<a href="#atualizar-estoque" role="button" data-toggle="modal" produto="' . $r->idProdutos . '" estoque="' . $r->estoque . '" class="btn-nwe5 tip-top" title="Atualizar Estoque"><i class="fas fa-plus-circle bx-xs"></i></a>';}
			if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dProduto')) {
				echo '<a style="margin-right: 1%" href="#modal-excluir" role="button" data-toggle="modal" produto="' . $r->idProdutos . '" class="btn-nwe4 tip-top" title="Excluir Produto"><i class="fas fa-trash bx-xs"></i></a>';}
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
<h5>Excluir Produto</h5>
</div>
<div class="modal_body">
<input type="hidden" id="idProduto" class="idProduto" name="id" value="" />
<h4 style="text-align: center">Deseja realmente excluir este produto?</h4>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-danger"><span class="button_icon"><i class='fas fa-trash-alt'></i></span> <span class="button_text">Excluir</span></button>
</div>
</form>
</div>
<!-- Fim Modal Excluir -->

<!-- Modal Estoque -->
<div id="atualizar-estoque" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/produtos/atualizar_estoque" method="post" id="formEstoque">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Atualizar Estoque</h5>
</div>
<div class="modal_body">
<div class="control_group_up">
                <label for="estoqueAtual" class="control-label">Estoque Atual</label>
                <div class="controls">
                    <input id="estoqueAtual" type="text" name="estoqueAtual" value="" readonly />
                </div>
            </div>

<div class="control_group_up">
                <label for="estoque" class="control-label">Adicionar Produtos<span class="required">*</span></label>
                <div class="controls">
                    <input type="hidden" id="idProduto" class="idProduto" name="id" value="" />
                    <input id="estoque" type="text" name="estoque" value="" />
                </div>
            </div>

</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-primary"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>
<button class="button_mini btn btn-warning"  data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span></button>
</div>
</form>
</div>
<!-- Fim Modal Estoque -->

<!-- Modal Etiquetas Cod. Barras -->
<div id="modal-etiquetas" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/relatorios/produtosEtiquetas" method="get" target="new">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Gerar etiquetas com Código de Barras</h5>

</div>
<div class="modal_body">
<div class="span12 alert alert-info" style="margin-left: 0"> Escolha o intervalo de produtos para gerar as etiquetas.</div>
<div class="span12" style="margin-left: 0;">
<div class="span6" style="margin-left: 0;">
                    <label for="valor">De</label>
                    <input class="span10" style="margin-left: 0" type="text" id="de_id" name="de_id" placeholder="ID do primeiro produto" value="" />
                </div>
<div class="span6">
                    <label for="valor">Até</label>
                    <input class="span10" type="text" id="ate_id" name="ate_id" placeholder="ID do último produto" value="" />
</div>
</div>
<div class="span12" style="margin-left: 0;">
<div class="span6" style="margin-left: 0;">
                    <label>Uma para cada item</label>
                    <label for="valor" style="width:187px" class="btn btn-default">Qtd. em Estoque
                    <input id="valor" type="checkbox" name="qtdEtiqueta" class="badgebox" value="true">                    
                    <span class="badge">&check;</span>
                </div>
<div class="span6">
                    <label for="valor">Formato Etiqueta</label>
                    <select class="span10" name="etiquetaCode">
                        <option value="UPCA">UPCA</option>
                        <option value="EAN13">EAN-13</option>
                        <option value="C93">CODE 93</option>
                        <option value="C128A">CODE 128 A</option>
                        <option value="C128B">CODE 128 B</option>
                        <option value="C128C">CODE 128 C</option>
                        <option value="CODABAR">CODABAR</option>
                        <option value="QR">QR-CODE</option>
                    </select>
</div>
</div>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Voltar</span></button>
<button class="button_mini btn btn-primary"><span class="button_icon"><i class='bx bx-barcode'></i></span><span class="button_text">Gerar</span></button>
</div>
</form>
</div>
<!-- Fim Modal Etiquetas Cod. Barras -->

<!-- Modal Etiquetas Cod. Produto - SKU -->
<div id="modal-etiquetas_sku" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/relatorios/produtosEtiquetasSKU" method="get" target="new">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Gerar etiquetas com Cód. Produto</h5>
</div>
<div class="modal_body">
<div class="span12 alert alert-info" style="margin-left: 0"> Escolha o intervalo de produtos para gerar as etiquetas.</div>
<div class="span12" style="margin-left: 0;">
<div class="span6" style="margin-left: 0;">
                    <label for="valor">De</label>
                    <input class="span10" style="margin-left: 0" type="text" id="de_id" name="de_id" placeholder="ID do primeiro produto" value="" />
                </div>
<div class="span6">
                    <label for="valor">Até</label>
                    <input class="span10" type="text" id="ate_id" name="ate_id" placeholder="ID do último produto" value="" />
</div>
</div>
<div class="span12" style="margin-left: 0;">
<div class="span6" style="margin-left: 0;">
                    <label>Uma para cada item</label>
                    <label for="valor2" style="width:187px" class="btn btn-default">Qtd. em Estoque
                    <input id="valor2" type="checkbox" name="qtdEtiqueta" class="badgebox" value="true">                    
                    <span class="badge">&check;</span>
                </div>
<div class="span6 hide">
                    <label for="valor">Formato Etiqueta</label>
                    <select class="span10" name="etiquetaCode">
                        <option value="C128B">CODE 128 B</option>
                    </select>
</div>
</div>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Voltar</span></button>
<button class="button_mini btn btn-primary"><span class="button_icon"><i class='bx bx-barcode'></i></span><span class="button_text">Gerar</span></button>
</div>
</form>
</div>
<!-- Fim Modal Etiquetas Cod. Produto - SKU -->

<!-- Modal Etiquetas Cod. QR -->
<div id="modal-etiquetas-qr" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?php echo base_url() ?>index.php/relatorios/produtosEtiquetasQR" method="get" target="new">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Gerar etiquetas com Código QR</h5>
</div>
<div class="modal_body">
<div class="span12 alert alert-info" style="margin-left: 0"> Escolha o intervalo de produtos para gerar as etiquetas.</div>
<div class="span12" style="margin-left: 0;">
<div class="span6" style="margin-left: 0;">
                    <label for="valor">De</label>
                    <input class="span10" style="margin-left: 0" type="text" id="de_id" name="de_id" placeholder="ID do primeiro produto" value="" />
                </div>
<div class="span6">
                    <label for="valor">Até</label>
                    <input class="span10" type="text" id="ate_id" name="ate_id" placeholder="ID do último produto" value="" />
</div>
</div>
<div class="span12" style="margin-left: 0;">
<div class="span6" style="margin-left: 0;">
                    <label>Uma para cada item</label>
                    <label for="valor3" style="width:187px" class="btn btn-default">Qtd. em Estoque
                    <input id="valor3" type="checkbox" name="qtdEtiqueta" class="badgebox" value="true">                    
                    <span class="badge">&check;</span>
                </div>
<div class="span6 hide">
                    <label for="valor">Formato Etiqueta</label>
                    <select class="span10" name="etiquetaCode">
                        <option value="QR">QR-CODE</option>
                    </select>
</div>
</div>
</div>
<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Voltar</span></button>
<button class="button_mini btn btn-primary"><span class="button_icon"><i class='bx bx-barcode'></i></span><span class="button_text">Gerar</span></button>
</div>
</form>
</div>
<!-- Fim Modal Etiquetas Cod. QR -->


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<!-- Modal Etiquetas e Estoque-->
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', 'a', function (event) {
            var produto = $(this).attr('produto');
            var estoque = $(this).attr('estoque');
            $('.idProduto').val(produto);
            $('#estoqueAtual').val(estoque);
        });

        $('#formEstoque').validate({
            rules: {
                estoque: {
                    required: true,
                    number: true
                }
            },
            messages: {
                estoque: {
                    required: 'Campo Requerido.',
                    number: 'Informe um número válido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>