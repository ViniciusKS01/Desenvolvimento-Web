<?php require_once('Protege.php'); ?>
<?php 
	// get student ID to be removed
	$id = $_POST["id"];
	
    require_once('Conexao.php');

	$sql = "delete from alunos where id = ?";
	$sqlprep = $conexao -> prepare($sql);
	$sqlprep->bind_param("i", $id);            
	$sqlprep->execute();

	$msgOk = "Estudante Removido com Sucesso." ;
    
?>
<?php header('location: ListaAluno.php?msgOk='.$msgOk); ?>