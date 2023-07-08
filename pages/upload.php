<?php

$imagem = filter_input(INPUT_POST, 'imagem', FILTER_DEFAULT);
// var_dump($imagem);

list($type, $imagem) = explode(';', $imagem);


list($base64, $imagem) = explode(',', $imagem);

$imagem = base64_decode($imagem);
var_dump($imagem);
$imagem_nome = time() . '.png';
file_put_contents('../assets/user/' . $imagem_nome, $imagem);
echo "Imagem enviada com sucesso";