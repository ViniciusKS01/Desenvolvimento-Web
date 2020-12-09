<?php require_once('Protege.php'); ?>
<?php 
	// get form values ​​(vector index is equal to name attribute on form)
	$id = $_POST["id"];
	$name = $_POST [ "name" ];
	$enrollment = $_POST ["enrollment"];
    require_once('Conexao.php');


	// upload the file with date and time in the file name
    date_default_timezone_set('America / Sao_Paulo'); // set time zone
    $dataEHora = date ( 'dmYHi' ); // get date and time from server
    $filename = "photos /" . $dataEtime . $_FILES ["photo"] ["name"]; // define folder and file name on the server
    $nome_arquivo_tmp = $_FILES [ "foto" ] [ "tmp_name" ]; // get temporary file name on the server
    $msgErroArquivo = "" ; // set empty error message
    if ( move_uploaded_file ( $filename_tmp , $filename ) == false ) { // if an error occurs ...
         $msgErroArquivo = "Photo file cannot be sent." ; // define error message
    }
    // end file upload


    if ($id == 0 ) { // if id is 0 there is a new record (insert)
		$sql = "insert into students (name, registration, photo) values ​​(?,?,?)" ;
        $sqlprep = $connection -> prepare ($sql);
        $sqlprep -> bind_param ( "sss" , $name , $registration , $filename );            
        $sqlprep->execute();
        $msgOk = "Student successfully inserted." . $msgErrorFile;
	} else { // if the id is not 0 it is an update
		$sql = "update alunos set nome=?, matricula=?, foto=? where id=?";
        $sqlprep = $connection -> prepare ($sql);
        $sqlprep -> bind_param ( "sssi" , $name , $registration , $file_name , $id );            
        $sqlprep->execute();
        $msgOk = "Student updated successfully." . $msgErrorFile ;
	}
    
?>
<?php header('location: ListaAluno.php?msgOk='.$msgOk); ?>