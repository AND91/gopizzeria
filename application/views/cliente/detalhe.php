<?php $this->load->view('elements/header');?>
<?php $this->load->view('elements/sidebar');?>
<br><br><br><br>

<?php foreach ($cliente as $dados): ?>
  <?php $id_cliente = $dados->id; ?>
  <h3 class="text-centered"><?=$dados->nome?> <span class="hidden-xs-down">|</span> <div class="hidden-md-up"><br></div> <?=$dados->telefone?> <a class="editar_cliente" data-id_cliente="<?=$dados->id?>" style="color: #0275d8;"><i class="far fa-edit"></i></a></h3><br>
  <h4 class="text-centered">Última compra: <?=$dados->ultima_compra?> <span class="hidden-xs-down">|</span> <div class="hidden-sm-up"><br></div> Saldo: <?=$dados->saldo?><a data-toggle="modal" data-target="#ajustar_saldo" style="color: #0275d8;"><i class="far fa-edit"></i></a></h4><br>
  <h4 class="text-centered">
    <button class="btn btn-link" id="fazer_venda">Fazer Venda</button>
    <!--<span class="hidden-xs-down">|</span> <div class="hidden-md-up"><br></div>
    <a href="#" data-toggle="modal" data-target="#modal_pagamento">Receber Pagamento</a>-->
  </h4>
  <?php $saldo = $dados->saldo; ?>
<?php endforeach; ?>

<div class="container">
  <?php foreach ($total_pagamentos as $row): ?>
  <?php $total_pagamento = $row->total; ?>
  <?php endforeach; ?>
  <br><br>
  <h3 class="text-centered">Parcelas</h3>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#parcelas_abertas">Abertas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#parcelas_fechadas">Encerradas</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="parcelas_abertas" class="container tab-pane active"><br>
      <table id="tabela_um"  data-order='[[ 3, "asc" ]]' class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th scope="col">Pedido</th>
            <th scope="col">Parcela</th>
            <th scope="col">Valor</th>
            <th scope="col">Vencimento</th>
            <th scope="col">Restante</th>
            <th scope="col">Pagar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($parcelas as $row):
            $restante = $row->restante;
            if ($restante > '0.00'): ?>
              <tr>
                <td><a class="ver_pedido" data-id="<?=$row->id_pedido?>" style="color: #8e0695;"><?=$row->id_pedido?></a></td>
                <td><?=$row->parcela?></td>
                <td><?=$row->valor_parcela?></td>
                <td><?=$row->vencimento?></td>
                <td><?=$row->restante?></td>
                <td><a class="receber_pedido" data-id="<?=$row->id_parcela?>" data-restante="<?=$row->restante?>" style="color: #0275d8; cursor: pointer;"><i class="fas fa-money-bill-wave" ></i> Receber</a></td>
              </tr>
            <?php endif;
          endforeach; ?>
        </tbody>
      </table>
    </div>
    <div id="parcelas_fechadas" class="container tab-pane fade"><br>
      <table id="tabela_dois"  data-order='[[ 3, "asc" ]]' class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th scope="col">Pedido</th>
            <th scope="col">Parcela</th>
            <th scope="col">Valor</th>
            <th scope="col">Vencimento</th>
            <th scope="col">Restante</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($parcelas as $row):
            $restante = $row->restante;
            if ($restante <= '0.00'): ?>
              <tr>
                <td><a class="ver_pedido" data-id="<?=$row->id_pedido?>" style="color: #8e0695;"><?=$row->id_pedido?></a></td>
                <td><?=$row->parcela?></td>
                <td><?=$row->valor_parcela?></td>
                <td><?=$row->vencimento?></td>
                <td><?=$row->restante?></td>
              </tr>
            <?php endif;
          endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <br><br>
  <h3 class="text-centered">Vendas</h3>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Abertas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Encerradas</a>
    </li>
  </ul>

  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <table id="tabela_tres" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Data venda</th>
            <th scope="col">Valor</th>
            <th scope="col">Detalhes</th>
            <th scope="col">Promissória</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $encerradas = [];
          $valida = 0;
          foreach (array_reverse($pedidos) as $row):
            if ($row->valor <= $total_pagamento && $valida == 0){
              $total_pagamento = $total_pagamento - $row->valor;
              array_push($encerradas, array('id' => $row->id, 'valor' => $row->valor, 'data_compra' => $row->data_compra));
            }else{ ?>
              <?php $valida = 1; ?>
              <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->data_compra ?></td>
                <td><?= $row->valor ?></td>
                <td><a class="ver_pedido" data-id="<?=$row->id?>"><i class="fa fa-search" aria-hidden="true" style="color: #0275d8;"></i></a></td>
                <td><a href="<?php echo base_url(); ?>index.php/cliente/promissoria/<?= $row->id ?>" target="_blank"><i class="fa fa-edit" aria-hidden="true" style="color: #0275d8;"></i></a></td>
              </tr>
            <?php }
            endforeach; ?>
        </tbody>
      </table>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <table id="tabela_quatro" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Data venda</th>
            <th scope="col">Valor</th>
            <th scope="col">Detalhes</th>
            <th scope="col">Promissória</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($encerradas as $row): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['data_compra'] ?></td>
              <td><?= $row['valor'] ?></td>
              <td><a class="ver_pedido" data-id="<?=$row['id']?>"><i class="fa fa-search" aria-hidden="true" style="color: #0275d8;"></i></a></td>
              <td><a href="<?php echo base_url(); ?>index.php/cliente/promissoria/<?= $row['id'] ?>" target="_blank"><i class="fa fa-edit" aria-hidden="true" style="color: #0275d8;"></i></a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <br><br>
  <h3 class="text-centered">Pagamentos</h3>
  <table id="tabela_cinco" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Data pagamento</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pagamentos as $row): ?>
        <tr>
          <td><?= $row->data_pagamento ?></td>
          <td><?= $row->valor ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br><br>

  <br><br>
  <h3 class="text-centered">Ajustes</h3>
  <table id="tabela_seis" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">Data ajuste</th>
        <th scope="col">Valor</th>
        <th scope="col">Comentário</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ajustes as $row): ?>
        <tr>
          <td><?= $row->data ?></td>
          <td><?= moeda($row->valor) ?></td>
          <td><?= $row->comentario ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br><br>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_venda" tabindex="-1" role="dialog" aria-labelledby="label_venda" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label_venda" style="display: inline;">Fazer venda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12 div-sm-12 div-xs-12">
              <h5>
                <label class="label-input-style col-md-1 col-sm-12 col-xs-12" for="item">Item: </label>
                <select class="col-md-7 col-sm-12 col-xs-12 border_um item" id="campo_lista" name="item">
                  <option value=""></option>
                  <?php foreach ($lista as $row): ?>
                    <option value="<?=$row->nome?>"><?=$row->nome?></option>
                  <?php endforeach; ?>
                </select>
                <input type="text" class="col-md-7 col-sm-12 col-xs-12 border_um item" name="item" value="" id="campo_escrever" style="display: none;">
                <label class="label-input-style col-md-1 col-sm-12 col-xs-12" for="valor">Valor: </label>
                <input type="text" class="col-md-2 col-sm-12 col-xs-12 text-centered valor border_um" id="valor_produto" name="valor">
              </h5>
            </div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <br>
            <input type="hidden" id="id_cliente" name="id_cliente" value="<?=$id?>">
            <button type="button" id="chama_escrever" name="button" class="float-md-left float-xs-left">Escrever</button>
            <button type="button" id="chama_lista" name="button" class="float-md-left float-xs-left" style="display: none;">Lista</button>
            <button id="inserir_carrinho" class="btn btn-success float-md-right float-xs-right" name="button">Inserir</button>
          </div>
        </div>
        <hr class="hr">

        <div class="" id="listas">

        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-centered">Carrinho</h3>
            <div class="carrinho">

            </div>
          </div>
        </div>
        <div class="row">
          <br>
          <div class="col-md-12">
            <label class="label-input-style" for="desconto">Desconto: </label>
            <input type="text" id="desconto" class="text-centered" name="desconto" style="width: 8%;">
          </div>
        </div>
        <form class="" action="<?php echo base_url(); ?>index.php/cliente/detalhe/<?=$id_cliente?>" method="post">
        <div class="row text-right">
          <div class="col-md-12">
            <h5 style="position: relative; left: -6%;">
              <label class="label-input-style" for="parcelas">Parcelas: </label>
              <input type="text" id="parcelas" class="text-centered" name="parcelas" style="width: 14%;" required>
            </h5>
          </div>
          <div class="col-md-12">
            <h5 style="position: relative; left: -6%;">
              <label for="total">Total: &nbsp;</label>
              <input type="text" name="total" class="text-centered" id="total" readonly style="width: 14%; border: 0;">
            </h5>
          </div>
        </div>
        <div class="row text-right campo_desconto" style="display: none;">
          <div class="col-md-12">
            <h5 style="position: relative; left: -6%;">
              <label for="valor_desconto">Desconto: &nbsp;</label>
              <input type="text" name="valor_desconto" class="text-centered" id="valor_desconto" readonly style="width: 14%; border: 0;">
            </h5>
            <h5 style="position: relative; left: -6%;">
              <label for="total_com_desconto">Total com desconto: &nbsp;</label>
              <input type="text" name="total_com_desconto" class="text-centered" id="total_com_desconto" readonly style="width: 14%; border: 0;">
            </h5>
          </div>
        </div>
        <div class="row text-right campo_parcelas" style="display: none;">
          <div class="col-md-12">
            <h5 style="position: relative; left: -6%;">
              <input type="text" name="total_parcelas" class="text-centered" id="total_parcelas" readonly style="width: 14%; border: 0;">
              <label for="valor_parcelas"> parcelas de &nbsp;</label>
              <input type="text" name="valor_parcelas" class="text-centered" id="valor_parcelas" readonly style="width: 14%; border: 0;">
            </h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 list_parcelas">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id_cliente" value="<?=$id?>">
        <button type="submit" name="fazer_venda" id="finalizar_venda" class="btn btn-primary">Vender</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_pagamento" tabindex="-1" role="dialog" aria-labelledby="label_pagamento" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label_pagamento" style="display: inline;">Receber pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>index.php/cliente/detalhe/<?=$id_cliente?>" method="post">
        <div class="row">
          <h5>
            <label class="label-input-style col-md-3" for="valor">Restante: </label>
            <input type="text" class="col-md-5 text-centered" name="restante" id="restante" value="" readonly style="border: 0;">
          </h5>
        </div>
        <div class="row">
          <h5>
            <label class="label-input-style col-md-3" for="valor">Valor: </label>
            <input type="text" class="col-md-5 text-centered valor" maxlength="7" name="valor" required>
          </h5>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_cliente" value="<?=$id?>">
          <input type="hidden" id="id_parcela" name="id_parcela" value="">
          <input type="hidden" id="saldo" name="saldo" value="<?=$saldo?>">
          <button type="submit" name="fazer_pagamento" class="btn btn-primary">Pagar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ajustar_saldo" tabindex="-1" role="dialog" aria-labelledby="label_pagamento" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label_pagamento" style="display: inline;">Ajustar saldo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>index.php/cliente/detalhe/<?=$id_cliente?>" method="post">
        <div class="row">
          <h5>
            <label class="label-input-style col-md-4" for="valor">Saldo: </label>
            <input type="text" class="col-md-5 text-centered" name="saldo" value="<?=$saldo?>" readonly style="border: 0;">
          </h5>
        </div>
        <div class="row">
          <h5>
            <label class="label-input-style col-md-4" for="valor">Valor a diminuir: </label>
            <input type="text" class="col-md-5 text-centered valor" maxlength="7" name="valor" required>
          </h5>
        </div>
        <div class="row">
          <br>
          <h5>
            <label class="label-input-style col-md-4" for="valor">Comentário: </label>
            <textarea name="comentario" rows="4" cols="23"></textarea>
          </h5>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_cliente" value="<?=$id?>">
          <button type="submit" name="ajustar_saldo" class="btn btn-primary">Ajustar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_detalhe_pedido" tabindex="-1" role="dialog" aria-labelledby="label_detalhe" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="label_detalhe" style="display: inline;">Detalhes venda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="" id="pedido" style="padding: 2%;">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('elements/footer');?>

<!-- Modal -->
<div class="modal fade" id="modal_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="display: inline;">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="<?php echo base_url(); ?>index.php/cliente/detalhe/<?=$id_cliente?>" method="post">
        <div class="row">
          <div class="" id="cliente" style="padding: 2%;">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="editar_cliente" class="btn btn-primary">Alterar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

  $('.receber_pedido').click(function(){
    $('#id_parcela').val($(this).data("id"));
    $('#restante').val($(this).data("restante"));

    $("#modal_pagamento").modal("show");
  });

  $('.editar_cliente').click(function(){
    var id_cliente = $(this).data("id_cliente");
    $.ajax({
     url: '<?= base_url(); ?>index.php/cliente/fetch_edita_cliente',
     method: 'POST',
     data: {id_cliente:id_cliente},
     success: function(data){
       $('#cliente').html(data);
       $("#modal_editar").modal("show");
       $(".telefone").mask("(09) 99999-9999");
      }
     });
  });

  $('#fazer_venda').on("click", function(e) {
    var id_cliente = $('#id_cliente').val();
    $.ajax({
     url: '<?= base_url(); ?>index.php/cliente/fetch_carrinho',
     method: 'POST',
     data: {id_cliente:id_cliente},
     success: function(data){
       $('.item').val('');
       $('#valor').val('');
       $('.carrinho').html(data);
       $('#total').val($('#total_carrinho').val());
       $("#modal_venda").modal("show");
      }
     });
  });

  $('#inserir_carrinho').on("click", function(e) {
    var id_cliente = $('#id_cliente').val();
    var campo_lista = $('#campo_lista').val();
    var campo_escrever = $('#campo_escrever').val();
    var valor = $('#valor_produto').val();

    if (campo_lista != "") {
      item = campo_lista;
    }

    if (campo_escrever != "") {
      item = campo_escrever;
    }

    var insert_carrinho = [id_cliente, item, valor];

    $.ajax({
     url: '<?= base_url(); ?>index.php/cliente/inserir_carrinho',
     method: 'POST',
     data: {insert_carrinho:insert_carrinho},
     success: function(data){
       $('.item').val('');
       $('#valor_produto').val('');
       $('.carrinho').html(data);
       $('#total').val($('#total_carrinho').val());
      }
    });
  });

  $(document).on("click", '.retirar_carrinho', function(e) {
    var id_cliente = $(this).data("id_cliente");
    var id_carrinho = $(this).data("id_carrinho");

    console.log(id_cliente);
    console.log(id_carrinho);

    var retirar_carrinho = [id_cliente, id_carrinho];

    $.ajax({
     url: '<?= base_url(); ?>index.php/cliente/retirar_carrinho',
     method: 'POST',
     data: {retirar_carrinho:retirar_carrinho},
     success: function(data){
       $('.item').val('');
       $('#valor_produto').val('');
       $('.carrinho').html(data);
       $('#total').val($('#total_carrinho').val());
      }
    });
  });

  $('#finalizar_venda').on("click", function(e) {
    var total = $('#total').val();
    var parcelas = $('#parcelas').val();
    var data_vencimento = $('#data_vencimento').val();
    console.log(data_vencimento);

    if (total == 0) {
      alert("Insira produtos no carrinho");
      return false;
    }

    if (parcelas == "") {
      alert("Insira quantidade de parcelas");
      return false;
    }
  });

  $(document).on("click", '#chama_escrever', function(e) {
    console.log('ola');
    $('#campo_lista').hide();
    $('#campo_lista').val("");
    $('#chama_lista').show();
    $('#campo_escrever').show();
    $('#campo_escrever').val("");
    $('#chama_escrever').hide();
  });

  $(document).on("click", '#chama_lista', function(e) {
    console.log('ola');
    $('#campo_lista').show();
    $('#chama_lista').hide();
    $('#campo_escrever').hide();
    $('#chama_escrever').show();
  });

  var total = 0.00;

  function calcular_desconto(){
    var valor_desconto = 0;
    var total_com_desconto = 0;
    var total = $("#total").val();
    var desconto = $("#desconto").val();
    valor_desconto = total * (desconto/100);
    total_com_desconto = total - valor_desconto;

    $("#valor_desconto").val(valor_desconto.toFixed(2));
    $("#total_com_desconto").val(total_com_desconto.toFixed(2));
    $(".campo_desconto").show();

    var campo_parcelas = $(".campo_parcelas").is( ":visible" );
    if (campo_parcelas) {
      calcular_parcela();
    }
  }

  function calcular_parcela(){
    var valor_parcelas = 0;
    var total_parcelas = $("#parcelas").val();
    var total = $("#total").val();

    var campo_desconto = $(".campo_desconto").is( ":visible" );
    if (campo_desconto){
      var total_com_desconto = $("#total_com_desconto").val();
      console.log(total_com_desconto);
      valor_parcelas = total_com_desconto/total_parcelas;
    }else{
      valor_parcelas = total/total_parcelas;
      console.log(total);
      console.log(total_parcelas);
      console.log(valor_parcelas);
    }
    $("#valor_parcelas").val(valor_parcelas.toFixed(2));
    $("#total_parcelas").val(total_parcelas);
    $(".campo_parcelas").show();

    $(".linha_parcela").remove();
    $(".br_parcela").remove();

    $(".list_parcelas").append('<br>\
    <div class="row linha_parcela" style="display: flex; justify-content: center;">\
      <div class="col-md-4 col-sm-3 col-xs-3">Parcela</div>\
      <div class="col-md-4 col-sm-3 col-xs-3">Valor</div>\
      <div class="col-md-4 col-sm-3 col-xs-3">Vencimento</div>\
    </div><br class="br_parcela">\
    ');

    for (var i = 1; i <= total_parcelas; i++) {
      $(".list_parcelas").append('<div class="row linha_parcela" style="margin: 0 auto; display: flex; justify-content: center;">\
        <div class="col-md-3 col-sm-3 col-xs-3"><input type="" value="'+i+'" readonly/></div>\
        <div class="col-md-3 col-sm-3 col-xs-3"><input type="" value="'+valor_parcelas.toFixed(2)+'" readonly/></div>\
        <div class="col-md-3 col-sm-3 col-xs-3"><input type="date" name="vencimento_parcela[]" id="" class="data_vencimento" value="" required/></div>\
      </div><br class="br_parcela">\
      ');
    }
  }

  /*$(document).on('change', '.valor',function(){
    var valor = parseFloat($(this).val());
    console.log(valor);
    total = total + valor;

    $("#total").val(total.toFixed(2));

    var campo_desconto = $(".campo_desconto").is( ":visible" );
    var campo_parcelas = $(".campo_parcelas").is( ":visible" );

    if (campo_desconto) {
      calcular_desconto();
    }

    if (campo_parcelas) {
      calcular_parcela();
    }
  });*/

  $(document).on('focusout', '#desconto',function(){
    calcular_desconto();
  });

  $(document).on('focusout', '#parcelas',function(){
    calcular_parcela();
  });

  $('.ver_pedido').click(function(){
    var id_pedido = $(this).data("id");
    $.ajax({
     url: '<?= base_url(); ?>index.php/cliente/fetch_pedido',
     method: 'POST',
     data: {id_pedido:id_pedido},
     success: function(data){
       $('#pedido').html(data);
        $("#modal_detalhe_pedido").modal("show");
      }
     });
  });

  /*var campos_max  = 50;   //max de 50 campos
  var x = 1; // campos iniciais
  $('#add_field').on("click", function(e) {
    e.preventDefault();     //prevenir novos clicks
    if (x < campos_max) {
      $('#listas').append('<div class="row">\
          <div class="col-md-12 div-sm-12 div-xs-12">\
            <h5>\
              <label class="label-input-style col-md-1 col-sm-12 col-xs-12" for="item">Item: </label>\
              <input type="text" class="col-md-7 col-sm-12 col-xs-12 border_um" name="item[]" >\
              <label class="label-input-style col-md-1 col-sm-12 col-xs-12" for="valor">Valor: </label>\
              <input type="text" class="col-md-2 col-sm-12 col-xs-12 text-centered valor border_um" name="valor[]" >\
            </h5>\
            &nbsp;&nbsp;\
          <a href="#" class="remover_campo cor">X</a>\
          </div>\
        </div>\
        <hr>');
      x++;

      $(".valor").maskMoney({
        prefix: "",
        decimal: ".",
        thousands: ""
      });
    }
  });

  $('#add_field_select').on("click", function(e) {
    e.preventDefault();     //prevenir novos clicks
    if (x < campos_max) {
      $('#listas').append('<div class="row">\
        <div class="col-md-12 div-sm-12 div-xs-12">\
          <h5>\
            <label class="label-input-style col-md-1 col-sm-12 col-xs-12" for="item">Item: </label>\
            <select class="col-md-7 col-sm-12 col-xs-12 border_um" name="item[]">\
              <option value=""></option>\
              <?php foreach ($lista as $row): ?>\
                <option value="<?=$row->nome?>"><?=$row->nome?></option>\
              <?php endforeach; ?>\
            </select>\
            <label class="label-input-style col-md-1 col-sm-12 col-xs-12" for="valor">Valor: </label>\
            <input type="text" class="col-md-2 col-sm-12 col-xs-12 text-centered valor border_um" name="valor[]">\
          </h5>\
        </div>\
      </div>\
      <hr class="hr">');
      x++;

      $(".valor").maskMoney({
        prefix: "",
        decimal: ".",
        thousands: ""
      });
    }
  });

  $('#listas').on("click",".remover_campo",function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  });*/
});
</script>
