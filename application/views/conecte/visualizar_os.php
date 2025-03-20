<?php $totalServico = 0;
$totalProdutos = 0; ?>

<div class="vendas123" style="margin-top: 0; min-height: 50vh">

<div class="widget_painel_2">
<div class="span12" align="center">

<a style="margin-right:5px; margin-bottom:3px; margin-top:3px; max-width: 160px" title="Ver mais detalhes" class="button_mini btn btn-mini btn-warning tip-top" href="<?php echo base_url() ?>index.php/conecte/detalhesOs/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-edit'></i></span><span class="button_text">Mais Detalhes</span></a>

<a style="margin-right:5px; margin-bottom:2px; margin-top:2px; max-width: 160px" title="Imprimir" class="button_mini btn btn-mini btn-inverse tip-top" target="_blank" href="<?php echo site_url() ?>/conecte/imprimirOs/<?php echo $result->idOs; ?>">
<span class="button_icon"><i class='fas fa-print'></i></span><span class="button_text">Imprimir</span></a>
</div>
</div>

<div class="widget_box_1">

<div class="widget_title_6">
<h5>Ordem de Serviço</h5>
</div>

<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="well_0">


<!-- Cabeçalho OS -->
<div class="widget_content_printer2">
<table width="100%" class="table_w">

                                    <?php if ($emitente == null) { ?>
                                    <tr>
                                        <td colspan="3" class="alert">Os dados do emitente não foram configurados.</td>
                                    </tr>
                                    <?php } else { ?>
                                    <tr>
                                        <td style="width: 20%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                        <td>
                                            <span style=" font-weight:bold; font-size:15px"></i><?php echo $emitente[0]->nome; ?></span></br>
                                            <i class="fas fa-fingerprint" style="margin:5px 0px 5px 0px"></i> <?php echo $emitente[0]->cnpj; ?></i></br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 5px 3px 2px"></i><?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 5px 3px 2px"></i><?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 5px 3px 2px"></i><?= 'CEP: ' . $emitente[0]->cep; ?><br>
                                            <i class="fas fa-envelope" style="margin:0px 5px 3px 0px"></i><?php echo $emitente[0]->email; ?></br>
                                            <i class="fas fa-phone-alt" style="margin:0px 5px 3px 0px"></i><?php echo $emitente[0]->telefone; ?>
                                        </td>

                                        <td style="text-align: center; font-size:12px">
                                            <b>OS N°: </b><span><?php echo $result->idOs ?></br>
                                                <b>Emissão:</b> <?php echo date('d/m/Y') ?></br>
                                                <b>Status OS: </b><?php echo $result->status ?></br>
                                                <b>Data de Entrada:
                                                </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></br>
                                                <b>Data Final:
                                                </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></br>
                                                <?php if ($result->dataSaida != null) { ?>
                                                <b>Data de Saida:
                                                </b><?php echo date('d/m/Y', strtotime($result->dataSaida)); ?><?php } ?></br>
                                                <?php if ($result->garantia != null) { ?>
                                                <b>Garantia até:
                                                </b><?php echo date('d/m/Y', strtotime($result->garantia)); ?><?php } ?></br>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
</div>
<!-- Fim Cabeçalho OS -->

<!-- Dados -->
<div class="widget_content_printer2">
<table width="100%" class="table_w">
                                    <tr>
                                        <td width="50%">
                                        	<h5>Cliente</h5>
                                            <i class="fas fa-user-check" style="margin:0px 3px 3px 0px"></i><?php echo $result->nomeCliente ?><br>
                                            <i class="fas fa-fingerprint" style="margin:0px 6px 3px 0px"></i><?php echo $result->documento ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 8px 3px 2px"></i>
                                            <?php echo $result->rua ?>,
                                            <?php echo $result->numero ?>,
                                            <?php echo $result->bairro ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 8px 3px 2px"></i><?php echo $result->cidade ?> - <?php echo $result->estado ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 8px 3px 2px"></i>CEP: <?php echo $result->cep ?><br>
                                            <i class="fas fa-phone-alt" style="margin:0px 6px 3px 0px"></i><?php echo $result->telefone ?><br>
                                            <i class="fas fa-envelope" style="margin:0px 7px 10px 0px"></i><?php echo $result->email ?>
                                        </td>
                                        <td width="50%">
                                        	<h5>Técnico</h5>
                                            <i class="fas fa-user-check" style="margin:0px 2px 3px 0px"></i><?php echo $result->nome ?><br>
                                            <i class="fas fa-phone-alt" style="margin:0px 4px 3px 0px"></i><?php echo $result->telefone_usuario ?>
                                        </td>
                                    </tr>
                                </table>
</div>
<!-- Fim Dados -->

<!-- Serial/Marca -->
<div class="widget_content_printer2">
<table width="100%" class="table_w">
                                    <?php if ($result->serial != null) { ?>
                                    <tr>
                                        <td width="50%">
                                            <b>Nº Série:</b><br>
                                            <?php echo htmlspecialchars_decode($result->serial) ?>
                                        </td>
                                        <?php } ?>
                                        <?php if ($result->marca != null) { ?>
                                        <td width="50%">
                                            <b>Marca:</b><br>
                                            <?php echo htmlspecialchars_decode($result->marca) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
</div>

<div class="widget_content_printer2">
<table width="100%" class="table_w">
                                    <?php if ($result->rastreio != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Cod. de Rastreio:</b><br>
                                            <?php echo htmlspecialchars_decode($result->rastreio) ?></p>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if ($result->descricaoProduto != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Descrição Produto/Serviço:</b><br>
                                            <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                        </td>
                                    </tr>

                                    <?php } ?>
                                    <?php if ($result->defeito != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Problema Informado:</b><br>
                                            <?php echo htmlspecialchars_decode($result->defeito) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if ($result->observacoes != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Observações:</b><br>
                                            <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php if ($result->laudoTecnico != null) { ?>
                                    <tr>
                                        <td>
                                            <b>Relatório Técnico:</b><br>
                                            <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
</div>
<!-- Fim Dados da OS -->

<!-- Equipamentos OS -->
<div class="widget_content_printer2">
                                <?php if ($equipamentos != null) { ?>
                                <table width="100%" class="table_w">
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
                        </tr>
                    </thead>
                                    <tbody>
                                        <?php
                                
                                foreach ($equipamentos as $x) {
					echo '<tr>';
					echo '<td align="center">' . $x->equipamento . '</td>';
					echo '<td align="center">' . $x->marca . '</td>';
					echo '<td align="center">' . $x->tipo . '</td>';
					echo '<td align="center">' . $x->num_serie . '</td>';
					echo '<td align="center">' . $x->modelo . '</td>';
					echo '<td align="center">' . $x->cor . '</td>';
					echo '<td align="center">' . $x->voltagem . '</td>';
					echo '<td align="center">' . $x->potencia . '</td>';
					echo '<td align="center">' . $x->observacao . '</td>';
					echo '</tr>';
                                } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
</div>
<!-- Fim Equipamentos OS -->

<!-- Produto OS -->
<div class="widget_content_printer2">
                                <?php if ($produtos != null) { ?>
                                <table width="100%" class="table_w" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th width="10%">Cod. Produto</th>
                                            <th>Produto</th>
                                            <th width="10%">Quantidade</th>
                                            <th width="10%">Preço unit.</th>
                                            <th width="10%">Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    foreach ($produtos as $p) {
                                        $totalProdutos = $totalProdutos + $p->subTotal;
    					echo '<tr>';
    					echo '<td align="center">' . $p->idProdutos . '</td>';
    					echo '<td>' . $p->descricao . '</td>';
    					echo '<td align="center">' . $p->quantidade . '</td>';
    					echo '<td align="center">R$: ' . $p->preco ?: $p->precoVenda . '</td>';
    					echo '<td align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
    					echo '</tr>';
                                    } ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right; font-size:12px">
                                                <strong>Total: </strong>
                                            </td>
                                            <td><strong>
                                                    <div align="center">R$:
                                                        <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div>
                                                </strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
</div>
<!-- Fim Produto OS -->

<!-- Serviço OS -->
<div class="widget_content_printer2">
                                <?php if ($servicos != null) { ?>
                                <table width="100%" class="table_w">
                                    <thead>
                                        <tr>
                                            <th>Serviço</th>
                                            <th width="10%">Quantidade</th>
                                            <th width="10%">Preço unit.</th>
                                            <th width="10%">Sub-total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    setlocale(LC_MONETARY, 'en_US');
                                    foreach ($servicos as $s) {
                                        $preco = $s->preco ?: $s->precoVenda;
                                        $subtotal = $preco * ($s->quantidade ?: 1);
                                        $totalServico = $totalServico + $subtotal;
    					echo '<tr>';
    					echo '<td>' . $s->nome . '</td>';
    					echo '<td align="center">' . ($s->quantidade ?: 1) . '</td>';
    					echo '<td align="center">R$: ' . $preco . '</td>';
    					echo '<td align="center">R$: ' . number_format($subtotal, 2, ',', '.') . '</td>';
    					echo '</tr>';
                                    } ?>

                                        <tr>
                                            <td colspan="3" style="text-align: right; font-size:12px">
                                                <strong>Total: </strong>
                                            </td>
                                            <td>
                                                <div align="center"><strong>R$:
                                                        <?php echo number_format($totalServico, 2, ',', '.'); ?></strong>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php } ?>
</div>
<!-- Fim Serviço OS -->

<!-- Total OS -->
<?php if ($totalProdutos != 0 || $totalServico != 0) { ?>
<table width="100%" class="table_w">
<thead>
<tr>
<th  colspan="2">TOTAL</th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align:right"><b>Valor Total: </b></td>
<td width="10%" align="center"><b>R$: <?php echo number_format($totalProdutos + $totalServico, 2, ',', '.'); ?></b></td>
</tr>
<?php if ($result->valor_desconto  != 0) { ?>
<tr>
<td style="text-align:right"><b>Desconto: </b></td>
<td width="10%" align="center"><b>R$: <?php echo number_format($result->valor_desconto  != 0 ? $result->valor_desconto  - ($totalProdutos + $totalServico) : 0.00, 2, ',', '.'); ?></b></td>
</tr>
<tr>
<td style="text-align:right"><b>Total com Desconto: </b></td>
<td width="10%" align="center"><b>R$: <?php echo number_format($result->valor_desconto , 2, ',', '.'); ?></b></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
<!-- Fim Total OS -->

<!-- ANEXOS -->
<div class="widget_content_printer2">
                        <?php if ($anexos != null) { ?>
                        <div class"span12">
                            <table width="100%" class="table_w">
                                <thead>
                                    <tr>
                                        <th>Anexo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
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
					echo '<div class="grade2" style="margin-bottom:5px; margin-left:1%;">
									<a style="min-height:210px; border: 1px solid #bbbbbb;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal">
									<img src="' . $thumb . '" alt="">
									</a>
									<span>' . $NomeAnexo . '</span>
									</div>';
                                } ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php } ?>
</div>
<!-- Fim ANEXOS -->

</div>
</div>
</div>
        
</div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#imprimir").click(function() {
            PrintElem('#printOs');
        })

        function PrintElem(elem) {
            Popup($(elem).html());
        }

        function Popup(data) {
            var mywindow = window.open('', 'mydiv', 'height=600,width=800');
            mywindow.document.open();
            mywindow.document.onreadystatechange = function() {
                if (this.readyState === 'complete') {
                    this.onreadystatechange = function() {};
                    mywindow.focus();
                    mywindow.print();
                    mywindow.close();
                }
            }


            mywindow.document.write('<html><head><title>Map Os</title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-media.css' />");

            mywindow.document.write("</head><body >");
            mywindow.document.write(data);
            mywindow.document.write("</body></html>");

            mywindow.document.close(); // necessary for IE >= 10

            return true;
        }
    });
</script>
