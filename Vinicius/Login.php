<?php
require_once('Cabecalho.php'); // session_start ()
require_once("Conexao.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "select * from usuarios where email=? and senha=?";
$sqlprep = $conexao->prepare($sql);
$sqlprep->bind_param("ss", $email, $senha);
$sqlprep->execute();
$resultadoSql = $sqlprep->get_result();
$vetorRegistros = $resultadoSql->fetch_all(MYSQLI_ASSOC);

if (count($vetorRegistros) > 0) {
  $_SESSION["email"] = $email;
  $_SESSION["senha"] = $senha;
  header("location: Pagina.php");
} else {
  $_SESSION["ErroLogin"] = "Erro no Login ou Senha.";
  header("location: FormLogin.php");
}
?>
