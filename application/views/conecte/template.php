<head>
    <title>Área do Cliente - <?php echo $this->config->item('app_name') ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo $this->config->item('app_name') . ' - ' . $this->config->item('app_subname') ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-media.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
    <script src='<?= base_url(); ?>assets/js/matrix.js'></script>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">



</head>

<body>
    <!--Header-part-->
    <div id="header">
        <h1><a href="dashboard.html">
                <?php echo $this->config->item('app_name'); ?></a></h1>
    </div>
    <!--close-Header-part-->

<!-- Header Menu -->
<div class="navebarn" style="margin-top: -55px;height: 25px">
<!--<div class="navebarn">-->
  <div id="user-nav" class="navbar navbar-inverse" style="margin-top: -10px">

    <ul class="nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Meu Perfil" class="tip-bottom"><i class='fas fa-user-cog iconN'></i><span class="text"> <?= $this->session->userdata('nome') ?></span></a>
        <ul class="dropdown-menu">
          <li class=""><a title="Meu Perfil" href="<?php echo base_url() ?>index.php/conecte/conta"><i class="fas fa-user"></i> <span class="text">Meu Perfil</span></a></li>
          <li class="divider"></li>
          <li class=""><a title="Sair" href="<?php echo base_url() ?>index.php/conecte/sair"><i class="fas fa-sign-out-alt"></i> <span class="text">Sair</span></a></li>
        </ul>
      </li>
    </ul>
  </div>

<!-- New User -->
<div id="userr" style="display:flex; flex-direction:column; align-items:flex-end; justify-content:center;">
  <div class="user-names userT0"> <?php function saudacao($nome = '')
{
    date_default_timezone_set('America/Sao_Paulo');
    $hora = date('H');
    if ($hora >= 6 && $hora <= 12) {
        return 'Bom dia' . (empty($nome) ? '' : ', ' . $nome);
    } elseif ($hora > 12 && $hora <=18) {
        return 'Boa tarde' . (empty($nome) ? '' : ', ' . $nome);
    } else {
        return 'Boa noite' . (empty($nome) ? '' : ', ' . $nome);
    }
} $login = '';
    echo saudacao($login); // Irá retornar conforme o horário:?>
  </div>
  <div class="userT"><?= $this->session->userdata('nome') ?></div>

  <section style="display:block;position:absolute;right:15px">
  <div class="profile">
    <div class="profile-img">
      <a href="<?php echo base_url() ?>index.php/conecte/conta"><img src="<?= !is_file(FCPATH . "assets/userImage/" . $this->session->userdata('url_image_user')) ?  base_url() . "assets/img/User.png" : base_url() . "assets/userImage/" . $this->session->userdata('url_image_user') ?>" alt=""></a>
    </div>
    
  </div>
</section>
</div>
</div>
<!-- Fim Header Menu -->

<!-- Sidebar -->
<nav id="sidebar">
        <div id="newlog">
        <div class="icon2">
            <img src="<?php echo base_url() ?>assets/img/logox.png">
        </div>
    </div>
    <a href="#" class="visible-phone">
        <div class="mode">
                <i class="fas fa-list open-2" style="font-size:17px"></i>
                <i class="fas fa-xmark close-2" style="font-size:17px"></i>
        </div>
    </a>

<div class="menu-bar" style="padding-top: 20px">
            <div class="menu">
                <ul>

				<li class="<?php if (isset($menuPainel)) {echo 'active';}; ?>">
					<a href="<?php echo base_url() ?>index.php/conecte/painel"><i class='fas fa-home iconX'></i>
					<span class="title nav-title">Início</span>
                    <span class="title-tooltip">Início</span></a>
				</li>

				<li class="<?php if (isset($menuConta)) {echo 'active';}; ?>">
					<a href="<?php echo base_url() ?>index.php/conecte/conta"><i class='fas fa-user-cog iconX'></i>
					<span class="title">Minha Conta</span>
                    <span class="title-tooltip">Minha Conta</span></a>
				</li>

				<li class="<?php if (isset($menuOs)) {echo 'active';}; ?>">
					<a href="<?php echo base_url() ?>index.php/conecte/os"><i class='fas fa-diagnoses iconX'></i>
					<span class="title">Ordens de Serviço</span>
                    <span class="title-tooltip">OS.</span></a>
				</li>
                
                <?php if ($compras != null) { ?>
				<li class="<?php if (isset($menuVendas)) {echo 'active';}; ?>">
					<a href="<?php echo base_url() ?>index.php/conecte/compras"><i class='fas fa-cash-register iconX'></i></span>
					<span class="title">Compras</span>
                    <span class="title-tooltip">Compras</span></a>
				</li>
                <?php } ?>

				<!--
                <li class="<?php if (isset($menuCobrancas)) {echo 'active';}; ?>">
					<a href="<?php echo base_url() ?>index.php/conecte/cobrancas"><i class="fas fa-hand-holding-usd iconX"></i>
					<span class="title">Cobranças</span>
                    <span class="title-tooltip">Cobranças</span></a>
				</li>
                -->

            <li class="">
                    <a href="<?= site_url('login/sair'); ?>">
                    <i class='fas fa-person-running iconX'></i>
                    <span class="title">Sair</span>
                    <span class="title-tooltip">Sair</span></a>
            </li>
	</ul>
</div>

</div>
</nav>
<!-- Fim Sidebar -->

<!-- Conteudo -->
<div id="content">
<!--start-top-serch-->
  <div id="content-header">  
<!-- New Bem-vindos -->
   <div class="bemv"></div>
      <div id="breadcrumb" style="margin-top: 0px">
        <a href="<?= base_url() . 'index.php/' . $this->uri->segment(1) .'/painel' ?>" title="Dashboard" class="tip-bottom"> Início</a>
        
        <?php if ($this->uri->segment(1) != null) { ?>
            <a title="<?= ucfirst($this->uri->segment(2)); ?>" class="tip-bottom"><?= ucfirst($this->uri->segment(2)); ?></a>
            <?php } ?>
          
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          
          
          <?php if ($var = $this->session->flashdata('success')) : ?><script> swal("Sucesso!", "<?php echo str_replace('"', '', $var); ?>", "success"); </script><?php endif; ?>
		  <?php if ($var = $this->session->flashdata('error')) : ?><script> swal("Falha!", "<?php echo str_replace('"', '', $var); ?>", "error"); </script><?php endif; ?>
          <?php if (isset($output)) {$this->load->view($output);} ?>

        </div>
      </div>
    </div>
  </div>
<!-- Fim Conteudo -->

<!-- Rodape -->
<div class="row-fluid hide">
<div id="footer" class="span12">
2020 - <?= date('Y') ?> &copy;
<?php echo $this->config->item('app_name'); ?> - Versão:
<?php echo $this->config->item('app_version'); ?>
</div>
</div>

<div class="row-fluid">
<div id="footer" class="span12">
2020 - <?= date('Y') ?> &copy;
<?php echo $this->config->item('app_name'); ?> - Emanuel Victor - Versão:
<?php echo $this->config->item('app_version'); ?>
</div>
</div>

<div class="row-fluid hide">
<div id="footer" class="span12"><a class="pecolor" href="https://github.com/RamonSilva20/masteros" target="_blank">
2020 - <?= date('Y') ?> &copy;
<?php echo $this->config->item('app_name'); ?> - Versão:
<?php echo $this->config->item('app_version'); ?></a>
</div>
</div>

<div class="row-fluid hide">
<div id="footer" class="span12"><a class="pecolor" href="https://github.com/RamonSilva20/masteros" target="_blank">
2020 - <?= date('Y') ?> &copy;
<?php echo $this->config->item('app_name'); ?> - Emanuel Victor - Versão
<?php echo $this->config->item('app_version'); ?></a>
</div>
</div>
<!-- Fim Rodape -->

<!-- javascript ================================================== -->

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript"> $(document).ready(function() { srcCalendar.render(); }); </script>
</body>
</html>
