<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<style media="screen">
  hr{
    border: 1px solid #000;
  }
</style>
<br><br><br><br>
<div class="container">
  <?php foreach ($relatorio as $row): ?>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 text-centered">
        <div class="hidden-xs-down"><br><br><br></div>
        <h4>Quantidade de clientes: <div class="hidden-sm-up"><br></div><?=$row->quantidade?></h4>
        <div class="hidden-sm-up"><hr></div>
        <div class="hidden-xs-down"><br></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-12 col-xs-12 text-centered">
        <div class="hidden-xs-down"><br><br></div>
        <h4>Valor a receber: <div class="hidden-sm-up"><br></div> <?=moeda($row->saldo)?></h4>
        <div class="hidden-sm-up"><hr></div>
      </div>
      <?php endforeach; ?>
      <?php foreach ($vendas_mes_atual as $row): ?>
      <div class="col-md-4 col-sm-12 col-xs-12 text-centered">
        <div class="hidden-xs-down"><br><br></div>
        <h4>Vendido no mês atual: <div class="hidden-sm-up"><br></div> <?=moeda($row->valor)?></h4>
        <div class="hidden-sm-up"><hr></div>
      </div>
      <?php endforeach; ?>
      <?php foreach ($recebidos_mes_atual as $row): ?>
      <div class="col-md-4 col-sm-12 col-xs-12 text-centered">
        <div class="hidden-xs-down"><br><br></div>
        <h4>Recebido no mês atual: <div class="hidden-sm-up"><br></div> <?=moeda($row->valor)?></h4>
        <div class="hidden-sm-up"><hr></div>
      </div>
      <?php endforeach; ?>
    </div>
    <br><div class="hidden-xs-down"><br><br><br></div>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <h4 class="text-centered">Vendidos por mês</h4><br>
          <table data-order='[[ 0, "desc" ]]' id="tabela_um" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th scope="col">Mês</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($vendidos_por_mes as $row): ?>
            <tr>
              <td><?=$row->mes?></td>
              <td><?=moeda($row->valor)?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <div class="hidden-sm-up"><br><hr></div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="hidden-sm-up"><br></div>
          <h4 class="text-centered">Recebidos por mês</h4><br>
          <table data-order='[[ 0, "desc" ]]' id="tabela_dois" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th scope="col">Mês</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($pagamentos_por_mes as $row): ?>
            <tr>
              <td><?=$row->mes?></td>
              <td><?=moeda($row->valor)?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br><br><br>
    <br><div class="hidden-xs-down"><br></div>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <h4 class="text-centered">Últimas vendas</h4><br>
          <table data-order='[[ 3, "desc" ]]' id="tabela_tres" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Valor</th>
                <th scope="col">Parcelas</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($ultimas_vendas as $row): ?>
            <tr>
              <td><a href="<?php echo base_url(); ?>index.php/cliente/detalhe/<?=$row->id_cliente?>" style="color: #8e0695;"><?=$row->nome?></a></td>
              <td><?=moeda($row->valor_com_desconto)?></td>
              <td><?=$row->parcelas?></td>
              <td><?=$row->data_compra?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
          <div class="hidden-sm-up"><br><hr></div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="hidden-sm-up"><br></div>
          <h4 class="text-centered">Últimos pagamentos</h4><br>
          <table data-order='[[ 2, "desc" ]]' id="tabela_quatro" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($ultimos_pagamentos as $row): ?>
            <tr>
              <td><a href="<?php echo base_url(); ?>index.php/cliente/detalhe/<?=$row->id_cliente?>" style="color: #8e0695;"><?=$row->nome?></a></td>
              <td><?=moeda($row->valor)?></td>
              <td><?=$row->data_pagamento?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br><br><br>
</div>
<?php $this->load->view('elements/footer');?>
