<style media="screen">
.corrente{
  color: #FF0000 !important;
}

.link_produto{
  text-decoration: none;
  color: #373a3c;
}
.link_produto:hover{
  text-decoration: none;
  color: #373a3c;
}
.numero_carrinho{
  position: relative;
  left: -50%;
  top: -9px;
  color: #FF0000;
}
</style>
<?php $paginaCorrente = basename($_SERVER['REQUEST_URI']);?>
<header>
<!-- Barra de navegação -->
<nav class="navbar navbar-fixed-top navbar-light bg-light navheader" style="    background-color: #f8f9fa !important;">
  <a href="<?php echo base_url(); ?>" class="navbar-brand">
    Pizzaria
  </a>

    <!--<img src="assets/img/logomarca_mini.png" alt="logotipo SICEO" style="width: 183px; height:auto;" class=" d-inline-block align-top">-->

  <button class="navbar-toggler hidden-md-up float-sm-right float-xs-right" type="button" data-toggle="collapse" data-target="#menu-sanduiche"></button>
  <div class="collapse navbar-toggleable-sm" id="menu-sanduiche">
    <ul class="nav navbar-nav float-md-right">
      <!--<li class="nav-item">
        <br class="hidden-sm-up">
        <a href="<?php echo base_url(); ?>index.php/vendas" class="nav-link">Vendas</a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo base_url(); ?>index.php">
          <img src="assets/img/header/nav-icon1.png" alt=""> Home</a>
        </li>
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>sobre.php">
        <img src="assets/img/header/nav-icon2.png" alt="">Sobre-nós</a>
      </li>
      <li class="nav-item">
        <br class="hidden-sm-up">
        <a href="<?php echo base_url(); ?>index.php/produtos" class="nav-link">
          <img src="assets/img/header/nav-icon3.png" alt="">Cardápio</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/pagamentos" class="nav-link">Parcelas</a>
      </li>
      <li class="nav-item">
        <br class="hidden-sm-up">
        <a href="<?php echo base_url(); ?>index.php/boletos" class="nav-link">Boletos</a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/relatorios" class="nav-link">Relatorios</a>
      </li>

      <li class="nav-item hidden-xs-down">&nbsp;</li>
      <?php if (isset($_SESSION['logado'])) { ?>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>index.php/login/logout" class="nav-link">Sair</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
<!-- Fim - Barra de navegação -->

</header>
