<?php $totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Venda Nº: <?php echo $result->idVendas ?> - <?php echo $this->config->item('app_name') ?></title>
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
    <!-- Inicio -->
    <div class="invoice-content">
    <table width="100%" class="table table-condensed">
	<?php if ($emitente == null) { ?>
                                <tr>
                                <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<</td> </tr>

                                <?php } ?>
                                <td style="width: 25%"><div align="center"><br>
                                  <img src=" <?php echo $emitente[0]->url_termica; ?> " style="max-height: 100px"></div></td>
                                <tr>
                                </table>
                                <table width="100%" class="table table-condensend">
  <tr>
    <td>
<span style="font-size: 12px"><b><?php echo $emitente[0]->nome; ?></b></span></br>
<span style="font-size: 10px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></span></br>
<span style="font-size: 10px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro . ' - ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></span></br>
<span style="font-size: 10px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?></span><br>
<span style="font-size: 10px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>
<span style="font-size: 10px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo $emitente[0]->telefone; ?></span><br>
<span style="font-size: 10px"><i class="fas fa-user-check"></i>  Vendedor: <?php echo $result->nome ?></span>
</td>
  </tr>
  <tr>
                                        
                                        <td style="width: 18%; text-align: center">
                             <span>#Venda Nº: <?php echo $result->idVendas ?></span><br>
                             <span>Data Venda: <?php echo date('d/m/Y', strtotime($result->dataVenda)); ?></span><br>
                             <span>Emissão: <?php echo date('d/m/Y'); ?></span>
                             <!--
                             <?php if ($result->faturado) : ?><br>
                                                Vencimento:
                                                <?php echo date('d/m/Y', strtotime($result->data_vencimento)); ?>
                                                -->
                                            <?php endif; ?>
                                        </td>
                                        </tr>
  <tr>
                                    <td style="width: 50%; padding-left: 0">
                                        
                                            <br>
                                            <span style="font-size: 15px"><b>Cliente</b></span><br>
            <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $result->documento ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->rua ?>,
                                                    <?php echo $result->numero ?>,
                                                    <?php echo $result->bairro ?>,
                                                    <?php echo $result->cidade ?> -
                                                    <?php echo $result->estado ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:5px 1px"></i> CEP: <?php echo $result->cep ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $result->email ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo $result->telefone ?></span>
                            </span>
                                            
                                    </td>
                                    </tr>
                                    <tr>
                                    <td style="width: 50%; padding-left: 0">
                                        <br>
                                                <span style="font-size: 15px"><b>Vendedor</b></span><br>
            <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone_usuario ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email_usuario ?></span>
                                            
                                    </td>
                                </tr>
                                </table>
  <hr>
							<?php if ($produtos != null) { ?>
                            <table width="100%" style="font-size: 10px" class="table table-mapos table-condensed" id="tblProdutos">
                                <thead>
                                    <tr>
                                    	<th width="10%">Cod. Produto</th>
                                        <th>     Produto     </th>
                                        <th width="8%">  Qt.  </th>
                                        <th width="10%">Preço unit.</th>
                                        <th width="20%">Sub-total</th>
                                    </tr>
                                </thead>
                                    <?php

                                    foreach ($produtos as $p) {

                                        $totalProdutos = $totalProdutos + $p->subTotal;
                                        echo '<tr>';
										echo '<td><div align="center">' . $p->idProdutos . '</div></td>';
                                        echo '<td>' . $p->descricao . '</td>';
                                        echo '<td><div align="center">' . $p->quantidade . '</div></td>';
                                        echo '<td><div align="center">' . $p->preco ?: $p->precoVenda . '</div></td>';
										echo '<td><div align="center">' . number_format($p->subTotal, 2, ',', '.') . '</div></td>';
                                        echo '</tr>';
                                    } ?>
                                    
                            </table>
                        <?php } ?>
                        <?php
                        if ($totalProdutos != 0 || $totalServico != 0) {
                            echo "<h4 style='font-size: 12px; text-align: right'>Valor Total: R$" . number_format($totalProdutos, 2, ',', '.') . "</h4>";
                        }
                        ?>
                        <br>

                             <!-- QR Code PIX -->
                            <table width="100%">
                                		<tr>
                                        <th><div align="center">
                                        <table width="200">
                                            <tr>
                                              <td>
                                                <div align="center">
                                                  <?php if ($qrCode): ?>
                                                  <img src="../../../assets/img/logo_pix.png" width="150px">
                                                  <img src="<?= $qrCode ?>" alt="QR Code de Pagamento" />
                                              </div></td>
                                              <?php endif ?>
                                              
                                          </table>
                                          </div></th>
                                          </tr>
                                          </table>
									<!-- Fim QR Code PIX -->
                                    
                                    </div>
                                 <!-- Fim -->
                                 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>
    <script>
        window.print();
    </script>
</body>

</html>
