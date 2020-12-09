<?php require_once('Protege.php'); ?>
<? php  require_once('Header.php'); ?>
<? php  require_once('Conexao.php');  ?>

<?php 

    if( isset ( $_POST [ 'id' ])) {    // if there is an id position in the $ _POST array
        $id = $_POST [ 'id' ];     // file was called by the listing form
    } else {
        $id = 0 ;                // file was not called by the listing form, but by the new button
    }
    $sql = "select * from students where id =?" ; // select the record by id
    $sqlprep = $connection -> prepare ($sql);
    $sqlprep->bind_param("i", $id);          
    $sqlprep->execute();
    $ResultadoSql = $SqlPrep -> get_result (); // get the sql result
    $VetorUmRegistro = $resultadoSql -> fetch_assoc (); // put the first and only record in the variable

?>




            <div class="panel panel-default">
                <div class="panel-heading">Adicionar Aluno</div>
                <div class="panel-body">
<! - attention to form action ->  
                    <form action="salvarAluno.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">Id</label>
<! - it is important to use the value of the input to add the recovered value of the DB ->
                            <input type="text" class="form-control" id="id" name="id" placeholder="(automático)" readonly="true" value="<?=$vetorUmRegistro['id'];?>">
                        </div>
<! - attention to the name attribute of the inputs ->   
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?=$vetorUmRegistro['nome'];?>">
                        </div>
                        <div class="form-group">
                            <label for="descricao">Matrícula</label>
                             <input type="text" class="form-control" id="matricula" name="matricula" value="<?=$vetorUmRegistro['matricula'];?>">
                        </div>
                        <! - photo file ->
                        <div class="form-group">
                            <label for="foto">Foto do aluno</label>
                             <input type="file" class="form-control" id="foto" 
                                    name="foto">
                             <div class="row">
                                <img class="col-md-1 img-responsive" 
                                     src="<?=$vetorUmRegistro['foto'];?>">
                                </img>
                             </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>

<?php require_once('Rodape.php'); ?>