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
                        <h4 style="text-align: center; font-size: 1.1em; padding: 5px;">
                            <?= ucfirst($title) ?>
                        </h4>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-striped table-mapos">
                            <thead>
                                <tr>
                                    <th width="70" style="font-size: 12px" align="center">OS</th>
                                    <th width="160" style="font-size: 12px" align="center">CLIENTE</th>
                                    <th width="140" style="font-size: 12px" align="center">STATUS</th>
                                    <th width="90" style="font-size: 12px" align="center">DATA</th>
                                    <th width="350" style="font-size: 12px" align="center">DESCRIÇÃO</th>
                                    <th width="105" style="font-size: 12px" align="center">T. PRODUTOS</th>
                                    <th width="105" style="font-size: 12px" align="center">T. SERVIÇOS</th>
                                    <th width="105" style="font-size: 12px" align="center">TOTAL</th>
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
                                    echo '</tr>';
                                }
                                ?>
                                <tr style="background-color: gainsboro;">
                                    <td colspan="5" align="right"><b>Total </b></td>
                                    <td align="center"><small>R$: <?= number_format($total_produtos, 2, ',', '.') ?></small></td>
                                    <td align="center"><small>R$: <?= number_format($total_servicos, 2, ',', '.') ?></small></td>
                                    <td align="center"><small>R$: <?= number_format($total_geral, 2, ',', '.') ?></small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">Data do Relatório: <?php echo date('d/m/Y'); ?>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
