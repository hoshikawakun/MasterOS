<div class="row-fluid" style="margin-top:0">


<div class="new123 span6">
<div class="widget-box2 form-horizontal">
<div class="widget_title_5">
<h5 style="font-size:18px">Minha Conta</h5>
</div>
<div class="user_config">

<div class="user_group_up">
<div id="userMC" style="margin-bottom:10px">
<section>
<div class="profileMC">
<div class="profile-img">
<img src="<?= (!$usuario->url_image_user || !is_file(FCPATH . "assets/userImage/" . $usuario->url_image_user)) ?  base_url() . "assets/img/User.png" : base_url(). "assets/userImage/" . $usuario->url_image_user ?>" alt="">
</div>
</div>
</section>
<div class="control-group" style="margin-bottom: 5px">
<label for="user" class="">
<div align="center"><span class="">
<a href="#modalImageUser" data-toggle="modal" role="button" class="button_mini btn btn-mini btn-success" style="max-width: 140px">
<span class="button_icon"><i class='bx bx-upload'></i></span> <span class="button_text">Alterar Foto</span></a>
</span>
</div>
</label>
</div>
</div>
</div>

<div class="user_group_up">
<div align="center" style="margin: 5px">
<strong>Nome: <?= $usuario->nome ?></strong>
</div>
</div>

<div class="user_group_up">
<div align="center" style="margin: 5px">
<strong>Telefone: <?= $usuario->telefone ?></strong>
</div>
</div>

<div class="user_group_up">
<div align="center" style="margin: 5px">
<strong>Email: <?= $usuario->email ?></strong>
</div>
</div>

<div class="user_group_up">
<div align="center" style="margin: 5px">
<strong>Nível: <?= $usuario->permissao; ?></strong>
</div>
</div>

<div class="user_group_dn">
<div align="center" style="margin: 5px">
<strong>Acesso expira em: <?= date('d/m/Y', strtotime($usuario->dataExpiracao)); ?></strong>
</div>
</div>

</div>

</div>
</div>


<div class="new123 span6">
<div class="widget-box2">
<div class="widget_title_5">
<h5 style="font-size:18px">Alterar Minha Senha</h5>
</div>
<div class="user_config_2">






<form id="formSenha" action="<?= site_url('masteros/alterarSenha'); ?>" method="post">

<div class="span12" style="margin-left: 0">
<label for="">Senha Atual</label>
<input type="password" id="oldSenha" name="oldSenha" class="span12" />
</div>
<div class="span12" style="margin-left: 0">
<label for="">Nova Senha</label>
<input type="password" id="novaSenha" name="novaSenha" class="span12" />
</div>
<div class="span12" style="margin-left: 0">
<label for="">Confirmar Senha</label>
<input type="password" name="confirmarSenha" class="span12" />
</div>
<button class="button_mini btn btn-primary" style="max-width: 140px;text-align: center">
<span class="button_icon"><i class='bx bx-lock-alt'></i></span><span class="button_text">Alterar Senha</span></button>
</form>


</div>
</div>
</div>

</div>


<!-- Atualizar Imagem do Usuario -->
<div id="modalImageUser" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form action="<?= site_url('masteros/uploadUserImage'); ?>" id="formImageUser" enctype="multipart/form-data" method="post" class="form-horizontal">
<div class="modal_title">
<button type="button" class="close" style="color:#f00; padding-right:5px; padding-top:10px" data-dismiss="modal" aria-hidden="true">×</button>
<h5>Atualizar Imagem do Usuario</h5>
</div>

<div class="modal_body2">
<div class="alert alert-info">Selecione uma nova imagem do usuario. Tamanho indicado (130 X 130).</div>
<div class="control-group">
<label for="userfile" class="control-label"><span class="required">Foto*</span></label>
<div class="controls">
<input type="file" name="userfile" value="" />
</div>
</div>
</div>

<div class="form_actions" align="center">
<button class="button_mini btn btn-warning" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir"><span class="button_icon"><i class="fas fa-xmark-circle"></i></span><span class="button_text">Cancelar</span>
</button>
<button class="button_mini btn btn-primary"><span class="button_icon"><i class="fas fa-sync-alt"></i></span><span class="button_text">Atualizar</span></button>
</div>
</form>
</div>
<!-- Fim Atualizar Imagem do Usuario -->

<script src="<?= base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("#formImageUser").validate({
            rules: {
                userfile: {
                    required: true
                }
            },
            messages: {
                userfile: {
                    required: 'Campo Requerido.'
                }
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
                $(element).parents('.control-group').removeClass('success');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

        $('#formSenha').validate({
            rules: {
                oldSenha: {
                    required: true
                },
                novaSenha: {
                    required: true
                },
                confirmarSenha: {
                    equalTo: "#novaSenha"
                }
            },
            messages: {
                oldSenha: {
                    required: 'Campo Requerido'
                },
                novaSenha: {
                    required: 'Campo Requerido.'
                },
                confirmarSenha: {
                    equalTo: 'As senhas não combinam.'
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
