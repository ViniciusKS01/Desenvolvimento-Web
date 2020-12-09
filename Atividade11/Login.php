<?php
	require_once('Cabecalho.php'); // session_start ()
	require_once("Conexao.php");

	$email = $_POST["email"];
	$senha = $_POST ["senha"];

  $sql = "select * from usuarios where email=? and senha=?";
  $sqlprep = $conexao -> prepare ($sql);
  $sqlprep->bind_param("ss", $email, $senha);
  $sqlprep->execute();
  $resultadoSql = $sqlprep->get_result();
  $vetorRegistros = $resultadoSql -> fetch_all(MYSQLI_ASSOC); // takes all records and puts them into a record array

  if ( count ($vetorRegistros)> 0 ) { 
  	$_SESSION["email"] = $email;
  	header("location: ListaAluno.php");
  } else {
  	$_SESSION ["ErroLogin"] = "Login error or password." ;
  	header("location: FormLogin.php");
  }
