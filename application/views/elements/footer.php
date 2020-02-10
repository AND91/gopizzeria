
</html>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.0.js"></script>
<script src="<?php echo base_url(); ?>assets/js/tether.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sge.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/valida_cpf_cnpj.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.maskMoney.min.js"></script>


<script src="cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="cdn.datatables.net/plug-ins/1.10.10/sorting/datetime-moment.js"></script>

<!-- Optional JavaScript v6-->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stellar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendors/lightbox/simpleLightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendors/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendors/counter-up/jquery.counterup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mail-script.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/theme.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  //$.fn.dataTable.moment('DD/MM/YY HH:mm:ss');
  //$.fn.dataTable.moment('DD/MM/YY');

  $('#tabela_um').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "Nenhum registro encontrado",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(Filtrado de _MAX_ registros no total)",
      "sSearch": "Buscar: _INPUT_",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo",
        "first": "Primeira página",
        "last": "Última página"
      }
    }
  });

  $('#tabela_dois').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "Nenhum registro encontrado",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(Filtrado de _MAX_ registros no total)",
      "sSearch": "Buscar: _INPUT_",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo",
        "first": "Primeira página",
        "last": "Última página"
      }
    }
  });

  $('#tabela_tres').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "Nenhum registro encontrado",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(Filtrado de _MAX_ registros no total)",
      "sSearch": "Buscar: _INPUT_",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo",
        "first": "Primeira página",
        "last": "Última página"
      }
    }
  });

  $('#tabela_quatro').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "Nenhum registro encontrado",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(Filtrado de _MAX_ registros no total)",
      "sSearch": "Buscar: _INPUT_",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo",
        "first": "Primeira página",
        "last": "Última página"
      }
    }
  });

  $('#tabela_cinco').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "Nenhum registro encontrado",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(Filtrado de _MAX_ registros no total)",
      "sSearch": "Buscar: _INPUT_",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo",
        "first": "Primeira página",
        "last": "Última página"
      }
    }
  });

  $('#tabela_seis').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "Nenhum registro encontrado",
      "info": "Página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(Filtrado de _MAX_ registros no total)",
      "sSearch": "Buscar: _INPUT_",
      "paginate": {
        "previous": "Anterior",
        "next": "Próximo",
        "first": "Primeira página",
        "last": "Última página"
      }
    }
  });
});

$('#tabela_um').keypress(function(e) {
  if(e.which == 13) {
    e.preventDefault();
    console.log('Não vou enviar');
  }
});

$('#tabela_dois').keypress(function(e) {
  if(e.which == 13) {
    e.preventDefault();
    console.log('Não vou enviar');
  }
});

$('#tabela_tres').keypress(function(e) {
  if(e.which == 13) {
    e.preventDefault();
    console.log('Não vou enviar');
  }
});

$('#tabela_quatro').keypress(function(e) {
  if(e.which == 13) {
    e.preventDefault();
    console.log('Não vou enviar');
  }
});

$('#tabela_cinco').keypress(function(e) {
  if(e.which == 13) {
    e.preventDefault();
    console.log('Não vou enviar');
  }
});

$('#tabela_seis').keypress(function(e) {
  if(e.which == 13) {
    e.preventDefault();
    console.log('Não vou enviar');
  }
});

$(document).ready(function(){
 $("#nascimento").mask("99/99/9999");
 $("#telefone").mask("(09) 99999-9999");
 $(".telefone").mask("(09) 99999-9999");
 $("#cpf").mask("999.999.999-99");
 $("#cep").mask("99999-999");
 $("#cnpj").mask("99.999.999/9999-99");
 $("#placa").mask("aaa - 9999");
 $(".valor").mask("###00.00", {reverse: true});
});

/*$(".valor").maskMoney({
  prefix: "",
  decimal: ".",
  thousands: ""
});*/

$(document).ready( function() {
  $("#formCadastro").validate({
    // Define as regras
    rules:{
      nome:{
        // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 2
      },
      sobrenome:{
        // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 3
      },
      email:{
        // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, email: true
      },
      senha:{
        // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 5
      },
      repita_senha:{
        // campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 5
      }
    },
    // Define as mensagens de erro para cada regra
    messages:{
      nome:{
        required: "Campo obrigatório",
        minlength: "O campo nome deve conter, no mínimo, 2 caracteres"
      },
      sobrenome:{
        required: "Campo obrigatório",
        minlength: "O campo sobrenonome deve conter, no mínimo, 3 caracteres"
      },
      email:{
        required: "Campo obrigatório",
        email: "Digite um e-mail válido"
      },
      senha:{
        required: "Campo obrigatório",
        minLength: "O campo senha deve conter, no mínimo, 5 caracteres"
      },
      repita_senha:{
        required: "Campo obrigatório",
        minLength: "O campo repita a senha deve conter, no mínimo, 5 caracteres"
      }
    }
  });
});

$(function(){
  $('.verifica_email').blur(function(){
      var email = $("#email").val();
      var emailarr = email.split("@");
      var temporario = ["eay.jp", "via.tokyo.jp", "ichigo.me", "choco.la", "cream.pink", "merry.pink", "neko2.net", "fuwamofu.com", "ruru.be", "macr2.com", "f5.si", "ahk.jp", "svk.jp", "carbtv.net", "2ether.net", "eth2btc.info", "web2mailco.com", "1webmail.info", "mailtrix.net", "twocowmail.net", "one2mail.info", "uemail99.com", "emailure.net", "emailsy.info", "mozej.com", "quid4pro.com", "tafmail.com", "zetmail.com", "getairmail.com", "abyssmail.com", "clrmail.com", "boximail.com", "vomoto.com", "r-mail.cf", "c4utar.cf", "opmmedia.ga", "selowhellboy.ga", "comeonday.pw", "virgilio.ml", "0nedrive.tk", "jacckpot.site", "awrp3laot.cf", "alefachria854.ml", "no-vax.cf", "mitsubishi-asx.cf", "h2o-web.gq", "h1tler.cf", "wikisite.co", "disbox.net", "tmpmail.org", "tmpmail.net", "tmails.net", "disbox.org", "moakt.co", "moakt.ws", "tmail.ws", "bareed.ws", "wimsg.com", "sharklasers.com", "guerrillamail.info", "grr.la", "guerrillamail.biz", "guerrillamail.com", "guerrillamail.de", "guerrillamail.net", "guerrillamail.org", "guerrillamailblock.com", "pokemail.net", "spam4.me", "dropmail.me", "10mail.org", "yomail.info", "emltmp.com", "emlpro.com", "emlhub.com", "armyspy.com", "cuvox.de", "dayrep.com", "einrot.com", "fleckens.hu", "gustr.com", "jourrapide.com", "rhyta.com", "superrito.com", "teleworm.us", "ourawesome.life", "ourawesome.online", "secure-box.info", "secure-box.online", "socrazy.club", "socrazy.online", "yopmail.com", "mozej.com", "jetable.org", "correotemporal.net", "nwytg.com", "icovh0pq.zce@20mail.eu", "fakeinbox.com", "filzmail.com", "mailexpire.com", "mailinator.com", "mailnesia.com", "mailmetrash.com", "mt2015.com", "mt2014.com", "thankyou2010.com", "trash2009.com", "mt2009.com", "trashymail.com", "mytrashmail.com", "vmani.com"];

      for (var i = 0; i < temporario.length; i++) {
        if (emailarr[1] == temporario[i]) {
          $("#erro_email").show();
          break;
        } else {
          $("#erro_email").hide();
        }
      }
  });

  // Aciona a validação ao sair do input
  $('.cpf_cnpj').blur(function(){
      // O CPF ou CNPJ
      var cpf_cnpj = $("#cpf").val();
      // Testa a validação
      if ( valida_cpf_cnpj( cpf_cnpj ) ) {
          $("#erro_cpf").hide();
      } else {
          $("#erro_cpf").show();
      }
  });

  // Aciona a validação ao sair do input
  $('.verifica_senha').blur(function(){
      var senha = $("#senha").val();
      var repita_senha = $("#repita_senha").val();

      // Testa a validação
      if (senha != repita_senha) {
        //alert('senhas diferentes!');
        $("#erro_senha").show();
      } else {
        $("#erro_senha").hide();
      }
  });

  $('#finalizar').click(function(){
    var email = $("#email").val().length;
    var repita_email = $("#repita_email").val().length;
    var senha = $("#senha").val().length;
    var repita_senha = $("#repita_senha").val().length;

    if (email <= 8 || repita_email <= 8 || senha <= 5 || repita_senha <= 5) {
      alert('Prencha todos os campos corretamente');
      return false;
    }else{
      // O CPF
      var cpf_cnpj = $("#cpf").val();
      // Testa a validação
      if ( valida_cpf_cnpj( cpf_cnpj ) ) {

      } else {
        alert('CPF inválido!');
        return false;
      }

      var senha = $("#senha").val();
      var repita_senha = $("#repita_senha").val();

      // Testa a validação
      if (senha != repita_senha) {
        alert('As senhas devem ser iguais!');
        return false;
      }

      var email = $("#email").val();
      var emailarr = email.split("@");
      var temporario = ["eay.jp", "via.tokyo.jp", "ichigo.me", "choco.la", "cream.pink", "merry.pink", "neko2.net", "fuwamofu.com", "ruru.be", "macr2.com", "f5.si", "ahk.jp", "svk.jp", "carbtv.net", "2ether.net", "eth2btc.info", "web2mailco.com", "1webmail.info", "mailtrix.net", "twocowmail.net", "one2mail.info", "uemail99.com", "emailure.net", "emailsy.info", "mozej.com", "quid4pro.com", "tafmail.com", "zetmail.com", "getairmail.com", "abyssmail.com", "clrmail.com", "boximail.com", "vomoto.com", "r-mail.cf", "c4utar.cf", "opmmedia.ga", "selowhellboy.ga", "comeonday.pw", "virgilio.ml", "0nedrive.tk", "jacckpot.site", "awrp3laot.cf", "alefachria854.ml", "no-vax.cf", "mitsubishi-asx.cf", "h2o-web.gq", "h1tler.cf", "wikisite.co", "disbox.net", "tmpmail.org", "tmpmail.net", "tmails.net", "disbox.org", "moakt.co", "moakt.ws", "tmail.ws", "bareed.ws", "wimsg.com", "sharklasers.com", "guerrillamail.info", "grr.la", "guerrillamail.biz", "guerrillamail.com", "guerrillamail.de", "guerrillamail.net", "guerrillamail.org", "guerrillamailblock.com", "pokemail.net", "spam4.me", "dropmail.me", "10mail.org", "yomail.info", "emltmp.com", "emlpro.com", "emlhub.com", "armyspy.com", "cuvox.de", "dayrep.com", "einrot.com", "fleckens.hu", "gustr.com", "jourrapide.com", "rhyta.com", "superrito.com", "teleworm.us", "ourawesome.life", "ourawesome.online", "secure-box.info", "secure-box.online", "socrazy.club", "socrazy.online", "yopmail.com", "mozej.com", "jetable.org", "correotemporal.net", "nwytg.com", "icovh0pq.zce@20mail.eu", "fakeinbox.com", "filzmail.com", "mailexpire.com", "mailinator.com", "mailnesia.com", "mailmetrash.com", "mt2015.com", "mt2014.com", "thankyou2010.com", "trash2009.com", "mt2009.com", "trashymail.com", "mytrashmail.com", "vmani.com"];

      for (var i = 0; i < temporario.length; i++) {
        if (emailarr[1] == temporario[i]) {
          alert('Não é permitido e-mail temporário!');
          break;
        }
      }
    }
  });
});




$(".campo_form_passageiro").blur(function(){
 if($(this).val() == ""){
    $(this).css({"border" : "1px solid #F00"});
  }else{
    $(this).css({"border" : "1px solid #000"});
  }
});
</script>
