<?php

$bdserver ='127.0.0.1';
$bdusuario = 'sistarefa';
$bdsenha = '123';
$bdbanco = 'tarefasapp';

$conexao = mysqli_connect($bdserver, $bdusuario, $bdsenha, $bdbanco);
if (mysqli_connect_errno($conexao)) {
	echo "erro ao conectar-se ao banco de dados";
	die();
}

$tarefa = $_POST['tarefas'];
$descricao = $_POST['descricoes'];

function cadastrar($conexao, $tarefa, $descricao)
{
	//
	$sql = "
      INSERT INTO tarefasapp
      (nome, descricao)
      VALUES
      ('$tarefa', '$descricao');
	";

	mysqli_query($conexao, $sql);

	return true;
}

  if (cadastrar($conexao, $tarefa, $descricao) == true) 
  {
  	$output = array('status' => true);
  	echo json_encode($output);
  } else
  {
  	echo "erro";
  }

?>