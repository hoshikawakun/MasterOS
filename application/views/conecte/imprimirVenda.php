<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Compras - <?php echo $result->nomeCliente ?></title>
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
                                            <b>Data Compra:</b> <?php echo date('d/m/Y', strtotime($result->dataVenda)); ?></br>
                                                <b>Emissão:</b> <?php echo date('d/m/Y'); ?></br>
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
                                            <b>Cliente</b><br>
                                            <i class="fas fa-user-check" style="margin:0px 3px 0px 0px"></i><?php echo $result->nomeCliente ?><br>
                                            <i class="fas fa-fingerprint" style="margin:0px 6px 0px 0px"></i><?php echo $result->documento ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 8px 0px 2px"></i>
                                            <?php echo $result->rua ?>,
                                            <?php echo $result->numero ?>,
                                            <?php echo $result->bairro ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 8px 0px 2px"></i><?php echo $result->cidade ?> - <?php echo $result->estado ?><br>
                                            <i class="fas fa-map-marker-alt" style="margin:0px 8px 0px 2px"></i>CEP: <?php echo $result->cep ?><br>
                                            <i class="fas fa-phone-alt" style="margin:0px 6px 0px 0px"></i><?php echo $result->telefone ?><br>
                                            <i class="fas fa-envelope" style="margin:0px 7px 10px 0px"></i><?php echo $result->email ?>
                                        </td>
                                        <td width="50%">
                                            <b>Vendedor</b><br>
                                            <i class="fas fa-user-check" style="margin:0px 2px 0px 0px"></i><?php echo $result->nome ?><br>
                                        </td>
                                    </tr>
                                </table>
</div>
<!-- Fim Dados -->

<!-- Tabela Produtos -->
<div class="widget_content_printer2">
<table width="100%" class="table_w" id="tblProdutos">
<thead>
<tr>
<th width="8%">Cod. SKU</th>
<th width="10%">Cod. Barras</th>
<th>Produto</th>
<th width="8%">Quantidade</th>
<th width="10%">Preço</th>
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
echo '<td><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';
echo '</tr>';
} ?>
<tr>
<td colspan="5" style="text-align: right"><strong>Total:</strong>
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
<td colspan="5" style="text-align: right"><strong>Desconto:</strong></td>
<td>
<div align="center">
<strong>R$: <?php echo number_format($result->desconto, 2, ',', '.'); ?></strong></div>
</td>
</tr>
<tr>
<td colspan="5" style="text-align: right"><strong>Total Com Desconto:</strong></td>
<td>
<div align="center"><strong>R$: <?php echo number_format($result->valor_desconto, 2, ',', '.'); ?></strong>
</div><input type="hidden" id="total-desconto" value="<?php echo number_format($result->valor_desconto, 2); ?>">
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<!-- Fim Tabela Produtos -->

</div>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
    window.print();
    </script>

</body>

</html>