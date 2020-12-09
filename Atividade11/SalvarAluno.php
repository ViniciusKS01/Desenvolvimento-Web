<?php require_once('Protege.php'); ?>
<?php 
	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$media = $_POST["media"];
	require_once('Conexao.php');
	
	date_default_timezone_set('America/Sao_Paulo'); 
    $dataEHora = date('dmYHi'); 
    $nome_arquivo = "fotos/" . $dataEtime . $_FILES["foto"] ["name"]; 
    $nome_arquivo_tmp = $_FILES ["foto"] ["tmp_name"]; 
    $msgErroArquivo = "" ; 
    if (move_uploaded_file($nome_arquivo_tmp , $nome_arquivo) == false ) { 
        $msgErroArquivo = "Arquivo de foto não pode ser enviado." ; 
    }

    if($id==0) {
		$sql = "insert into alunos(nome, media, foto) values (?,?,?)";
		$sqlprep = $conexao->prepare($sql);
		$sqlprep->bind_param("sds", $nome, $media, $nome_arquivo);            
		$sqlprep->execute();
		$msgOk = "Aluno inserido com sucesso.";
	} else { 
		$sql = "update alunos set nome=?, media=?, foto=? where id=?";
		$sqlprep = $conexao->prepare($sql);
		$sqlprep->bind_param("sdsi", $nome, $media, $nome_arquivo, $id);            
		$sqlprep->execute();
		$msgOk = "Aluno atualizado com sucesso.";
	}
    
?>
<?php header('location: ListaAluno.php?msgOk='.$msgOk); ?>