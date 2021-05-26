<?php $totalServico = 0;
$totalProdutos = 0; ?>
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Ordem de Serviço</h5>
                
            </div>
            <div class="widget_content" id="printOs">
                <div class="widget_content_vusualizar widget_box_Painel2">
                    <div class="invoice-head" style="margin-bottom: 0">
                    
                    <table width="100%" class="table_r">
  <?php if ($emitente == null) { ?>
  <tr>
    <td colspan="3" class="alert">Os dados do emitente não foram configurados.</td>
    </tr>
    <?php } else { ?>
  <tr>
    <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "></td>
    <td>
<span style="font-size: 15px"><b><?php echo $emitente[0]->nome; ?></b></span></br>
<span style="font-size: 13px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $emitente[0]->cnpj; ?></span></br>
<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro; ?></span></br>
<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?></br>
<span style="font-size: 13px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?= 'CEP: ' . $emitente[0]->cep; ?></span><br>
<span style="font-size: 13px"><i class="fas fa-envelope" style="margin:5px 1px"></i>  <?php echo $emitente[0]->email; ?></span></br>
<span style="font-size: 13px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo $emitente[0]->telefone; ?></span>
</td>

    <td style="text-align: center">
        <span style="font-size: 12px"><b>OS N°: </b><span><?php echo $result->idOs ?></span></br>
        <span style="font-size: 12px"><b>Emissão:</b> <?php echo date('d/m/Y') ?></span></br>
        <span style="font-size: 12px"><b>Status OS: </b><?php echo $result->status ?></span></br>
        <span style="font-size: 12px"><b>Data de Entrada: </b><?php echo date('d/m/Y', strtotime($result->dataInicial)); ?></span></br>
        <span style="font-size: 12px"><b>Data Final: </b><?php echo date('d/m/Y', strtotime($result->dataFinal)); ?></span></br>
        <?php if ($result->dataSaida != null) { ?>
        <span style="font-size: 12px"><b>Data de Saida: </b><?php echo htmlspecialchars_decode($result->dataSaida) ?><?php } ?></span></br>
        <?php if ($result->garantia != null) { ?>
        <span style="font-size: 12px"><b>Garantia até: </b><?php echo htmlspecialchars_decode($result->garantia) ?><?php } ?></span></br></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="2">
            <span style="font-size: 13px"><b>Cliente</b></span><br>
            <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nomeCliente ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-fingerprint" style="margin:5px 1px"></i> <?php echo $result->documento ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->rua ?>,
                                                    <?php echo $result->numero ?>,
                                                    <?php echo $result->bairro ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> <?php echo $result->cidade ?> - <?php echo $result->estado ?></span><br> 
            <span style="font-size: 12px"><i class="fas fa-map-marker-alt" style="margin:4px 3px"></i> CEP: <?php echo $result->cep ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i>  <?php echo $result->telefone ?></span>
                          </td>
                          <td>
			<span style="font-size: 13px"><b>Responsável</b></span><br>
            <span style="font-size: 12px"><i class="fas fa-user-check"></i> <?php echo $result->nome ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-envelope" style="margin:5px 1px"></i> <?php echo $result->email_responsavel ?></span><br>
            <span style="font-size: 12px"><i class="fas fa-phone-alt" style="margin:5px 1px"></i> <?php echo $result->telefone_usuario ?></span>
            </td>
  </tr>
  <tr>
    <td colspan="2"><?php if ($result->serial != null) { ?>
                                    <span style="font-size: 13px; ">
                              <b>Nº Série:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->serial) ?>
                            <?php } ?></td>
    <td><?php if ($result->marca != null) { ?>
                                    <span style="font-size: 13px; ">
                              <b>Marca:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->marca) ?>
                            <?php } ?></td>
  </tr>
  <?php if ($result->rastreio != null) { ?>
                                    <tr>
                                        <td colspan="3"><span style="font-size: 13px; ">
                                            <b>Cod. de Rastreio:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->rastreio) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
  <?php if ($result->descricaoProduto != null) { ?>
                                    <tr>
                                        <td colspan="3"><span style="font-size: 14px; ">
                                            <b>Descrição Produto/Serviço:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
  <?php if ($result->defeito != null) { ?>
                                    <tr>
                                        <td colspan="3"><span style="font-size: 13px; ">
                                            <b>Problema Informado:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->defeito) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
  <?php if ($result->observacoes != null) { ?>
                                    <tr>
                                        <td colspan="3"><span style="font-size: 13px; ">
                                            <b>Observações:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
  <?php if ($result->laudoTecnico != null) { ?>
                                    <tr>
                                        <td colspan="3"><span style="font-size: 13px; ">
                                            <b>Relatório Técnico:</b><br></span>
                                            <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
  <tr>
    
    <td colspan="3"><br />
    	
                         <div class"span12">
                         <?php if ($equipamentos != null) { ?>
                            <table width="100%" class="table_p" id="tblEquipamento">
                                <thead>
                                    <tr>
                                        <th>Equipamento</th>
                                        <th>Marca</th>
                                        <th>Tipo</th>
                                        <th>Nº Serie</th>
                                        <th>Modelo</th>
                                        <th>Cor</th>
                                        <th>Voltagem</th>
                                        <th>Potência</th>
                                        <th>Obs:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($equipamentos as $e) {

                                        echo '<tr>';
                                        echo '<td><div align="center">' . $e->equipamento . '</div></td>';
                                        echo '<td><div align="center">' . $e->marca . '</div></td>';
                                        echo '<td><div align="center">' . $e->tipo . '</div></td>';
                                        echo '<td><div align="center">' . $e->num_serie . '</div></td>';
                                        echo '<td><div align="center">' . $e->modelo . '</div></td>';
                                        echo '<td><div align="center">' . $e->cor . '</div></td>';
                                        echo '<td><div align="center">' . $e->voltagem . '</div></td>';
                                        echo '<td><div align="center">' . $e->potencia . '</div></td>';
                                        echo '<td><div align="center">' . $e->observacao . '</div></td>';
                                        echo '</tr>';} ?>
                                </tbody>
                            </table>
                        <?php } ?>
                     </div>
    	
                        <div class"span12">
                        <?php if ($produtos != null) { ?>
                            <table width="100%" class="table_p" id="tblProdutos">
                                <thead>
                                    <tr>
                                        <th width="10%">Cod. Produto</th>
                                        <th>Produto</th>
                                        <th width="10%">Quantidade</th>
                                        <th width="10%">Preço unit.</th>
                                        <th width="10%">Sub-total</th>
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
                                        echo '</tr>';} ?>
                                    <tr>
                                    <td colspan="4" style="text-align: right"><strong>Total: </strong></td>
                                    <td><strong><div align="center">R$: <?php echo number_format($totalProdutos, 2, ',', '.'); ?></div></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                        
                        <div class"span12">
						<?php if ($servicos != null) { ?>
                            <table width="100%" class="table_p">
                                <thead>
                                    <tr>
                                        <th>Serviço</th>
                                        <th width="10%">Quantidade</th>
                                        <th width="10%">Preço unit.</th>
                                        <th width="10%">Sub-total</th>
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
                                        <td colspan="3" style="text-align: right"><strong>Total: </strong></td>
                                        <td><div align="center"><strong>R$: <?php echo number_format($totalServico, 2, ',', '.'); ?></strong></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                        <?php
                        if ($totalProdutos != 0 || $totalServico != 0) {
                            echo "<h4 style='font-size: 15px; text-align: right'>Valor Total: R$" . number_format($totalProdutos + $totalServico, 2, ',', '.') . "</h4>";
                        }
                        ?></td>
  </tr>
</table>
 
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#imprimir").click(function() {
            PrintElem('#printOs');
        })

        function PrintElem(elem) {
            Popup($(elem).html());
        }

        function Popup(data) {
            var mywindow = window.open('', 'mydiv', 'height=600,width=800');
            mywindow.document.open();
            mywindow.document.onreadystatechange = function() {
                if (this.readyState === 'complete') {
                    this.onreadystatechange = function() {};
                    mywindow.focus();
                    mywindow.print();
                    mywindow.close();
                }
            }


            mywindow.document.write('<html><head><title>Map Os</title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url(); ?>assets/css/matrix-media.css' />");

            mywindow.document.write("</head><body >");
            mywindow.document.write(data);
            mywindow.document.write("</body></html>");

            mywindow.document.close(); // necessary for IE >= 10

            return true;
        }
    });
</script>
