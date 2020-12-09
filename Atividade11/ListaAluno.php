<?php require_once('Protege.php'); ?>
<?php
require_once('Conexao.php');

if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $searchLike = "%" . $search . "%";
    $sql = "select * from alunos where nome like? order by nome";
    $sqlPrep = $conexao->prepare($sql);
    $sqlPrep->bind_param("s", $searchLike);
    $sqlPrep->execute();
    $ResultadoSql = $sqlPrep->get_result();
} else {
    $search = "";
    $sql = "select * from alunos order by nome";
    $ResultadoSql = $conexao->query($sql);
}

$vetorRegistros = $ResultadoSql->fetch_all(MYSQLI_ASSOC);
?>

<?php require_once('Cabecalho.php'); ?>


<?php if (isset($msgOk)) : ?>

    <div class="bg-success">

        <?= $msgOk; ?>

    </div>

<?php endif ?>


<div class="row">
    <div class="col-md-4">
        <a class="btn btn-primary" href="FormAluno.php">Novo Aluno</a>
    </div>
    <div class="col-md-8">
        <! - search form ->
            <form action="ListaAluno.php" method="post" class="form-inline text-right">
                <div class="form-group">
                    <label for=" description "> Procurar por nome </label>
                    <input type="text" class="form-control" id="search" name="search" value="<?= $search; ?>">
                    <button type="submit" class="btn btn-default">Pesquisar</button>
                </div>
            </form>
            <! - order form search ->
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h4> Lista de Estudantes </h4>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">Foto</th>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Média</th>
                    <th>Alterar</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vetorRegistros as $umRegistro) : ?>
                    <tr>
                        <td>
                            <img src="<?= $umRegistro["foto"]; ?>" class="img-responsive">
                            </img>
                        </td>
                        <th> <?= $umRegistro["id"]; ?> </th>
                        <td> <?= $umRegistro["nome"]; ?> </td>
                        <td> <?= $umRegistro["media"]; ?> </td>
                        <td>
                            <form action="FormAluno.php" method="post">
                                <input type="hidden" name="id" value="<?= $umRegistro["id"]; ?>">
                                <button type="submit" class="btn btn-success">Alterar</button>
                            </form>
                        </td>
                        <td>
                            <form action="RemoverAluno.php" method="post">
                                <input type="hidden" name="id" value="<?= $umRegistro["id"]; ?>">
                                <button type="submit" class="btn btn-danger">Remover</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>

        </table>
    </div>
</div>

<?php require_once('Rodape.php'); ?>