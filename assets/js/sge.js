function dinheiro(){
  var dinheiro = document.getElementById('dinheiro');
  dinheiro.style['display'] = 'block';
  var cartao = document.getElementById('cartao');
  cartao.style['display'] = 'none';
  var caderneta = document.getElementById('caderneta');
  caderneta.style['display'] = 'none';
}

function cartao(){
  var dinheiro = document.getElementById('dinheiro');
  dinheiro.style['display'] = 'none';
  var cartao = document.getElementById('cartao');
  cartao.style['display'] = 'block';
  var caderneta = document.getElementById('caderneta');
  caderneta.style['display'] = 'none';
}

function caderneta(){
  var dinheiro = document.getElementById('dinheiro');
  dinheiro.style['display'] = 'none';
  var cartao = document.getElementById('cartao');
  cartao.style['display'] = 'none';
  var caderneta = document.getElementById('caderneta');
  caderneta.style['display'] = 'block';
}

function nParcelado(){
  var nParcelado = document.getElementById('nParcelado');
  nParcelado.style['display'] = 'block';
  var parcelado = document.getElementById('parcelado');
  parcelado.style['display'] = 'none';
}

function parcelado(){
  var nParcelado = document.getElementById('nParcelado');
  nParcelado.style['display'] = 'none';
  var parcelado = document.getElementById('parcelado');
  parcelado.style['display'] = 'block';
}
