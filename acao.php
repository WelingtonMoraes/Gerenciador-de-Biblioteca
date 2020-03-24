<?php
	
	session_start();
	include_once("conexao.php");
	require("classes.class.php");
	
	$emprestaLivro = $_POST['emprestaLivro'];
    $enviar1 = $_POST['enviar1'];
	$devolveLivro = $_POST['devolveLivro'];
    $enviar2 = $_POST['enviar2'];
	$aluno = $_SESSION['id_aluno'];
	
	if($_POST["enviar1"]=="EMPRESTAR")
	{
		$sql = "SELECT * FROM `livros` WHERE id = $emprestaLivro and status = 1";
		$result = (new Conexao)->conect($conn, $sql);
		$vali = (new FuncAluno)->verificaValidadeAluno($result);
		
		(new FuncAluno)->emprestarLiv($emprestaLivro, $aluno, $conn, $vali);
	}
	
	if($_POST["enviar2"]=="DEVOLVER")
	{	
		$sql = "SELECT * FROM `livros` WHERE id = $devolveLivro and status = 1;";
		$result = (new Conexao)->conect($conn, $sql);
		$vali = (new FuncAluno)->verificaValidadeAluno($result);
		
		(new FuncAluno)->devolverLiv($devolveLivro, $aluno, $conn, $vali);
	}