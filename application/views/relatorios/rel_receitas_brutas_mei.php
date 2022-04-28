<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />

<div class="row-fluid" style="margin-top: 0">

<div class="new123 span4">
<div class="row-fluid">
<div class="widget_title">
<h5>Relatórios Rápidos Receita Bruta</h5>
</div>
<div class="widget_content">


<ul class="site-stats">
<li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/receitasBrutasRapid?format=docx"><i class="fas fa-shopping-bag"></i> <small>Mês Atual - docx</small></a></li>
<li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/receitasBrutasRapid?format=pdf"><i class="fas fa-shopping-bag"></i> <small>Mês Atual - pdf</small></a></li>
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

<form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/receitasBrutasCustom" method="get">
                    <div class="span12 well">
                        <div class="span6">
                            <label for="">Data de ocorrência de:</label>
                            <input type="date" name="dataInicial" class="span12" />
                        </div>
                        <div class="span6">
                            <label for="">até:</label>
                            <input type="date" name="dataFinal" class="span12" />
                        </div>
                    </div>

                    <div class="span12 well" style="margin-left: 0">
                        <div class="span12">
                            <label for="">Tipo de impressão:</label>
                            <select name="format" class="span12">
                                <option value="pdf">PDF</option>
                                <option value="docx">DOCX</option>
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

<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
