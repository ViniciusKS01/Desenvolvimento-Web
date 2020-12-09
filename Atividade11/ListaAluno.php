<?php require_once('Protege.php'); ?>
<?php 
    require_once ('Conexao.php');

    if ( isset ($_POST ["search"])) {                                  
        $search = $_POST ["search"];                             
        $searchLike = "%" . $search . "%";                      
        $sql = "select * from students where name like? order by name"; 
        $sqlprep = $conexao -> prepare($sql);                         
        $SqlPrep -> bind_param("s" , $pesquisaLike);                   
        $sqlprep -> execute();                                        
        $ResultadoSql = $SqlPrep -> get_result();                      
    } else {                                                         
        $search = "" ;                                               
        $sql = "select * from alunos order by name" ;              
        $ResultadoSql = $conexao ->query($sql);            
    }

    $VetorRegistros = $resultadoSql -> fetch_all (MYSQLI_ASSOC); 
 ?>        


<? php  require_once ( 'Header.php' ); ?>


<?php  if(isset($msgOk)) :?>

    <div class="bg-success">   

    <?=$msgOk; ?>

    </div>
    
<?php endif ?>              


    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="FormAluno.php">Novo Aluno</a>
        </div>
        <div class="col-md-8">
<! - search form ->
            <form action="ListaAluno.php" 
                    method="post" 
                    class="form-inline text-right">
                <div class="form-group">
                    < label  for = " description " > Search by name </ label >
                     <input type="text" class="form-control" 
                            id="pesquisa" name="pesquisa" 
                            value="<?=$pesquisa; ?>">
                    <button type="submit" class="btn btn-default">Pesquisar</button>
                </div>      
            </form>
<! - order form search ->
        </div>
    </div>            

    
            <div class="panel panel-default">
                <div class="panel-heading">
                    < h4 > Student List </ h4 >
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="col-md-1">Foto</th>
                          <th>id</th>
                          <th>Nome</th>
                          <th>Matrícula</th>
                          <th>Alterar</th>
                          <th>Remover</th>                          
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($vetorRegistros as $umRegistro): ?>
                        <tr>
                            <td> 
                                <img src="<?=$umRegistro["foto"];?>" 
                                     class="img-responsive">
                                </img> 
                            </td>
                            <th> <?=$umRegistro["id"];?> </th>
                            <td> <?=$umRegistro["nome"];?> </td>
                            <td> <?=$umRegistro["matricula"];?> </td>
                            <td>
                                <form action="FormAluno.php" method="post">
                                    <input type="hidden" name="id" value="<?=$umRegistro["id"];?>">
                                    <button type="submit" class="btn btn-success">Alterar</button>
                                </form>
                            </td>                            
                            <td>
                                <form action="RemoverAluno.php" method="post">
                                    <input type="hidden" name="id" value="<?=$umRegistro["id"];?>">
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