<?php require_once('Protege.php'); ?>
<?php 
	$id = $_POST["id"];
	$senha = $_POST["senha"];
	require_once('Conexao.php');

		$sql = "update usuarios set senha=? where id=?";
		$sqlprep = $conexao->prepare($sql);
		$sqlprep->bind_param("si", $senha, $id);            
		$sqlprep->execute();
		$msgOk = "Senha atualizada com sucesso.";
    
?>
<?php header('location: Pagina.php?msgOk='.$msgOk); ?>