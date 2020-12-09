<?php require_once('Protege.php'); ?>
<?php require_once('Cabecalho.php'); ?>
<?php require_once('Conexao.php');  ?>

<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = 0;
}
$sql = "select * from alunos where id =?";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("i", $id);
$sqlprep->execute();
$ResultadoSql = $sqlprep->get_result();
$vetorUmRegistro = $ResultadoSql->fetch_assoc();

?>




<div class="panel panel-default">
    <div class="panel-heading">Adicionar Aluno</div>
    <div class="panel-body">
        <! - attention to form action ->
            <form action="salvarAluno.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="id">Id</label>
                    <! - it is important to use the value of the input to add the recovered value of the DB ->
                        <input type="text" class="form-control" id="id" name="id" placeholder="(automático)" readonly="true" value="<?= $vetorUmRegistro['id']; ?>">
                </div>
                <! - attention to the name attribute of the inputs ->
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?= $vetorUmRegistro['nome']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="descricao">Média</label>
                        <input type="number" class="form-control" id="media" name="media" value="<?= $vetorUmRegistro['media']; ?>">
                    </div>
                    <! - photo file ->
                        <div class="form-group">
                            <label for="foto">Foto do Produto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <div class="row">
                                <img class="col-md-1 img-responsive" src="<?= $vetorUmRegistro['foto']; ?>">
                                </img>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>
</div>

<?php require_once('Rodape.php'); ?>