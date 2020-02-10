<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<div class="container">
  <br><br><br><br><br><br>
  <div class="row align-centered">
    <div class="col-md-5">
      <form class="" id="redefinirSenha" action="" method="post">
        <div class="col-md-12">
          <h3>Redefinir Senha</h3><br><br>
          <label for="nova_senha" class="">Nova senha</label>
          <input type="password" id="nova_senha" name="nova_senha" class="form-control" placeholder="Insira sua senha" required>
        </div>
        <div class="col-md-12">
          <label for="repita_nova_senha" class="">Repita a nova senha</label>
          <input type="password" id="repita_nova_senha" name="repita_nova_senha" class="form-control verifica_senha" placeholder="Insira sua senha" required>
          <span id="erro_senha"  style="display: none; float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 14px">As senhas devem ser iguais!</span>
        </div>
        <div class="form-group">
          <input type="hidden" name="token" value="<?php echo $token; ?>">
          <div class="col-md-12">
            <br>
            <input type="submit" id="alterar" name="alterar" class="right" value="Alterar">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->load->view('elements/footer');?>
