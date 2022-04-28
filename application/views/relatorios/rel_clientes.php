<div class="row-fluid" style="margin-top: 0">

<div class="new123 span4">
<div class="row-fluid">
<div class="widget_title">
<h5>Relatórios Rápidos</h5>
</div>
<div class="widget_content_2">


<ul class="site-stats">
<li><a href="<?php echo base_url() ?>index.php/relatorios/clientesRapid" target="_blank"><i class="fas fa-users"></i> <small>Todos os Clientes - pdf</small></a></li>
<li><a href="<?php echo base_url() ?>index.php/relatorios/clientesRapid?format=xls" target="_blank"><i class="fas fa-users"></i> <small>Todos os Clientes - xls</small></a></li>
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
                    	<label for="">Cadastrado de:</label>
                        <input type="date" name="dataInicial" class="span12"/>
                    </div>
                    <div class="span6">
                    	<label for="">até:</label>
                        <input type="date" name="dataFinal" class="span12"/>
                    </div>
                    </div>

                    <div class="span12 well" style="margin-left: 0">
                    <div class="span12">
                    	<select name="tipocliente" class="span12">
                        <option value="0">Cliente</option>
                        <option value="1">Fornecedor</option>
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
