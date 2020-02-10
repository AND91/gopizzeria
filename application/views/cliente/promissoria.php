<?php

require_once 'vendor/autoload.php';

require_once 'clsTexto.php';



$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1 style="text-align: center;">Nota Promissória</h1>');

foreach ($empresa as $dado_empresa):
$nome = $dado_empresa->nome;
$cnpj = $dado_empresa->cnpj;
$cidade = $dado_empresa->cidade;
$estado = $dado_empresa->estado;
endforeach;

foreach ($promissoria as $dados):
  $data_compra = (new DateTime($dados->data_compra))->format('d/m/Y H:i:s'); //explode('-', $pedido->data_compra);
  if ($dados->valor_com_desconto != "0.00") {
    $valor = $dados->valor_com_desconto;
  }else{
    $valor = $dados->valor;
  }
  $html ='Pagarei por esta via de nota promissória à empresa '.$nome.', CNPJ: '.$cnpj.' ou a sua ordem a quantia de
  '.clsTexto::valorPorExtenso($valor, true, false).' em moeda
  corrente deste país, pagável em '.$cidade.' - '.$estado.', dividido em
  '.clsTexto::valorPorExtenso($dados->parcelas, false, true).' parcela(s) de '.clsTexto::valorPorExtenso($dados->valor_parcelas, true, false).'.
  <br><br>
  <h4>Detalhes da Compra</h4>
  <table border="1" width="100%">
    <tr>
      <td colspan="2">Pedido: '.$dados->id.'</td>
      <td>Data do Pedido: '.$data_compra.'</td>
    </tr>
  </table>
  <br><br>';
  $mpdf->WriteHTML($html);
endforeach;

$mpdf->WriteHTML('<table border="1" width="100%">
  <tr>
    <td>Produto</td>
    <td>Valor (R$)</td>
  </tr>');

foreach ($itenspedido as $row):
  $html = '<tr>
  <td>'.$row->nome.'</td>
  <td>'.number_format($row->valor, 2, ',', '.').'</td></tr>';
  $mpdf->WriteHTML($html);
endforeach;

$mpdf->WriteHTML('</table>');

if ($dados->valor_com_desconto != "0.00") {
  $html = '<br><p style="text-align: right;">Valor do Pedido: R$ '.number_format($dados->valor, 2, ',', '.').'</p>
          <p style="text-align: right;">Desconto: R$ '.number_format($dados->desconto, 2, ',', '.').'</p>
          <p style="text-align: right;">Valor da nota promissória: R$ '.number_format($dados->valor_com_desconto, 2, ',', '.').'</p>';
  $mpdf->WriteHTML($html);
}else{
  $html = '<br><p style="text-align: right;">Valor da nota promissória: R$ '.number_format($dados->valor, 2, ',', '.').'</p>';
  $mpdf->WriteHTML($html);
}



$html = '<br><p>Em comum acordo (comprador e vendedor) está nota promissória poderá ser colocada em fórum a partir de 30 dias do vencimento da parcela.</p>
        <p>Para calculos de vencimento de cada parcela, considera a data da compra + (parcela atual x vezes 30 dias). <br> Ex: 1 parcela - 1 x 30, 2 parcela - 2 x 30, ...</p>
        <p>Declaramos ser verdadeira todas as informações contidas neste documento.</p>';
$mpdf->WriteHTML($html);

$mpdf->WriteHTML('<br><br><hr style="width: 50%; align: center;"><p style="text-align: center; position: relative; margin-top: -10px;">'.$dados->nome_cliente.'</p>');

$mpdf->Output('promissoria', 'I');
?>
