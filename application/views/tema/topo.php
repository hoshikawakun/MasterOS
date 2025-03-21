<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title><?= $configuration['app_name'] ?: 'Map-OS' ?></title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/matrix-style.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/matrix-media.css" />
  <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fullcalendar.css" />
  
  <?php if ($configuration['app_theme'] == 'white') { ?> <link rel="stylesheet" href="<?= base_url(); ?>assets/css/tema.css" /><?php } ?>
  <?php if ($configuration['app_theme'] == 'verde') { ?> <link rel="stylesheet" href="<?= base_url(); ?>assets/css/tema3.css" /><?php } ?>
  <?php if ($configuration['app_theme'] == 'normal') { ?> <link rel="stylesheet" href="<?= base_url(); ?>assets/css/tema1.css" /><?php } ?>
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;500;700&display=swap' rel='stylesheet' type='text/css'>
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

  <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/shortcut.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/funcoesGlobal.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/datatables.min.js"></script>
  <script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
  <script type="text/javascript">
    shortcut.add("escape", function() {
      location.href = '<?= base_url(); ?>';
    });
    shortcut.add("F1", function() {
      location.href = '<?= site_url('clientes'); ?>';
    });
    shortcut.add("F2", function() {
      location.href = '<?= site_url('produtos'); ?>';
    });
    shortcut.add("F3", function() {
      location.href = '<?= site_url('servicos'); ?>';
    });
    shortcut.add("F4", function() {
      location.href = '<?= site_url('os'); ?>';
    });
    //shortcut.add("F5", function() {});
    shortcut.add("F6", function() {
      location.href = '<?= site_url('vendas'); ?>';
    });
    shortcut.add("F7", function() {
      location.href = '<?= site_url('garantias'); ?>';
    });
    shortcut.add("F8", function() {});
    shortcut.add("F9", function() {});
    shortcut.add("F10", function() {});
    shortcut.add("F11", function() {});
    shortcut.add("F12", function() {});
    window.BaseUrl = "<?= base_url() ?>";
  </script>

</head>

<body>
<!--top-Header-menu-->
<div class="navebarn">
  <div id="user-nav" class="navbar navbar-inverse">

    <ul class="nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Meu Perfil" class="tip-bottom"><i class='fas fa-user-cog iconN'></i><span class="text"> Meu Perfil</span></a>
        <ul class="dropdown-menu">
          <!--
          <li class=""><a title="Área do Cliente" href="<?= site_url(); ?>/conecte"> <span class="text">Área do Cliente</span></a></li>
          -->
          <li class=""><a title="Meu Perfil" href="<?= site_url('masteros/minhaConta'); ?>"><span class="text">Meu Perfil</span></a></li>
          <li class="divider"></li>
          <li class=""><a title="Sair do Sistema" href="<?= site_url('login/sair'); ?>"><i class='fas fa-list-alt'></i> <span class="text">Sair do Sistema</span></a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Relatórios" class="tip-bottom"><i class='fas fa-list-alt iconN'></i><span class="text"> Relatórios</span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= site_url('relatorios/clientes') ?>">Clientes</a></li>
          <li><a href="<?= site_url('relatorios/produtos') ?>">Produtos</a></li>
          <li><a href="<?= site_url('relatorios/servicos') ?>">Serviços</a></li>
          <li><a href="<?= site_url('relatorios/os') ?>">Ordens de Serviço</a></li>
          <li><a href="<?= site_url('relatorios/vendas') ?>">Vendas</a></li>
          <li><a href="<?= site_url('relatorios/financeiro') ?>">Financeiro</a></li>
          <li><a href="<?= site_url('relatorios/sku') ?>">SKU</a></li>
          <li><a href="<?= site_url('relatorios/receitasBrutasMei') ?>">Receitas Brutas - MEI</a></li>
        <li><a href="<?= site_url('auditoria') ?>">Auditoria</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Configurações" class="tip-bottom"><i class='fas fa-cog iconN'></i><span class="text"> Configurações</span></a>
        <ul class="dropdown-menu">
        <!--
        <li><a href="<?= site_url('conecte') ?>">Area do Cliente</a></li>
        -->
        <li><a href="<?= site_url('masteros/configurar') ?>">Sistema</a></li>
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cUsuario')) { ?>
        <li><a href="<?= site_url('usuarios') ?>">Usuários</a></li>
        <?php } ?>
        <li><a href="<?= site_url('masteros/emitente') ?>">Emitente</a></li>
        <li><a href="<?= site_url('permissoes') ?>">Permissões</a></li>
        <!--
        <li><a href="<?= site_url('masteros/emails') ?>">Emails</a></li>
        -->
        <li><a href="<?= site_url('masteros/backup') ?>">Backup</a></li>
        </ul>
      </li>
      
      <li class="dropdown">
        <a href="<?= site_url('conecte') ?>" title="Area do Cliente" target="_blank" class="tip-bottom"><i class='fas fa-users iconN'></i><span class="text"> Area do Cliente</span></a>
      
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
      <a href="<?= site_url('masteros/minhaConta'); ?>"><img src="<?= !is_file(FCPATH . "assets/userImage/" . $this->session->userdata('url_image_user')) ?  base_url() . "assets/img/User.png" : base_url() . "assets/userImage/" . $this->session->userdata('url_image_user') ?>" alt=""></a>
    </div>
  </div>
</section>
</div>
</div>
<!-- End User -->


