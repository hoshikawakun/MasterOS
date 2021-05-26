<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>
<!--
<?php if ($result->rastreio == "") { ?>

<button class="btn btn-primary" title="Atualizar" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar</button>
<?php } ?><span class="required">    &larr; Não Funciona</span>
-->

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Editar OS</h5>
            </div>
          <div class="widget_box_Painel2">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                        <li id="tabProdutos"><a href="#tab2" data-toggle="tab">Produtos</a></li>
                        <li id="tabServicos"><a href="#tab3" data-toggle="tab">Serviços</a></li>
                        <li id="tabAnexos"><a href="#tab4" data-toggle="tab">Anexos</a></li>
                        <li id="tabEquipamentos"><a href="#tab6" data-toggle="tab">Equipamentos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">


                                <div class="span12" style="padding: 1%; margin-left: 0">


                                    <div class="span6" style="margin-left: 0">
                                        <h3>N° OS: #<?php echo $result->idOs ?></h3>
                                        <input id="valorTotal" type="hidden" name="valorTotal" value="" />
                                    </div>
                                    
                                    <div class="span6">
                                        <label for="tecnico">Técnico / Responsável</label>
                                        <input disabled="disabled" id="tecnico" class="span12" type="text" name="tecnico" value="<?php echo $result->nome ?>" />

                                    </div>
                                </div>
                                <div class="span12" style="padding: 1%; margin-left: 0">
                                    <div class="span3">
                                      <label for="status">Status<span class="required"></span></label>
                                        <input name="status" type="text" disabled="disabled" class="span12" id="status" value="<?php echo $result->status; ?>"  />
                                        <label for="rastreio">Rastreio</label>
                                          <input name="rastreio" type="text" disabled="disabled" class="span12" id="rastreio" value="<?php echo $result->rastreio ?>" maxlength="13"  />
										  <a href="https://www.linkcorreios.com.br/<?php echo $result->rastreio ?>" title="Rastrear" target="_new" class="btn btn-warning"><i class="fas fa-envelope"></i> Rastrear</a>

                                    </div>
                                    <div class="span3">
                                    <label for="dataInicial">Data Inicial</label>
<input id="dataInicial" disabled="disabled" class="span12 datepicker" type="text" name="dataInicial" value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>" /><label for="dataFinal">Data Final</label>
<input id="dataFinal" disabled="disabled" class="span12 datepicker" type="text" name="dataFinal" value="<?php echo date('d/m/Y', strtotime($result->dataFinal)); ?>" />
                                    </div>
                                    <div class="span3">Nº Série
                                        <input name="serial" type="text" disabled="disabled" class="span12" id="serial" value="<?php echo $result->serial ?>" maxlength="30" />
                                        <label for="dataSaida">Data de Saida</label>
                                            <input name="dataSaida" type="text" disabled="disabled" class="span12 datepicker" id="dataSaida" autocomplete="off" value="<?php echo $result->dataSaida ?>" />
                                  </div>
                                  <div class="span3">
                                    <label for="marca">Marca</label>
                                          <input name="marca" type="text" disabled="disabled" class="span12" id="marca" value="<?php echo $result->marca ?>" maxlength="30" />
                                        <label for="garantia">Garantia até</label>
                                      <input name="garantia" type="text" disabled="disabled" class="span12 datepicker" id="garantia" value="<?php echo $result->garantia ?>" />
                                    </div>
                                    
                                    
                                    
                                </div>


                                <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                            <h4>Descrição Produto/Serviço</h4>
                                        </label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"><?php echo $result->descricaoProduto ?></textarea>
                                    </div>

                                <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="defeito">
                                            <h4>Problema Informado</h4>
                                        </label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5"><?php echo $result->defeito ?></textarea>
                                    </div>

                                <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                            <h4>Observações</h4>
                                        </label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5"><?php echo $result->observacoes ?></textarea>
                                    </div>

                                <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="laudoTecnico">
                                            <h4>Relatório Técnico</h4>
                                        </label>
                                        <textarea class="span12 editor" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"><?php echo $result->laudoTecnico ?></textarea>
                                    </div>

                            </div>

                        </div>
            </div>
            </div>
                        
                        <!--Produtos-->
                        <div class="tab-pane" id="tab2">
                        
                            <div class="widget-box" id="divProdutos">
                            <div class="widget_content nopadding">
                                <table width="100%" class="table_p" id="tblProdutos">
                                    <thead>
                                    <tr>
                                       		<th width="10%">Cod. Produto</th>
                                       		<th>Produto</th>
                                       		<th width="8%">Quantidade</th>
                                       		<th width="10%">Preço unit.</th>
                                       		<th width="10%">Sub-total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($produtos as $p) {
                                        $total = $total + $p->subTotal;
                                        echo '<tr>';
                                        echo '<td><div align="center">' . $p->idProdutos . '</td>';
                                        echo '<td>' . $p->descricao . '</td>';
                                        echo '<td><div align="center">' . $p->quantidade . '</td>';
                                        echo '<td><div align="center">R$: ' . ($p->preco ?: $p->precoVenda)  . '</td>';
                                        echo '<td><div align="center">R$: ' . number_format($p->subTotal, 2, ',', '.') . '</td>';
                                        echo '</tr>';
                                    } ?>
                                    <tr>
                                        <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                        <td>
                                        <div align="center">
                                        <strong>R$:
                                         <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>">
                                         </strong>
                                         </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                                
                        <!--Serviços-->
                        <div class="tab-pane" id="tab3">
            			
                        <div class="widget-box" id="divServicos">
            			<div class="widget_content nopadding">
									<table width="100%" class="table_p">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th width="8%">Quantidade</th>
                                                <th width="10%">Preço</th>
                                                <th width="10%">Sub-totals</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $totals = 0;
                                            foreach ($servicos as $s) {
                                                $preco = $s->preco ?: $s->precoVenda;
                                                $subtotals = $preco * ($s->quantidade ?: 1);
                                                $totals = $totals + $subtotals;
                                                echo '<tr>';
                                                echo '<td>' . $s->nome . '</td>';
                                                echo '<td><div align="center">' . ($s->quantidade ?: 1) . '</div></td>';
                                                echo '<td><div align="center">R$: ' . $preco  . '</div></td>';
                                                echo '<td><div align="center">R$: ' . number_format($subtotals, 2, ',', '.') . '</div></td>';
                                                echo '</tr>';
                                            } ?>
                                            <tr>
                                                <td colspan="3" style="text-align: right"><strong>Total:</strong></td>
                                                <td>
                                                <div align="center">
                                                <strong>R$:
                                                <?php echo number_format($totals, 2, ',', '.'); ?><input type="hidden" id="total-servico" value="
												<?php echo number_format($totals, 2); ?>"></strong></div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                          </div>
                          </div>
                      </div>
                                
                        <!--Anexos-->
                        <div class="tab-pane" id="tab4">
                        
                        <div class="span12" id="divAnexos" style="margin-left: 0">
                          
                                    <?php
                                    foreach ($anexos as $a) {
                                        if ($a->thumb == null) {
                                            $thumb = base_url() . 'assets/img/icon-file.png';
                                            $link = base_url() . 'assets/img/icon-file.png';
                                        } else {
                                            $thumb = $a->url . '/thumbs/' . $a->thumb;
                                            $link = $a->url . '/' . $a->anexo;
                                        }
                                        echo '<div class="span3" style="min-height: 230px; margin-left: 0; overflow-y:hiden;  padding: 5px;">
										<a style="min-height: 200px; border: 1px solid #bbbbbb;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal">
										<img src="' . $thumb . '" alt="">
										</a>
										<span>' . $a->anexo . '</span>
										</div>';} ?>
                                </div>
                            </div>
                        
                 <!--Equipamentos-->
                            <div class="tab-pane" id="tab6">
                            <div class="widget-box" id="divEquipamento">
                            <div class="widget_content nopadding">
                                    <table  width="100%" class="table_p">
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
                                            }
                                            if (!$equipamentos) {
                                                echo '<tr><td colspan="9">Nenhum Equipamento cadastrado</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                 </div>
                 </div>
                 </div>
                 <!--Fim Equipamentos-->
                 
                 </div>
                 </div>&nbsp
                 </div>
                 </div>
                 </div>
                 </div>

<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade widget_box_vizualizar4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal_header_anexos">
        <button type="button" class="close" style="color:#f00" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });

    $(document).on('click', '.anexo', function(event) {
        event.preventDefault();
        var link = $(this).attr('link');
        var id = $(this).attr('imagem');
        $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
        $("#download").attr('href', "<?php echo base_url(); ?>index.php/mine/downloadanexo/" + id);
    });
</script>
