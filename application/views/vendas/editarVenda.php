<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Editar Venda</h5>
</div>
<div class="acordion_group_6"><!--Tamanho Geral da Pagina-->
<div class="acordion_group_8">
<div class="acordion_title">
<span><i class="fas fa-cash-register icon_cli"></i></span>
<h5>Venda: #<?php echo $result->idVendas ?></h5>
</div>

<!-- Dados da Venda -->
<form action="<?php echo current_url(); ?>" class="form_horizontal" method="post" id="formVendas">
<div class="control_group_up" style="padding: 1%">
<div class="span12 well" style="padding: 1%; margin-left: 0">
<div class="span2" style="margin-left: 0">
<label for="dataFinal">Data da Venda</label>
<input id="dataVenda" class="span12" type="date" name="dataVenda" value="<?php echo date('Y-m-d'); ?>" />
</div>
<div class="span5">
<label for="cliente">Cliente<span class="required">*</span></label>
<input id="cliente" class="span12" type="text" name="cliente" value="<?php echo $result->nomeCliente ?>" />
<input id="clientes_id" class="span12" type="hidden" name="clientes_id" value="<?php echo $result->clientes_id ?>" />
<input id="valorTotal" type="hidden" name="valorTotal" value="" />
</div>
<div class="span5">
<label for="tecnico">Vendedor<span class="required">*</span></label>
<input id="tecnico" class="span12" type="text" name="tecnico" value="<?php echo $result->nome ?>" />
<input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>" />
</div>
</div>
</div>
</form>
<!-- Fim Dados da Venda -->

<!-- observacoes -->
<!--
<div class="control_group_ct" style="padding: 1%">
<div class="span12 well_2" style="padding: 1%; margin-left: 0">
<div class="span6">
<label for="observacoes">
<h4>Observações</h4>
</label>
<textarea class="editor" name="observacoes" id="observacoes" cols="30" rows="5"><?php echo $result->observacoes ?></textarea>
</div>
<div class="span6">
<label for="observacoes_cliente">
<h4>Observações para o Cliente</h4>
</label>
<textarea class="editor" name="observacoes_cliente" id="observacoes_cliente" cols="30" rows="5"><?php echo $result->observacoes_cliente ?></textarea>
</div>
</div>
</div>
-->
<!-- Fim observacoes -->

<!-- Desconto -->
<?php if ($result->faturado == 0) { ?>
<form class="form_horizontal" id="formDesconto" action="<?php echo base_url(); ?>index.php/vendas/adicionarDesconto" method="POST">
<div class="control_group_ct" style="padding: 1%">
<div class="span12 well" style="padding: 1%; margin-left: 0">
<div class="span2">
<input type="hidden" name="idVendas" id="idVendas" value="<?php echo $result->idVendas; ?>" />
<label for="">Desconto em R$</label>
<input id="desconto" name="desconto" type="text" class="span12 money" placeholder="R$" value="<?php echo number_format($result->desconto, 2, ',', '.'); ?>"/>
<strong><span style="color: red" id="errorAlert"></span></strong>
</div>
<div class="span2">
<label for="">Total com Desconto</label>
<input name="resultado" type="text" class="span12 money" id="resultado" placeholder="R$: <?php echo number_format($result->valor_desconto, 2, ',', '.'); ?>" readonly="readonly" data-affixes-stay="true" data-thousands="" data-decimal="."/>
</div>
<div class="span2">
<label for="">&nbsp;</label>
<button class="button btn btn-success" id="btnAdicionarDesconto">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span class="button_text">Aplicar</span></button>
</div> 
</div>
</div>
</form>
<?php } ?>
<!-- Fim Desconto -->

<!-- Add Produto -->
<form id="formProdutos" class="form_horizontal" action="<?php echo base_url(); ?>index.php/vendas/adicionarProduto" method="post">
<div class="control_group_ct" style="padding: 1%">
<div class="span12 well" style="padding: 1%; margin-left: 0">
<div class="span6">
<input type="hidden" name="idProduto" id="idProduto" />
<input type="hidden" name="idVendasProduto" id="idVendasProduto" value="<?php echo $result->idVendas ?>" />
<input type="hidden" name="estoque" id="estoque" value="" />
<label for="">Produto</label>
<input type="text" class="span12" name="produto" id="produto" placeholder="Digite o nome do produto" />
</div>
<div class="span2">
<label for="">Quantidade</label>
<input type="text" placeholder="Quantidade" id="quantidade" name="quantidade" class="span12" />
</div>
<div class="span2">
<label for="">Preço</label>
<input type="text" placeholder="Preço" id="preco" name="preco" class="span12 money" />
</div>
<div class="span2">
<label for="">&nbsp </label>
<button class="button_mini btn btn-success" id="btnAdicionarProduto">
<span class="button_icon"><i class='fas fa-plus-circle'></i></span><span5 class="button_text">Adicionar</span></button>
</div>
</div>
</div>
</form>
<!-- Fim Add Produto -->

<!-- Tabela Produto -->
<div class="form_horizontal">
<div class="control_group_dn" style="padding: 1%">
<div class="span12 well_2" style="padding: 1%; margin-left: 0">
<div class="span12" id="divProdutos">
<table width="100%" class="table_w" id="tblProdutos">
<thead>
<tr>
<th width="8%">Cod. SKU</th>
<th width="10%">Cod. Barras</th>
<th>Produto</th>
<th width="8%">Quantidade</th>
<th width="10%">Preço</th>
<th width="6%">Ações</th>
<th width="10%">Sub-total</th>
</tr>
</thead>
<tbody>
<?php
$total = 0;
foreach ($produtos as $p) {
	$preco = $p->preco ?: $p->precoVenda;
	$total = $total + $p->subTotal;
echo '<tr>';
echo '<td><div align="center">' . $p->idProdutos . '</div></td>';
echo '<td><div align="center">' . $p->codDeBarra . '</div></td>';
echo '<td>' . $p->descricao . '</td>';
echo '<td><div align="center">' . $p->quantidade . '</div></td>';
echo '<td><div align="center">R$: ' . $preco . '</div></td>';
echo '<td align="center"><a href="" idAcao="' . $p->idItens . '" prodAcao="' . $p->idProdutos . '" quantAcao="' . $p->quantidade . '" title="Excluir Produto" class="btn-nwe4"><i class="fas fa-trash"></i></a></td>';
echo '<td><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';
echo '</tr>';
} ?>
<tr>
<td colspan="6" style="text-align: right"><strong>Total:</strong>
</td>
<td>
<div align="center"><strong>R$:
<?php echo number_format($total, 2, ',', '.'); ?></strong>
<input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>">
</div>
</td>
</tr>
<?php if ($result->valor_desconto != 0 && $result->desconto != 0) { ?>
<tr>
<td colspan="6" style="text-align: right"><strong>Desconto:</strong></td>
<td>
<div align="center">
<strong>R$: <?php echo number_format($result->desconto, 2, ',', '.'); ?></strong></div>
</td>
</tr>
<tr>
<td colspan="6" style="text-align: right"><strong>Total Com Desconto:</strong></td>
<td>
<div align="center"><strong>R$: <?php echo number_format($result->valor_desconto, 2, ',', '.'); ?></strong>
</div><input type="hidden" id="total-desconto" value="<?php echo number_format($result->valor_desconto, 2); ?>">
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- Fim Tabela Produto -->

<!-- Botões de Funções -->
<div class="form_actions" align="center">
<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" href="<?php echo base_url() ?>index.php/vendas" class="button_mini btn btn-mini btn-warning">
<span class="button_icon"><i class="fas fa-undo-alt"></i></span><span class="button_text">Voltar</span></a>
<form action="<?php echo current_url(); ?>" class="form_horizontal" method="post" id="formVendas">

<button class="button_mini btn btn-primary" id="btnContinuar">
<span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" href="<?php echo base_url() ?>index.php/vendas/visualizar/<?php echo $result->idVendas; ?>" class="button_mini btn btn-primary">
<span class="button_icon"><i class="fas fa-eye"></i></span><span class="button_text">Visualizar</span></a>

<?php if ($result->faturado == 0) { ?>
<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" href="#modal-faturar" id="btn-faturar" role="button" data-toggle="modal" class="button_mini btn btn-danger">
<span class="button_icon"><i class='fas fa-cash-register'></i></span> <span class="button_text">Faturar</span></a>
<?php } ?>
</form>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Imprimir" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/vendas/imprimir/<?php echo $result->idVendas; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir A4</span></a>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Imprimir Termica" class="button_mini btn btn-mini btn-inverse tip-top" target="new" href="<?php echo site_url() ?>/vendas/imprimirTermica/<?php echo $result->idVendas; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir Termica</span></a>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Gerar Pagamento" class="button_mini btn btn-mini btn-success tip-top" href="#modal-gerar-pagamento" id="btn-forma-pagamento" role="button" data-toggle="modal"><span class="button_icon"><i class="fas fa-cash-register"></i></span><span class="button_text">Gerar Pagamento</span></a>
<?= $modalGerarPagamento ?>
</div>
<!-- Fim Botões de Funções -->

</div>
</div>
</div>
</div>

<!-- Modal Faturar -->
<div id="modal-faturar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
<form id="formFaturar" action="<?php echo current_url() ?>" method="post">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:10px;" data-dismiss="modal"
                aria-hidden="true">×</button>
<h5>Faturar Venda</h5>
</div>

<div class="modal-body">
<div class="span12 alert alert-info" style="margin-left: 0"> Obrigatório o preenchimento dos campos com asterisco.</div>
<div class="span12" style="margin-left: 0">
<label for="descricao">Descrição</label>
<input name="descricao" type="text" class="span12" id="descricao" value="Fatura da Venda Nº: <?php echo $result->idVendas; ?> " readonly="readonly" />
</div>
<div class="span12" style="margin-left: 0">
<div class="span12" style="margin-left: 0">
<label for="cliente">Cliente*</label>
<input name="cliente" type="text" class="span12" id="cliente" value="<?php echo $result->nomeCliente ?>" readonly="readonly" />
<input type="hidden" name="clientes_id" id="clientes_id" value="<?php echo $result->clientes_id ?>">
<input type="hidden" name="vendas_id" id="vendas_id" value="<?php echo $result->idVendas; ?>">
</div>
</div>
<div class="span12" style="margin-left: 0">

<div class="span6 hide">
<input type="hidden" id="tipo" name="tipo" value="receita" />
<input class="span12 money" id="valor" type="text" name="valor" value=""/>
</div>

<div class="span6" style="margin-left: 0">
<label for="valor">Valor*</label>
<input type="hidden" id="tipo" name="tipo" value="receita" />
<input name="valor" type="text" class="span12 money" id="valor" value="<?php echo number_format($total, 2, '.', ''); ?> " readonly="readonly" />
</div>

<div class="span6" style="margin-left: 2">
<label for="valor">Valor Com Desconto*</label>
        <input name="faturar-desconto" type="text" class="span12 money" id="faturar-desconto" value="<?php echo number_format($result->valor_desconto, 2, '.', ''); ?> " readonly="readonly" />
</div>
</div>
<div class="span12 hide" style="margin-left: 0">
<label for="vencimento">Data Entrada*</label>
<input class="span6" autocomplete="off" id="vencimento" type="date" name="vencimento" value="<?php echo date('Y-m-d'); ?>"/>
<input id="recebido" type="text" name="recebido" value="1" />
</div>
<div class="span12" style="margin-left: 0">
<div class="span6">
<label for="recebimento">Data Pagamento</label>
<input name="recebimento" type="date" class="span12" id="recebimento" autocomplete="off" value="<?php echo date('Y-m-d'); ?>" />
</div>
<div class="span6">
<label for="formaPgto">Forma Pgto</label>
<select name="formaPgto" id="formaPgto" class="span12">
<option value="Dinheiro">Dinheiro</option>
<option value="Cartão de Crédito">Cartão de Crédito</option>
<option value="Débito">Débito</option>
<option value="Boleto">Boleto</option>
<option value="Depósito">Depósito</option>
<option value="Pix">Pix</option>
<option value="Cheque">Cheque</option>
</select>
</div>
</div>
</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true"
                id="btn-cancelar-faturar">
<span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span
                    class="button_text">Cancelar</span></button>
<button class="button_mini btn btn-danger"><span class="button_icon"><i
                        class='fas fa-cash-register'></i></span> <span class="button_text">Faturar</span></button>
</div>
</form>
</div>
<!-- Fim Modal Faturar -->


<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    $("#quantidade").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });

    function calcDesconto(valor, desconto) {

        var resultado = (valor - desconto).toFixed(2);
        return resultado;
    }

    function validarDesconto(resultado, valor) {
        if (resultado == valor) {
            return resultado = "";
        } else {
            return resultado.toFixed(2);
        }
    }
    var valorBackup = $("#total-venda").val();

    $("#desconto").keyup(function() {
        this.value = this.value.replace(/[^0-9.]/g, '');

        let ValorTotal = parseFloat(document.getElementById('total-venda').value);
        let desconto = parseFloat(document.getElementById('desconto').value);

        if (desconto > ValorTotal) {
            $('#errorAlert').text('Desconto não pode ser maior que o valor total.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $("#desconto").focus();
        }
        if ($("#total-venda").val() == null || $("#total-venda").val() == '') {
            $('#errorAlert').text('Valor não pode ser apagado.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
            $("#total-venda").val(valorBackup);
            $("#desconto").focus();

        } else if (Number($("#desconto").val()) >= 0) {
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
        } else {
            $('#errorAlert').text('Erro desconhecido.').css("display", "inline").fadeOut(5000);
            $('#desconto').val('');
            $('#resultado').val('');
        }
    });

    $("#total-venda").focusout(function() {
        $("#total-venda").val(valorBackup);
        if ($("#total-venda").val() == '0.00' && $('#resultado').val() != '') {
            $('#errorAlert').text('Você não pode apagar o valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
            $("#total-venda").val(valorBackup);
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
            $("#desconto").focus();
        } else {
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
        }
    });

    $('#resultado').focusout(function() {
        if (Number($('#resultado').val()) > Number($("#total-venda").val())) {
            $('#errorAlert').text('Desconto não pode ser maior que o Valor.').css("display", "inline").fadeOut(6000);
            $('#resultado').val('');
        }
        if ($("#desconto").val() != "" || $("#desconto").val() != null) {
            $('#resultado').val(calcDesconto(Number($("#total-venda").val()), Number($("#desconto").val())));
            $('#resultado').val(validarDesconto(Number($('#resultado').val()), Number($("#total-venda").val())));
        }
    });

    $(document).ready(function() {
        $(".money").maskMoney();
        $('#recebido').click(function(event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });
        $(document).on('click', '#btn-faturar', function(event) {
            event.preventDefault();
            valor = $('#total-venda').val();
            valor_desconto = $('#total-desconto').val();
            valor_desconto != 0.00 || valor_desconto ? $('#valor').attr('readonly', false) : $('#faturar-desconto').attr('readonly', false);
            valor = valor.replace(',', '');
            $('#valor').val(valor);
        });
        $('#formDesconto').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Processando',
                        text: 'Registrando desconto...',
                        icon: 'info',
                        showCloseButton: false,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    });
                },
                success: function(response) {
                    if (response.result) {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: response.messages
                        });
                        $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                        $("#desconto").val("");
                        $("#resultado").val("");
                        /*setTimeout(function() {
                            window.location.href = window.BaseUrl + 'index.php/vendas/editar/' + <?php echo $result->idVendas ?>;
                        }, 2000);*/
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: response.messages
                        });
                        $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                        $("#desconto").val("");
                        $("#resultado").val("");
                    }

                },
                error: function(response) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: response.responseJSON.messages
                    });
                    $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                    $("#desconto").val("");
                    $("#resultado").val("");
                }
            });
        });
        $("#formFaturar").validate({
            rules: {
                descricao: {
                    required: true
                },
                cliente: {
                    required: true
                },
                valor: {
                    required: true
                },
                vencimento: {
                    required: true
                }
            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                cliente: {
                    required: 'Campo Requerido.'
                },
                valor: {
                    required: 'Campo Requerido.'
                },
                vencimento: {
                    required: 'Campo Requerido.'
                }
            },
            submitHandler: function(form) {
                var dados = $(form).serialize();
                var qtdProdutos = $('#tblProdutos >tbody >tr').length;

                $('#btn-cancelar-faturar').trigger('click');

                if (qtdProdutos <= 0) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: "Não é possível faturar uma venda sem produtos"
                    });
                } else if (qtdProdutos > 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/vendas/faturar",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                window.location.reload(true);
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    text: "Ocorreu um erro ao tentar faturar venda."
                                });
                                $('#progress-fatura').hide();
                            }
                        }
                    });

                    return false;
                }
            }
        });
        $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteProdutoSaida",
            minLength: 2,
            select: function(event, ui) {
                $("#idProduto").val(ui.item.id);
                $("#estoque").val(ui.item.estoque);
                $("#preco").val(ui.item.preco);
                $("#quantidade").focus();
            }
        });
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 2,
            select: function(event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#formVendas").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                dataVenda: {
                    required: true
                }
            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                tecnico: {
                    required: 'Campo Requerido.'
                },
                dataVenda: {
                    required: 'Campo Requerido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
        $("#formProdutos").validate({
            rules: {
                preco: {
                    required: true
                },
                quantidade: {
                    required: true
                }
            },
            messages: {
                preco: {
                    required: 'Insira o preço'
                },
                quantidade: {
                    required: 'Insira a quantidade'
                }
            },
            submitHandler: function(form) {
                var quantidade = parseInt($("#quantidade").val());
                var estoque = parseInt($("#estoque").val());

    <?php if (!$configuration['control_estoque']) {
                    echo 'estoque = 1000000';
                }; ?>

                if (estoque < quantidade) {
                    Swal.fire({
                        type: "warning",
                        title: "Atenção",
                        text: "Você não possui estoque suficiente."
                    });
                } else {
                    var dados = $(form).serialize();
                    $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/vendas/adicionarProduto",
                        data: dados,
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == true) {
                                $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                                $("#quantidade").val('');
                                $("#preco").val('');
                                $("#produto").val('').focus();
                                $("#resultado").val("");
                                $("#desconto").val("");
                            } else {
                                Swal.fire({
                                    type: "error",
                                    title: "Atenção",
                                    html: "Ocorreu um erro ao tentar adicionar produto. <br /><br />Error: " + data.messages
                                });
                                $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                                $('#formProdutos')[0].reset();
                            }
                        }
                    });
                    return false;
                }
            }
        });
        $(document).on('click', 'a', function(event) {
            var idProduto = $(this).attr('idAcao');
            var quantidade = $(this).attr('quantAcao');
            var produto = $(this).attr('prodAcao');
            if ((idProduto % 1) == 0) {
                $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/vendas/excluirProduto",
                    data: "idProduto=" + idProduto + "&idVendas=" + <?= $result->idVendas ?> + "&quantidade=" + quantidade + "&produto=" + produto,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#resultado").val("");
                            $("#desconto").val("");
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                html: "Ocorreu um erro ao tentar excluir produto." + data.messages
                            });
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                        }
                    }
                });
                return false;
            }
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>