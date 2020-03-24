<?php
	
	session_start();
	include_once("conexao.php");
	require("classes.class.php");
	
	if($_POST["cadusu"]=="CADASTRAR USÚARIO")
	{
		$RAcad = $_POST['RAcad'];
		$senhacad = $_POST['senhacad'];
		$nomecad = $_POST['nomecad'];
		
		$sql = "SELECT * FROM `alunos` WHERE RA = $RAcad;";
		$result = (new Conexao)->conect($conn, $sql);
		$vali = (new FuncAdm)->verificaValidade($result);
		
		(new FuncAdm)->cadastrarUsu($RAcad, $senhacad, $nomecad, $conn, $vali);
	}
	
	if($_POST["delusu"]=="EXCLUIR USÚARIO")
	{
		$RAdel = $_POST['RAdel'];
		
		$sql = "SELECT * FROM `alunos` WHERE RA = $RAdel and status = 1;";
		$result = (new Conexao)->conect($conn, $sql);
		$vali = (new FuncAdm)->verificaValidade($result);
		
		(new FuncAdm)->deletarUsu($RAdel, $conn, $vali);
	}
	
	if($_POST["cadliv"]=="CADASTRAR LIVRO")
	{
		$cadlivro = $_POST['cadlivro'];
		$cadautor = $_POST['cadautor'];
		$cadeditora = $_POST['cadeditora'];
		
		$sql = "SELECT * FROM `livros` WHERE `livro` = '$cadlivro' and `autor` = '$cadautor' and `editora` = '$cadeditora';";
		$result = (new Conexao)->conect($conn, $sql);
		$vali = (new FuncAdm)->verificaValidade($result);
		
		(new FuncAdm)->cadastrarLiv($cadlivro, $cadautor, $cadeditora, $conn, $vali);
	}
	
	if($_POST["delliv"]=="EXCLUIR LIVRO")
	{
		$dellivro = $_POST['dellivro'];
		
		$sql = "SELECT * FROM `livros` WHERE `id` = $dellivro and status = 1;";
		$result = (new Conexao)->conect($conn, $sql);
		$vali = (new FuncAdm)->verificaValidade($result);
		
		(new FuncAdm)->deletarLiv($dellivro, $conn, $vali);
	}