<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">

<div class="widget_title_3">
<h5>Produtos</h5>
</div>










<div class="acordion_group_6" style="min-height: 360px"><!--Tamanho Geral da Pagina-->
<div class="acordion_group_7">

<table class="table_w">
                    <tbody>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Código de Barra</strong></td>
                            <td>
                                <?php echo $result->codDeBarra ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 30%"><strong>Descrição</strong></td>
                            <td>
                                <?php echo $result->descricao ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Unidade</strong></td>
                            <td>
                                <?php echo $result->unidade ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Preço de Compra</strong></td>
                            <td>R$
                                <?php echo $result->precoCompra; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Preço de Venda</strong></td>
                            <td>R$
                                <?php echo $result->precoVenda; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Estoque</strong></td>
                            <td>
                                <?php echo $result->estoque; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right"><strong>Estoque Mínimo</strong></td>
                            <td>
                                <?php echo $result->estoqueMinimo; ?>
                            </td>
                        </tr>
                    </tbody>
                </table> 


</div>
</div>













<div class="form_actions" align="center">
        <a title="Voltar" class="button_mini btn btn-mini btn-warning" style="min-width: 140px; top:10px" href="<?php echo site_url() ?>/produtos">
          <span class="button_icon"><i class="fas fa-undo-alt"></i></span><span class="button_text">Voltar</span></a>
    </div>
    
    
</div>
</div>