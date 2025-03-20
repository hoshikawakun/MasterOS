<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>

<div class="vendas123" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12" align="center">


<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Visualizar OS" class="button_mini btn btn-mini btn-primary tip-top" href="<?php echo base_url() ?>index.php/conecte/visualizarOs/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-eye'></i></span><span class="button_text">Visualizar OS</span></a>

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Imprimir" class="button_mini btn btn-mini btn-inverse tip-top" target="_blank" href="<?php echo site_url() ?>/conecte/imprimirOs/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir</span></a>

</div>
</div>

<div class="widget_box_0" >
<div class="widget_title_6">
<h5>Detalhes OS</h5>
</div>
<div class="widget_content_3">
<ul class="nav nav-tabs">

<!-- Menu de Navewgação -->
<li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>


<?php if ($produtos != null) { ?>
<li id="tabProdutos"><a href="#tab3" data-toggle="tab">Produtos</a></li>
<?php } ?>

<?php if ($servicos != null) { ?>
<li id="tabServicos"><a href="#tab4" data-toggle="tab">Serviços</a></li>
<?php } ?>

<?php if ($anexos != null) { ?>
<li id="tabAnexos"><a href="#tab5" data-toggle="tab">Anexos</a></li>
<?php } ?>

<?php if ($equipamentos != null) { ?>
<li id="tabEquipamentos"><a href="#tab7" data-toggle="tab">Equipamentos</a></li>
<?php } ?>
</ul>
<!-- Fim Menu de Navewgação -->
<div class="widget_content_os tab-content">

<!-- Detalhes da OS -->
<div id="tab1" class="tab-pane fade in active" style="min-height: 360px">
<form action="<?php echo current_url(); ?>" method="post" id="formOs">
<div class="widget_os" id="divCadastrarOs">
<div class="widget_os">
<h2>N° OS: #<?php echo $result->idOs; ?></h2>
</div>


<div class="span12" style="padding: 1%; margin-left: 0">
<div class="span6">
<label for="cliente">Cliente</label>
<input type="text" class="span12" value="<?php echo $result->nomeCliente ?>" readonly="readonly" />
</div>
<div class="span6">
<label for="tecnico">Técnico / Responsáve</label>
<input type="text" disabled="disabled" class="span12" value="<?php echo $result->nome ?>" />
</div>

<div class="span3" style="margin-left: 0">
<label for="status">Status</label>
<input type="text" disabled="disabled" class="span12" value="<?php echo $result->status ?>" />

<?php if ($result->rastreio != null && $result->rastreio != '') { ?>
<label for="rastreio">Rastreio</label>
<input type="text" class="span12" value="<?php echo $result->rastreio ?>" />

<a style="margin-right:5px; margin-bottom:5px" href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>" title="Rastrear" target="_blank" class="btn btn-warning"><i class="fas fa-envelope"></i> Rastrear</a>
<?php } ?>
</div>

<div class="span3">
<label for="dataInicial">Data de Entrtada</label>

<input class="span12" type="date" disabled="disabled" value="<?php echo $result->dataInicial; ?>" />

<label for="dataFinal">Data Final</label>
<input class="span12" type="date" disabled="disabled" value="<?php echo $result->dataFinal; ?>" />
</div>

<div class="span3">
<label for="serial">Nº Série</label>
<input type="text" class="span12" value="<?php echo $result->serial ?>" />

<label for="dataSaida">Data de Saida</label>
<input type="date" class="span12" disabled="disabled" value="<?php echo $result->dataSaida; ?>" />
</div>

<div class="span3">
<label for="marca">Marca</label>
<input type="text" class="span12" value="<?php echo $result->marca ?>" />

<label for="garantia">Garantia até</label>
<input type="date" class="span12" disabled="disabled" value="<?php echo $result->garantia; ?>" />
</div>
</div>


<div class="span12" style="padding: 1%; margin-left: 0">
<div class="span6">
                                        <label for="descricaoProduto"><h4>Descrição Produto/Serviço</h4></label>
                                        <!--<textarea class="span12 editor" style="height:150px" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"><?php echo $result->descricaoProduto ?></textarea>-->
                                        <textarea class="span12" style="height:150px" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"><?php echo $result->descricaoProduto ?></textarea>
                                        <label for="observacoes"><h4>Observações</h4></label>
                                        <!--<textarea class="span12 editor" style="height:150px" name="observacoes" id="observacoes" cols="30" rows="5"><?php echo $result->observacoes ?></textarea>-->
                                        <textarea class="span12" style="height:150px" name="observacoes" id="observacoes" cols="30" rows="5"><?php echo $result->observacoes ?></textarea>
</div>

<div class="span6">
                                        <label for="defeito"><h4>Problema Informado</h4></label>
                                        <!--<textarea class="span12 editor" style="height:150px" name="defeito" id="defeito" cols="30" rows="5"><?php echo $result->defeito ?></textarea>-->
                                        <textarea class="span12" style="height:150px" name="defeito" id="defeito" cols="30" rows="5"><?php echo $result->defeito ?></textarea>
                                        <label for="laudoTecnico"><h4>Relatório Técnico</h4></label>
                                        <!--<textarea class="span12 editor" style="height:150px" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"><?php echo $result->laudoTecnico ?></textarea>-->
                                        <textarea class="span12" style="height:150px" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"><?php echo $result->laudoTecnico ?></textarea>
</div>
</div>

</div>
</form>
</div>
<!-- Fim Detalhes da OS -->

<!-- Produtos -->
<div id="tab3" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12" style="margin-left: 0" id="divProdutos">
<div class="well_2">
                                    <table width="100%" class="table_y" id="tblProdutos">
                                        <thead>
                                            <tr>
                                                <th width="10%">Cod. Produto</th>
                                                <th>Produto</th>
                                                <th width="8%">Quantidade</th>
                                                <th width="10%">Preço unit.</th>
                                                <th width="6%">Ações</th>
                                                <th width="10%">Sub-total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $total = 0;
                                    foreach ($produtos as $p) {
                                        $total = $total + $p->subTotal;
                                        echo '<tr>';
                                        echo '<td align="center">' . $p->idProdutos . '</td>';
                                        echo '<td>' . $p->descricao . '</td>';
                                        echo '<td align="center">' . $p->quantidade . '</td>';
                                        echo '<td align="center">R$: ' . ($p->preco ?: $p->precoVenda)  . '</td>';
                                        echo '<td align="center"><a href="" idAcao="' . $p->idProdutos_os . '" prodAcao="' . $p->idProdutos . '" quantAcao="' . $p->quantidade . '" title="Excluir Produto" class="btn-nwe4 tip-top"><i class="fas fa-trash"></i></a></td>';
                                        echo '<td align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>
                                            <tr>
                                                <td colspan="5" style="text-align: right"><strong>Total:</strong></td>
                                                <td><strong>
                                                        <div align="center">R$:
                                                            <?php echo number_format($total, 2, ',', '.'); ?><input
                                                                type="hidden" id="total-venda"
                                                                value="<?php echo number_format($total, 2); ?>">
                                                    </strong>
                                </div>
                                </td>
                                </tr>
                                </tbody>
                                </table>
</div>
</div>

</div>
</div>
<!-- Fim Produtos -->

<!-- Serviços -->
<div id="tab4" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>
                        
<div class="span12" style="margin-left: 0" id="divServicos">
<div class="well_2">
                                <table width="100%" class="table_y">
                                    <thead>
                                        <tr>
                                            <th>Serviço</th>
                                            <th width="8%">Quantidade</th>
                                            <th width="10%">Preço</th>
                                            <th width="6%">Ações</th>
                                            <th width="10%">Sub-totals</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totals = 0;
                                            foreach ($servicos as $s) {
                                                $preco = $s->preco ?: $s->precoVenda;
                                                $subtotals = $preco * ($s->quantidade ?: 1);
                                                $totals = $totals + $subtotals;
                                                echo '<tr>';
                                                echo '<td>' . $s->nome . '</td>';
                                                echo '<td align="center">' . ($s->quantidade ?: 1) . '</div></td>';
                                                echo '<td align="center">R$: ' . $preco  . '</div></td>';
                                                echo '<td align="center"><span idAcao="' . $s->idServicos_os . '" title="Excluir Serviço" class="btn-nwe4 tip-top servico"><i class="fas fa-trash"></i></span></div></td>';
                                                echo '<td align="center">R$: ' . number_format($subtotals, 2, ',', '.') . '</div></td>';
                                                echo '</tr>';
                                            } ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>
                                                    <div align="center">R$:
                                                        <?php echo number_format($totals, 2, ',', '.'); ?><input
                                                            type="hidden" id="total-servico" value="
												<?php echo number_format($totals, 2); ?>">
                                                </strong>
                            </div>
                            </td>
                            </tr>
                            </tbody>
                            </table>
</div>
</div>

</div>
</div>
<!-- Fim Serviços -->

<!-- Anexos -->
<div id="tab5" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>
                    
<div class="span12" id="divAnexos" style="margin-left: 0" >
<div class="span12 well_2">
<?php
	foreach ($anexos as $a) {
		if ($a->thumb == null) {
			$thumb = base_url() . 'assets/img/icon-file.png';
			$link = base_url() . 'assets/img/icon-file.png';
	  } else {
			$thumb = $a->url . '/thumbs/' . $a->thumb;
			$link = $a->url . '/' . $a->anexo;
			$NomeAnexo = mb_strimwidth(strip_tags($a->anexo), 0, 20, "...");
			}
		 echo '<div class="grade" style=" margin-bottom:5px; margin-left:1%;">
		 <a style="min-height:210px; border: 1px solid #bbbbbb;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal">
		<img src="' . $thumb . '" alt="">
		</a>
		<span>' . $NomeAnexo . '</span>
		</div>';
		} ?>
</div>
</div>

</div>
</div>
<!-- Fim Anexos -->

<!-- Equipamentos -->
<div id="tab7" class="tab-pane fade" style="min-height: 360px">
<div class="widget_os_2" id="divCadastrarOs">
<div class="widget_os">
<h2></h2>
</div>

<div class="span12" style="margin-left: 0" id="divEquipamento">
<div class="well_2">
<table width="100%" class="table_y">
                                <thead>
                                    <tr>
                                        <th>Equipamento</th>
                                        <th>Marca</th>
                                        <th>Tipo</th>
                                        <th>Nº Serie</th>
                                        <th>Modelo</th>
                                        <th>Cor</th>
                                        <th>Voltagem</th>
                                        <th>Potência</th>
                                        <th>Obs:</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            foreach ($equipamentos as $x) {
                                                echo '<tr>';
                                                echo '<td align="center">' . $x->equipamento . '</div></td>';
                                                echo '<td align="center">' . $x->marca . '</div></td>';
                                                echo '<td align="center">' . $x->tipo . '</div></td>';
                                                echo '<td align="center">' . $x->num_serie . '</div></td>';
                                                echo '<td align="center">' . $x->modelo . '</div></td>';
                                                echo '<td align="center">' . $x->cor . '</div></td>';
                                                echo '<td align="center">' . $x->voltagem . '</div></td>';
                                                echo '<td align="center">' . $x->potencia . '</div></td>';
                                                echo '<td align="center">' . $x->observacao . '</div></td>';
                                                echo '<td align="center"><span idAcao="' . $x->idEquipamento . '" title="Excluir Equipamento" class="btn-nwe4 tip-top equipamento"><i class="fas fa-trash"></i></span></div></td>';
                                                echo '</tr>';
                                            }
                                            if (!$equipamentos) {
                                                echo '<tr><td colspan="10">Nenhum Equipamento cadastrado</td></tr>';
                                            }

                                            ?>
                                </tbody>
                            </table>
</div>
</div>

</div>
</div>
<!-- Fim Equipamentos -->

<!-- Visualizar Anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Visualizar Anexo</h5>
</div>

<div class="modal-body">
<div class="span12" id="div-visualizar-anexo" style="text-align: center">
<div class='progress progress-info progress-striped active'>
<div class='bar' style='width: 100%'></div>
</div>
</div>
</div>

<div class="form_actions" align="center">
        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
</div>
</div>
<!-- Fim Visualizar Anexo -->

</div>
</div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });

    $(document).on('click', '.anexo', function(event) {
        event.preventDefault();
        var link = $(this).attr('link');
        var id = $(this).attr('imagem');
        $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
        $("#download").attr('href', "<?php echo base_url(); ?>index.php/conecte/downloadanexo/" + id);
    });
</script>
