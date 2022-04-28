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
                                    <th width="250">Cliente/Fornecedor</th>
                                    <th width="360">Descrição</th>
                                    <th width="80">Tipo</th>
                                    <th width="110">Valor</th>
                                    <th width="110">Desconto R$</th>
                                    <th width="180">Valor Com Desc.</th>
                                    <th width="110">Entrada</th>
                                    <th width="110">Pagamento</th>
                                    <th width="180">Forma de Pgto.</th>
                                    <th width="85">Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $totalReceita = 0;
                                    $totalDespesa = 0;
                                    $saldo = 0;
                                    foreach ($lancamentos as $l) {
                                        $vencimento = date('d/m/Y', strtotime($l->data_vencimento));
                                        $pagamento = date('d/m/Y', strtotime($l->data_pagamento));
                                        if ($l->baixado == 1) {
                                            $situacao = 'Pago';
                                        } else {
                                            $situacao = 'Pendente';
                                        }
                                        if ($l->tipo == 'receita') {
                                            $totalReceita += $l->valor_desconto;
                                        } else {
                                            $totalDespesa += $l->valor_desconto;
                                        }
    					echo '<tr>';
    					echo '<td>' . $l->cliente_fornecedor . '</td>';
    					echo '<td>' . $l->descricao . '</td>';
    					echo '<td align="center">' . $l->tipo . '</td>';
    					echo '<td align="center">' . 'R$ ' . number_format($l->valor, 2, ',', '.') . '</td>';
    					echo '<td align="center">' . 'R$ ' . number_format($l->desconto, 2, ',', '.') .'</td>';
    					echo '<td align="center">' . 'R$ ' . number_format($l->valor_desconto, 2, ',', '.') . '</td>';
    					echo '<td align="center">' . $vencimento . '</td>';
    					echo '<td align="center">' . $pagamento . '</td>';
    					echo '<td align="center">' . $l->forma_pgto . '</td>';
    					echo '<td align="center">' . $situacao . '</td>';
    					echo '</tr>';
                                    }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" style="text-align: right; color: green">
                                        <strong>Total Receitas:</strong>
                                    </td>
                                    <td colspan="3" style="text-align: left; color: green">
                                        <strong>R$:
                                            <?php echo number_format($totalReceita, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" style="text-align: right; color: red">
                                        <strong>Total Despesas:</strong>
                                    </td>
                                    <td colspan="3" style="text-align: left; color: red">
                                        <strong>R$:
                                            <?php echo number_format($totalDespesa, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" style="text-align: right">
                                        <strong>Saldo:</strong>
                                    </td>
                                    <td colspan="3" style="text-align: left;">
                                        <strong>R$:
                                            <?php echo number_format($totalReceita - $totalDespesa, 2, ',', '.') ?>
                                        </strong>
                                    </td>
                                </tr>
                            </tfoot>
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