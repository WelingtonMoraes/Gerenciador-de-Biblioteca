<?php

	session_start();
	include_once("conexao.php");
	require("classes.class.php");
	
    $RA = $_POST['ra_n'];
    $senha = $_POST['senha_n'];
	$sql = "SELECT * FROM alunos WHERE RA = '$RA' and senha = '$senha';";
	
	$result = (new Conexao)->conect($conn, $sql);
	(new Login)->logar($result);