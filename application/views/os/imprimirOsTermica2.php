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
    <!-- Inicio -->
    <div class="invoice-content">
        <table width="100%" class="table_x">
            <?php if ($emitente == null) { ?>
            <tr>
                <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a
                        href="<?php echo base_url(); ?>index.php/masteros/emitente">Configurar</a>
                    <<<< /td>
            </tr>

            <?php } ?>
            <td style="width: 25%">
                <div align="center"><br>
                    <img src=" <?php echo $emitente[0]->url_termica; ?> " style="max-height: 100px">
                </div>
            </td>
            <tr>
        </table><br>
        <table width="100%" class="table_tr">
            <tr>
                <td colspan="2">
                    <span style="font-size: 12px"><b><?php echo $emitente[0]->nome; ?></b></span></br>
                    <span style="font-size: 10px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i>
                        <?php echo $emitente[0]->cnpj; ?></span></br>
                    <span style="font-size: 10px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i>
                        <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>
                    <span style="font-size: 10px"><i class="fas fa-map-marker-alt"
                            style="margin:4px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
                        <span style="font-size: 10px"><i class="fas fa-map-marker-alt"
                                style="margin:4px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?></span><br>
                        <span style="font-size: 10px"><i class="fas fa-envelope"
                                style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>
                        <span style="font-size: 10px"><i class="fas fa-phone-alt"
                                style="margin:5px 1px"></i>  <?php echo $emitente[0]->telefone; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <span style="font-size: 10px"><b>OS N°: </b><span><?php echo $result->idOs ?></span></br>
                        <span style="font-size: 10px"><b>Emissão:</b> <?php echo date('d/m/Y') ?></span></br>
                        <span style="font-size: 10px"><b>Status OS: </b><?php echo $result->status ?></span></br>
                        <span style="font-size: 10px"><b>Data de Entrada:
                            </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></span></br>
                        <span style="font-size: 10px"><b>Data Final:
                            </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></span></br>
                        <?php if ($result->dataSaida != null) { ?>
                        <span style="font-size: 10px"><b>Data de Saida:
                            </b><?php echo htmlspecialchars_decode($result->dataSaida) ?><?php } ?></span></br>
                        <?php if ($result->garantia != null) { ?>
                        <span style="font-size: 10px"><b>Garantia até:
                            </b><?php echo htmlspecialchars_decode($result->garantia) ?><?php } ?></span></br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-size: 12px"><b>Cliente</b></span><br>
                    <span style="font-size: 10px"><i class="fas fa-user-check"></i>
                        <?php echo $result->nomeCliente ?></span><br>
                    <span style="font-size: 10px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i>
                        <?php echo $result->documento ?></span><br>
                    <span style="font-size: 10px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i>
                        <?php echo $result->rua ?>,
                        <?php echo $result->numero ?>,
                        <?php echo $result->bairro ?></span><br>
                    <span style="font-size: 10px"><i class="fas fa-map-marker-alt"
                            style="margin:4px 3px"></i><?php echo $result->cidade ?> -
                        <?php echo $result->estado ?></span><br>
                    <span style="font-size: 10px"><i class="fas fa-map-marker-alt"
                            style="margin:4px 3px"></i> CEP: <?php echo $result->cep ?></span><br>
                    <span style="font-size: 10px"><i class="fas fa-phone-alt"
                            style="margin:5px 1px"></i>  <?php echo $result->telefone ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-size: 12px"><b>Responsável</b></span><br>
                    <span style="font-size: 10px"><i
                            class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>
                    <span style="font-size: 10px"><i class="fas fa-envelope"
                            style="margin:5px 1px"></i>  <?php echo $result->email_responsavel ?></span><br>
                    <span style="font-size: 10px"><i class="fas fa-phone-alt"
                            style="margin:5px 1px"></i>  <?php echo $result->telefone_usuario ?></span>
                </td>
            </tr>
            <tr>
                <td><?php if ($result->serial != null) { ?>
                    <span style="font-size: 10px; ">
                        <b>Nº Série:</b><br></span>
                    <?php echo htmlspecialchars_decode($result->serial) ?>
                    <?php } ?>
                </td>
                <td><?php if ($result->marca != null) { ?>
                    <span style="font-size: 10px; ">
                        <b>Marca:</b><br></span>
                    <?php echo htmlspecialchars_decode($result->marca) ?>
                    <?php } ?>
                </td>
            </tr>
            <?php if ($result->rastreio != null) { ?>
            <tr>
                <td colspan="2">
                    <span style="font-size: 10px"><b>Cod. de Rastreio:</b><br></span>
                    <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->rastreio) ?></span>
                </td>
            </tr>
            <?php } ?>

            <?php if ($result->descricaoProduto != null) { ?>
            <tr>
                <td colspan="2">
                    <span style="font-size: 10px"><b>Descrição Produto/Serviço:</b><br></span>
                    <span
                        style="font-size: 10px"><?php echo htmlspecialchars_decode($result->descricaoProduto) ?></span>
                </td>
            </tr>
            <?php } ?>

            <?php if ($result->defeito != null) { ?>
            <tr>
                <td colspan="2">
                    <span style="font-size: 10px"><b>Problema Informado:</b><br></span>
                    <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->defeito) ?></span>
                </td>
            </tr>
            <?php } ?>

            <?php if ($result->observacoes != null) { ?>
            <tr>
                <td colspan="2">
                    <span style="font-size: 10px"><b>Observações:</b><br></span>
                    <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->observacoes) ?></span>
                </td>
            </tr>
            <?php } ?>

            <?php if ($result->laudoTecnico != null) { ?>
            <tr>
                <td colspan="2">
                    <span style="font-size: 10px"><b>Relatório Técnico:</b><br></span>
                    <span style="font-size: 10px"><?php echo htmlspecialchars_decode($result->laudoTecnico) ?></span>
                </td>
            </tr>
            <?php } ?>

            <td colspan="2"></td>
        </table>
        <table width="100%">
            <tr>
                <td>
                    <?php if ($equipamentos != null) { ?>
                    <table width="100%" class="table_pr" id="tblEquipamento">
                        <thead>
                            <tr>
                                <th>Equip.</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Nº Serie</th>
                                <th>Modelo</th>
                                <th>Cor</th>
                                <th>~</th>
                                <th>W</th>
                                <th>Obs:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                    foreach ($equipamentos as $x) {
                                        echo '<tr>';
                                        echo '<td><div align="center">' . $x->equipamento . '</div></td>';
                                        echo '<td><div align="center">' . $x->marca . '</div></td>';
                                        echo '<td><div align="center">' . $x->tipo . '</div></td>';
                                        echo '<td><div align="center">' . $x->num_serie . '</div></td>';
                                        echo '<td><div align="center">' . $x->modelo . '</div></td>';
                                        echo '<td><div align="center">' . $x->cor . '</div></td>';
                                        echo '<td><div align="center">' . $x->voltagem . '</div></td>';
                                        echo '<td><div align="center">' . $x->potencia . '</div></td>';
                                        echo '<td><div align="center">' . $x->observacao . '</div></td>';
                                        echo '</tr>';
                                    } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td><?php if ($produtos != null) { ?>
                    <br />
                    <table width="100%" class="table_pr" id="tblProdutos" style="font-size: 10px">
                        <thead>
                            <tr>
                                <th width="8%">Cod. Produto</th>
                                <th>Produto</th>
                                <th width="8%">  Qt.  </th>
                                <th width="8%"> R$ UN </th>
                                <th width="10%">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                    foreach ($produtos as $p) {
                                        $totalProdutos = $totalProdutos + $p->subTotal;
                                        echo '<tr>';
                                        echo '<td><div align="center">' . $p->idProdutos . '</div></td>';
                                        echo '<td>' . $p->descricao . '</td>';
                                        echo '<td><div align="center">' . $p->quantidade . '</div></td>';
                                        echo '<td><div align="center">R$: ' . $p->preco ?: $p->precoVenda . '</div></td>';
                                        echo '<td><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';
                                        echo '</tr>';
                                    } ?>
                            <tr>
                                <td colspan="5" style="text-align: right"><strong>Total Produtos R$:
                                        <?php echo number_format($totalProdutos, 2, ',', '.'); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
                </td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td><?php if ($servicos != null) { ?>
                    <br />
                    <table width="100%" class="table_pr" style="font-size: 10px">
                        <thead>
                            <tr>
                                <th>      Serviço     </th>
                                <th width="10%">  Qt.  </th>
                                <th width="10%">    R$ UN    </th>
                                <th width="10%">  Sub Total  </th>
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
                                        echo '<td><div align="center">' . ($s->quantidade ?: 1) . '</td>';
                                        echo '<td><div align="center">R$: ' . $preco . '</td>';
                                        echo '<td><div align="center">R$: ' . number_format($subtotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>

                            <tr>
                                <td colspan="4" style="text-align: right"><strong>Total Serviços R$:
                                        <?php echo number_format($totalServico, 2, ',', '.'); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php } ?>
					
                       <!-- Total OS -->
<?php
if ($totalProdutos != 0 || $totalServico != 0) {
echo "<h4 style='font-size: 12px; text-align: right'>Valor Total: R$ " . number_format($totalProdutos + $totalServico, 2, ',', '.') . "  "."</h4>";
echo $result->valor_desconto != 0 ? "<h4 style='font-size: 12px; text-align: right'>Desconto: R$ " . number_format($result->valor_desconto != 0 ? $result->valor_desconto - ($totalProdutos + $totalServico) : 0.00, 2, ',', '.') . "  "."</h4>" : ".";
echo $result->valor_desconto != 0 ? "<h4 style='font-size: 12px; text-align: right'>Total com Desconto: R$ " . number_format($result->valor_desconto, 2, ',', '.') . "  "."</h4>" : ".";
                        }
                        ?>
                       <!-- Fim Total OS -->
                    
                </td>
            </tr>
        </table>
    </div>

    <!-- Fim -->


    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
    window.print();
    </script>

</body>

</html>