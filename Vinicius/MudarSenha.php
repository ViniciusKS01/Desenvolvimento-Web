<?php require_once('Protege.php'); ?>
<?php require_once('Conexao.php'); ?>

<div class="panel panel-default">
    <div class="panel-heading">Trocar Senha</div>
    <div class="panel-body">
        <! - attention to form action ->
            <form action="SalvarSenha.php" method="post">
                <div class="form-group">
                    <label for="id">Id</label>
                    <! - it is important to use the value of the input to add the recovered value of the DB ->
                        <input type="text" class="form-control" id="id" name="id" placeholder="1" readonly="true" value="1">
                </div>
                <div class="p-3 mb-2 bg-info text-white">
                    Senha Atual: <?= $_SESSION["senha"]; ?>
                </div>
                <br>
                <! - attention to the name attribute of the inputs ->
                    <div class="form-group">
                        <label for="nome">Nova Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" value="<?= $_SESSION["senha"]; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>
</div>

<?php require_once('Rodape.php'); ?>