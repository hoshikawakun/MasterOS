<div class="row-fluid" style="margin-top: 0">

<div class="new123 span4">
<div class="row-fluid">
<div class="widget_title">
<h5>Relatórios Rápidos</h5>
</div>
<div class="widget_content">


<ul class="site-stats">
<li><a target="_blank" href="<?php echo base_url() ?>index.php/relatorios/servicosRapid"><i class="fas fa-wrench"></i> <small>Todos os Serviços</small></a></li>
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

<form target="_blank" action="<?php echo base_url() ?>index.php/relatorios/servicosCustom" method="get">
                        <div class="span12 well">
                            <div class="span6">
                                <label for="">Preço de:</label>
                                <input type="text" name="precoInicial" class="span12 money" />
                            </div>
                            <div class="span6">
                                <label for="">até:</label>
                                <input type="text" name="precoFinal" class="span12 money" />
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
<script type="text/javascript">
    $(document).ready(function() {
        $(".money").maskMoney();
    });
</script>
