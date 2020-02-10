<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<br><br><br>
<div class="container">
  <br><br>
  <h2 class="text-centered">Lista vendas</h2>
  <br>
  <table id="tabela_um" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Data da última venda</th>
        <th scope="col">Saldo</th>
        <th scope="col">Ver</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($clientes as $row): ?>
        <tr>
          <td><a href="<?php echo base_url(); ?>cliente/detalhe/<?= $row->id ?>" style="color: #8e0695;"><?= $row->nome ?></a></td>
          <td><?= $row->ultima_compra ?></td>
          <td><?= $row->saldo ?></td>
          <td><a href="<?php echo base_url(); ?>cliente/detalhe/<?= $row->id ?>"><i class="fa fa-search" aria-hidden="true"></i></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<br><br><br>
<?php $this->load->view('elements/footer');?>
