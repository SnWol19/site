<?php
//gerando arquivo XML
$bdservidor = '127.0.0.1';
$bdusuario = 'sistarefa';
$bdsenha = '123';
$bdbanco = 'tarefasapp';

//$valorq = $_POST['valoraa'];
//$valorf = $_POST['valorbb'];

$conexao = mysqli_connect($bdservidor, $bdusuario, $bdsenha, $bdbanco);

function gerarxmlphp($conexao)
{
	$buscarvalores = mysqli_query($conexao, "SELECT * FROM tarefasapp");

    $manipulador_arq = fopen("arq.xml", "w+");

    fwrite($manipulador_arq, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n\n\n<tarefas>");

    while($exibir = mysqli_fetch_array($buscarvalores))
    {
      $xml = "\n\n<tarefa>\n\n";
      $xml .= "<id>$exibir[0]</id>\n";
      $xml .= "<nome>$exibir[1]</nome>\n";
      $xml .= "<descricao>$exibir[2]</descricao>\n";
      $xml .= "\n\n</tarefa>\n";
  
      fwrite($manipulador_arq, $xml);
    }

    fwrite($manipulador_arq, "\n\n</tarefas>");

//header("Location: arq.xml");
    return true;

}

if(gerarxmlphp($conexao) == true)
{
   $output = array('status' => true);
   echo json_encode($output);
} else {
  //echo "erro"
}

?>