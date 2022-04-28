<?php $totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Venda Nº: <?php echo $result->idVendas ?> - <?php echo $this->config->item('app_name') ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
</head>

<body>
<div class="invoice-content">
<div class="widget_content_printer2">
<table width="100%" class="table_w">
<?php if ($emitente == null) { ?>
<tr>
<td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a><<<</td>
</tr>
<?php } ?>
<tr>
<td style="text-align: center; width: 25%">
<img src=" <?php echo $emitente[0]->url_logo; ?> " style="max-height: 100px">
</td>
<td>
<b><?php echo $emitente[0]->nome; ?></b></br>
<i class="fas fa-fingerprint" style="margin:0px 1px"></i>
<?php echo $emitente[0]->cnpj; ?></br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i>
<?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?><br>
<i class="fas fa-envelope" style="margin:0px 1px"></i>  <?php echo $emitente[0]->email; ?></br>
<i class="fas fa-phone-alt" style="margin:0px 1px"></i>  <?php echo $emitente[0]->telefone; ?>
</td>
<td style="text-align: center; font-size:12px">
<span><b>#Venda Nº:</b> <?php echo $result->idVendas ?></span><br>
<span><b>Data Venda:</b> <?php echo date('d/m/Y', strtotime($result->dataVenda)); ?></span><br>
<span><b>Emissão:</b> <?php echo date('d/m/Y'); ?></span>
</td>
</tr>
</table>
</div>

<div class="widget_content_printer2">
<table width="100%" class="table_w">
<tr>
<td>
<b>Cliente</b><br>
<i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?><br>
<i class="fas fa-fingerprint" style="margin:0px 1px"></i>
<?php echo $result->documento ?><br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i>
<?php echo $result->rua ?>,
<?php echo $result->numero ?>,
<?php echo $result->bairro ?><br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> <?php echo $result->cidade ?> -
<?php echo $result->estado ?><br>
<i class="fas fa-map-marker-alt" style="margin:0px 3px"></i> CEP: <?php echo $result->cep ?><br>
<i class="fas fa-phone-alt" style="margin:0px 1px"></i>  <?php echo $result->telefone ?>
</td>
<td>
<span style="font-size: 15px"><b>Vendedor</b></span><br>
<span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>
<span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone_usuario ?></span><br>
<span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email_usuario ?></span>
</td>
<?php if ($qrCode): ?>
<td style="text-align: center; width: 150px">
<img src="../../../assets/img/logo_pix.png" width="100px">
<img src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
</td>
<?php endif ?>
</tr>
</table>
</div>

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




















        


</div>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>
    <script>
    window.print();
    </script>
</body>

</html>