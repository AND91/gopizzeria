<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<br><br><br>
<div class="container">
  <br><br>
  <h2 class="text-centered">Clientes</h2>
  <br>
  <a href="#" data-toggle="modal" data-target="#modal_cadastro_cliente">Cadastrar novo cliente</a><br>
  <table id="tabela_um" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col" class="hidden-xs-down">Telefone</th>
        <th scope="col" class="hidden-xs-down">Data da última venda</th>
        <th scope="col" class="hidden-xs-down">Data do último pagamento</th>
        <th scope="col">Saldo</th>
        <th scope="col">Ver</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($clientes as $row): ?>
        <tr>
          <td><a href="index.php/cliente/detalhe/<?= $row->id ?>" style="color: #8e0695;"><?= $row->nome ?></a></td>
          <td class="hidden-xs-down"><?= $row->telefone ?></td>
          <td class="hidden-xs-down"><?= $row->ultima_compra ?></td>
          <td class="hidden-xs-down"><?= $row->ultimo_pagamento ?></td>
          <td><?= $row->saldo ?></td>
          <td><a href="index.php/cliente/detalhe/<?= $row->id ?>"><i class="fa fa-search" aria-hidden="true"></i></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<br><br><br>

<!-- Modal -->
<div class="modal fade" id="modal_cadastro_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="display: inline;">Cadastro cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post">
        <div class="form-group">
          <label class="label-input-style" for="nome">Nome: ** </label>
          <input type="text" class="col-md-12" id="nome" name="nome" value="<?=set_value('nome')?>" required>
        </div>
        <div class="form-group">
          <label class="label-input-style" for="telefone">Telefone: ** </label>
          <input type="text" class="col-md-12" id="telefone" name="telefone" value="<?=set_value('telefone')?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="cadastro_cliente" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('elements/footer');?>
