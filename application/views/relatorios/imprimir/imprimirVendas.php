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
                                    <th width="90" align="center">#</th>
                                    <th width="500" align="center">Cliente</th>
                                    <th width="150" align="center">Vendedor</th>
                                    <th width="140" align="center">Data</th>
                                    <th width="140" align="center">Total</th>
                                    <th width="90" align="center">Desconto</th>
                                    <th width="165" align="center">Total com Desconto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
									foreach ($vendas as $v) {
									$vTotal = $v->valorTotal;
									$totalVendas = $totalVendas + $v->valorTotal;
									$Vendas = $v->idVendas;
									echo '<tr>';
									echo '<td align="center">' . $Vendas . '</td>';
									echo '<td>' . $v->nomeCliente . '</td>';
									echo '<td align="center">' . $v->nome . '</td>';
									echo '<td align="center">' . date('d/m/Y', strtotime($v->dataVenda)) . '</td>';
									echo '<td align="center">R$: ' . number_format($vTotal, 2, ',', '.') .'</td>';
									echo '<td align="center">' . $v->desconto . '%</td>';
									echo '<td align="center">R$: ' . number_format($v->valor_desconto != 0 ? $v->valor_desconto : $v->valorTotal, 2, ',', '.') . '</td>';
									echo '</tr>';
                                        }
                                        ?>
                                <tr>
                                    <td colspan="5"></td>
                                    <td align="right"><b>TOTAL: </b></td>
                                    <td align="center"><b>R$:
                                            <?php
                                            foreach ($vendas as $valorTotal => $value) {
												$sum += $value->valor_desconto != 0 ? $value->valor_desconto : $value->valorTotal;
                                            }
                                           echo number_format($sum, 2, ',', '.');
                                            ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">Data do Relatório:
                    <?php echo date('d/m/Y'); ?>
                </h5>
            </div>
        </div>
    </div>
</body>

</html>