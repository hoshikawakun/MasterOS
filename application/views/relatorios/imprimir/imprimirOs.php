<!DOCTYPE html>
<html>

<head>
    <title>MAPOS</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blue.css" class="skin-color" />
</head>

<body style="background-color: transparent">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <?= $topo ?>
                    <div class="widget-title">
                  <h4 style="text-align: center; font-size: 14px; padding: 5px;">
                            <?= ucfirst($title) ?>
                        </h4>
                    </div>
                    <div class="widget_content nopadding">
                        <table width="100%" class="table_v">
                            <thead>
                                <tr>
                                    <th width="70" align="center">OS</th>
                                    <th width="220" align="center">Cliente</th>
                                    <th width="155" align="center">Status</th>
                                    <th width="100" salign="center">Data</th>
                                    <th width="450" align="center">Descrição</th>
                                    <th width="130" align="center">Total Produtos</th>
                                    <th width="130" align="center">Total Serviços</th>
                                    <th width="100" align="center">Total</th>
                                    <th width="85" align="center">Desconto</th>
                                    <th width="120" align="center">Total com Desconto</th>
                                </tr>
                            </thead>
                            <tbody>
					<?php
					foreach ($os as $c) {
					echo '<tr>';
					echo '<td align="center"><small>' . $c->idOs . '</small></td>';
					echo '<td><small>' . $c->nomeCliente . '</small></td>';
					echo '<td align="center"><small>' . $c->status . '</small></td>';
					echo '<td align="center"><small>' . date('d/m/Y', strtotime($c->dataInicial)) . '</small></td>';
					echo '<td><small>' . $c->descricaoProduto . '</small></td>';
					echo '<td align="center"><small>R$: ' . number_format($c->total_produto, 2, ',', '.') . '</small></td>';
					echo '<td align="center"><small>R$: ' . number_format($c->total_servico, 2, ',', '.') . '</small></td>';
					echo '<td align="center"><small>R$: ' . number_format($c->total_produto + $c->total_servico, 2, ',', '.') . '</small></td>';
					echo '<td align="center"><small>' . $c->desconto . '%</small></td>';
					echo '<td align="center"><small>R$: ' . number_format($c->valor_desconto ? : $c->total_produto + $c->total_servico, 2, ',', '.') . '</small></td>';
					echo '</tr>';
					}
					?>

                                <tr style="background-color: gainsboro;">
                                    <td colspan="5"></td>
                                    <td align="center"><small>R$: <?= number_format($total_produtos, 2, ',', '.') ?></small></td>
                                    <td align="center"><small>R$: <?= number_format($total_servicos, 2, ',', '.') ?></small></td>
                                    <td align="center"><small>R$: <?= number_format($total_produtos + $total_servicos, 2, ',', '.') ?> </small></td>
                                    <td align="center"><small> </small></td>
                                    <td align="center"><small>R$: <?= number_format($total_geral, 2, ',', '.') ?></small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">
                    <p>Data do Relatório: <?php echo date('d/m/Y'); ?>
                    </p>
                    </p>
                    <p>
                        <!-- QR Code PIX -->
                    <table width="100%" class="table_x">
                        <tr>
                            <th>
                                <div align="center">
                                    <table width="200">
                                        <tr>
                                            <td>
                                                <div align="center">
                                                    <?php if ($qrCode): ?>
                                                    <img src="../../../assets/img/logo_pix.png" width="150px">
                                                    <img src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                                </div>
                                            </td>
                                            <?php endif ?>

                                    </table>
                                </div>
                            </th>
                        </tr>
                    </table>
                    <!-- Fim QR Code PIX -->
                    </p>
            </div>
        </div>
    </div>
</body>

</html>