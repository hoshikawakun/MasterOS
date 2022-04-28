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
                                    <th width="90">ID Cliente</th>
                                    <th width="210">Nome Cliente</th>
                                    <th width="95">ID Produto</th>
                                    <th width="300">Descrição Produto</th>
                                    <th width="95">Quantidade</th>
                                    <th width="130">ID Relacionado</th>
                                    <th width="110">Data</th>
                                    <th width="120">Preço Unitário</th>
                                    <th width="120">Preço Total</th>
                                    <th width="75">Origem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($resultados as $r) {
    					echo '<tr>';
    					echo '<td align="center">' . $r->idClientes . '</td>';
    					echo '<td>' . $r->nomeCliente . '</td>';
    					echo '<td align="center">' . $r->idProdutos . '</td>';
    					echo '<td>' . $r->descricao . '</td>';
    					echo '<td align="center">' . $r->quantidade . '</td>';
    					echo '<td align="center">' . $r->idRelacionado . '</td>';
    					echo '<td align="center">' . date('d/m/Y', strtotime($r->dataOcorrencia)) . '</td>';
    					echo '<td align="center">' . 'R$: ' . number_format($r->preco, 2, ',', '.') . '</td>';
    					echo '<td align="center">' . 'R$: ' . number_format($r->precoTotal, 2, ',', '.') . '</td>';
    					echo '<td align="center">' . $r->origem . '</td>';
    					echo '</tr>';
                                    }
                                ?>
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