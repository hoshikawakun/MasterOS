<style>
    /* Hiding the checkbox, but allowing it to be focused */
    .badgebox {
        opacity: 0;
    }

    .badgebox + .badge {
        /* Move the check mark away when unchecked */
        text-indent: -999999px;
        /* Makes the badge's width stay the same checked and unchecked */
        width: 27px;
    }

    .badgebox:focus + .badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */
        /* Adding a light border */
        box-shadow: inset 0px 0px 0px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked + .badge {
        /* Move the check mark back when checked */
        text-indent: 0;
    }
</style>
<div class="row-fluid" style="margin-top:0">
<div class="widget_content_3">
<div class="widget_title_3">
<h5>Editar Produto</h5>
</div>
<div class="acordion_group_6"><!--Tamanho Geral da Pagina-->
<div class="acordion_group_8">
<?php echo $custom_error; ?>
<form action="<?php echo current_url(); ?>" id="formProduto" method="post" class="form-horizontal">


<div class="control_group_up">
                        <?php echo form_hidden('idProdutos', $result->idProdutos) ?>
                        <label for="codDeBarra" class="control-label">Código de Barra<span class=""></span></label>
                        <div class="controls">
                            <input style="width:260px" id="codDeBarra" maxlength="13" type="text" name="codDeBarra"
                                value="<?php echo $result->codDeBarra; ?>" />
                        </div>
                    </div>

<!--
<div class="control_group_up">
                        <label for="codDeBarra" class="control-label">Código de Barra<span class=""></span></label>
                        <?php function gerar_cod_barras($tamanho, $maiusculas, $minusculas, $numeros, $simbolos)
{
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
  $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
  $nu = "0123456789"; // $nu contem os números
  $si = "!@#$%¨&*()_+="; // $si contem os símbolos

  if ($maiusculas) {
      // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $cod_barras
      $cod_barras .= str_shuffle($ma);
  }

    if ($minusculas) {
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $cod_barras
        $cod_barras .= str_shuffle($mi);
    }

    if ($numeros) {
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $cod_barras
        $cod_barras .= str_shuffle($nu);
    }

    if ($simbolos) {
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $cod_barras
        $cod_barras .= str_shuffle($si);
    }

    // retorna a cod_barras embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return substr(str_shuffle($cod_barras), 0, $tamanho);
}
?>
                        <div class="controls">
                            <input id="codDeBarra" type="text" name="codDeBarra" maxlength="13" style="width:260px" value="<?php echo gerar_cod_barras(10, false, false, true, false); ?><?php echo gerar_cod_barras(2, false, false, true, false); ?>" />
                        </div>
</div>
-->

<div class="control_group_up">
                        <label for="descricao" class="control-label">Descrição<span class="required">*</span></label>
                        <div class="controls">
                            <input id="descricao" type="text" name="descricao" style="width:260px" value="<?php echo $result->descricao; ?>" />
                        </div>
</div>

<div class="control_group_up">
                        <label class="control-label">Tipo de Movimento</label>
                        <div class="controls">
                            <label for="entrada" class="btn btn-default" style="width:120px">Entrada<input type="checkbox" id="entrada" name="entrada" class="badgebox" value="1" <?= ($result->entrada == 1) ? 'checked' : '' ?>/>
                            <span class="badge">&check;</span>
                            </label>
                            <label for="saida" class="btn btn-default" style="width:100px">Saída<input type="checkbox" id="saida" name="saida" class="badgebox" value="1" <?= ($result->saida == 1) ? 'checked' : '' ?>/>
                            <span class="badge">&check;</span>
                            </label>
                        </div>
</div>

<div class="control_group_up">
                        <label for="precoCompra" class="control-label">Preço de Compra</label>
                        <div class="controls">
                            <input style="width:120px"  id="precoCompra" class="money" data-affixes-stay="true" data-thousands="" data-decimal="." type="text" name="precoCompra"
                                value="<?php echo $result->precoCompra; ?>" />  Margem Lucro  <input style="width:35px"  id="margemLucro" name="margemLucro" type="text" placeholder="%" maxlength="3" size="2" />
                            <strong><span style="color: red" id="errorAlert"></span><strong>
                        </div>
</div>

<div class="control_group_up">
                        <label for="precoVenda" class="control-label">Preço de Venda<span
                                class="required">*</span></label>
                        <div class="controls">
                            <input id="precoVenda" class="money" type="text" name="precoVenda" style="width:260px" value="<?php echo $result->precoVenda; ?>" />
                        </div>
</div>

<div class="control_group_up">
                        <label for="unidade" class="control-label">Unidade<span class="required">*</span></label>
                        <div class="controls">
                            <select id="unidade" name="unidade"  style="width:275px"></select>
                        </div>
                    </div>

<div class="control_group_up">
                        <label for="estoque" class="control-label">Estoque<span class="required">*</span></label>
                        <div class="controls">
                            <input id="estoque" type="text" name="estoque" style="width:260px" value="<?php echo $result->estoque; ?>" />
                        </div>
</div>

<div class="control_group_dn">
                        <label for="estoqueMinimo" class="control-label">Estoque Mínimo</label>
                        <div class="controls">
                            <input id="estoqueMinimo" type="text" name="estoqueMinimo" style="width:260px" value="<?php echo $result->estoqueMinimo; ?>" />
                        </div>
</div>


<div class="form_actions" align="center">
<a href="<?php echo base_url() ?>index.php/produtos" id="" class="button_mini btn btn-mini btn-warning">
<span class="button_icon"><i class="fas fa-undo-alt"></i></span><span class="button_text">Voltar</span></a>
<button type="submit" class="button_mini btn btn-primary" style="max-width: 160px">
<span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>
</div>

</form>
</div>
</div>
</div>
</div>


<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    function calcLucro(precoCompra, margemLucro) {
    var precoVenda = (precoCompra * margemLucro / 100 + precoCompra).toFixed(2);
    return precoVenda;

}
    $("#precoCompra").focusout(function () {
        if ($("#precoCompra").val() == '0.00' && $('#precoVenda').val() != '') {
            $('#errorAlert').text('Você não pode preencher valor de compra e depois apagar.').css("display", "inline").fadeOut(6000);
            $('#precoVenda').val('');
            $("#precoCompra").focus();
        } else {
            $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
        }
    });

   $("#margemLucro").keyup(function () {
        this.value = this.value.replace(/[^0-9.]/g, '');
        if ($("#precoCompra").val() == null || $("#precoCompra").val() == '') {
            $('#errorAlert').text('Preencher valor da compra primeiro.').css("display", "inline").fadeOut(5000);
            $('#margemLucro').val('');
            $('#precoVenda').val('');
            $("#precoCompra").focus();

        } else if (Number($("#margemLucro").val()) >= 0) {
            $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
        } else {
            $('#errorAlert').text('Não é permitido número negativo.').css("display", "inline").fadeOut(5000);
            $('#margemLucro').val('');
            $('#precoVenda').val('');
        }
    });

    $('#precoVenda').focusout(function () {
        if (Number($('#precoVenda').val()) < Number($("#precoCompra").val())) {
            $('#errorAlert').text('Preço de venda não pode ser menor que o preço de compra.').css("display", "inline").fadeOut(6000);
            $('#precoVenda').val('');
            if($("#margemLucro").val() != "" || $("#margemLucro").val() != null){
                $('#precoVenda').val(calcLucro(Number($("#precoCompra").val()), Number($("#margemLucro").val())));
            }
        }
    });

    $(document).ready(function() {
        $(".money").maskMoney();
        $.getJSON('<?php echo base_url() ?>assets/json/tabela_medidas.json', function(data) {
            for (i in data.medidas) {
                $('#unidade').append(new Option(data.medidas[i].descricao, data.medidas[i].sigla));
                $("#unidade option[value=" + '<?php echo $result->unidade; ?>' + "]").prop("selected", true);
            }
        });
        $('#formProduto').validate({
            rules: {
                descricao: {
                    required: true
                },
                unidade: {
                    required: true
                },
                precoCompra: {
                    required: true
                },
                precoVenda: {
                    required: true
                },
                estoque: {
                    required: true
                }
            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                unidade: {
                    required: 'Campo Requerido.'
                },
                precoCompra: {
                    required: 'Campo Requerido.'
                },
                precoVenda: {
                    required: 'Campo Requerido.'
                },
                estoque: {
                    required: 'Campo Requerido.'
                }
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
    });
</script>