<?php  
//header('Access-Control-Allow-Origin: *');  
//header('Access-Control-Allow-Methods: POST');
//header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');  

$bdserver = '127.0.0.1';
$bdusuario = 'sistarefa';
$bdsenha = '123';
$bdbanco = 'usuarios'; //nome do banco

$conexao = mysqli_connect($bdserver, $bdusuario, $bdsenha, $bdbanco);

  if(mysqli_connect_errno($conexao)){
    	echo "Problemas Para conectar no banco de dados!";
	    die();
   }

$usuario = $_POST['usuarios'];
$senha = $_POST['senhas'];

  $verifica = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login = '$usuario' AND senha = '$senha'");
  
  if(mysqli_num_rows($verifica) == 1) {
     $output = array('status' => true);
     echo json_encode($output);
  } else {
     echo "erro";
  }

mysqli_close($conexao);

 
?>