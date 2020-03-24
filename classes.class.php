<?php

session_start();

class Conexao 
{

	public function conect($conn, $sql) 
	{
		$array = mysqli_query($conn, $sql) or die("Deu Ruim");
		$array = mysqli_fetch_array($array);

		return $array;
	}	
}

class Login extends Conexao
{
	public function logar($array) 
	{
		if ($array['0'] == null)
		{
			echo"<script language='javascript' type='text/javascript'> alert('esse usuario não existe');window.location.href='index.php';</script>";
		}
		else
		{
			$_SESSION['id_aluno'] = $array['id'];
			$_SESSION['ra'] = $array['RA'];
			$_SESSION['nome'] = $array['nome'];
			
			if ($array['perm_user'] == 0)
			{
				header("Location:home.php");
			}
			else
			{
				header("Location:homeadm.php");
			}		
		}
	}	
}

class FuncAdm extends Conexao
{
	public function verificaValidade($array) 
	{
		if ($array['0'] == null)
		{
			//nao tem registro
			return 0;
		}
		else
		{
			//tem registro
			return 1;
		}
	}
	
	public function cadastrarUsu($RAcad, $senhacad, $nomecad, $conn, $vali) 
	{	
		if ($vali == 0)
		{
			$sql = "INSERT INTO `alunos`(`perm_user`, `RA`, `senha`, `nome`, `status`) VALUES (0, $RAcad, '$senhacad', '$nomecad',1);";
			(new Conexao)->conect($conn, $sql);
			echo"<script language='javascript' type='text/javascript'> alert('usúario cadastrado com sucesso');window.location.href='homeadm.php';</script>";
		}
		else
		{
			echo"<script language='javascript' type='text/javascript'> alert('RA ja cadastrado');window.location.href='homeadm.php';</script>";	
		}
	}
		
	public function deletarUsu($RAdel, $conn, $vali) 
	{
		if ($vali == 0)
		{		
			echo"<script language='javascript' type='text/javascript'> alert('RA invalido');window.location.href='homeadm.php';</script>";	
		}
		else
		{
			$sql = "UPDATE `alunos` SET `status`= 0 WHERE RA = $RAdel;";
			(new Conexao)->conect($conn, $sql);
			echo"<script language='javascript' type='text/javascript'> alert('usuario desativado');window.location.href='homeadm.php';</script>";
		}
	}
	
	public function cadastrarLiv($cadlivro, $cadautor, $cadeditora, $conn, $vali) 
	{
		if ($vali == 0)
		{
			$sql = "INSERT INTO `livros`(`livro`, `autor`, `editora`, `status`) VALUES ('$cadlivro','$cadautor','$cadeditora',1);";
			(new Conexao)->conect($conn, $sql);
			echo"<script language='javascript' type='text/javascript'> alert('livro cadastrado com sucesso');window.location.href='homeadm.php';</script>";
		}
		else
		{
			echo"<script language='javascript' type='text/javascript'> alert('livro dessa iditora e autor ja cadastrado');window.location.href='homeadm.php';</script>";	
		}	
	}
		
	public function deletarLiv($dellivro, $conn, $vali)
	{
		if ($vali == 0)
		{		
			echo"<script language='javascript' type='text/javascript'> alert('livro invalido');window.location.href='homeadm.php';</script>";	
		}
		else
		{
			$sql = "UPDATE `livros` SET `status`= 0 WHERE `id`= $dellivro;";
			(new Conexao)->conect($conn, $sql);
			echo"<script language='javascript' type='text/javascript'> alert('livro deletado com sucesso');window.location.href='homeadm.php';</script>";
		}
	}
}

class FuncAluno extends Conexao
{	
	public function verificaValidadeAluno($array) 
	{
		if ($array['0'] == null)
		{
			//nao tem registro
			return 0;
		}
		else
		{
			//tem registro
			return 1;
		}
	}
	
	public function emprestarLiv($emprestaLivro, $aluno, $conn, $vali) 
	{	
		$sql = "SELECT * FROM `emprestimo` WHERE `id_aluno`= $aluno and `id_livro`= $emprestaLivro and `status_empre` = 1;";
		$result = (new Conexao)->conect($conn, $sql);
		$vali2 = (new FuncAluno)->verificaValidade($result);
		
		if ($vali == 0)
		{
			echo"<script language='javascript' type='text/javascript'> alert('livro nao encontrado');window.location.href='home.php';</script>";	
		}
		else
		{
			if ($vali2 == 0)
			{
				$dataHoje = date('d/m/Y');
				$dataDevo = date('d/m/Y', strtotime('+10 days'));
				$sql = "INSERT INTO `emprestimo`(`id_aluno`, `id_livro`, `data_empre`, `data_devo`, `status_empre`) VALUES ($aluno, $emprestaLivro, '$dataHoje', '$dataDevo',1);";
				$result = (new Conexao)->conect($conn, $sql);
				echo"<script language='javascript' type='text/javascript'> alert('emprestimo realizado, devolução deve ser realizada na data de ".$dataDevo."');window.location.href='home.php';</script>";
			}
			else
			{
				echo"<script language='javascript' type='text/javascript'> alert('livro já emprestado pelo aluno');window.location.href='home.php';</script>";
			}
		}
	}
	
	/*public function devolverLiv($devolveLivroand, $aluno, $conn, $vali) 
	{	
		$sql = "SELECT * FROM `emprestimo` WHERE `id_aluno`= $aluno and `id_livro`= $devolveLivro and `status_empre` = 1;";
		//$result = (new Conexao)->conect($conn, $sql);
		//$vali2 = (new FuncAluno)->verificaValidadeAluno($result);
		
		/*if ($vali == 0)
		{
			echo"<script language='javascript' type='text/javascript'> alert('livro nao encontrado');window.location.href='home.php';</script>";	
		}
		else
		{
			if ($vali2 == 0)
			{
				echo"<script language='javascript' type='text/javascript'> alert('esse livro não foi emprestado');window.location.href='home.php';</script>";
			}
			else
			{
				$sql = "UPDATE `emprestimo` SET `status_empre` = 0 WHERE `id_aluno` = $aluno and `id_livro` = $devolveLivro and `status_empre` = 1;";
				//$result = (new Conexao)->conect($conn, $sql);
				echo"<script language='javascript' type='text/javascript'> alert('O livro foi devolvido com sucesso');window.location.href='home.php';</script>";
			}
		}
	}*/
}