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
                    <div class="widget_content nopadding">
                        <table width="100%" class="table_v">
                            <thead>
                                <tr>
                                    <th width="600" align="center" style="font-size: 15px">Nome</th>
                                    <th width="130" align="center" style="font-size: 15px">Cod. Produto</th>
                                    <th width="150" align="center" style="font-size: 15px">Cod. Barras</th>
                                    <th width="130" align="center" style="font-size: 15px">Preço Compra</th>
                                    <th width="130" align="center" style="font-size: 15px">Preço Venda</th>
                                    <th width="145" align="center" style="font-size: 15px">Estoque</th>
                                    <th width="145" align="center" style="font-size: 15px">Valor Estoque</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                          foreach ($produtos as $p) {
                              $preco = $p->preco ?: $p->precoVenda;
                              $subtotals = $preco * ($p->estoque ?: 1);
                              $totals = $totals + $subtotals;
                              $totalestoque = $totalestoque + $p->estoque;
                              echo '<tr>';
                              echo '<td>' . $p->descricao. '</td>';
                              echo '<td align="center">' . $p->idProdutos . '</td>';
                              echo '<td align="center">' . $p->codDeBarra . '</td>';
                              echo '<td align="center">R$: ' . $p->precoCompra . '</td>' ;
                              echo '<td align="center">R$: ' . ($p->preco ?: $p->precoVenda)  . '</td>' ;
                              echo '<td align="center">' . $p->estoque . '</td>';
                              echo '<td align="center">R$: ' . number_format($subtotals, 2, ',', '.') . '</td>';
                              echo '</tr>';
                          }
                          ?>
                                <tr>
                                    <td colspan="7">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td align="center"><b>Itens em Estoque</b></td>
                                    <td align="center"><b>Valor do Estoque</b></td>
                                </tr>
                                <tr style="background-color: gainsboro;">
                                    <td colspan="5"></td>
                                    <td align="center"><?php echo '' . $totalestoque . ''; ?></td>
                                    <td align="center">R$: <?php echo number_format($totals, 2); ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;" </h5>
                    <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">Data do Relatório:
                        <?php echo date('d/m/Y'); ?>
                    </h5>
            </div>
        </div>
    </div>
</body>

</html>