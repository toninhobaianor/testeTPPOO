<?php 
  include_once("classCliente.php");
  
  $nome = $_GET['nome'];
	$sobrenome = $_GET['sobrenome'];
  $documento = $_GET['documento'];
	//$capacidadeCargaKg = $_GET['capacidadecarga'];
	//$registro = $_GET['registro'];
	//$disponivel =  $_GET['disponivel'];
  //$index = 1;
  //dentro das chaves o nome tem que ser igual ao name do html
  //echo $fabricante;
  echo"<br>";
  $cliente = new Cliente($nome,$sobrenome,$documento);

$cliente->save();
//aqui podemos criar a classes e passar as coisas para elas e salvar com o persist

?>

<!--<head>
  <title> page</title>
</head>
<body>
  <label><?php echo $idade;?> </label>
  <input type="<?php echo $idade; ?>" placeholder="<?php echo $idade; ?>"></input>
  <!-- ali no type podemos mudar o tipo do input apartir do passamos na outra pagina-->
</body>
