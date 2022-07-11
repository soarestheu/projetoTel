// JavaScript Document
// Mascaras para tela de cadastro de Empregados:

// Mascara para data
$('.data').mask('00/00/0000', {placeholder: "__/__/____"});
$('.mes').mask('00/0000', {placeholder: "__/____"});
$('.cep').mask('00000-000');
$('.tel').mask('(00) 00000-00000');
$('.numRua').mask('0000');
$('.rg').mask('00.000.000-00');
$('.moeda').mask('000.000.000.000.000,00', {reverse: true});
$('.cpf').mask('000.000.000-00');
$('.num').mask('00000000000000');
$('.pac').mask('00');
$('.percent').mask('##0,00%', {reverse: true});
$('.hora').mask('00:00', {placeholder: "__:__"});