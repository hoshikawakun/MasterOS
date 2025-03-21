<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>OS <?php echo $result->idOs ?> - <?php echo $result->nomeCliente ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
    .table {
        margin-bottom: 0px;
    }
    </style>
</head>

<body>

    <div class="widget_content_printer">


        <div class="widget_content_printer2">
<table width="100%" class="table_w">

                                    <?php if ($emitente == null) { ?>
                                    <tr>
                                        <td colspan="4" class="alert">Você precisa configurar os dados do emitente.
                                            >>><a
                                                href="<?php echo base_url(); ?>index.php/masteros/emitente">Configurar</a>
                                            <<< </td>
                                    </tr>
                                    <?php } else { ?>
                                    <tr>
                                        <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
                                        <td>
                                            <b><?php echo $emitente[0]->nome; ?></b></br>
                                            <i class="fas fa-fingerprint" style="margin:0px 1px"></i>
                                            <?php echo $emitente[0]->cnpj; ?></br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 3px"></i>
                                            <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?><br>
                                            <i class="fas fa-envelope"
                                                style="margin:0px 1px"></i>  <?php echo $emitente[0]->email; ?></br>
                                            <i class="fas fa-phone-alt"
                                                style="margin:0px 1px"></i>  <?php echo $emitente[0]->telefone; ?>
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
                                        <td>
                                        <div align="center">
                                                    <?php if ($qrCode): ?>
                                                    <img src="../../../assets/img/logo_pix.png" width="70px">
                                                    <img src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                                    <?php endif ?>
                                                </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
</div>

        <div class="widget_content_printer2">
<table width="100%" class="table_w">
                                    <tr>
                                        <td width="50%">
                                            <b>Cliente</b><br>
                                            <i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?><br>
                                            <i class="fas fa-fingerprint" style="margin:0px 1px"></i>
                                            <?php echo $result->documento ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 3px"></i>
                                            <?php echo $result->rua ?>,
                                            <?php echo $result->numero ?>,
                                            <?php echo $result->bairro ?><br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> <?php echo $result->cidade ?> -
                                            <?php echo $result->estado ?><br>
                                            <i class="fas fa-map-marker-alt"
                                                style="margin:0px 3px"></i> CEP: <?php echo $result->cep ?><br>
                                            <i class="fas fa-phone-alt"
                                                style="margin:0px 1px"></i>  <?php echo $result->telefone ?>
                                        </td>
                                        <td width="50%">
                                            <b>Técnico</b><br>
                                            <i class="fas fa-user-check"></i> <?php echo $result->nome ?><br>
                                            <i class="fas fa-envelope" style="margin:0px 1px"></i>
                                            <?php echo $result->email_responsavel ?><br>
                                            <i class="fas fa-phone-alt" style="margin:0px 1px"></i>
                                            <?php echo $result->telefone_usuario ?>
                                        </td>
                                    </tr>
                                </table>
</div>


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


        <div class="widget_content_printer2">
                                <?php if ($produtos != null) { ?>
                                <table width="100%" class="table_w" id="tblProdutos">
                                    <thead>
                                        <tr>
                                            <th width="10%">Cod. Produto</th>
                                            <th>Produto</th>
                                            <th width="12%">Quantidade</th>
                                            <th width="12%">Preço unit.</th>
                                            <th width="12%">Sub-total</th>
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


        <div class="widget_content_printer2">
                                <?php if ($servicos != null) { ?>
                                <table width="100%" class="table_w">
                                    <thead>
                                        <tr>
                                            <th>Serviço</th>
                                            <th width="12%">Quantidade</th>
                                            <th width="12%">Preço unit.</th>
                                            <th width="12%">Sub-total</th>
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
<td width="12%" align="center"><b>R$: <?php echo number_format($totalProdutos + $totalServico, 2, ',', '.'); ?></b></td>
</tr>
<?php if ($result->valor_desconto  != 0) { ?>
<tr>
<td style="text-align:right"><b>Desconto: </b></td>
<td width="12%" align="center"><b>R$: <?php echo number_format($result->valor_desconto  != 0 ? $result->valor_desconto  - ($totalProdutos + $totalServico) : 0.00, 2, ',', '.'); ?></b></td>
</tr>
<tr>
<td style="text-align:right"><b>Total com Desconto: </b></td>
<td width="12%" align="center"><b>R$: <?php echo number_format($result->valor_desconto , 2, ',', '.'); ?></b></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>
<!-- Fim Total OS -->

        <!-- QR Code PIX -->
        <!--
        <div class="widget_content_printer2">
            <div class="widget_box_printer3">
                <table width="100%" class="table_print">
                    <table width="100%" class="table_x">
                        <tr>
                            <th>
                                <div align="center">
                                    <table width="100">
                                        <tr>
                                            <td>
                                                <div align="center">
                                                    <?php if ($qrCode): ?>
                                                    <img src="../../../assets/img/logo_pix.png" width="75px">
                                                    <img src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                                    <?php endif ?>
                                                </div>
                                            </td>
                                    </table>

                                </div>
                            </th>
                        </tr>
                    </table>
                </table>
            </div>
        </div>
        -->
                    <!-- Fim QR Code PIX -->

        <div class="widget_content_printer2">
            <div class="widget_box_printer3">
                <table width="100%" class="print_termo">
                    <tr>
                        <td>
                            <div align="center"><b>Termo de Uso</b></div>
                            <br>
                            <?php echo $configuracoes[6]->valor; ?>
                        </td>
                    </tr>
                </table>


            </div>
        </div>

        <div class="widget_content_printer2">
            <div class="widget_box_printer3">
                <table width="100%" class="table_x">
                    <tr>
                        <td>
                            <div style="font-size: 12px" align="center"><b>Assinatura do Tecnico</b></div>
                            <div style="font-size: 11px" align="center"><?php echo $result->nome ?></div>
                            <hr>
                        </td>
                        <td>
                            <div style="font-size: 12px" align="center"><b>Assinatura do Cliente</b></div>
                            <div style="font-size: 11px" align="center"><?php echo $result->nomeCliente ?></div>
                            <hr>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!--
<div class="widget_content_printer2">
<div class="widget_box_printer">
<table width="100%" class="table_print">

</table>
</div>
</div>
-->

    </div>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
    window.print();
    </script>

</body>

</html>