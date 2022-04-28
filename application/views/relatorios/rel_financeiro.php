<div class="row-fluid" style="margin-top: 0">

<div class="new123 span4">
<div class="row-fluid">
<div class="widget_title">
<h5>Relatórios Rápidos</h5>
</div>
<div class="widget_content">


<ul class="site-stats">
<li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/financeiroRapid"><i class="fas fa-hand-holding-usd"></i> <small>Relatório do mês - pdf</small></a></li>
<li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/financeiroRapid?format=xls"><i class="fas fa-hand-holding-usd"></i> <small>Relatório do mês - xls</small></a></li>
</ul>


</div>
</div>
</div>
   

<div class="new123 span8">
<div class="row-fluid">
<div class="widget_title">
<h5>Relatórios Customizáveis</h5>
</div>
<div class="widget_content">
<div class="span12 well_2">
<div class="span12 alert alert-info">Deixe em branco caso não deseje utilizar o parâmetro.</div>

<form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/financeiroCustom" method="get">
                    <div class="span12 well">

                        <div class="span6">
                            <label for="">Vencimento de:</label>
                            <input type="date" name="dataInicial" class="span12" />
                        </div>
                        <div class="span6">
                            <label for="">até:</label>
                            <input type="date" name="dataFinal" class="span12" />
                        </div>

                    </div>

                    <div class="span12 well" style="margin-left: 0">
                        <div class="span6">
                            <label for="">Tipo:</label>
                            <select name="tipo" class="span12">
                                <option value="todos">Todos</option>
                                <option value="receita">Receita</option>
                                <option value="despesa">Despesa</option>
                            </select>
                        </div>
                        <div class="span6">
                            <label for="">Situação:</label>
                            <select name="situacao" class="span12">
                                <option value="todos">Todos</option>
                                <option value="pago">Pago</option>
                                <option value="pendente">Pendente</option>
                            </select>
                        </div>
                    </div>

                    <div class="span12 well" style="margin-left: 0">
                        <div class="span12">
                            <label for="">Tipo de impressão:</label>
                            <select name="format" class="span12">
                                <option value="">PDF</option>
                                <option value="xls">XLS</option>
                            </select>
                        </div>
                    </div>

                    <div class="span12" style="display:flex;justify-content: center">
                        <button type="reset" class="button_mini btn btn-warning" value="Limpar"><span class="button_icon"><i class="fas fa-recycle"></i></span><span class="button_text">Limpar</span></button>
                        <button class="button_mini btn btn-inverse"><span class="button_icon"><i class="fas fa-print"></i></span> <span class="button_text">Imprimir</span></button>
                    </div>
                </form>


</div>
</div>
</div>
</div>

</div>
