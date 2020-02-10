<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<div class="container">
  <br><br><br><br><br><br>
    <div class="row align-centered">
      <div class="offset-md-3 col-md-5">
        <p align="center"><img src="../assets/img/logo.png" width="280px" height="160px" /></p>
        <form method="post" class="">
          <div class="col-md-12">
            <label for="">Usuário:</label>
            <input class="form-control" type="text" name="usuario"/>
          </div>
          <div class="col-md-12">
            Senha:
            <input class="form-control" type="password" name="password" />
          </div>
          <div class="col-md-12">
            <br>
            <a href="#" data-toggle="modal" data-target="#esqueci_senha">Esqueci minha senha</a>
            <input class="float-md-right" type="submit" name="entrar" value="Entrar"/>
          </div>
        </form>
      </div>
    </div>
  <br><br>
</div>

<!-- Modal -->
<div class="modal fade" id="esqueci_senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="display: inline;">Recuperar senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="http://localhost/cobranca/index.php/login/esqueci_senha" method="post">
        <h6 style="display: inline;">Digite seu email</h6>
        <input type="email" name="email" style="width: 60%;"><br>
      </div>
      <div class="modal-footer">
        <button type="submit" name="esqueci_senha" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--================ Start Footer Area =================-->
<footer class="footer-area overlay">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="single-footer-widget">
          <h6>Produtos</h6>
          <div class="row">
            <div class="col">
              <ul class="list">
                <li><a href="#">Cardápio</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6">
        <div class="single-footer-widget">
          <h6>Links úteis</h6>
          <div class="row">
            <div class="col">
              <ul class="list">
                <li><a href="#">Pedidos</a></li>
                <li><a href="#">Saidas</a></li>
                <li><a href="#">Clientes</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

<br><br><br><br><br>
    <div class="row footer-bottom justify-content-between">
      <div class="col-lg-6">
        <p class="footer-text m-0"><!-- licença 1.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados
<!-- Template Developer André Rezende. --></p>
      </div>

    </div>

  </div>
</footer>
<!--================ Start Footer Area =================-->

<?php $this->load->view('elements/footer');?>
